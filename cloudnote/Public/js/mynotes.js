$(function(){
    let pageno = $('.current_page').val(),
        count = $('.count').text()
    if(pageno==1) $('.before').hide()
    if(pageno==count) $('.after').hide()
    $('.current_page').on('keydown',(e)=>{
        if(e.keyCode==13){
            let pn = $('.current_page').val()
            if(pn!=pageno) $(location).attr('href',`index.php?c=notes&a=render&pageno=${pn}`) 
        }
    })
})