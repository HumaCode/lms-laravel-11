<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Chapter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form
        action="{{ @$editMode == true ? route('admin.courses-content.update-chapter', @$chapter->id) : route('admin.courses-content.store-chapter', $id) }}"
        method="POST">
        @csrf

        @if (@$editMode)
            @method('PUT')
        @endif

        <div class="modal-body">
            <div class="form-group">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" required
                    value="{{ @$chapter?->title }}">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">{{ @$editMode == true ? 'Edit' : 'Create' }}</button>
        </div>
    </form>
</div>
