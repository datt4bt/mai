
$(document).ready(function () {
    $(".delete").click(function () {

        var id = $(this).attr('id');
        var row = $("tr[data-id='" + id + "']");
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: "DELETE",
           headers: {'X-CSRF-TOKEN': token},
            url: "http://localhost/baitap/public/task/delete",
            data: {_method: 'delete', id: id},
            dataType: "json",
            success: function (response) {
                row.remove();
            },
            error: function (request, status, error) {
                var res = JSON.parse(request.responseText);
                if(res){
                    alert(res.message);
                }
            }

        });
    });

    $(".checkbox").click(function () {

        var id = $(this).attr('id');
        var status = $(this).val();

        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "POST",
            headers: {'X-CSRF-TOKEN': token},
            url: "http://localhost/baitap/public/task/updateStatus",
            data: {id: id,status:status},
            dataType: "json",
            success: function (response) {
                alert('Success');
            },
            error: function (request, status, error) {
                var res = JSON.parse(request.responseText);
                if(res){
                    alert(res.message);
                }
            }

        });
    });
});
