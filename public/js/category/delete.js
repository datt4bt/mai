

    $(document).ready(function () {
    $(".delete").click(function () {

        var id=$(this).attr('id');
        $('#row-'+id).remove();
        var token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: "DELETE",
            headers: {'X-CSRF-TOKEN': token},
            url: "http://localhost/baitap/public/category/delete",
            data: {_method: 'delete',id:id},
            dataType: "json",
            success:function (response){alert("OK");},

        }).catch((error)=>{
            console.log(error.message);

        }) ;
    });

});
