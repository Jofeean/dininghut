@extends('layouts.master')

@section("title")
    Garden Café
@endsection

@section('body')

    <div class="container-fluid">
        <div class="row landing">
            <div class="align-self-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="d-flex justify-content-center welcome-text">
                                <div class="align-self-center row">

                                    <center>
                                        <div class="col-sm-12">
                                            <p class="title">
                                                Garden Café
                                            </p>
                                        </div>

                                        <div class="col-md-1">
                                        </div>

                                        <div class="col-md-10">
                                            <p class="subtitle">
                                                A Truly Delightful Dining and Buffet Experience
                                            </p>
                                        </div>

                                        <div class="col-md-8">
                                            <p class="paragraphs">
                                                Where the food and service are top notch. Situated right in the heart of
                                                an
                                                ever-bustling city known for its multi-cultural flavors and distinctive
                                                personality.
                                            </p>
                                        </div>

                                        <div class="col-md-12">
                                            <br>
                                            <a class="btn hero-button btn-lg" href="join">
                                                Book your reservations now!
                                            </a>
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
@endsection
