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
        //console.log(frutas)
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
                swal(
                    'Felicidades',
                    'El Rol se Registro Correctamente',
                    'success'
                  )
                
            },
            error:function(data){
                //alert('asdasd')
                //if(data.responseJSON.errors.description_rol=null)
                //console.log(data.responseJSON.errors)
                //console.log(Object.keys(data.responseJSON.errors))
                var asd = Object.keys(data.responseJSON.errors)
                //console.log(asd);
                //console.log(frutas);
                //return false
                for(i = 0; i<frutas.length; i++){
                    if(asd.includes(frutas[i])) {
                        //console.log('existe')
                        $( "input[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                        $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                    }else{
                        $( "input[name='"+frutas[i]+"']" ).parent().find("small").text('')
                        $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text('')
                    }
                    //alert(asd[i])
                    /*var aux = frutas[i].indexOf(asd[i])
                    if(aux != -1){
                        alert('si')
                        //alert(frutas[i]+asd[i])
                        $( "input[name='"+asd[i]+"']" ).parent().find("small").text(data.responseJSON.errors[asd[i]][0]);
                        $( "textarea[name='"+asd[i]+"']" ).parent().find("small").text(data.responseJSON.errors[asd[i]][0]);
                    }else{
                        alert('no')
                        $('#"+frutas[i]+"').text('')
                    }*/
                    
                    //console.log(data.responseJSON.errors[asd[i]][0])
                    //$( "input[name='"+asd[i]+"']" ).parent().find("small").text(data.responseJSON.errors[asd[i]][0]);
                    //$( "textarea[name='"+asd[i]+"']" ).parent().find("small").text(data.responseJSON.errors[asd[i]][0]);
                    
                }
                //$( "input[name='man']" ).val( "has man in it!" );

                

                //$('#rol').text(data.responseJSON.errors.description_rol[0])
                
                //console.log(data.responseJSON.errors.description_rol[0])
                
            }
        })
    })
    $(document).on('click','.load_dates_edit',function(e){  
        $('#modal-editrol').modal({
            show: 'true',
            backdrop: 'static',
            keyboard: false,
        })
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_dates_edit_rol',
            data:{id_rol:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                //$("#contentGlobal").html(data)    
                //alert('asdsadas')            
            },
            error:function(data){
                swal(
                    'Error!',
                    'El Paciente aun no esta registrado',
                    'error'
                  )
            }
        })
        /*e.preventDefault(e)        
        $.ajax({            
            type:'POST',
            url:'/load_dates_edit_rol',
            dataType : 'json', 
            //data:1,
            data:{id_rol:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                //$("#contentGlobal").html(data)  
                alert(data)          
            },error:function(data){
                console.log(data)
                swal(
                    'Error!',
                    'El Paciente aun no esta registrado',
                    'error'
                  )
            }

        })*/
    })
})