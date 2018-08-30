 $(function(){
    $('.load-page').click(function(){
        url = $(this).attr('href')
        
        $("#contentGlobal").html('')
        $("#contentGlobal").load(url)
        return false;
    })
    $(document).on('submit','.sendform_rol',function(e){
        //$('#rol').text('')        
        //$('#modal-default').trigger('click') 
        //$('#modal-default').modal('toggle')
        console.log('asdasdas')
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
                console.log(data)     
                $("#contentGlobal").html('')         
                $("#contentGlobal").html(data)
                swal(
                    'Felicidades',
                    'El Rol se Registro Correctamente',
                    'success'
                  )
                $('.modal-backdrop').remove()
                //$('#modal-default').modal("toggle")
                //return false
                
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
                $('#id_rol_edit').val(data[0].id)
                $('#rol_edit').val(data[0].name)
                $('#name_rol_edit').val(data[0].display_name)
                $('#description_rol_edit').val(data[0].description)

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
    $(document).on('submit','.sendform_edit_rol',function(e){
        //$('#modal-editrol').modal('toggle')
        frutas = []
        $('.name_form').each(function(){
            aux = $(this).attr("name")
            frutas.push(aux)
            
        })
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
                $("#contentGlobal").html(data)
                swal(
                    'Felicidades',
                    'El Rol se Actualizo Correctamente',
                    'success'
                  )
                  $('.modal-backdrop').remove()               
            },
            error:function(data){
                var asd = Object.keys(data.responseJSON.errors)
                for(i = 0; i<frutas.length; i++){
                    if(asd.includes(frutas[i])) {
                        $( "input[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                        $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                    }else{
                        $( "input[name='"+frutas[i]+"']" ).parent().find("small").text('')
                        $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text('')
                    }              
                    
                }                
            }
        })
    })    
    $(document).on('click','.delete',function(e){
        swal({
            title: "Estas Seguro?",
            text: "Revisa antes de eliminar el ROL!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                e.preventDefault(e)
                    //alert('Medico')
                    $.ajax({
                        type:'POST',
                        url:'/delete_role',
                        data:{id_rol:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
                        success:function(data){
                            $('#contentGlobal').html(data)
                            //alert("asdsad")
                        }
                    }) 
              swal("Bien! Se elimino correctamente el ROL!", {
                icon: "success",
              });
            } else {
              swal("No se Realizo ninguna modificacion!");
            }
          })
        /*swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this imaginary file!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, keep it'
          })
          .then((result) => {
            if (result.value) {
                e.preventDefault(e)
                    //alert('Medico')
                    $.ajax({
                        type:'POST',
                        url:'/delete_role',
                        data:{id_rol:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
                        success:function(data){
                            $('#contentGlobal').html(data)
                            //alert("asdsad")
                        }
                    }) 
                    swal(
                        'Deleted!',
                        'Your imaginary file has been deleted.',
                        'success'
                      )
            } else if (result.dismiss === swal.DismissReason.cancel) {
                swal(
                  'Cancelled',
                  'Your imaginary file is safe :)',
                  'error'
                )
            }
          });*/
              
    })
    $(document).on('submit','.sendform_permission',function(e){
        frutas = []
        $('.name_form').each(function(){
            aux = $(this).attr("name")
            frutas.push(aux)            
        })
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
                $("#contentGlobal").html('')         
                $("#contentGlobal").html(data)
                swal(
                    'Felicidades',
                    'El Rol se Registro Correctamente',
                    'success'
                  )
                $('.modal-backdrop').remove()
            },
            error:function(data){
                var asd = Object.keys(data.responseJSON.errors)
                for(i = 0; i<frutas.length; i++){
                    if(asd.includes(frutas[i])) {
                        $( "input[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                        $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                    }else{
                        $( "input[name='"+frutas[i]+"']" ).parent().find("small").text('')
                        $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text('')
                    }
                } 
            }
        })
    })
    $(document).on('click','.load_dates_permission_edit',function(e){  
        $('#modal_edit_permisions').modal({
            show: 'true',
            backdrop: 'static',
            keyboard: false,
        })
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_dates_edit_permission',
            data:{id_permission:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                //$("#contentGlobal").html(data)    
                //alert('asdsadas')            
                $('#id_permission_edit').val(data[0].id)
                $('#permission_edit').val(data[0].name)
                $('#name_permission_edit').val(data[0].display_name)
                $('#description_permission_edit').val(data[0].description)

            },
            error:function(data){
                swal(
                    'Error!',
                    'El Paciente aun no esta registrado',
                    'error'
                  )
            }
        })
    })
    $(document).on('submit','.sendform_permission_edit',function(e){
        frutas = []
        $('.name_form').each(function(){
            aux = $(this).attr("name")
            frutas.push(aux)
            
        })
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
                $("#contentGlobal").html(data)
                swal(
                    'Felicidades',
                    'El Rol se Actualizo Correctamente',
                    'success'
                  )
                  $('.modal-backdrop').remove()               
            },
            error:function(data){
                var asd = Object.keys(data.responseJSON.errors)
                for(i = 0; i<frutas.length; i++){
                    if(asd.includes(frutas[i])) {
                        $( "input[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                        $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                    }else{
                        $( "input[name='"+frutas[i]+"']" ).parent().find("small").text('')
                        $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text('')
                    }              
                    
                }                
            }
        })
    })  
    $(document).on('click','.delete_permission',function(e){
        swal({
            title: "Estas Seguro?",
            text: "Revisa antes de eliminar el PERMISO!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                e.preventDefault(e)
                    $.ajax({
                        type:'POST',
                        url:'/delete_permission',
                        data:{id_permission:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
                        success:function(data){
                            $('#contentGlobal').html(data)
                        }
                    }) 
              swal("Bien! Se elimino correctamente el PERMISO!", {
                icon: "success",
              });
            } else {
              swal("No se Realizo ninguna modificacion!");
            }
          })     
    })
    $(document).on('click','.view_roles_user',function(e){  
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_dates_roles_users',
            data:{id_user:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)    
            },
            error:function(data){
                swal(
                    'Error!',
                    'El Paciente aun no esta registrado',
                    'error'
                  )
            }
        })
    })
    $(document).on('submit','.sendform_modifi_role_user',function(e){     
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serialize(),            
            success:function(data){
                $("#contentGlobal").html(data)
                swal(
                    'Felicidades',
                    'El Rol se Actualizo Correctamente',
                    'success'
                  )             
            },
            error:function(data){                              
            }
        })
    }) 
})