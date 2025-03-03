@extends('admin.layouts.master')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Course Manajement
                    </div>
                    <h2 class="page-title">
                        Course Create
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('admin.courses.index') }}" class="btn btn-danger d-none d-sm-inline-block">
                            <i class="ti ti-corner-down-left"></i>
                            Back
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">

                <div class="col-12">
                    <div class="row row-cards">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Course Levels</h3>
                                </div>
                                <div class="card-body">
                                    <div class="dashboard_add_courses">
                                        <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button type="button"
                                                    class="nav-link course-tab {{ request('step') == 1 ? 'active' : '' }}"
                                                    data-step="1">Basic Infos</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button type="button"
                                                    class="nav-link course-tab {{ request('step') == 2 ? 'active' : '' }}"
                                                    data-step="2">More Infos</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button type="button"
                                                    class="nav-link course-tab {{ request('step') == 3 ? 'active' : '' }}"
                                                    data-step="3">Course Contents</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button
                                                    class="nav-link course-tab {{ request('step') == 4 ? 'active' : '' }}"
                                                    data-step="4">Finish</button>
                                            </li>
                                        </ul>

                                        @yield('tab_content')
                                    </div>



                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="module">
        $('#lfm').filemanager('file', {
            prefix: '/admin/laravel-filemanager'
        });
    </script>
@endpush

@push('header_scripts')
    @vite(['resources/js/admin/course.js'])
@endpush
