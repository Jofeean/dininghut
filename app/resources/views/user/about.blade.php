@extends('layouts.master')

@section("title")
    Garden Café | About
@endsection

@section("css")
    <link href="{{ url("froala/css/froala_style.min.css") }}" rel="stylesheet" type="text/css"/>
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

        @media (max-width: 768px) {
            .landing {
                height: unset;
            }

            .title {
                color: #e3d222;
                font-size: 25px;
                line-height: 8px;
                font-family: 'Lobster', cursive;
            }

            .subtitle {
                color: white;
                font-size: 50px;
                font-family: 'Oswald', sans-serif;
            }

            .center-on-md {
                text-align: center;
            }

            .welcome-text {
                height: unset
            }
        }

        @media (max-width: 1199.98px) {
            .landing {
                height: unset;
            }

            .title {
                font-size: 120px;
                line-height: 100%;
            }

            .welcome-text {
                height: unset
            }

            .hero-text {
                color: #525252;
                font-size: 30px;
            }
        }

        @media (max-width: 575.98px) {
            .landing {
                height: unset;
            }

            .title {
                font-size: 50px;
                line-height: 100%;
            }

            .welcome-text {
                height: unset
            }

            .hero-text {
                color: #525252;
                font-size: 18px;
            }
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
                                                About Us
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

    <div class="container" style="padding-top: 20px; padding-bottom: 20px; min-height: 50vh">
        <div class="row">
            <div class="col-xl-12">
                <div class="fr-view">
                    {!! $about->content !!}
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')
@endsection

@section('js')

@endsection
