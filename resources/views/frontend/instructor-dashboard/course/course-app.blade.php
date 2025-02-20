@extends('frontend.layouts.master')


@section('content')

    <section class="wsus__breadcrumb" style="background: url({{ asset('/') }}frontend/assets/images/breadcrumb_bg.jpg);">
        <div class="wsus__breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__breadcrumb_text">
                            <h1>Instructor Dashboard</h1>
                            <ul>
                                <li><a href="{{ route('instructor.dashboard') }}">Home</a></li>
                                <li>Instructor Dashboard</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="wsus__dashboard mt_90 xs_mt_70 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                @include('frontend.instructor-dashboard.sidebar')

                <div class="col-xl-9 col-md-8 wow fadeInRight" data-select2-id="select2-data-14-w1zm"
                    style="visibility: visible; animation-name: fadeInRight;">
                    <div class="wsus__dashboard_contant" data-select2-id="select2-data-13-ree6">
                        <div class="wsus__dashboard_contant_top">
                            <div class="wsus__dashboard_heading relative">
                                <h5>Add Courses</h5>
                                <p>Manage your courses and its update like live, draft and insight.</p>
                            </div>
                        </div>

                        <div class="dashboard_add_courses">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link course-tab {{ request('step') == 1 ? 'active' : '' }}" data-step="1">Basic Infos</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link course-tab {{ request('step') == 2 ? 'active' : '' }}" data-step="2">More Infos</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button type="button" class="nav-link course-tab {{ request('step') == 3 ? 'active' : '' }}" data-step="3">Course Contents</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link course-tab {{ request('step') == 4 ? 'active' : '' }}" data-step="4">Finish</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent" data-select2-id="select2-data-pills-tabContent">
                                @yield('contest')
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection


@push('header_scripts')
    @vite(['resources/js/frontend/course.js'])
@endpush
