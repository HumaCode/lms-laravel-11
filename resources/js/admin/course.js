// variable

// reusable function
function updateApproveStatus(id, status) {
    alert(id);
    alert(status);
}


// dom onload
$(function () {
    $('.update-approval-status').on('change', function () {
        let id = $(this).data('id');
        let status = $(this).val();

        updateApproveStatus(id, status);
    });
});