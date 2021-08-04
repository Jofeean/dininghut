@extends("layouts.master2")

@section("title")
    Menu
@endsection

@section("css")
    <link rel="stylesheet" href="{{ url("admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}">
    <link rel="stylesheet"
          href="{{ url("admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}">
    <link rel="stylesheet" href="{{ url("admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css") }}">
    <link rel="stylesheet" href="{{ url("admin-lte/plugins/select2/css/select2.min.css") }}">
    <link rel="stylesheet" href="{{ url("admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css") }}">
    <link rel="stylesheet" href="{{ url("admin-lte//plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}">

    <style>
        .badge a {
            color: #bbb;
            cursor: pointer;
            opacity: 0.6;
        }

        .badge a:hover {
            opacity: 1.0
        }

        .badge .remove {
            vertical-align: bottom;
            top: 0;
        }

        .badge a {
            margin: 0 0 0 .3em;
        }

        .badge a .glyphicon-white {
            color: #fff;
            margin-bottom: 2px;
        }
    </style>
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3>Menu</h3>
                        </div>
                        <div class="card-body">
                            <table id="menuList" class="table table-striped table-hover">
                                <thead>
                                <td>ID</td>
                                <td>Image</td>
                                <td>Dish</td>
                                <td>Description</td>
                                <td>Category</td>
                                <td>Price</td>
                                <td>Stocks</td>
                                <td>Rocemmeded</td>
                                <td>Created</td>
                                <td>Last Update</td>
                                <td>Actions</td>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3>Categories</h3>
                        </div>
                        <div class="card-body">
                            <table id="categoryList" class="table table-striped table-hover">
                                <thead>
                                <td>ID</td>
                                <td>Category</td>
                                <td>Actions</td>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--Modals--}}

    {{-- Add Category --}}
    <div class="modal fade" id="addCategoryModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url("admin/category") }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="category">
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

    {{-- Add Tag --}}
    <div class="modal fade" id="addTagModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url("admin/tag") }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="id" id="add_id">
                            <label>Category</label>
                            <div class="select2-purple">
                                <select class="select2" multiple="multiple" data-placeholder=""
                                        data-dropdown-css-class="select2-purple" style="width: 100%;" name="tags[]"
                                        id="tags">
                                </select>
                            </div>
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

    {{-- Add Menu --}}
    <div class="modal fade" id="addMenuModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url("admin/menu") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Thumbnail</label>
                            <br>
                            <div class="d-flex justify-content-center">
                                <img id="output" style="max-width: 100%; max-height: 50vh"
                                     src="https://cdn.iconscout.com/icon/free/png-256/placeholder-47-861797.png">
                            </div>
                            <br>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" accept="image/*"
                                       name="image" onchange="loadFile(event)">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="dish">
                        </div>
                        <div class="form-group">
                            <label for="username">Description</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" name="price">
                        </div>
                        <div class="form-group">
                            <label>Available Stock</label>
                            <input type="number" class="form-control" name="stock">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <div class="select2-purple">
                                <select class="select2" multiple="multiple" data-placeholder=""
                                        data-dropdown-css-class="select2-purple" style="width: 100%;" name="tags[]">
                                    @foreach($categories as $catergory)
                                        <option value="{{ $catergory->id }}">{{ $catergory->category }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="is_recommended" name="is_recommended">
                                <label for="is_recommended">
                                    Recommended
                                </label>
                            </div>
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

    {{-- Edit Category--}}
    <div class="modal fade" id="editCategoryModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="edit1Form" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="edit1_category" name="category">
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

    {{-- Edit Menu --}}
    <div class="modal fade" id="editMenuModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Menu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editForm" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Thumbnail</label>
                            <br>
                            <div class="d-flex justify-content-center">
                                <img id="edit2_image" style="max-width: 100%; max-height: 50vh"
                                     src="https://cdn.iconscout.com/icon/free/png-256/placeholder-47-861797.png">
                            </div>
                            <br>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" accept="image/*"
                                       name="image" onchange="loadFile1(event)">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="edit2_dish" name="dish">
                        </div>
                        <div class="form-group">
                            <label for="username">Description</label>
                            <textarea class="form-control" id="edit2_description" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" class="form-control" id="edit2_price" name="price">
                        </div>
                        <div class="form-group">
                            <label>Available Stock</label>
                            <input type="number" class="form-control" id="edit2_stock" name="stock">
                        </div>
                        <div class="form-group">
                            <div class="d-inline">
                                <input type="checkbox" id="edit2_is_recommended" name="is_recommended">
                                <label for="is_recommended">
                                    Recommended
                                </label>
                            </div>
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

    {{-- View Menu --}}
    <div class="modal fade" id="viewMenuModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View Dish</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="d-flex justify-content-center">
                            <img id="view_image" style="max-width: 100%; max-height: 50vh"
                                 src="https://cdn.iconscout.com/icon/free/png-256/placeholder-47-861797.png">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="view_dish" disabled>
                    </div>
                    <div class="form-group">
                        <label for="username">Description</label>
                        <textarea class="form-control" id="view_description" disabled></textarea>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" class="form-control" id="view_price" name="price" disabled>
                    </div>
                    <div class="form-group">
                        <label>Available Stock</label>
                        <input type="number" class="form-control" id="view_stock" name="stock" disabled>
                    </div>
                </div>
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
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ url("plugins/icheck-bootstrap/icheck-bootstrap.min.css") }}">
    <!-- Select2 -->
    <script src="{{ url("admin-lte/plugins/select2/js/select2.full.min.js") }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var loadFile = function (event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
        var loadFile1 = function (event) {
            var output = document.getElementById('edit2_image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

        $('.select2').select2({

            allowClear: true,
        })

        table1 = $("#categoryList").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route("category.index") }}",
            "columns": [
                {
                    data: 'id'
                },
                {
                    data: 'category'
                },
                {
                    data: "id",
                    render: function (data, type, row, meta) {
                        return '<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">' +
                            '<i class="nav-icon fas fa-cog"></i>' +
                            '</button>' +
                            '<div class="dropdown-menu">' +
                            '    <a class="dropdown-item" href="#" onclick="edit1(' + data + ')">Edit</a>' +
                            '    <a class="dropdown-item" href="#" onclick="del1(' + data + ')">Delete</a>' +
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
                text: '<i class="nav-icon fas fa-tags"></i> Add Category',
                action: function (e, dt, node, config) {
                    $("#addCategoryModal").modal("show")
                }
            },
                "colvis"],
        })

        table2 = $("#menuList").DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route("menu.index") }}",
            "columns": [
                {
                    data: 'id'
                },
                {
                    data: 'image',
                    render: (data) => {
                        return '<img class="img-fluid img-thumbnail" src="{{ url('images/thumbs') }}/'
                            + data + '">'
                    }
                },
                {
                    data: 'dish'
                },
                {
                    data: 'description'
                },
                {
                    data: 'tags',
                },
                {
                    data: 'price',
                    render: (data) => {
                        return '<h4><span class="badge  badge-lg badge-info">' + data + '</span></h4>'
                    }
                },
                {
                    data: 'stock',
                    render: (data) => {
                        if (data > 0) {
                            return '<h4><span class="badge  badge-lg badge-success">' + data + '</span></h4>'
                        } else {
                            return '<h4><span class="badge  badge-lg badge-danger">' + data + '</span></h4>'
                        }
                    }
                },
                {
                    data: 'is_recommended',
                    render: (data) => {
                        if (data == 1) {
                            return '<h4><span class="badge  badge-lg badge-success">Yes</span></h4>'
                        } else {
                            return '<h4><span class="badge  badge-lg badge-danger">No</span></h4>'
                        }
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
                            '    <a class="dropdown-item" href="#" onclick="view2(' + data + ')">View</a>' +
                            '    <a class="dropdown-item" href="#" onclick="add(' + data + ')">Add Tag</a>' +
                            '    <a class="dropdown-item" href="#" onclick="edit2(' + data + ')">Edit</a>' +
                            '    <a class="dropdown-item" href="#" onclick="del2(' + data + ')">Delete</a>' +
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
            "buttons": [
                'pdf', {
                text: '<i class="nav-icon fas fa-utensils"></i> Add Menu',
                action: function (e, dt, node, config) {
                    $("#addMenuModal").modal("show")
                }
            },
                "colvis"],
        })

        function add(id) {
            data = table2.rows().data().filter((data) => {
                return data.id === id
            })[0]
            categories = [
                    @foreach($categories as $category)
                [
                    {{ $category->id }},
                    '{{ $category->category }}'
                ],
                @endforeach
            ]
            tags = data.tag2.split(",")
            categories = categories.filter(c => {
                return tags.find(t => {
                    return t == c[0]
                }) == undefined
            })

            $("#tags").empty()
            $("#add_id").val(data.id)
            categories.forEach(c => {
                $("#tags").append("<option value='" + c[0] + "'>" + c[1] + "</option>");
            })

            $("#addTagModal").modal("show")
        }

        function view2(id) {
            data = table2.rows().data().filter((data) => {
                return data.id === id
            })[0]

            $("#view_dish").val(data.dish)
            $("#view_description").val(data.description)
            $("#view_price").val(data.price)
            $("#view_stock").val(data.stock)

            var output = document.getElementById('view_image')
            output.src = "{{ url("images/thumbs") }}/" + data.image
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }

            $("#viewMenuModal").modal("show")
        }

        function edit1(id) {
            data = table1.rows().data().filter((data) => {
                return data.id === id
            })[0]

            $("#edit1_category").val(data.category)

            $("#edit1Form").attr("action", "{{ url("admin/category") }}/" + data.id)

            $("#editCategoryModal").modal("show")
        }

        function edit2(id) {
            data = table2.rows().data().filter((data) => {
                return data.id === id
            })[0]

            $("#edit2_dish").val(data.dish)
            $("#edit2_description").val(data.description)
            $("#edit2_price").val(data.price)
            $("#edit2_stock").val(data.stock)
            $("#edit2_is_recommended").prop("checked", data.is_recommended)
            var output = document.getElementById('edit2_image')
            output.src = "{{ url("images/thumbs") }}/" + data.image
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }

            $("#editForm").attr("action", "{{ url("admin/menu") }}/" + data.id)

            $("#editMenuModal").modal("show")
        }

        function del1(id) {
            Swal.fire({
                title: "Delete Category",
                html: 'Are you sure you want to delete this category?',
                icon: 'warning',
                showConfirmButton: true,
                confirmButtonText: "Yes",
                showDenyButton: true,
                denyButtonText: "No",
            }).then(okay => {
                if (okay.isConfirmed) {
                    var url = '{{ url("admin/category") }}/' + id;
                    var form = $('<form action="' + url + '" method="post">' +
                        '@method("DELETE") @csrf' +
                        '</form>');
                    $('body').append(form);
                    form.submit();
                }
            })
        }

        function del2(id) {
            Swal.fire({
                title: "Delete Dish",
                html: 'Are you sure you want to delete this dish?',
                icon: 'warning',
                showConfirmButton: true,
                confirmButtonText: "Yes",
                showDenyButton: true,
                denyButtonText: "No",
            }).then(okay => {
                if (okay.isConfirmed) {
                    var url = '{{ url("admin/menu") }}/' + id;
                    var form = $('<form action="' + url + '" method="post">' +
                        '@method("DELETE") @csrf' +
                        '</form>');
                    $('body').append(form);
                    form.submit();
                }
            })
        }

        function del3(id) {
            Swal.fire({
                title: "Delete Tag",
                html: 'Are you sure you want to delete this tag?',
                icon: 'warning',
                showConfirmButton: true,
                confirmButtonText: "Yes",
                showDenyButton: true,
                denyButtonText: "No",
            }).then(okay => {
                if (okay.isConfirmed) {
                    var url = '{{ url("admin/tag") }}/' + id;
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

        @if(session('success1') == "success")
        Swal.fire({
            title: "Yey! Successfully added.",
            html: 'Addition of a category is successful.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif

        @if(session('success2') == "success")
        Swal.fire({
            title: "Yey! Successfully added.",
            html: 'Addition of an menu is successful.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif

        @if(session('success3') == "success")
        Swal.fire({
            title: "Yey! Successfully added.",
            html: 'Addition of a tag is successful.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif

        @if(session('edit1') == "success")
        Swal.fire({
            title: "Yey! Successfully updated.",
            html: 'Update of a category is successful.',
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

        @if(session('delete1') == "success")
        Swal.fire({
            title: "Yey! Successfully removed.",
            html: 'Deletion of a category is successful.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif

        @if(session('delete2') == "success")
        Swal.fire({
            title: "Yey! Successfully removed.",
            html: 'Deletion of a dish is successful.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif

        @if(session('delete3') == "success")
        Swal.fire({
            title: "Yey! Successfully removed.",
            html: 'Deletion of a tag is successful.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif
    </script>
@endsection
