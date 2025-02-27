const csrf_token = $(`meta[name="csrf_token"]`).attr('content');
const base_url = $(`meta[name="base_url"]`).attr('content');



// variable

// reusable function
function updateApproveStatus(id, status) {
    $.ajax({
        method: 'PUT',
        url: base_url + `/admin/courses/${id}/update-approval`,
        data: {
            _token: csrf_token,
            status: status,
        },
        success: function (data) {
            window.location.reload();
        },
        error: function (xhr, status, error) {

        }
    })
}


// dom onload
$(function () {
    $('.update-approval-status').on('change', function () {
        let id = $(this).data('id');
        let status = $(this).val();

        updateApproveStatus(id, status);
    });
});