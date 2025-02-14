@extends('frontend.layouts.master')


@section('content')
    <!--===========================
                                                                                                                                            BREADCRUMB START
                                                                                                                                        ============================-->
    <section class="wsus__breadcrumb" style="background: url({{ asset('/') }}frontend/assets/images/breadcrumb_bg.jpg);">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Become a Instructor</h1>
                            <ul>
                                <li><a href="{{ route('student.dashboard') }}">Home</a></li>
                                <li>Become a Instructor</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--===========================
                                                                                                                                            BREADCRUMB END
                                                                                                                                        ============================-->


    <!--===========================
                                                                                                                                            DASHBOARD OVERVIEW START
                                                                                                                                        ============================-->
    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">

                @include('frontend.student-dashboard.sidebar')

                <div class="col-xl-9 col-md-8">

                    <div class="text-end mb-4">
                        <a href="" class="btn btn-primary">Become a Instructor</a>
                    </div>

                    <div class="row">
                        <div class="card">
                            <div class="card-header">
                                Become a Instructor
                            </div>
                            <div class="card-body">
                                <form action="">
                                    <div class="form-group">
                                        <label for="document">Document</label>
                                        <input type="file" name="document" id="document" class="form-control">
                                    </div>

                                    <div class="form-group mt-4">
                                        <button type="button" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--===========================
                                                                                                                                            DASHBOARD OVERVIEW END
                                                                                                                                        ============================-->
@endsection
