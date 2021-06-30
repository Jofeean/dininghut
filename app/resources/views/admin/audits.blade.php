@extends("layouts.master2")

@section("title")
    Audits
@endsection

@section("css")
    <link rel="stylesheet" href="{{ url("admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}">
    <link rel="stylesheet"
          href="{{ url("admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}">
    <link rel="stylesheet" href="{{ url("admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css") }}">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card col-md-12">
                    <div class="card-body">
                        <table id="adminList" class="table table-striped table-hover">
                            <thead>
                            <td>ID</td>
                            <td>User Type</td>
                            <td>User ID</td>
                            <td>Affected Table</td>
                            <td>Affected ID</td>
                            <td>Event</td>
                            <td>Old Data</td>
                            <td>New Data</td>
                            <td>Url</td>
                            <td>IP Address</td>
                            <td>Device</td>
                            <td>Date</td>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("js")
    <script src="{{ url("admin-lte/plugins/datatables/jquery.dataTables.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/jszip/jszip.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/pdfmake/pdfmake.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/pdfmake/vfs_fonts.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/datatables-buttons/js/buttons.print.min.js") }}"></script>
    <script src="{{ url("admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js") }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        table = $("#adminList").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url("admin/audits") }}",
            "columns": [
                {
                    data: 'id'
                },
                {
                    data: 'user_type',
                    render: (data) => {
                        return String(data).replace("App\\Models\\", "")
                    }
                },
                {
                    data: 'user_id'
                },
                {
                    data: 'auditable_type',
                    render: (data) => {
                        return String(data).replace("App\\Models\\", "")
                    }
                },
                {
                    data: 'auditable_id'
                },
                {
                    data: 'event'
                },
                {
                    data: 'old_values'
                },
                {
                    data: 'new_values'
                },
                {
                    data: 'url'
                },
                {
                    data: 'ip_address'
                },
                {
                    data: 'user_agent'
                },
                {
                    data: 'created_at',
                    render: function (data) {
                        data = new Date(data)
                        return data.toDateString() + " <b>" + data.toLocaleTimeString() + "<b>"
                    }
                },
            ],

            "dom": 'Bfrtip',
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "buttons": ["colvis"],
        })
    </script>
@endsection
