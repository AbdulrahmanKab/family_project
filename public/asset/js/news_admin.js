$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN':$('meta[name=csrf-token]').attr('content')
    }
})
$(document).on('click',"#save-news",function (){
    let myForm = document.getElementById('upload_form');
    $.ajax({
        url:"/admin/addNews",
        method:"POST",
        data:new FormData(myForm),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success:function(data)
        {
            $(myForm).closest('form').find("input[type=text],input[type=file], textarea").val("");
            $(".image-input-wrapper").css("background", "url('http://localhost/assets/media/users/blank.png')")
            $("#image").val("")
            Swal.fire(
                'Good job!',
                'News has been added',
                'success'
            )
            fetch_data(1)
            $('#myModal').modal('hide')
        }
    })
})

$(document).on('click','.pagination a',function(event){
    event.preventDefault()
    var page = $(this).attr('href').split('page=')[1];
    fetch_data(page)
})
function fetch_data(page){
    $.ajax({
        url:"admin/news?page="+page,
        method:'GET',
        success:function (data){
            $("#table_content").html("")
            $("#table_content").append(data)
        }
    })
}
$(document).on('click','.edit-news',function (){
    let id = $(this).attr('data-route')
    $.ajax({
        url:'/admin/news/edit/'+id,
        method:'POST',
        data:{},
        success:function(response){
            // console.log(response)
            $("#title").val(response.title)
            $('#content').val(response.content)
            $('#id').val(response.id)
            var div = document.getElementById("image-input-wrapper");
            div.style.backgroundImage = `url(${"uploads/"+response.image})`;
        }
    })
})
$(document).on('click',"#update-news",function (){
    let myForm = document.getElementById('edit_form');
    let id_row = $("#id").val();
    $.ajax({
        url:"/admin/news/update/"+id_row,
        method:"POST",
        data:new FormData(myForm),
        dataType:'html',
        contentType: false,
        cache: false,
        processData: false,
        success:function(data)
        {
            Swal.fire(
                'Good job!',
                'News has been added',
                'success'
            )
            $('#editModal').modal('hide')
            $("#row"+id_row).html(data)
        }
    })
})
$(document).on('click','.delete-item',function (){
    var delete_id = $(this).attr('data-item');
    let item = $(this)
    Swal.fire({
        title: "Are you sure?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel!",
        reverseButtons: true
    }).then(function(result) {
        if (result.value) {

            $.ajax({
                url:'/admin/news/'+delete_id+'/delete',
                method:'post',
                data:{},
                dataType:'JSON',
                success:function (){
                    item.closest('tr').remove()
                }
            })

            Swal.fire(
                "Deleted!",
                "Your file has been deleted.",
                "success"
            )
            // result.dismiss can be "cancel", "overlay",
            // "close", and "timer"
        } else if (result.dismiss === "cancel") {
            Swal.fire(
                "Cancelled",
                "Your are in safe :)",
                "error"
            )
        }
    });
})
$(document).on('click',"#show-news",function (){
    let myForm = document.getElementById('upload_form');
   let show_form = new FormData(myForm);
    $.ajax({
        url:"/admin/show/news",
        method:"post",
        data:show_form,
        dataType:'html',
        contentType: false,
        cache: false,
        processData: false,
        success:function(data)
        {
            $('#myModal').modal('hide')
            $("#showPage").modal('show');
            $("#showPage").html("")
            $("#showPage").append(data)

        }
    })
})
