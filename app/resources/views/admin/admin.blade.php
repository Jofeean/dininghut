@extends("layouts.master2")

@section("title")
    Administrators
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
                            <td>Name</td>
                            <td>Username</td>
                            <td>Type</td>
                            <td>Created</td>
                            <td>Last Update</td>
                            <td>Actions</td>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Modals--}}

    {{-- Add --}}
    <div class="modal fade" id="addAdminModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Administrator</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url("admin/admin") }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter name"
                                   value="{{ old("name") }}">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Enter username"
                                   value="{{ old("username") }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password"
                                   placeholder="Retype password">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- Edit --}}
    <div class="modal fade" id="editAdminModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Administrator</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="edit_name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="edit_username"
                                   placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" name="type" id="edit_type">
                                <option value="Admin">Admin</option>
                                <option value="Maintainer">Maintainer</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- View --}}
    <div class="modal fade" id="viewAdminModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View Administrator</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id" id="edit_id">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="view_name" disabled>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="view_username" disabled>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- Reset --}}
    <div class="modal fade" id="resetAdminModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Reset Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url("admin/admin/reset") }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="reset_id">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="reset_password"
                                   placeholder="Enter password">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" class="form-control" name="confirm_password"
                                   id="reset_confirm_password"
                                   placeholder="Retype password">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
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
            "ajax": "{{ route("admin.index") }}",
            "columns": [
                {
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'username'
                },
                {
                    data: 'type',
                    render: function (data) {
                        var disp
                        if (data == "Maintainer") {
                            disp = "<span class='badge  badge-lg badge-warning'>" + data + "</span>"
                        }
                        if (data == "Admin") {
                            disp = "<span class='badge  badge-lg badge-success'>" + data + "</span>"
                        }
                        return disp
                    }
                },
                {
                    data: 'created_at',
                    render: function (data) {
                        data = new Date(data)
                        return data.toDateString() + " <b>" + data.toLocaleTimeString() + "<b>"
                    }
                },
                {
                    data: 'updated_at',
                    render: function (data) {
                        data = new Date(data)
                        return data.toDateString() + " <b>" + data.toLocaleTimeString() + "<b>"
                    }
                },
                {
                    data: "id",
                    render: function (data, type, row, meta) {
                        return '<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">' +
                            '<i class="nav-icon fas fa-cog"></i>' +
                            '</button>' +
                            '<div class="dropdown-menu">' +
                            '    <a class="dropdown-item" href="#" onclick="view(' + data + ')">View</a>' +
                            '    <a class="dropdown-item" href="#" onclick="edit(' + data + ')">Edit</a>' +
                            '    <a class="dropdown-item" href="#" onclick="del(' + data + ')">Delete</a>' +
                            '    <a class="dropdown-item" href="#" onclick="reset(' + data + ')">Reset Password</a>' +
                            '</div>'
                    }
                },
            ],

            "dom": 'Bfrtip',
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "buttons": [{
                text: '<i class="nav-icon fas fa-user-plus"></i> Add Administrator',
                action: function (e, dt, node, config) {
                    $("#addAdminModal").modal("show")
                }
            },
                "colvis"],
        })

        function view(id) {
            data = table.rows().data().filter((data) => {
                return data.id === id
            })[0]

            $("#view_name").val(data.name)
            $("#view_username").val(data.username)

            $("#viewAdminModal").modal("show")
        }

        function edit(id) {
            data = table.rows().data().filter((data) => {
                return data.id === id
            })[0]

            $("#edit_name").val(data.name)
            $("#edit_username").val(data.username)
            $("#edit_type").val(data.type).change()
            $("#editForm").attr("action", "{{ url("admin/admin") }}/" + data.id)

            $("#editAdminModal").modal("show")
        }

        function reset(id) {
            $("#reset_id").val(id)

            $("#resetAdminModal").modal("show")
        }

        function del(id) {
            Swal.fire({
                title: "Delete Account",
                html: 'Are you sure you want to delete this admin account?',
                icon: 'warning',
                showConfirmButton: true,
                confirmButtonText: "Yes",
                showDenyButton: true,
                denyButtonText: "No",
            }).then(okay => {
                if (okay.isConfirmed) {
                    var url = '{{ url("admin/admin") }}/' + id;
                    var form = $('<form action="' + url + '" method="post">' +
                        '@method("DELETE") @csrf' +
                        '</form>');
                    $('body').append(form);
                    form.submit();
                }
            })
        }

        @if($errors->any())
        Swal.fire({
            title: "Oops! There's an error.",
            html: '@foreach($errors->all() as $error) {{ $error }} <br> @endforeach',
            icon: 'error',
            confirmButtonText: 'Cool'
        })
        @endif

        @if(session('success') == "success")
        Swal.fire({
            title: "Yey! Successfully added.",
            html: 'Addition of an administrator is successful.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif

        @if(session('edit') == "success")
        Swal.fire({
            title: "Yey! Successfully updated.",
            html: 'Profile update of an administrator is successful.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif

        @if(session('reset') == "success")
        Swal.fire({
            title: "Yey! Successfully reset.",
            html: 'Password reset of the administrator is successful.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif

        @if(session('delete') == "success")
        Swal.fire({
            title: "Yey! Successfully removed.",
            html: 'Deletion of an administrator is successful.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif
    </script>
@endsection
