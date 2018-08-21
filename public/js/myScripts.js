$(function(){
    $('.load-page').click(function(){
        url = $(this).attr('href')
        
        $("#contentGlobal").html('')
        $("#contentGlobal").load(url)
        return false;
    })
    $(document).on('submit','.sendform_rol',function(e){
        $('#rol').text('')
        //alert('asdasd')
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serialize(),
            success:function(data){
                alert('asdasdasd1111')
                
            },
            error:function(data){
                //alert('asdasd')
                //if(data.responseJSON.errors.description_rol=null)
                
                $('#rol').text(data.responseJSON.errors.description_rol[0])
                
                console.log(data.responseJSON.errors.description_rol[0])
                
            }
        })
    })
})