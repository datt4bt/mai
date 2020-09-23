
$(document).ready(function () {
    $(".delete").click(function () {

        var id = $(this).attr('id');
        var row = $("tr[data-id='" + id + "']");
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: "DELETE",
           headers: {'X-CSRF-TOKEN': token},
            url: "http://localhost/baitap/public/category/delete",
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
    var array=[];
    $("#submit").click(function () {
        var name = $('#name').val();
        array.push(name);
        var id=(array.length)-1;
        function show() {
            $('#table').append('<tr><td>'+id+'</td><td>'+array[id]+'</td></tr>');
        }
        setTimeout(show, 1000);
    });
});
