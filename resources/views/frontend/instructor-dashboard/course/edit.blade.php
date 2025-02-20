@extends('frontend.instructor-dashboard.course.course-app')

@section('contest')
    <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
        <div class="add_course_basic_info">
            <form action="{{ route('instructor.courses.store-basic-info') }}" method="POST" class="basic_info_update_form course-form" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="current_step" value="1">
                <input type="hidden" name="next_step" value="2">
                <input type="hidden" name="id" value="{{ $course->id }}">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="add_course_basic_info_imput">
                            <label for="#">Title *</label>
                            <input type="text" placeholder="Title" name="title" value="{{ $course->title }}">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="add_course_basic_info_imput">
                            <label for="#">Seo description</label>
                            <input type="text" placeholder="Seo description" name="seo_description" value="{{ $course->seo_description }}">
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
                            <select class="select_js" name="demo_video_storage" id="demo_video_storage">
                                <option selected disabled> Please Select </option>
                                <option value="upload" @selected($course->demo_video_storage == 'upload') >Upload</option>
                                <option value="youtube" @selected($course->demo_video_storage == 'youtube')>Youtube</option>
                                <option value="vimeo" @selected($course->demo_video_storage == 'vimeo')>Vimeo</option>
                                <option value="external_link" @selected($course->demo_video_storage == 'external_link')>External Link</option>
                            </select>

                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_basic_info_imput">
                            <label for="demo_video_source">Path</label>
                            <input type="file" name="demo_video_source" id="demo_video_source">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_basic_info_imput">
                            <label for="price">Price *</label>
                            <input type="text" placeholder="Price" name="price" id="price" value="{{ $course->price }}">
                            <p>Put 0 for free</p>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_basic_info_imput">
                            <label for="discount">Discount Price</label>
                            <input type="text" placeholder="Discount Price" name="discount" id="discount" value="{{ $course->discount }}">
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="add_course_basic_info_imput mb-0">
                            <label for="description">Description</label>
                            <textarea rows="8" placeholder="Description" name="description">{{ $course->description }}</textarea>
                            <button type="submit" class="common_btn mt_20">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
