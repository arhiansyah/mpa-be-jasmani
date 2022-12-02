<div class="my-3 table-responsive" style="max-height: 800px;">
    <table class="table table-sm table-bordered" id="table1">
        <thead>
            @foreach ($sprint['column'] as $row)
            <tr>

            </tr>
            @endforeach
        </thead>
        <tbody>
            @foreach ($sprint as $row)
            <tr id="{{ $row->id }}">
                <td>{{ $row[$data[1]] }}</td>
                <td>{{ $row->score }}</td>
                <td>{{ $row->gender }}</td>
                <td><a onclick="openWindow('{{$row->id}}')" class="btn btn-primary btn-gan detailQuestion">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {!! $data->links() !!} --}}
</div>
<script>
    function openWindow(id) {
        var myWindow = window.open(`{{ URL::to('/question/` + id + `'); }}`, "", "width=800,height=600");
    }
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
</script>
<link rel="stylesheet" href="{{ asset('assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css') }} ">
<link rel="stylesheet" href="{{ asset('assets/vendors/fontawesome/all.min.css') }} ">
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
{{-- <script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script> --}}
<script src="{{ asset('assets/vendors/jquery-datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js') }}">
</script>
<script src="{{ asset('assets/vendors/fontawesome/all.min.js') }}"></script>
<script>
    $('#table1').DataTable({
        "iDisplayLength": 25
    });
</script>