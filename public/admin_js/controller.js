/**
 * Created by moe-tan on 08/03/2017.
 */
function showDetail(id) {
    $.ajax({
        url: id,
        type: 'GET',
        success: function (data) {

            $('#detailModal .modal-body').html(data);
            $('#detailModal').modal('show');
        },
        error: function (xhr) {
            console.log(xhr.message);
        }
    })
}
$(document).ready(function () {
    $(".showReporting .flip").on('click', function () {
        $(this).parent().find('.panela').slideToggle("slow");
    });
});


