@extends('layouts.master')

@section("title")
    Garden Café | Update
@endsection

@section("css")
    <style>
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
                        <div class="form-group col-lg-6">
                            <h4 for="exampleInputEmail1" class="popps"
                                style="color: white">
                                Name</h4>
                            <input type="text"
                                   class="form-control popps form-control-lg"
                                   name="name"
                                   value="{{ Auth::guard("user")->user()->name }}"
                                   placeholder="Enter full name">
                        </div>

                        <div class="form-group col-lg-6">
                            <h4 for="exampleInputEmail1" class="popps"
                                style="color: white">
                                Username</h4>
                            <input type="text"
                                   class="form-control popps form-control-lg"
                                   name="username"
                                   value="{{ Auth::guard("user")->user()->username }}"
                                   placeholder="Enter username">
                        </div>

                        <div class="form-group col-lg-6">
                            <h4 for="exampleInputEmail1" class="popps"
                                style="color: white">
                                Contact Number</h4>
                            <input type="number"
                                   class="form-control popps form-control-lg"
                                   name="contact"
                                   value="{{ Auth::guard("user")->user()->contact }}"
                                   placeholder="09xxxxxxxxx">
                        </div>

                        <div class="form-group col-lg-6">
                            <h4 for="exampleInputEmail1" class="popps"
                                style="color: white">
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
                                style="color: white">
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
    </script>
@endsection
