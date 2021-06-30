@extends('layouts.master')

@section("title")
    Garden Café | Dining & Buffet
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
                                                Dining & Buffet
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
                    {!! $dining->content !!}
                </div>
            </div>
        </div>
    </div>


    @include('includes.footer')
@endsection

@section('js')

@endsection
