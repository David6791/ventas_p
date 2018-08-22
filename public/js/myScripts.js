 $(function(){
    $('.load-page').click(function(){
        url = $(this).attr('href')
        
        $("#contentGlobal").html('')
        $("#contentGlobal").load(url)
        return false;
    })
    $(document).on('submit','.sendform_rol',function(e){
        //$('#rol').text('')
        frutas = []
        $('.name_form').each(function(){
            //console.log($(this).attr("name"))
            aux = $(this).attr("name")
            frutas.push(aux)
            
        })
        console.log(frutas)
        data1=$(this).serialize()
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
                //console.log(data.responseJSON.errors)
                //console.log(Object.keys(data.responseJSON.errors))
                var asd = Object.keys(data.responseJSON.errors)
                for(i = 0; i<Object.keys(data.responseJSON.errors).length; i++){
                    //console.log(data.responseJSON.errors[asd[i]][0])
                    $( "input[name='"+asd[i]+"']" ).parent().find("small").text(data.responseJSON.errors[asd[i]][0]);
                    $( "textarea[name='"+asd[i]+"']" ).parent().find("small").text(data.responseJSON.errors[asd[i]][0]);
                    
                }
                //$( "input[name='man']" ).val( "has man in it!" );

                

                //$('#rol').text(data.responseJSON.errors.description_rol[0])
                
                //console.log(data.responseJSON.errors.description_rol[0])
                
            }
        })
    })
})