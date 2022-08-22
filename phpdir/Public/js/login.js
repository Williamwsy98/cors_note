$(function(){
    $('.submit').on('click',()=>{
        let uname = $('.uname').val().trim(),
            upwd = $('.upwd').val(),
            is_memory = $('.is_memory:checked').length
        if(!uname){
            alert('用户名不能为空')
            $('.uname').focus()
        }else if(!upwd){
            alert('密码不能为空')
            $('.upwd').focus()
        }else {
            $.ajax({
                type:'GET',
                url:'index.php?c=login&a=login',
                data:{
                    uname,
                    upwd,
                    is_memory
                },
                success:(res)=>{
                    console.log(res,111)
                    switch(res){
                        case '2':
                            alert('登录成功')
                            window.location.href='index.php?c=notes&a=lobby'
                            break
                        case '1':
                            alert('密码错误')
                            $('.upwd').focus()
                            break
                        case '0':
                            alert('用户不存在')
                            $('.uname').focus()
                    }
                } 
            })
        }
    })
})