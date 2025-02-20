@extends('frontend.instructor-dashboard.course.course-app')

@section('contest')
    <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
        <div class="add_course_basic_info">

            <form action="#" data-select2-id="select2-data-11-y3mg">
                <div class="row" data-select2-id="select2-data-10-2dwf">
                    <div class="col-xl-6">
                        <div class="add_course_more_info_input">
                            <label for="#">Capacity</label>
                            <input type="text" placeholder="Capacity">
                            <p>leave blank for unlimited</p>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_more_info_input">
                            <label for="#">Course Duration (Minutes)*</label>
                            <input type="text" placeholder="300">
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="add_course_more_info_checkbox">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">Q&amp;A</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                                <label class="form-check-label" for="flexCheckDefault2">Completion Certificate</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                                <label class="form-check-label" for="flexCheckDefault3">Patner
                                    instructor</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                                <label class="form-check-label" for="flexCheckDefault4">Others</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-12" data-select2-id="select2-data-9-zhyi">
                        <div class="add_course_more_info_input" data-select2-id="select2-data-8-78yb">
                            <label for="category_id">Category *</label>
                            <select class="select_2 select2-hidden-accessible"
                                tabindex="-1" aria-hidden="true" name="category_id" id="category_id">

                                <option selected disabled>Please Select </option>

                                @foreach ($categories as $category)
                                    @if ($category->subCategories->isNotEmpty())
                                        <optgroup label="{{ $category->name }}">
                                            @foreach ($category->subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}">
                                                    {{ $subCategory->name }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endif
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="add_course_more_info_radio_box">
                            <h3>Level</h3>

                            @foreach ($levels as $level)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="{{ $level->name }}"
                                    id="id-{{ $level->id }}">
                                    <label class="form-check-label" for="id-{{ $level->id }}">
                                        {{ $level->name }}
                                    </label>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="add_course_more_info_radio_box">
                            <h3>Language</h3>

                            @foreach ($languages as $language)

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="{{ $language->name }}"
                                    id="lang-{{ $language->id }}" >
                                    <label class="form-check-label" for="lang-{{ $language->id }}">
                                        {{ $language->name }}
                                    </label>
                                </div>

                            @endforeach

                        </div>
                    </div>
                    <div class="col-xl-12">
                        <button type="submit" class="common_btn">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
