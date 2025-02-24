<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Chapter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="{{ route('instructor.courses-content.store-lesson') }}" method="POST">
        @csrf

        <input type="hidden" name="course_id" value="{{ $courseId }}">
        <input type="hidden" name="chapter_id" value="{{ $chapterId }}">

        <div class="modal-body">

            <div class="row">
                <div class="add_course_basic_info_imput mb-3">
                    <label for="title" >Title</label>
                    <input type="text" name="title" id="title" value="{{ @$lesson?->title }}" required>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="storage" class="form-label">Source</label>
                        <select name="storage" id="storage" class="form-control storage">
                            <option disabled selected>-- Select --</option>

                            @foreach (config('course.video_sources') as $source => $name)
                                <option value="{{ $source }}" @selected(@$lesson?->storage == $source)>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="add_course_basic_info_imput upload_source ">
                        <label for="demo_video_source ">Path</label>
                        <div class="input-group mt-3">
                            <span class="input-group-btn">
                                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                            <input id="thumbnail" class="form-control source_input" type="text" name="file"
                                value="{{ @$lesson?->file_path }}">
                        </div>
                    </div>

                    <div class="add_course_basic_info_imput external_source d-none ">
                        <label for="url" class="mb-2">Path</label>
                        <input type="text" name="url" id="url" class="source_input" value="{{ @$lesson?->file_path }}">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="file_type" class="form-label">File Type</label>
                        <select name="file_type" id="file_type" class="form-control">
                            <option disabled selected>-- Select --</option>

                            @foreach (config('course.file_types') as $source => $name)
                                <option value="{{ $source }}" @selected(@$lesson?->file_type == $source)>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 ">
                    <div class="form-group ">
                        <div class="add_course_basic_info_imput ">
                            <label for="duration" class="form-label mb-2">Duration</label>
                            <input type="text" name="duration" id="duration" required value="{{ @$lession?->duration }}">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="add_course_more_info_checkbox">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_preview" @checked(@$lesson?->is_preview === 1) value="1"  id="preview">
                            <label class="form-check-label" for="preview">Is Preview</label>
                        </div>
                        <div class="form-check" >
                            <input class="form-check-input" type="checkbox" name="downloadable" @checked(@$lesson?->downloadable === 1) value="1"  id="downloadable">
                            <label class="form-check-label" for="downloadable">Downloadable</label>
                        </div>
                    </div>
                </div>

                <div class="add_course_basic_info_imput mb-3">
                    <label for="title">Descripton</label>
                    <textarea name="description" id="description" rows="5" required>{!! @$lesson?->description !!}</textarea>
                </div>

            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>

<script>
    $('#lfm').filemanager('file');
</script>
