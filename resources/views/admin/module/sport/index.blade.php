<x-admin-layout>
    <x-admin-page-header :title="__('Sport')" :subtitle="__('Data sport')">

    </x-admin-page-header>
    <!-- <x-slot namespace="styleVendor">
        <script src="{{ asset('assets/css/datatables.min.css') }} "></script>
        <script src="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"></script>
    </x-slot> -->
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ str()->title('List sport') }}</h4>
                        <!-- <a href="{{ route('sports.create') }}" class="btn btn-primary btn-gan" id="create-data">Buat Data Baru</a> -->
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4" id="card-active-sprint">
                                <div class="card border border-danger" id="card-sprint">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div>
                                                <h3 class="text-dark-red">{{count($sprint)}}</h3>
                                                <p class="mb-0">List Score Sprint</p>
                                            </div>
                                            <div class="align-self-center">
                                                <img src="{{asset('assets/images/icons/icon-sprint.png')}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4" id="card-active-workout">
                                <div class="card" id="card-workout">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div>
                                                <h3 class="text-dark-red">{{count($workout)}}</h3>
                                                <p class="mb-0">List Score Workout</p>
                                            </div>
                                            <div class="align-self-center">
                                                <img src="{{asset('assets/images/icons/icon-workout.png')}}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4" id="card-active-swim">
                                <div class="card" id="card-swim">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between px-md-1">
                                            <div>
                                                <h3 class="text-dark-red">{{count($swim)}}</h3>
                                                <p class="mb-0">List Score Swim</p>
                                            </div>
                                            <div class="align-self-center">
                                                <img src="{{asset('assets/images/icons/icons-swimmer.png')}}" style="width: 60px;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-10 offset-1" id="tes">



                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <x-slot name="scriptVendor">

        <!-- <script src="{{ asset('assets/js/datatables.min.js') }} "></script> -->
        <script src="{{ asset('assets/vendors/jquery-datatables/jquery.dataTables.min.js') }} "></script>
        <script src="{{ asset('assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js') }} "></script>
    </x-slot>
    <x-slot name="script">
        <script>
            // Call DataTable
            dataTableSprint();
            dataTableSettings();
            //Call if card trigger events click
            document.getElementById("card-sprint").addEventListener("click", sprint);
            document.getElementById("card-swim").addEventListener("click", swim);
            document.getElementById("card-workout").addEventListener("click", workout);
            //function dataTable configuration
            function dataTableSettings() {
                $("#dataTable1").DataTable();
                // $("#dataTable1_length").html(`
                // <div class="col-12 mt-4" >
                //     <label>Show</label>
                //     <select name="dataTable1_length" aria-controls="dataTable1" class="form-select-sm rounded-pill" style="width:20%; height:20%; margin-right:3%; margin-left:3%;">
                //         <option value="10">10</option>
                //         <option value="25">25</option>
                //         <option value="50">50</option>
                //         <option value="100">100</option>
                //     </select>
                //     <label>
                //         entries
                //     </label>
                // </div>        
                // `);
                // $("#dataTable1_filter").html(`
                //     <label style="margin-left:35%;">
                //         Search:
                //         <input type="search" class="form-control form-control-sm rounded-pill" placeholder aria-controls="dataTable1">
                //     </label>
                // `);

            }

            function selectAll() {
                $('#select-all').click(function(event) {
                    if (this.checked) {
                        // Iterate each checkbox
                        $(':checkbox.checkQuestion').each(function() {
                            this.checked = true;
                        });
                    } else {
                        $(':checkbox.checkQuestion').each(function() {
                            this.checked = false;
                        });
                    }
                });
            }

            function dataTableSprint() {
                $("#tes").html(`
                    <table class="table table-responsive" id="dataTable1">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="form-check-input" name="" id="select-all"></th>
                                @foreach ($sprColumn as $sprclnKey => $sprcln)
                                <th>{{$sprcln}}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sprint as $key => $spr)
                            <tr>
                                <td><input type="checkbox" class="form-check-input checkQuestion"></td>
                                <td>{{ $spr->distance }}</td>
                                <td>{{ $spr->score }}</td>
                                <td>{{ $spr->gender }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                `);
                selectAll();
            }

            function dataTableSwim() {
                $("#tes").html(`
                <table class="table table-responsive" id="dataTable1">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="form-check-input" name="" id="select-all"></th>
                            @foreach ($swimColumn as $swimKey => $swimV)
                            <th>{{$swimV}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($swim as $key => $swims)
                            <tr>
                                <td><input type="checkbox" class="form-check-input checkQuestion"></td>
                                <td>{{ $swims->seconds }}</td>
                                <td>{{ $swims->score }}</td>
                                <td>{{ $swims->gender }}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                `);
                selectAll();
            }

            function dataTableWorkout() {
                $("#tes").html(`
                <table class="table table-responsive" id="dataTable1">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="form-check-input" name="" id="select-all"></th>
                            @foreach ($workColumn as $workKey => $workV)
                            <th>{{$workV}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($workout as $key => $wkt)
                        <tr>
                            <td><input type="checkbox" class="form-check-input checkQuestion"></td>
                            <td>{{ $wkt->motion }}</td>
                            <td>{{ $wkt->score }}</td>
                            <td>{{ $wkt->gender }}</td>
                            <td>{{ $wkt->type }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                `);
                selectAll();
            }

            function swim() {
                $("#card-swim").addClass("border border-danger");
                $("#card-sprint").removeClass("border border-danger");
                $("#card-workout").removeClass("border border-danger");
                dataTableSwim();
                dataTableSettings();
            }

            function workout() {
                $("#card-swim").removeClass("border border-danger");
                $("#card-sprint").removeClass("border border-danger");
                $("#card-workout").addClass("border border-danger");
                dataTableWorkout();
                dataTableSettings();
            }

            function sprint() {
                $("#card-swim").removeClass("border border-danger");
                $("#card-sprint").addClass("border border-danger");
                $("#card-workout").removeClass("border border-danger");
                dataTableSprint();
                dataTableSettings();
            }
            // $(document).ready(function() {
            //     $('#dataTable1').DataTable({
            //         paging: true,
            //         lengthMenu: [
            //             [10, 25, 50, -1],
            //             ['10', '25', '50', 'Show all']
            //         ],
            //         order: [
            //             [3, 'desc']
            //         ],
            //         searchable: true,
            //         info: true,
            //         ajax: "{{ route('sprint-gender.index') }}",
            //         columns: [{
            //                 data: 'distance'
            //             },
            //             {
            //                 data: 'score'
            //             },
            //             {
            //                 data: 'gender'
            //             },
            //         ]
            //     });
            // });
        </script>
    </x-slot>

</x-admin-layout>