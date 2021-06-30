@extends("layouts.master2")

@section("title")
    CMS
@endsection

@section("css")
    <!-- Include all Editor plugins CSS style. -->
    <link rel="stylesheet" href="{{ url("froala/css/froala_editor.pkgd.min.css") }}">

    <!-- Include Code Mirror CSS. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body">

                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="row justify-content-end">
                                        <div class="checkbox">
                                            <input class="form-control" type="checkbox" id="dark"
                                                   data-size="mini">
                                            <label for="dark">Dark Mode</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist"
                                         aria-orientation="vertical">
                                        <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill"
                                           href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home"
                                           aria-selected="true">About</a>
                                        <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill"
                                           href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile"
                                           aria-selected="false">Dining & Buffet</a>
                                        <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill"
                                           href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages"
                                           aria-selected="false">Contacts</a>
                                        <a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill"
                                           href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings"
                                           aria-selected="false">MISC</a>
                                    </div>
                                </div>
                                <div class="col-7 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-home"
                                             role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                            <form action="{{ url("admin/content/update/".$about->id) }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                <textarea name="contents" class="form-control froala"
                                                          rows="10">{{ $about->content }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel"
                                             aria-labelledby="vert-tabs-profile-tab">
                                            <form action="{{ url("admin/content/update/".$dining->id) }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                <textarea name="contents" class="form-control froala"
                                                          rows="10">{{ $dining->content }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel"
                                             aria-labelledby="vert-tabs-messages-tab">
                                            <form action="{{ url("admin/content/update/".$contacts->id) }}"
                                                  method="post">
                                                @csrf
                                                <div class="form-group">
                                                <textarea name="contents" class="form-control froala"
                                                          rows="10">{{ $contacts->content }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel"
                                             aria-labelledby="vert-tabs-settings-tab">
                                            <form action="{{ url("admin/content/update/image/".$image->id) }}"
                                                  method="post" enctype="multipart/form-data">
                                                @csrf

                                                <h3>Background</h3>
                                                <img src="{{ url("images/".$image->content) }}" alt="background"
                                                     style="max-width: 100%; max-height: 50vh">
                                                <div class="form-group">
                                                    <input type="file" name="image" accept="image/*">
                                                </div>
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </form>
                                            <br>
                                            <form action="{{ url("admin/content/update/".$footer->id) }}"
                                                  method="post">
                                                @csrf

                                                <h3>Footer</h3>
                                                <div class="form-group">
                                                <textarea name="contents" class="form-control froala"
                                                          rows="10">{{ $footer->content }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success">Save</button>
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
    </div>
@endsection

@section("js")
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Include all Editor plugins JS files. -->
    <script type="text/javascript" src="{{ url("froala/js/froala_editor.pkgd.min.js") }}"></script>

    <!-- Include Code Mirror JS. -->
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/mode/xml/xml.min.js"></script>

    <!-- Include PDF export JS lib. -->
    <script type="text/javascript"
            src="https://raw.githack.com/eKoopmans/html2pdf/master/dist/html2pdf.bundle.js"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="{{ url("froala/js/plugins/font_family.min.js")}}"></script>

    <script>
        new FroalaEditor('.froala', {
            imageUploadURL: '{{ url('admin/upload-img') }}',
            imageUploadParams: {
                froala: 'true',
                _token: "{{ csrf_token() }}"
            },
            imageUploadMethod: 'POST',
            imageAllowedTypes: ['jpeg', 'jpg', 'png'],
            events: {
                'image.removed': function ($img) {
                    var xhttp = new XMLHttpRequest();
                    xhttp.open("get", "{{ url('admin/delete-img') }}/" + $img.attr('src').split("/").pop(), true);
                    xhttp.send(JSON.stringify({
                        src: $img.attr('src')
                    }));
                }
            },
            fontFamily: {
                'Bebas Neue': "Bebas Neue",
                'Big Shoulders Stencil Display': "Big Shoulders Stencil Display",
                'Dela Gothic One': "Dela Gothic One",
                'Jomhuria': "Jomhuria",
                'Lobster': "Lobster",
                'Lobster Two': "Lobster Two",
                'Open Sans': "Open Sans",
                'Oswald': "Oswald",
                'Poppins': "Poppins",
                'Roboto': "Roboto",
                'Teko': "Teko",
            },
        })

        $(function () {
            $('#dark').bootstrapToggle().change(function () {
                if ($('#dark').is(":checked")) {
                    $(".fr-wrapper").css("background-color", "#4a5568")
                }
                if (!$('#dark').is(":checked")) {
                    $(".fr-wrapper").css("background-color", "white")
                }
            })
        })

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
            title: "Yey! Successfully updated.",
            html: 'Content status updated.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif
    </script>
@endsection
