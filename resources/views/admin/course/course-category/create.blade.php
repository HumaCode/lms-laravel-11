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
                        Course Categories Create
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="{{ route('admin.course-categories.index') }}" class="btn btn-danger d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-corner-down-left">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M18 6v6a3 3 0 0 1 -3 3h-10l4 -4m0 8l-4 -4" />
                            </svg>
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
                                    <h3 class="card-title">Course Categories</h3>
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('admin.course-categories.store') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-12">
                                                <x-input-file-block name="image" placeholder="Enter category name"/>
                                            </div>
                                            <div class="col-md-12">
                                                <x-input-block name="icon" placeholder="Enter category name"/>
                                            </div>
                                            <div class="col-md-12">
                                                <x-input-block name="name" placeholder="Enter category name"/>
                                            </div>

                                            <div class="col-md-6">
                                                <x-input-toggle-block name="status" label="Make tranding!" checked="true"/>
                                            </div>
                                            <div class="col-md-6">
                                                <x-input-toggle-block name="show_at_tranding" label="Show at tranding" checked="true"/>
                                            </div>


                                        </div>

                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="ti ti-device-floppy"></i> &nbsp;
                                                Create
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
