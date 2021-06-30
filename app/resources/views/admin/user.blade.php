@extends("layouts.master2")

@section("title")
    User
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
                        <table id="userList" class="table table-striped table-hover">
                            <thead>
                            <td>ID</td>
                            <td>Name</td>
                            <td>Username</td>
                            <td>Gender</td>
                            <td>Contact</td>
                            <td>Email</td>
                            <td>Code</td>
                            <td>Verified</td>
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
    <div class="modal fade" id="addUserModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url("admin/user") }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label for="edit_gender">Contact</label>
                            <select class="form-control form-select" aria-label="xample" name="gender">
                                <option value="" selected>Open this select menu</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Contact</label>
                            <input type="number" class="form-control" name="contact">
                        </div>
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="text" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
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
    <div class="modal fade" id="editUserModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
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
                            <input type="text" class="form-control" id="edit_name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="edit_username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="edit_gender">Contact</label>
                            <select class="form-control form-select" aria-label="xample" name="gender" id="edit_gender">
                                <option value="" selected>Open this select menu</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username">Contact</label>
                            <input type="text" class="form-control" id="edit_contact" name="contact">
                        </div>
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="text" class="form-control" id="edit_email" name="email">
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
    <div class="modal fade" id="viewUserModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View User</h4>
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
                    <div class="form-group">
                        <label for="username">Gender</label>
                        <input type="text" class="form-control" id="view_gender" disabled>
                    </div>
                    <div class="form-group">
                        <label for="username">Contact</label>
                        <input type="text" class="form-control" id="view_contact" disabled>
                    </div>
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input type="text" class="form-control" id="view_email" disabled>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- Reset --}}
    <div class="modal fade" id="resetUserModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Reset Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url("admin/user/reset") }}" method="post">
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
        table = $("#userList").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route("user.index") }}",
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
                    data: 'gender'
                },
                {
                    data: 'contact'
                },
                {
                    data: 'email'
                },
                {
                    data: 'code'
                },
                {
                    data: 'verified',
                    render: function (data) {
                        return data == 1 ? '<span class="badge badge-success">Verified</span>' : '<span class="badge badge-danger">Not Verified</span>'
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
                text: '<i class="nav-icon fas fa-user-plus"></i> Add User',
                action: function (e, dt, node, config) {
                    $("#addUserModal").modal("show")
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
            $("#view_gender").val(data.gender)
            $("#view_contact").val(data.contact)
            $("#view_email").val(data.email)

            $("#viewUserModal").modal("show")
        }

        function edit(id) {
            data = table.rows().data().filter((data) => {
                return data.id === id
            })[0]

            $("#edit_name").val(data.name)
            $("#edit_username").val(data.username)
            $("#edit_gender").val(data.gender).change()
            $("#edit_contact").val(data.contact)
            $("#edit_email").val(data.email)

            $("#editForm").attr("action", "{{ url("admin/user") }}/" + data.id)

            $("#editUserModal").modal("show")
        }

        function reset(id) {
            $("#reset_id").val(id)

            $("#resetUserModal").modal("show")
        }

        function del(id) {
            Swal.fire({
                title: "Delete Account",
                html: 'Are you sure you want to delete this user account?',
                icon: 'warning',
                showConfirmButton: true,
                confirmButtonText: "Yes",
                showDenyButton: true,
                denyButtonText: "No",
            }).then(okay => {
                if (okay.isConfirmed) {
                    var url = '{{ url("admin/user") }}/' + id;
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
            html: 'Addition of an user is successful.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif

        @if(session('edit') == "success")
        Swal.fire({
            title: "Yey! Successfully updated.",
            html: 'Profile update of an user is successful.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif

        @if(session('reset') == "success")
        Swal.fire({
            title: "Yey! Successfully reset.",
            html: 'Password reset of the user is successful.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif

        @if(session('delete') == "success")
        Swal.fire({
            title: "Yey! Successfully removed.",
            html: 'Deletion of an user is successful.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif
    </script>
@endsection
