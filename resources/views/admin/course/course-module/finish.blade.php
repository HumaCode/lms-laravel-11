@extends('admin.course.course-module.course-app')

@section('tab_content')
<div class="tab-pane fade active show" id="pills-contact2" role="tabpanel" aria-labelledby="pills-contact-tab2" tabindex="0">
    <div class="dashboard_add_course_finish">
        <form action="#" class="more_info_form">
            @csrf

            <input type="hidden" name="current_step" value="4">
            <input type="hidden" name="id" value="{{ @$course?->id }}">

            <div class="row">
                <div class="col-xl-12">
                    <div class="add_course_more_info_input">
                        <label for="#">Message for Reviewer</label>
                        <textarea rows="7" placeholder="Message for Reviewer" name="message">{!! @$course?->message_for_reviewer !!}</textarea>
                    </div>
                </div>
                <div class="col-xl-12 ">
                    <div class="add_course_more_info_input mb-0">
                        <label for="#">Status *</label>

                        <select class="select2"  name="status">
                            <option disabled selected data-select2-id="select2-data-6-gp6e">
                                Please Select </option>

                            <option value="active" {{ @$course?->status == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ @$course?->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            <option value="draft" {{ @$course?->status == 'draft' ? 'selected' : '' }}>Draft</option>
                        </select>
<br>
                        <button type="submit" class="common_btn mt-3 btn btn-primary">save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
