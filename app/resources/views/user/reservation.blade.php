@extends('layouts.master')

@section("title")
    Garden Café | Reservations
@endsection

@section("css")
    <link href='{{ url('date-picker/css/bootstrap-datetimepicker.css') }}' rel="stylesheet">
    <link href='{{ url('time/css/style.css') }}' rel="stylesheet">
    <link href='{{ url('time/css/timepicki.css') }}' rel="stylesheet">

    <style>
        .new-form {
            border-color: #e3d222;
            background: rgba(2, 2, 2, 0.23) !important;
            color: white !important;
        }

        .form-control:focus {
            background-color: #fff;
            border-color: #e3d222;
            outline: 0;
            box-shadow: 0 0 0 0.25rem rgba(227, 210, 34, 0.25);
        }

        .datetimepicker > div {
            margin: 10px;
        }

        input[type='text'] {
            color: unset;
        }

        html, body {
            height: unset;
            background-color: unset;
        }

        body {
            color: unset;
            text-align: unset;
            text-shadow: unset;
        }
    </style>
@endsection

@section('body')
    <div class="container-fluid">
        <div class="row landing">
            <div class="align-self-center">
                <div class="container">
                    <div class="row" style="padding-top: 200px; padding-bottom: 200px">
                        <div class="col-md-12">
                            <center>
                                <p class="sans" style="color: white; font-size: 100px">MAKE A RESERVATION</p>
                            </center>
                        </div>
                        <form action="{{ url("reservation") }}" method="post">
                            @csrf
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <input class="new-form form-control form-control-lg popps" type="text"
                                               data-date-format="dd MM yyyy" data-link-format="dd MM yyyy"
                                               placeholder="Date" name="date" id="date">
                                    </div>
                                    <div class="col-md-4">
                                        <input class="new-form form-control form-control-lg popps" type="number"
                                               placeholder="Number of Persons" name="person" id="person">
                                    </div>
                                    <div class="col-md-4">
                                        <input class="new-form form-control form-control-lg popps" type="text"
                                               data-date="" data-date-format="HH:ii p" data-link-format="HH:ii p"
                                               placeholder="Time Slot" name="time" id="time">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <br>
                                <center>
                                    <button type="submit" class="btn hero-button btn-lg">Make a Reservation</button>
                                </center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('includes.footer')
@endsection

@section('js')

    <script src="{{ url('date-picker/js/moment.js') }}"></script>
    <script src="{{ url('date-picker/js/bootstrap-datetimepicker.js') }}"></script>
    <script src="{{ url('date-picker/js/locales/bootstrap-datetimepicker.es.js') }}"></script>

    <script src="{{ url('time/js/timepicki.js') }}"></script>
    <script>
        $('#date').datetimepicker({
            weekStart: 0,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0
        });
        $('#time').timepicki({
            weekStart: 1,
            todayBtn: 0,
            autoclose: 1,
            todayHighlight: 1,
            startView: 1,
            forceParse: 0,
            showMeridian: 1,
            viewSelect: 'hour',
            minuteStep: 30
        });

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
            title: "Yey! Successfully booked.",
            html: 'Reservation booked successfully.<br> Please wait for the confirmation that will be emailed to you shortly.',
            icon: 'success',
            confirmButtonText: 'Cool'
        })
        @endif
    </script>
@endsection
