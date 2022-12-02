<x-admin-layout>
    <x-admin-page-header :title="__('Calendar')" :subtitle="__('Data calendar')">

    </x-admin-page-header>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ str()->title('List calendar') }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="container mt-2">
                            <div id="calendar">
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" id="modalHeader">
                                            <h5 class="modal-title" id="exampleModalLabel">Add Events</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            <button type="button" id="delete" class="btn btn-danger ms-3"><i class="bi bi-trash"></i></button>
                                        </div>
                                        <form action="" method="post" enctype='multipart/form-data'>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="title">
                                                            Title Event
                                                        </label>
                                                        <input name="title" type="text" id="title" placeholder="Input name events" class="form-control">
                                                        <label for="description">
                                                            Description
                                                        </label>
                                                        <textarea name="description" id="description" cols="20" rows="10" class="form-control"></textarea>
                                                        <label for="start" class="mt-2">
                                                            Date Event
                                                        </label>
                                                        <div class="input-daterange">
                                                            <input name="start" id="start" type="date" class="form-control">
                                                            <div class="input-group-addon">to</div>
                                                            <input type="date" name="end" id="end" class="form-control">
                                                            <input type="hidden" name="method" id="method" value="post">
                                                            <input type="hidden" name="id" id="id">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <a class="btn btn-primary" id="submit">Save changes</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="styleVendor">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.css">
    </x-slot>
    <x-slot name="scriptVendor">
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.js"></script>
        <script src='https://unpkg.com/popper.js/dist/umd/popper.min.js'></script>
        <script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    </x-slot>
    <x-slot name="script">
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let dataResultCalendarGet = [];
                let startData = [];
                let startString = [];
                $.get("api/calendar-jasmani", function(data, status) {
                    dataResultCalendarGet = data.data[0];
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        eventColor: '#8D191C',
                        headerToolbar: {
                            right: 'today prev,next',
                        },
                        eventDidMount: function(info) {
                            var tooltip = new Tooltip(info.el, {
                                title: info.event.extendedProps.description,
                                placement: 'top',
                                trigger: 'hover',
                                container: 'body'
                            });
                        },
                        events: dataResultCalendarGet,
                        eventClick: function(info) {
                            let titleID = info.event.title;
                            $("#delete").show();
                            $.get("api/calendar-jasmani-title/" + titleID, function(data, status) {
                                console.log(data.data[0].description);
                                // console.log(data.data[0].start);
                                $("#exampleModal").modal("show");
                                let title = $("#title").val(data.data[0].title)
                                let description = $("#description").val(data.data[0].description)
                                let start = $("#start").val(data.data[0].start)
                                let end = $("#end").val(data.data[0].end)
                                let method = $("#method").val("put")
                                let idEvents = $("#id").val(data.data[0].id);
                                // alert('Suc');
                            })
                        }
                    });
                    calendar.on('dateClick', function(info) {
                        alert('Event Kosong');
                        // $("#delete").remove();
                        $("#exampleModal").modal("show");
                        $("#delete").hide();
                        $("#start").val(info.dateStr);
                    });
                    calendar.render();
                });
            });

            $("#delete").click(function() {
                let idEv = $("#id").val();
                if (confirm("Are you sure you want to delete this?")) {
                    console.log("Success Deleted events");
                    $.ajax({
                        url: "api/calendar-jasmani/" + idEv,
                        method: 'delete',
                        dataType: 'JSON',
                        success: function(response) {
                            location.reload();
                        }
                    })
                } else {
                    console.log("You cancel this action!");
                    location.reload();
                }
                // alert("Hapus");
            })

            // Click button submit
            $("#submit").click(function() {
                let title = $("#title").val();
                let desc = $("#description").val();
                let from_date = $("#start").val();
                let to_date = $("#end").val();
                let idEv = $("#id").val();
                let methodsElement = $("#method").val();
                // Post
                if (methodsElement == "post") {
                    $.post("api/calendar-jasmani", {
                            title: title,
                            description: desc,
                            start: from_date,
                            end: to_date
                        },
                        function(data, status) {
                            alert("Sucess created Events");
                            location.reload();
                        });
                    //Update
                } else {
                    $.ajax({
                        url: "api/calendar-jasmani/" + idEv,
                        method: 'put',
                        dataType: 'JSON',
                        data: {
                            method: '_put',
                            title: title,
                            description: desc,
                            start: from_date,
                            end: to_date
                        },
                        success: function(response) {
                            alert("Sucess updated Events");
                            location.reload();
                        }
                    });
                }
            });
            // $('.input-daterange input').each(function() {
            //     $(this).datepicker('clearDates');
            // });
        </script>
    </x-slot>
</x-admin-layout>