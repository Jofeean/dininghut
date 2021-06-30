@extends('layouts.master')

@section("title")
    Admin
@endsection

@section("css")
    <style>
        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            color: #e3d222;
            font-family: 'Lobster', cursive;
            font-size: 70px;
        }

        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid white;
        }

        .separator:not(:empty)::before {
            margin-right: .25em;
        }

        .separator:not(:empty)::after {
            margin-left: .25em;
        }
    </style>
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row landing">
            <div class="align-self-center">
                <div class="container">
                    <div class="row" style="padding-top: 200px; padding-bottom: 200px">
                        <div class="col-md-3"></div>
                        <div class="card col-md-6" style="border: unset; background: rgba(0,0,0,0.42);">
                            <div class="card-body">
                                <p class="cursive" style="color: #e3d222; font-size: 50px">
                                    Admin
                                </p>


                                <form method="post" action="{{ url("/admin/login") }}">
                                    @csrf
                                    <div class="form-group">
                                        <h4 for="exampleInputEmail1" class="popps"
                                            style="color: white;">
                                            Username</h4>
                                        <input type="text" class="form-control popps form-control-lg"
                                               name="username"
                                               placeholder="Enter username">
                                    </div>

                                    <br>
                                    <div class="form-group">
                                        <h4 for="exampleInputEmail1" class="popps"
                                            style="color: white">
                                            Password</h4>
                                        <input type="password"
                                               class="form-control popps form-control-lg"
                                               name="password"
                                               placeholder="Enter password">
                                    </div>

                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input " type="checkbox" name="remember">
                                        <label class="form-check-label" for="inlineCheckbox1"
                                               style="color: white">
                                            Remember password?</label>
                                    </div>

                                    <br>
                                    <br>
                                    <button type="submit" class="btn hero-button btn-lg">Submit
                                    </button>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
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
            title: "Yey! Registration is successful.",
            html: 'Please check your email for verification.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif
    </script>
@endsection
