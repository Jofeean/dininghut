@extends('layouts.master')

@section("title")
    Garden Café | History
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
                                                Reservation History
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
                @foreach(Auth::guard("user")->user()->reservations as $reservation)
                    <div class="row" style="padding-top: 10px; padding-bottom: 10px">
                        <div class="col-md-3">
                            <h4 style="color: #404252" class="popps">Booked on: <br>
                                <b style="color: #1a202c" class="sans">{{ $reservation->created_at }}</b></h4>
                        </div>
                        <div class="col-md-3">
                            <h4 style="color: #404252" class="popps">Date: <br>
                                <b style="color: #1a202c"
                                   class="sans">{{ $reservation->date }} {{ $reservation->time }}</b></h4>
                        </div>
                        <div class="col-md-3">
                            <h4 style="color: #404252" class="popps">No. of Persons: <br>
                                <b style="color: #1a202c" class="sans">{{ $reservation->attendees }}</b></h4>
                        </div>
                        <div class="col-md-3">
                            <h4 style="color: #404252" class="popps">Status: </h4>
                            @if($reservation->status == 0)
                                <h4><span class="badge rounded-pill bg-dark text-light">Unconfirmed</span></h4>
                            @elseif ($reservation->status == 1)
                                <h4><span class="badge rounded-pill bg-success">Confirmed</span></h4>
                            @elseif ($reservation->status == 2)
                                <h4><span class="badge rounded-pill bg-danger">Denied</span></h4>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    @include('includes.footer')
@endsection

@section('js')

@endsection
