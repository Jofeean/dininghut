@extends('layouts.master')

@section("title")
    Garden Café | Join
@endsection

@section("css")
    <link href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css" rel="stylesheet">
    <style>
        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            color: #e3d222;
            font-family: 'Lobster', cursive;
            font-size: 15px;
        }

        .separator::before,
        .separator::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #b6b6b6;
        }

        .separator:not(:empty)::before {
            margin-right: .25em;
        }

        .separator:not(:empty)::after {
            margin-left: .25em;
        }

        .form-group {
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .bs-stepper .step-trigger:focus {
            color: #e3d222;
            outline: 0;
        }


        .active .bs-stepper-circle {
            background-color: #e3d222;
        }

        .active .bs-stepper-label {
            color: white;
        }

        .bs-stepper .line, .bs-stepper-line {
            background-color: unset;
        }

        @media (max-width: 1199.98px) {
            .landing {
                padding-top: 50px;
            }
        }
    </style>
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row landing">
            <div class="align-self-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="d-flex justify-content-center welcome-text">
                                <div class="align-self-center row col-md-6">

                                    <div class="card" style="border: unset; background: rgba(0,0,0,0.42);">
                                        <div class="card-body">

                                            <div id="login_stepper" class="bs-stepper">
                                                <div class="bs-stepper-header" role="tablist">

                                                    <div class="step" data-target="#login-part">
                                                        <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="login-part" id="login-part-trigger">
                                                            <span class="bs-stepper-circle">
                                                                <i class="nav-icon fas fa-user"></i>
                                                            </span>
                                                            <span class="bs-stepper-label cursive">Login</span>
                                                        </button>
                                                    </div>
                                                    <div class="line">
                                                        <div class="separator">OR</div>
                                                    </div>

                                                    <div class="step" data-target="#register-part">
                                                        <button type="button" class="step-trigger" role="tab"
                                                                aria-controls="register-part"
                                                                id="register-part-trigger">
                                                            <span class="bs-stepper-circle">
                                                                <i class="nav-icon fas fa-file-alt"></i>
                                                            </span>
                                                            <span class="bs-stepper-label cursive">Sign Up</span>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="bs-stepper-content" style="padding-top: 20px">
                                                    <div id="login-part" class="content">
                                                        <p class="cursive text-center"
                                                           style="color: #e3d222; font-size: 50px">
                                                            Login
                                                        </p>
                                                        <br>

                                                        <form method="post" action="{{ url("/login") }}">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="form-group col-lg-12">
                                                                    <h4 for="exampleInputEmail1" class="popps"
                                                                        style="color: white;">
                                                                        Email</h4>
                                                                    <input type="email"
                                                                           class="form-control popps form-control-lg"
                                                                           name="email"
                                                                           placeholder="Enter email">
                                                                </div>
                                                                <div class="form-group col-lg-12">
                                                                    <h4 for="exampleInputEmail1" class="popps"
                                                                        style="color: white">
                                                                        Password</h4>
                                                                    <input type="password"
                                                                           class="form-control popps form-control-lg"
                                                                           name="password"
                                                                           placeholder="Enter password">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div
                                                                        class="form-check form-check-inline form-group">
                                                                        <input class="form-check-input " type="checkbox"
                                                                               name="remember">
                                                                        <label class="form-check-label popps"
                                                                               for="inlineCheckbox1"
                                                                               style="color: white">
                                                                            Remember password?</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group d-flex justify-content-end">
                                                                        <a href="#" class="popps" style="color: white"
                                                                           data-bs-toggle="modal"
                                                                           data-bs-target="#forgotPassword">
                                                                            Forgot password?</a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <br>
                                                            <button type="submit" class="btn hero-button btn-lg">
                                                                Submit
                                                            </button>
                                                        </form>
                                                    </div>

                                                    <div id="register-part" class="content">
                                                        <p class="cursive text-center"
                                                           style="color: #e3d222; font-size: 50px">
                                                            Sign Up
                                                        </p>
                                                        <br>

                                                        <form method="post" action="{{ url("user/add") }}">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="form-group col-lg-6">
                                                                    <h4 for="exampleInputEmail1" class="popps"
                                                                        style="color: white">
                                                                        Name</h4>
                                                                    <input type="text"
                                                                           class="form-control popps form-control-lg"
                                                                           name="name"
                                                                           value="{{ old("name") }}"
                                                                           placeholder="Enter full name">
                                                                </div>

                                                                <div class="form-group col-lg-6">
                                                                    <h4 for="exampleInputEmail1" class="popps"
                                                                        style="color: white">
                                                                        Username</h4>
                                                                    <input type="text"
                                                                           class="form-control popps form-control-lg"
                                                                           name="username"
                                                                           value="{{ old("username") }}"
                                                                           placeholder="Enter username">
                                                                </div>

                                                                <div class="form-group col-lg-6">
                                                                    <h4 for="exampleInputEmail1" class="popps"
                                                                        style="color: white">
                                                                        Contact Number</h4>
                                                                    <input type="number"
                                                                           class="form-control popps form-control-lg"
                                                                           name="contact"
                                                                           value="{{ old("contact") }}"
                                                                           placeholder="09xxxxxxxxx">
                                                                </div>

                                                                <div class="form-group col-lg-6">
                                                                    <h4 for="exampleInputEmail1" class="popps"
                                                                        style="color: white">
                                                                        Gender</h4>
                                                                    <select class="form-select form-select-lg popps"
                                                                            aria-label=".form-select-lg example"
                                                                            name="gender">
                                                                        <option value="" selected>Open this select
                                                                            menu
                                                                        </option>

                                                                        @if (old("gender"))
                                                                            <option value="{{ old("gender") }}"
                                                                                    selected>{{ old("gender") }}</option>
                                                                        @endif


                                                                        <option value="Male">Male</option>
                                                                        <option value="Female">Female</option>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group">
                                                                    <h4 for="exampleInputEmail1" class="popps"
                                                                        style="color: white">
                                                                        Email</h4>
                                                                    <input type="email"
                                                                           class="form-control popps form-control-lg"
                                                                           name="email"
                                                                           value="{{ old("email") }}"
                                                                           placeholder="Enter email">
                                                                </div>

                                                                <div class="form-group">
                                                                    <h4 for="exampleInputEmail1" class="popps"
                                                                        style="color: white">
                                                                        Password</h4>
                                                                    <input type="password"
                                                                           class="form-control popps form-control-lg"
                                                                           name="password"
                                                                           placeholder="Enter password">
                                                                </div>
                                                            </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="forgotPassword" data-backdrop="static" data-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title popps popps" id="staticBackdropLabel">Reset Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url("forgot_password") }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <h4 for="exampleInputEmail1" class="popps">
                                    Email</h4>
                                <input type="email"
                                       class="form-control popps form-control-lg"
                                       name="email"
                                       placeholder="Enter email">
                            </div>
                            <div class="form-group col-lg-12">
                                <h4 for="exampleInputEmail1" class="popps">
                                    Password</h4>
                                <input type="password"
                                       class="form-control popps form-control-lg"
                                       name="password"
                                       placeholder="Enter password">
                            </div>
                            <div class="form-group col-lg-12">
                                <h4 for="exampleInputEmail1" class="popps">
                                    Confirm Password</h4>
                                <input type="password"
                                       class="form-control popps form-control-lg"
                                       name="confirm_password"
                                       placeholder="Enter password">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary popps" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary popps">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>
    <script>
        new Stepper(document.querySelector('#login_stepper'), {
            linear: false,
            animation: true
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
            title: "Yey! Registration is successful.",
            html: 'Please check your email for verification.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif

        @if(session('reset') == "success")
        Swal.fire({
            title: "Yey! Password is successful reset.",
            html: 'You can log in now with your new password now.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif
    </script>
@endsection
