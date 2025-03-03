<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Chapter</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <form action="" method="POST">
            @csrf

            <ul class="item_list chapter_sortable_list">
                @foreach ($chapters as $chapter)
                    <li class="" data-course-id="{{ $chapter->course_id }}" data-chapter-id="{{ $chapter->id }}">
                        <span>{{ $chapter->title }}</span>
                        <div class="add_course_content_action_btn">
                            <a class="arrow dragger" href="javascript:;"><i class="ti ti-arrows-maximize"></i></a>
                        </div>
                    </li>
                @endforeach
            </ul>

        </form>
    </div>
</div>


<script>
    const csrf_token = $(`meta[name="csrf_token"]`).attr('content');
    const base_url = $(`meta[name="base_url"]`).attr('content');

    $('.btn-close').on('click', function() {
        window.location.reload();
    });

    if ($('.chapter_sortable_list li').length) {
        $('.chapter_sortable_list').sortable({
            items: "> li",
            containment: "parent",
            cursor: "move",
            handle: '.dragger',
            forcePlaceholderSize: true,
            update: function(event, ui) {
                let orderIds = $(this).sortable("toArray", {
                    attribute: "data-chapter-id"
                });

                let courseId = ui.item.data("course-id");


                $.ajax({
                    method: 'POST',
                    url: base_url + `/instructor/courses-content/${courseId}/sort-chapter`,
                    data: {
                        _token: csrf_token,
                        order_ids: orderIds
                    },
                    success: function(data) {
                        notyf.success(data.message);
                    },
                    error: function(xhr, status, error) {
                        notyf.error(error.message);
                    }
                })
            }
        });
    };
</script>
