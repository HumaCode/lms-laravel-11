{{-- @extends('frontend.instructor-dashboard.course.course-app')

@section('contest')
    <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
        <div class="add_course_basic_info">
            <form action="{{ route('instructor.courses.store-basic-info') }}" method="POST"
                class="basic_info_form course-form" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="current_step" value="1">
                <input type="hidden" name="next_step" value="2">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="add_course_basic_info_imput">
                            <label for="#">Title *</label>
                            <input type="text" placeholder="Title" name="title">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="add_course_basic_info_imput">
                            <label for="#">Seo description</label>
                            <input type="text" placeholder="Seo description" name="seo_description">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="add_course_basic_info_imput">
                            <label for="#">Thumbnail *</label>
                            <input type="file" name="thumbnail">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_basic_info_imput">
                            <label for="demo_video_storage">Demo Video Storage </label>
                            <select class="select_js storage" name="demo_video_storage" id="demo_video_storage">
                                <option selected disabled> Please Select </option>
                                <option value="upload">Upload</option>
                                <option value="youtube">Youtube</option>
                                <option value="vimeo">Vimeo</option>
                                <option value="external_link">External Link</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_basic_info_imput upload_source">
                            <label for="demo_video_source">Path</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control source_input" type="text" name="file"
                                    value="">
                            </div>
                        </div>

                        <div class="add_course_basic_info_imput external_source d-none">
                            <label for="url">Path</label>
                            <input type="text" name="url" id="url" class="source_input" value="">
                        </div>

                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_basic_info_imput">
                            <label for="price">Price *</label>
                            <input type="text" placeholder="Price" name="price" id="price">
                            <p>Put 0 for free</p>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_basic_info_imput">
                            <label for="discount">Discount Price</label>
                            <input type="text" placeholder="Discount Price" name="discount" id="discount">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="add_course_basic_info_imput mb-0">
                            <label for="description">Description</label>
                            <textarea rows="8" placeholder="Description" name="description"></textarea>
                            <button type="submit" class="common_btn mt_20">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('#lfm').filemanager('file');
    </script>
@endpush --}}


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
                                        <div class="tab-content" id="pills-tabContent"
                                            data-select2-id="select2-data-pills-tabContent">
                                            <div class="tab-pane fade active show" id="pills-home" role="tabpanel"
                                                aria-labelledby="pills-home-tab" tabindex="0">
                                                <div class="add_course_basic_info">
                                                    <form action="{{ route('instructor.courses.store-basic-info') }}"
                                                        method="POST" class="basic_info_form course-form"
                                                        enctype="multipart/form-data">
                                                        @csrf

                                                        <input type="hidden" name="current_step" value="1">
                                                        <input type="hidden" name="next_step" value="2">

                                                        <div class="row">
                                                            <div class="col-xl-12">
                                                                <div class="add_course_basic_info_imput">
                                                                    <label for="#">Title *</label>
                                                                    <input type="text" placeholder="Title"
                                                                        name="title">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="add_course_basic_info_imput">
                                                                    <label for="#">Seo description</label>
                                                                    <input type="text" placeholder="Seo description"
                                                                        name="seo_description">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="add_course_basic_info_imput">
                                                                    <label for="#">Thumbnail *</label>
                                                                    <input type="file" name="thumbnail">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="add_course_basic_info_imput">
                                                                    <label for="demo_video_storage">Demo Video Storage
                                                                    </label>
                                                                    <select class="select_js storage"
                                                                        name="demo_video_storage" id="demo_video_storage">
                                                                        <option selected disabled> Please Select </option>
                                                                        <option value="upload">Upload</option>
                                                                        <option value="youtube">Youtube</option>
                                                                        <option value="vimeo">Vimeo</option>
                                                                        <option value="external_link">External Link</option>
                                                                    </select>

                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="add_course_basic_info_imput upload_source">
                                                                    <label for="demo_video_source">Path</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-btn">
                                                                            <a id="lfm" data-input="thumbnail"
                                                                                data-preview="holder"
                                                                                class="btn btn-primary">
                                                                                <i class="fa fa-picture-o"></i> Choose
                                                                            </a>
                                                                        </span>
                                                                        <input id="thumbnail"
                                                                            class="form-control source_input"
                                                                            type="text" name="file" value="">
                                                                    </div>
                                                                </div>

                                                                <div
                                                                    class="add_course_basic_info_imput external_source d-none">
                                                                    <label for="url">Path</label>
                                                                    <input type="text" name="url" id="url"
                                                                        class="source_input" value="">
                                                                </div>

                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="add_course_basic_info_imput">
                                                                    <label for="price">Price *</label>
                                                                    <input type="text" placeholder="Price"
                                                                        name="price" id="price">
                                                                    <p>Put 0 for free</p>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-6">
                                                                <div class="add_course_basic_info_imput">
                                                                    <label for="discount">Discount Price</label>
                                                                    <input type="text" placeholder="Discount Price"
                                                                        name="discount" id="discount">
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-12">
                                                                <div class="add_course_basic_info_imput ">
                                                                    <label for="description">Description</label>
                                                                    <textarea rows="8" placeholder="Description" name="description"></textarea>
                                                                </div>

                                                                <button type="submit"
                                                                    class="btn btn-primary mt-2">Save</button>
                                                            </div>

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
                </div>

            </div>
        </div>
    </div>
@endsection
