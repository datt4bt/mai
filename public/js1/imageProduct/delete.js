$(document).ready(function () {
    $(".delete").click(function () {

        var id = $(this).attr('id');
        var row = $("tr[data-id='" + id + "']");
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "DELETE",
            headers: {'X-CSRF-TOKEN': token},
            url: "http://localhost/mai_hien/public/page_admin/image_product/delete",
            data: {_method: 'delete', id: id},
            dataType: "json",
            success: function (response) {
                row.remove();
            },
            error: function (request, status, error) {
                var res = JSON.parse(request.responseText);
                if (res) {
                    alert(res.message);
                }
            }

        });
    });

});
