<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Chapter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="" method="POST">
        @csrf

        <div class="modal-body">

            <div class="row">
                <div class="add_course_basic_info_imput mb-3">
                    <label for="title" >Title</label>
                    <input type="text" name="title" id="title" required>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="source" class="form-label">Source</label>
                        <select name="" id="" class="form-control storage">
                            <option disabled selected>-- Select --</option>

                            @foreach (config('course.video_sources') as $source => $name)
                                <option value="{{ $source }}">{{ $name }}</option>
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
                                value="">
                        </div>
                    </div>

                    <div class="add_course_basic_info_imput external_source d-none ">
                        <label for="url" class="mb-2">Path</label>
                        <input type="text" name="url" id="url" class="source_input" value="">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="source" class="form-label">File Type</label>
                        <select name="" id="" class="form-control">
                            <option disabled selected>-- Select --</option>

                            @foreach (config('course.file_types') as $source => $name)
                                <option value="{{ $source }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6 ">
                    <div class="form-group ">
                        <div class="add_course_basic_info_imput ">
                            <label for="duration" class="form-label mb-2">Duration</label>
                            <input type="text" name="duration" id="duration" required>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="add_course_more_info_checkbox">
                        <div class="form-check" style="width: 30%">
                            <input class="form-check-input" type="checkbox" name="" value="1"  id="preview">
                            <label class="form-check-label" for="flexCheckDefault">Is Preview</label>
                        </div>
                        <div class="form-check" style="width: 30%">
                            <input class="form-check-input" type="checkbox" name="" value="1"  id="downloadable">
                            <label class="form-check-label" for="flexCheckDefault">Downloadable</label>
                        </div>
                    </div>
                </div>

                <div class="add_course_basic_info_imput mb-3">
                    <label for="title">Descripton</label>
                    <textarea name="description" id="description" rows="5" ></textarea>
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
