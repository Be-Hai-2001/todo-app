
// Xử lý thêm input vào mảng, lưu sản phẩm bằng API
$(function($){
    $("#Submit").on('click', function(){
        var description = $("#gsearch").val();
        var user_id = $("#user_id").val();
        console.log(user_id);
        if(description !== ''){
            // arr.push(data);
            $.ajax({
                type:'POST',
                url:"/api/todo-tanks",
                data:{'description':description,
                        'user_id':user_id,
                        'is_completed':0,
                    },
                dataType: "json",
                success:function(data){
                    alert('Cậu đã thêm thành công 1 nhiệm vụ..!');
                    window.location.reload();
                },
                error: function (data) {
                    alert('Nhiệm vụ đã có rồi cậu nha..!');
                },
            });
        } else{
            alert('Chưa có nhiệu vụ kìa cậu ơi..!')
        }
    });
});

//Trạng thái đã hoàn thành input gạch ngang chữ
function check_input(id){
    var input = document.getElementById(id);
    var content = document.getElementById('content_'+id);

    if(input.checked == true){
        content.style.textDecoration = "line-through";
        content.style.color = "red";
    }
    else{
        content.style.textDecoration = "none";
        content.style.color = "white";
    }
}

// Xử lý trạng thái is_completed trong db == 1 thì đánh dấu hoàn thành
function is_completed(){
    var is_completed = document.getElementsByClassName('is_completed');
    for( i = 0; i < is_completed.length; i++){
        var  a = is_completed[i].value;
        // console.log(a);
        if(is_completed[i].value == 1){
            document.getElementsByClassName('description')[i].style.textDecoration = "line-through";
            document.getElementsByClassName('description')[i].style.color = "red";
            document.getElementsByClassName('check-box')[i].checked = true;
        }
    }
}

is_completed();

// Xử lý trạng thái khi click vào is_completed thì đổi trạng thái 0 -> 1 check, 1->0 nocheck
$(function($){
    $(".check-box").on('click', function(){
        // console.log('ádasfnvnajvnsdjdvdvbd');
        var id = $(this).val();
        var url = "/api/todo-tanks/" + id;
        var description = $("#gsearch").val();
        var user_id = $("#user_id").val();
        console.log(url);
        if($(this).is(":checked")){
            $.ajax({
                type:'PUT',
                url:url,
                data:{
                        'is_completed':1,
                    },
                dataType: "json",
            });
            window.location.reload();
        }
        else{
            $.ajax({
                type:'PUT',
                url:url,
                data:{
                        'is_completed':0,
                    },
                dataType: "json",
            });
            window.location.reload();
        }
    });
});

