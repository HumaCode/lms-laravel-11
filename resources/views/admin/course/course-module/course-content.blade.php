@extends('admin.course.course-module.course-app')


@section('tab_content')
    <div class="tab-pane fade show active" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
        <form action="" class="course-form more_info_form">
            @csrf

            <input type="hidden" name="id" value="{{ request()?->id }}">
            <input type="hidden" name="current_step" value="3">
            <input type="hidden" name="next_step" value="4">
        </form>

        <div class="add_course_content">
            <div class="add_course_content_btn_area d-flex flex-wrap justify-content-between">
                <button type="button" class="btn btn-primary my-3 dynamic-modal-btn" data-id="{{ $courseId }}">Add
                    New
                    Chapter</button>
                <a class="btn btn-success my-3 short_chapter_btn" href="javascript:;" data-id="{{ $courseId }}">Short
                    Chapter</a>
            </div>
            <div class="accordion" id="accordionExample">

                @foreach ($chapters as $chapter)
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-{{ $chapter->id }}" aria-expanded="true"
                                aria-controls="collapse-{{ $chapter->id }}">
                                <span>{{ $chapter->title }}</span>
                            </button>
                            <div class="add_course_content_action_btn">
                                <div class="dropdown">
                                    <div class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="ti ti-plus"></i>
                                    </div>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li class="add_lesson" data-chapter-id="{{ $chapter->id }}"
                                            data-course-id="{{ $chapter->course_id }}">
                                            <a class="dropdown-item" href="javascript:;">Add Lesson
                                            </a>
                                        </li>
                                        {{--  <li><a class="dropdown-item" href="#">Add
                                                Document</a>
                                        </li>
                                        <li><a class="dropdown-item" href="#">Add Quiz</a>
                                        </li>  --}}
                                    </ul>
                                </div>
                                <a class="edit edit_chapter" href="#" data-course-id="{{ $chapter->course_id }}"
                                    data-chapter-id="{{ $chapter->id }}"><i class="ti ti-edit"></i></a>
                                <a class="del delete-item"
                                    href="{{ route('admin.courses-content.destroy-chapter', $chapter->id) }}"><i
                                        class="ti ti-trash" style="color: red"></i></a>
                            </div>
                        </h2>
                        <div id="collapse-{{ $chapter->id }}" class="accordion-collapse collapse "
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="item_list sortable_list">

                                    @foreach ($chapter->lessons ?? [] as $lesson)
                                        <li class="" data-lesson-id="{{ $lesson->id }}"
                                            data-chapter-id="{{ $chapter->id }}">
                                            <span>{{ $lesson->title }}</span>
                                            <div class="add_course_content_action_btn">
                                                <a class="edit_lesson edit" data-lesson-id="{{ $lesson->id }}"
                                                    data-chapter-id="{{ $chapter->id }}"
                                                    data-course-id="{{ $chapter->course_id }}" href="javascript:;"><i
                                                        class="ti ti-edit"></i></a>
                                                <a class="del delete-item"
                                                    href="{{ route('admin.courses-content.destroy-lesson', $lesson->id) }}"><i
                                                        class="ti ti-trash" style="color: red"></i></a>
                                                <a class="arrow dragger" href="javascript:;"><i
                                                        class="ti ti-arrows-maximize"></i></a>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>

                            </div>
                        </div>
                    </div>
                @endforeach

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
