$(function(){
    let pack = [],
        del = [],
        reader = new FileReader(),
        blob,
        file,
        cf,
        nid = $('.nid').text(),
        idel = [],
        fdel = [],
        title = $('.title').val().trim(),
        content = $('.tarea').text().trim()
    function tog(that){
        if(that.hasClass('editing')){
            $('.save').hide()
            $('.editor').hide()
            $('.delfile').hide()
            $('.delnote').hide()
            $('.handling').removeClass('canceled').hide()
            $('.play').show()
            $('.title').attr('disabled',true)
            $('.tarea').attr('contenteditable',false)
            $('.title').val(title)
            $('.tarea').text(content)
            that.val('编辑').removeClass('editing')
        }else{
            $('.save').show()
            $('.editor').show()
            $('.delfile').show()
            $('.handling').show()
            $('.play').hide()
            if(nid){
                $('.delnote').show()
            }
            $('.title').attr('disabled',false).focus()
            $('.tarea').attr('contenteditable',true)
            that.val('取消').addClass('editing')
        }
    }
    function insertfile(){
        blob = $('.myfile')[0].files[0]
        reader.readAsDataURL(blob)
        reader.onload = ()=>{
            if(blob.type.match('image')){
                file = $(`<div class='file' name='${blob.name}'>
                <img class='pic' src='${reader.result}'>
                </div>`)
            }else {
                file = $(`<div class='file' name='${blob.name}'>
                <img class='icon' src='Public/icon/file.webp'>
                <span>${blob.name}</span>
                </div>`)
            }
            file.on('click',function(){
                $(this).toggleClass('selected')
            })
            $('.editor').children('.files').append(file)
            $('.myfile').attr('value','')
            pack.push(blob)
        }
    }
    function delfile(){
        del = []
        if($('.selected').length){
            $('.selected').each((i,e)=>{
                del.push($(e).attr('name'))
            }).remove()
        }else {
            $('.file:last').each((i,e)=>{
                del.push($(e).attr('name'))
            }).remove()
        }
        pack = pack.filter((i)=>{
            return del.indexOf(i.name)==-1
        })
    }
    function submit(){
        title = $('.title').val().trim(),
        content = $('.tarea').text().trim()
        if(!title) {
            alert('请填写标题')
            $('.title').focus()
        }else if(!content) {
            alert('请填写内容')
            $('.tarea').focus()
        }else {
            cf = confirm(nid?'确定要保存吗':'确定要上传吗？')
            if(cf){
                idel = []
                fdel = []
                let fd = new FormData()
                fd.append('title',title)
                if(nid) fd.append('nid',nid)
                fd.append('content',content)
                if(pack.length){
                    pack.forEach((e)=>{
                        fd.append('file[]',e)
                    })
                }
                $('.img').children('.handling').each((i,e)=>{
                    if($(e).hasClass('canceled')){
                        idel.push(Number($(e).attr('name')))
                    }
                })
                $('.other').children('.handling').each((i,e)=>{
                    if($(e).hasClass('canceled')){
                        fdel.push(Number($(e).attr('name')))
                    }
                })
                if(idel.length)fd.append('idel',JSON.stringify(idel))
                if(fdel.length) fd.append('fdel',JSON.stringify(fdel))
                $.ajax({
                    type:'POST',
                    url:`index.php?c=service&a=${nid?'edit':'add'}`,
                    data:fd,
                    processData:false,
                    contentType:false,
                    success:(res)=>{
                        console.log(res,555)
                        if(Number(res)){
                            alert(nid?'保存成功':'上传成功')
                            window.location.href=nid?`index.php?c=edit&a=render&nid=${nid}`:'index.php?c=notes&a=render'
                        }else alert('内容没有变更')
                    }
                })
            }
        }
    }
    function delnote(){
        cf = confirm('确定要删除这篇笔记吗？')
        if(cf){
            $.ajax({
                type:'POST',
                url:'index.php?c=service&a=del',
                data:{
                    nid
                },
                success:()=>{
                    alert('已删除')
                    window.location.href='index.php?c=notes&a=render'
                }
            })
        }
    }
    function has_pic(){
        let imgs = $('.img').children()
        if(!imgs.length)
            $('.img').parent().hide()
    }
    function has_file(){
        let files = $('.other').children()
        if(!files.length)
            $('.other').parent().hide()
    }
    if(nid){
        $('.save').val('保存')
        $('.edit').addClass('editing')
        has_pic()
        has_file()
    }else {
        $('.edit').hide()
        $('.player').hide()
    }
    $('.cover').hide()
    tog($('.edit'))
    $('.edit').on('click',function(){
        tog($(this))
    })
    $('.addfile').on('click',()=>{
        $('.myfile').click()
    })
    $('.myfile').on('change',()=>{
        insertfile()
    })
    $('.delfile').on('click',()=>{
        delfile()
    })
    $('.save').on('click',()=>{
        submit()
    })
    $('.delnote').on('click',()=>{
        delnote()
    })
    $('.handling').on('click',function(){
        $(this).toggleClass('canceled')
    })
    $('.img').children('.play').on('click',function(){
        let src = $(this).children('.pic').attr('src')
        $('.cover').show()
        $('.screen').attr('src',src)
        $('.inner').toggleClass('beneath')
    })
    $('.cover').on('click',function(){
        $(this).hide()
        $('.inner').toggleClass('beneath')
    })
})