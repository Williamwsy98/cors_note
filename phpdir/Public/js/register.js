$(function(){
    $('.submit').on('click',()=>{
        let uname = $('.uname').val().trim(),
            address = $('.address').val().trim(),
            upwd = $('.upwd').val(),
            cpwd = $('.cpwd').val()
        if(!uname){
            alert('请输入用户名')
            $('.uname').focus()
        }else if(!address.match(/^([a-zA-Z0-9]+[-_\\.]?)+@[a-zA-Z0-9]+\.[a-z]+$/)){
            alert('请正确输入邮箱地址')
            $('.address').focus()
        }else if(upwd.length<7){
            alert('密码长度必须大于六位')
            $('.upwd').focus()
        }else if(upwd!=cpwd){
            alert('两次密码输入不一致')
            $('.cpwd').focus()
        }else {
            $.ajax({
                type:'POST',
                url:'index.php?c=register&a=register',
                data:{
                    uname,
                    address,
                    upwd
                },
                success:(res)=>{
                    switch(res){
                        case '2':
                            alert('注册成功')
                            window.location.href='index.php'
                            break
                        case '1':
                            alert('该邮箱已被绑定')
                            $('.address').focus()
                            break
                        case '0':
                            alert('用户名重复')
                            $('.uname').focus()
                    }
                } 
            })
        }
    })
})