@extends('layouts.master')

@section("title")
    Garden Café | Update
@endsection

@section("css")
    <style>

        .separator {
            display: flex;
            align-items: center;
            text-align: center;
            color: #e3d222;
            font-family: 'Lobster', cursive;
            font-size: 1.5em;
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

        .landing {
            min-height: 50vh;
        }

        .title {
            color: #e3d222;
            font-size: 50px;
            line-height: 8px;
            font-family: 'Lobster', cursive;
        }

        .subtitle {
            color: white;
            font-size: 100px;
            font-family: 'Oswald', sans-serif;
        }

        .form-group {
            margin-top: 10px;
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row landing">
            <div class="align-self-end">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="d-flex justify-content-center welcome-text">
                                <div class="align-self-end row" style="padding-bottom: 20px">

                                    <center>
                                        <div class="col-sm-12">
                                            <p class="title">
                                                Garden Café
                                            </p>

                                            <p class="subtitle">
                                                Update User
                                            </p>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" style="padding-top: 60px; padding-bottom: 60px; min-height: 50vh">
        <div class="row">
            <div class="col-xl-12">
                <form method="post" action="{{ url("update/". Auth::guard("user")->user()->id) }}">
                    @csrf
                    <div class="row">
                        <h5 class="title" style="line-height: unset">
                            Update Profile
                        </h5>
                        <div class="form-group col-lg-6">
                            <h4 for="exampleInputEmail1" class="popps"
                                style="color:#3B3B3BFF">
                                Name</h4>
                            <input type="text"
                                   class="form-control popps form-control-lg"
                                   name="name"
                                   value="{{ Auth::guard("user")->user()->name }}"
                                   placeholder="Enter full name">
                        </div>

                        <div class="form-group col-lg-6">
                            <h4 for="exampleInputEmail1" class="popps"
                                style="color:#3B3B3BFF">
                                Username</h4>
                            <input type="text"
                                   class="form-control popps form-control-lg"
                                   name="username"
                                   value="{{ Auth::guard("user")->user()->username }}"
                                   placeholder="Enter username">
                        </div>

                        <div class="form-group col-lg-6">
                            <h4 for="exampleInputEmail1" class="popps"
                                style="color:#3B3B3BFF">
                                Contact Number</h4>
                            <input type="number"
                                   class="form-control popps form-control-lg"
                                   name="contact"
                                   value="{{ Auth::guard("user")->user()->contact }}"
                                   placeholder="09xxxxxxxxx">
                        </div>

                        <div class="form-group col-lg-6">
                            <h4 for="exampleInputEmail1" class="popps"
                                style="color:#3B3B3BFF">
                                Gender</h4>
                            <select class="form-select form-select-lg popps"
                                    aria-label=".form-select-lg example"
                                    name="gender">

                                <option selected value="{{ Auth::guard("user")->user()->name }}">
                                    {{ Auth::guard("user")->user()->gender }}
                                </option>

                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <h4 for="exampleInputEmail1" class="popps"
                                style="color:#3B3B3BFF">
                                Email</h4>
                            <input type="email"
                                   class="form-control popps form-control-lg"
                                   name="email"
                                   value="{{ Auth::guard("user")->user()->email }}"
                                   placeholder="Enter email">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Submit
                    </button>
                </form>
            </div>
        </div>
        <br>
        <div class="line">
            <div class="separator">OR</div>
        </div>
        <br>
        <div class="row">
            <div class="col-xl-12">
                <form method="post" action="{{ url("reset") }}">
                    @csrf
                    <div class="row">
                        <h5 class="title" style="line-height: unset">
                            Reset Password
                        </h5>
                        <input type="hidden" name="id" value="{{ Auth::guard("user")->user()->id }}">
                        <div class="form-group col-lg-6">
                            <h4 for="exampleInputEmail1" class="popps"
                                style="color:#3B3B3BFF">
                                New Password</h4>
                            <input type="password"
                                   class="form-control popps form-control-lg"
                                   name="password"
                                   placeholder="Enter full name">
                        </div>

                        <div class="form-group col-lg-6">
                            <h4 for="exampleInputEmail1" class="popps"
                                style="color: #3b3b3b">
                                Retype Password</h4>
                            <input type="password"
                                   class="form-control popps form-control-lg"
                                   name="confirm_password"
                                   placeholder="Enter username">
                        </div>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Submit
                    </button>
                </form>
            </div>
        </div>
    </div>

    @include('includes.footer')
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

        @if(session('edit') == "success")
        Swal.fire({
            title: "Yey! Profile update is successful.",
            html: 'Your profile has been successfully updated.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif

        @if(session('reset') == "success")
        Swal.fire({
            title: "Yey! Password reset is successful.",
            html: 'Password has been successfully reset.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif
    </script>
@endsection
