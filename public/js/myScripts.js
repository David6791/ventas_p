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
                //console.log(data)     
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
    $(document).on('click','.view_roles_edit_user',function(e){  
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_dates_roles_users',
            data:{id_user:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                //console.log(data.id)
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
    $(document).on('click','.view_roles_user',function(e){ 
        $('.table_roles tbody tr').closest('tr').remove()
        $('#modal-viewrols').modal({
            show: 'true',
            backdrop: 'static',
            keyboard: false,
        })
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_dates_view_rol',
            data:{id_rol:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){ 
                $('#name_user').text(data[0].name)
                var da = (data).length
                for(var i = 0; i < da ; i++)
                {                    
                    x = i+1          
                    $('.table_roles').append('<tr><td>'+x+'</td><td>'+data[i].rol_name+'</td><td>'+data[i].display_name+'</td></tr>')
                }
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
    $(document).on('click','.view_permisos_rol',function(e){ 
        $('.table_permisos tbody tr').closest('tr').remove()
        $('#modal-view-permisos').modal({
            show: 'true',
            backdrop: 'static',
            keyboard: false,
        })
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_dates_view_permisos',
            data:{id_rol:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){ 
                $('#name_rol').text(data[0].rol_name)
                var da = (data).length
                for(var i = 0; i < da ; i++)
                {                    
                    x = i+1          
                    $('.table_permisos').append('<tr><td>'+x+'</td><td>'+data[i].name_permission+'</td><td>'+data[i].created_at+'</td></tr>')
                }
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
    $(document).on('click','.view_roles_edit_permisson',function(e){  
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_dates_roles_permission',
            data:{id_rol:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                //console.log(data.id)
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
    $(document).on('submit','.sendform_modifi_role_permission',function(e){     
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
    $(document).on('click','.add_medic',function(e){    
        //alert('sadsad')  
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/create_medics',
            data:{_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })
    $(document).on('submit','.send_form_medics',function(e){
        alert($(this).attr('action'))
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
                    'El Usuario fue registrado Correctamente',
                    'success'
                  )
                  $('.modal-backdrop').remove()               
            },
            error:function(data){
                //alert(data)
                var asd = Object.keys(data.responseJSON.errors)
                for(i = 0; i<frutas.length; i++){
                    if(asd.includes(frutas[i])) {
                        $( "input[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                        //$( "input[name='"+frutas[i]+"']" ).parent().find("label").text(data.responseJSON.errors[frutas[i]][0])
                        //$( "input[name='"+frutas[i]+"']" ).attr("placeholder", data.responseJSON.errors[frutas[i]][0])
                        $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                    }else{
                        $( "input[name='"+frutas[i]+"']" ).parent().find("small").text('')
                        $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text('')
                    }              
                    
                }            
            }
        })
    })
    $(document).on('click','.getVerUsuario',function(e){    
        //alert($(this).attr('value'))  
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/verUsuarios',
            data:{id_medico:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)   
                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })
    $(document).on('submit','.sendform',function(e){
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
                //console.log(data);
                swal(
                    'Felicidades',
                    'Los datos de se actualizaron correctamente',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('click','.get_BajaUser',function(e){   
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/darBajaUser',
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)   
                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })
    
    $(document).on('change','.charge_specialty',function(e){ 
        ///alert($(this).find(":selected").val()) 
        $('.add_specialty tbody tr').closest('tr').remove()        
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/charge_specialty_b',
            data:{id:$(this).find(":selected").val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                //console.log(data)
                $('.delete_table').remove() 
                var da = (data).length
                for(var i = 0; i < da ; i++){
                    //alert(i)
                    x = i+1
                    $('.add_specialty tbody').append('<tr><td>'+x+'</td><td>'+data[i].nombre_especialidad+'</td><td>'+data[i].descripcion_especialidad+'</td><td><input type="checkbox" name="schedul_add[]" value="'+data[i].id_especialidad+'"></td></tr>')
                }
                //$("#contentGlobal").html(data)   
                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })
    $(document).on('click','.click_exec',function(e){
        //alert('#.'+$(this).attr('value'))
        var x = $(this).attr('value')
        $('#'+x).removeAttr("disabled")
    })
    $(document).on('click','.click_cancel',function(e){
        //alert('#.'+$(this).attr('value'))
        var x = $(this).attr('value')
        //$('#'+x).removeAttr("disabled")
        $('#'+x).prop('disabled', true);
    })
    $(document).on('submit','.sendform_patients',function(e){
        frutas = []
        $('.name_form').each(function(){
            aux = $(this).attr("name")
            frutas.push(aux)
            
        })
        //alert(frutas)
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serialize(),
            success:function(data){            
                $("#contentGlobal").html(data);
                swal(
                    'Felicidades',
                    'El paciente se Registro correctamente',
                    'success'
                  )
            },
            error:function(data){
                //alert('asdasd')
                var asd = Object.keys(data.responseJSON.errors)
                for(i = 0; i<frutas.length; i++){
                    if(asd.includes(frutas[i])) {
                        $( "input[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                        //$( "input[name='"+frutas[i]+"']" ).parent().find("label").text(data.responseJSON.errors[frutas[i]][0])
                        //$( "input[name='"+frutas[i]+"']" ).attr("placeholder", data.responseJSON.errors[frutas[i]][0])
                        $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                    }else{
                        $( "input[name='"+frutas[i]+"']" ).parent().find("small").text('')
                        $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text('')
                    }              
                    
                } 
            }
        })
    })
    $(document).on('click','.edit_dates_patients',function(e){
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_dates_patient_edit',
            data:{id_patient:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                //console.log('data.id')
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
    
    $(document).on('click','.edit_dates_medic_patient',function(e){
        //alert('asdsadsa')
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_dates_medic_edit_patient',
            data:{id_date_medic_patient:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){    
                console.log(data)    
                $('#form_edit')[0].reset()        
                $('#modal-edit-dates_medic').modal({
                    show: 'true',
                    backdrop: 'static',
                    keyboard: false,
                })
                $('#name_date_medic').text(data[0].pregunta_mostrar)
                
                $('#descripcion').text(data[0].descripcion)
                $('#id_date_medic').val(data[0].id_patent_date_medic)
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
    
    $(document).on('submit','.sendform_edit_date_medic_patient',function(e){
        frutas = []
        $('.name_form').each(function(){
            aux = $(this).attr("name")
            frutas.push(aux)
            
        })
        //alert(frutas)
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serialize(),
            success:function(data){            
                //$("#contentGlobal").html(data);
                //alert(data[0].descripcion)
                $("#"+data[0].id_patent_date_medic+"").text('')
                $("#"+data[0].id_patent_date_medic+"").text(data[0].descripcion)                
                swal(
                    'Felicidades',
                    'El paciente se Registro correctamente',
                    'success'
                  )
                  $('#modal-edit-dates_medic').modal('toggle')
            },
            error:function(data){
                //alert('asdasd')
                var asd = Object.keys(data.responseJSON.errors)
                for(i = 0; i<frutas.length; i++){
                    if(asd.includes(frutas[i])) {
                        $( "input[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                        //$( "input[name='"+frutas[i]+"']" ).parent().find("label").text(data.responseJSON.errors[frutas[i]][0])
                        //$( "input[name='"+frutas[i]+"']" ).attr("placeholder", data.responseJSON.errors[frutas[i]][0])
                        $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                    }else{
                        $( "input[name='"+frutas[i]+"']" ).parent().find("small").text('')
                        $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text('')
                    }              
                    
                } 
            }
        })
    })    
    $(document).on('click','.edit_pat_patients',function(e){  
        //alert('asdsadsad')
        $('#modal_edit_pat_patients').modal({
            show: 'true',
            backdrop: 'static',
            keyboard: false,
        })
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_dates_edit_pat_patient',
            data:{id_patient:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                //console.log(data)
                //$("#contentGlobal").html(data) 
                $('#id_patient').val(data.id) 
                $('.delete_add_table tr').remove()  
                var da = (data.datos).length
                for(var i = 0; i < da ; i++){
                    //alert(i)
                    x = i+1
                    $('.delete_pat tbody').append('<tr><td>'+x+'</td><td>'+data.datos[i].nombre_patologia+'</td><td><input type="checkbox" name="pat_delete[]" value="'+data.datos[i].id_patologia+'"></td></tr>')
                }
                $('.delete_delete_table tr').remove()  
                var da = (data.datos1).length
                //alert(da)
                for(var i = 0; i < da ; i++){
                    //alert(i)
                    x = i+1
                    $('.add_pat tbody').append('<tr><td>'+x+'</td><td>'+data.datos1[i].nombre_patologia+'</td><td><input type="checkbox" name="pat_add[]" value="'+data.datos1[i].id_patologia+'"></td></tr>')
                }
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
    $(document).on('submit','.sendform_edit_pat_patient',function(e){        
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serialize(),
            success:function(data){  
                //console.log(data)                         
                swal(
                    'Felicidades',
                    'El paciente se Registro correctamente',
                    'success'
                  )                  
                  $('#modal_edit_pat_patients').modal('toggle')
                $('.charge_modify tr').remove()
                var da = (data).length
                //alert(da)
                for(var i = 0; i < da ; i++){
                //alert(i)
                x = i+1
                $('.charge_modify_table tbody').append('<tr><td>'+x+'</td><td>'+data[i].nombre_patologia+'</td><td>No hay descripcion</td></tr>')
                }
            },
            error:function(data){
                
            }
        })
    }) 
    $(document).on('click','.get_BajaSchedule',function(e){   
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/darBajaSchedules',
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)   
                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })   
    $(document).on('click','.get_EditSchedule',function(e){          
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/edit_Schedules',
            data:{id_Schedules:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#exampleModal1').modal({
                    show: 'true',
                    backdrop: 'static',
                    keyboard: false,
                })  
                $('#name_schedules').val(data[0].name_schedules)
                $('#hour_start').val(data[0].schedules_start)
                $('#hour_end').val(data[0].schedules_end)
                $('#hour_description').val(data[0].description)
                $('#id_schedule').val(data[0].id_schedule)                
            },
            error:function(data){
                //console.log(data)
            }
        })        
    })  
    $(document).on('submit','.sendform_schedules',function(e){
        frutas = []
        $('.name_form').each(function(){
            aux = $(this).attr("name")
            frutas.push(aux)
            
        })
        //console.log(frutas)
        //$('#close_save_modal').trigger('click') 
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
                    'Los datos de se guardaron correctamente',
                    'success'
                  ) 
                  $('.modal-backdrop').remove()            
            },
            error:function(data){ 
                //console.log(data)                
                  var asd = Object.keys(data.responseJSON.errors)
                  for(i = 0; i<frutas.length; i++){
                      if(asd.includes(frutas[i])) {
                          $( "input[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                          //$( "input[name='"+frutas[i]+"']" ).parent().find("label").text(data.responseJSON.errors[frutas[i]][0])
                          //$( "input[name='"+frutas[i]+"']" ).attr("placeholder", data.responseJSON.errors[frutas[i]][0])
                          $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                      }else{
                          $( "input[name='"+frutas[i]+"']" ).parent().find("small").text('')
                          $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text('')
                      }              
                      
                  }
            }
        })
    })  
    $(document).on('submit','.sendform_schedules1',function(e){
        $('#exampleModal1').modal('toggle')
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
                    'Los datos de se guardaron correctamente',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('click','.viewAssignments',function(e){
        $('.tabla_llenar tbody tr').closest('tr').remove() 
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/view_Assignments',
            data:{id_user:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#modalViewAssignments').modal({
                    show: 'true',
                    backdrop: 'static',
                    keyboard: false,
                })  
                $('#view_name').text(data[0].name +" "+ data[0].apellidos)
                $('#view_tipo').text(data[0].nombre_tipo)
                var da = (data).length
                //console.log(da)
                for(var i = 0; i < da ; i++)
                {
                    $('.tabla_llenar tbody').append('<tr style="text-align:center"><td>'+data[i].name_schedules+'</td><td>'+data[i].schedules_start+'</td><td>'+data[i].schedules_end+'</td><td>'+data[i].state+'</td></tr>')
                }
                
            },
            error:function(data){
                //console.log(data)
            }
        })        
    })  
    $(document).on('click','.editAssignments',function(e){
        //alert('asdasdsss')
        $('.table_add tbody tr').closest('tr').remove() 
        $('.table_remove tbody tr').closest('tr').remove() 
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/edit_Assignments',
            data:{id_user:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#modalEditAssignments').modal({
                    show: 'true',
                    backdrop: 'static',
                    keyboard: false,
                })  
                $('#id_user1').val(data.us[0].id)
                $('#view_name1').text(data.us[0].name +" "+ data.us[0].apellidos)
                $('#view_tipo1').text(data.us[0].nombre_tipo)
                var da = (data.datos).length
                var da1 = (data.datos1).length
                var x = 0
                console.log(da)
                for(var i = 0; i < da ; i++)
                {
                    x = i+1
                    $('.table_add tbody').append('<tr style="text-align:center"><td>'+x+'</td><td>'+data.datos[i].name_schedules+'</td><td><input type="checkbox" name="schedul_add[]" value="'+data.datos[i].id_schedule+'"></td></tr>')
                }
                for(var i = 0; i < da1 ; i++)
                {
                    x = i +1
                    $('.table_remove tbody').append('<tr style="text-align:center"><td>'+x+'</td><td>'+data.datos1[i].name_schedules+'</td><td><input type="checkbox" name="schedul_remove[]" value="'+data.datos1[i].id_schedule+'"></td></tr>')
                }
                
            },
            error:function(data){
                //console.log(data)
            }
        })        
    })
    $(document).on('submit','.send_form_assignments_edit',function(e){
        $('#modalEditAssignments').modal('toggle')
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
                    'Los datos de se guardaron correctamente',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('submit','.send_form_assignments',function(e){
        $('#exampleModal').modal('toggle')
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
                    'Los datos de se guardaron correctamente',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('click','.get_BajaSpecialty',function(e){   
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/darBajaSpecialtys',
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)   
                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })//
    $(document).on('click','.editSpecialties',function(e){         
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/editSpecialties',
            data:{id_specialties:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#editSpecialtiesModal').modal({
                    show: 'true',
                    backdrop: 'static',
                    keyboard: false,
                })  
                $('#name_specialties').val(data[0].nombre_especialidad)
                $('#description').val(data[0].descripcion_especialidad)
                $('#id_specialties').val(data[0].id_especialidad)
            },
            error:function(data){
                //console.log(data)
            }
        })        
    })
    $(document).on('submit','.sendform_save_edit_Specialties',function(e){
        $('#close_save_modal').trigger('click') 
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
                    'Los datos de se guardaron correctamente',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('submit','.sendform1',function(e){
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
                //console.log(data);
                swal(
                    'Felicidades',
                    'Los datos de se actualizaron correctamente',
                    'success'
                  )
                  $('.modal-backdrop').remove()
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('click','.get_BajaPatologie',function(e){   
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/darBajaPatologie',
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)   
                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })
    $(document).on('click','.edit_phatologies_function',function(e){
        //alert($(this).attr('value'))
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/edit_patologies_charge',
            data:$(this).serialize(),
            data:{id_patologie:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#edit_phatologies').modal({
                    show: 'true',
                    backdrop: 'static',
                    keyboard: false,
                })  
                $('#id_pathologie').val(data[0].id_patologia)
                $('#name_pat').val(data[0].nombre_patologia)
                $('#phatologie_description').val(data[0].descripcion_patologia)
                //$("#contentGlobal").html(data)                
            },error:function(data){
            }

        })
    })
    $(document).on('submit','.sendform_phatologies_edit',function(e){
        $('#edit_phatologies').modal('toggle')
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
                    'Se registro correctamente el Nuevo Dato Medico',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('submit','.sendform_phatologies',function(e){
        $('#create_phatologies').modal('toggle')
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
                    'Se registro correctamente la Nueva Patologia',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('click','.get_BajaDatemedic',function(e){   
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/get_BajaDatemedics',
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)   
                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })
    $(document).on('click','.edit_medical_dates',function(e){
        //alert($(this).attr('value'))
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/edit_medical_charge',
            data:$(this).serialize(),
            data:{id_date_medic:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#edit_medical_dates').modal({
                    show: 'true',
                    backdrop: 'static',
                    keyboard: false,
                })  
                $('#id_date_medic').val(data[0].id_dato_medico)
                $('#name_medical_date').val(data[0].nombre_dato_medico)
                $('#mesage_answer_yes').val(data[0].pregunta_dato_medico)
                $('#question_view').val(data[0].pregunta_mostrar)
                //$("#contentGlobal").html(data)                
            },error:function(data){
            }

        })
    })
    $(document).on('submit','.sendform_medicla_dates_edit',function(e){
        $('#edit_medical_dates').modal('toggle')
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
                    'Se registro correctamente el Nuevo Dato Medico',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('submit','.sendform_medicla_dates',function(e){
        $('#create_medical_dates').modal('toggle')
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
                    'Se registro correctamente el Nuevo Dato Medico',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('submit','.sendform_medical_exam',function(e){
        frutas = []
        $('.name_form').each(function(){
            aux = $(this).attr("name")
            frutas.push(aux)
            
        })
        //$('#medical_exam_modal').modal('toggle')
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
                //$('.con1').remove()
                //$(".con2").html(data)          
                swal(
                    'Felicidades',
                    'Se registro correctamente el Nuevo Dato Medico',
                    'success'
                  )
                  $('.modal-backdrop').remove()  
            },
            error:function(data){
                var asd = Object.keys(data.responseJSON.errors)
                  for(i = 0; i<frutas.length; i++){
                      if(asd.includes(frutas[i])) {
                          $( "input[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                          //$( "input[name='"+frutas[i]+"']" ).parent().find("label").text(data.responseJSON.errors[frutas[i]][0])
                          //$( "input[name='"+frutas[i]+"']" ).attr("placeholder", data.responseJSON.errors[frutas[i]][0])
                          $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                      }else{
                          $( "input[name='"+frutas[i]+"']" ).parent().find("small").text('')
                          $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text('')
                    }   
                }
            }
        })
    })
    $(document).on('click','.edit_medical_exam',function(e){
        //alert($(this).attr('value'))
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/edit_medical_exam_charge',
            data:$(this).serialize(),
            data:{id_exam_medic:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#modal_edit_medical_exam').modal({
                    show: 'true',
                    backdrop: 'static',
                    keyboard: false,
                }) 
                $('#n_e_m').val(data[0].name_medical_exam)
                $('#d_e_m').val(data[0].description_medical_exam)
                $('#id').val(data[0].id_medical_exam)
            },error:function(data){

            }
        })
    })
    
    $(document).on('submit','.sendform_edit_medical_exam',function(e){
        frutas = []
        $('.name_form').each(function(){
            aux = $(this).attr("name")
            frutas.push(aux)
            
        })
        //$('#medical_exam_modal').modal('toggle')
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
                //$('.con1').remove()
                //$(".con2").html(data)          
                swal(
                    'Felicidades',
                    'Se registro correctamente el Nuevo Dato Medico',
                    'success'
                  )
                  $('.modal-backdrop').remove()  
            },
            error:function(data){
                var asd = Object.keys(data.responseJSON.errors)
                  for(i = 0; i<frutas.length; i++){
                      if(asd.includes(frutas[i])) {
                          $( "input[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                          //$( "input[name='"+frutas[i]+"']" ).parent().find("label").text(data.responseJSON.errors[frutas[i]][0])
                          //$( "input[name='"+frutas[i]+"']" ).attr("placeholder", data.responseJSON.errors[frutas[i]][0])
                          $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                      }else{
                          $( "input[name='"+frutas[i]+"']" ).parent().find("small").text('')
                          $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text('')
                    }   
                }
            }
        })
    })
    $(document).on('click','.get_view_record_medic',function(e){
        //alert($(this).attr('value'))
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_dates_record_medic_full',
            data:$(this).serialize(),
            data:{id_patient:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('.delete_load').remove()        
                $('.load_delete').html(data)                
            },error:function(data){
            }

        })
    })
    $(document).on('click','.view_full_record_medic',function(e){
        //alert($(this).attr('value'))
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_dates_record_medic_full_appoinment',
            data:$(this).serialize(),
            data:{id_appointments:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('.delete_load').remove()        
                $('.load_delete').html(data)                
            },error:function(data){
            }

        })
    })
    $(document).on('click','.modifi_state_appointment',function(e){  
        $('#modifi_state_appointment_Modal').modal({
            show: 'true',
            backdrop: 'static',
            keyboard: false,
        })
        $('#id_medical_appointments').val(id=$(this).attr('value'))
    })
    $(document).on('click','.modifi_appointments',function(e){
        $('#modifi_state_appointment_Modal').modal('toggle')
        //alert("llego")
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/modifi_appointments_save',
            data:$(this).serialize(),
            data:{id:$(this).attr('value'),id_appointments:$('input:hidden[name=id_medical_appointments]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)            
            },error:function(data){
                swal(
                    'Error!',
                    'El Paciente aun no esta registrado',
                    'error'
                  )
            }

        })
    })
    $(document).on('click','.reservationDate',function(e){
        e.preventDefault(e)        
        //alert('Fecha')
        $.ajax({
            type:'GET',
            url:'/create_date_appointments',
            data:$(this).serialize(),
            success:function(data){
                $('#load_page_appointsment').html(data)
            }
        })
    })
    $(document).on('click','.view_turns_day',function(e){
        //$('#load_datos_user_appoinments').remove()
        e.preventDefault(e)       
        //alert('Fecha')
        $.ajax({
            type:'GET',
            url:'/view_turns_day_date',
            data:$(this).serialize(),
            data:{fecha:$('input:text[name=fecha_viaje]').val(),id_turno:document.getElementById("selec_schedule").value,_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#table_load_turns').html(data)
                //alert($('input:text[name=fecha_viaje]').val())
            }
        })
    })
    $(document).on('click','.create_assignments',function(e){
        alert('asdasdsads')
        e.preventDefault(e)
        $.ajax({
            type:'GET',
            url:'/create_assignments_view_user_medics',
            data:$(this).serialize(),
            data:{id:$(this).attr('value'),fecha:$('input:text[name=fecha_viaje]').val(),id_turno:document.getElementById("selec_schedule").value,_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#datatable').remove()
                //alert(data)
                $('#load_datos_user_appoinments').html(data)
                console.log(data.fecha)
                $('#date_appointsment').val()
            }
        })
    })
    $(document).on('click','.search',function(e){
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_patient_dates',
            data:$(this).serialize(),
            data:{ci_patient:$('input:text[name=ci_patient]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#load_dates_patient').html(data)               
            },error:function(data){
                swal(
                    'Error!',
                    'El Paciente aun no esta registrado',
                    'error'
                  )
            }

        })
    })
    $(document).on('submit','.sendform_insert_appointsment',function(e){
        //alert("llego")
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        console.log($(this).serialize())
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serialize(),
            success:function(data){
                $("#contentGlobal").html(data)
                swal("", "Se Registro Correctamente la Cita Medica.", "success")                
            },
            error:function(data){
                
            }
        })
    })
    /* Funcion para reservar cita medica mediante medico de turno y especialidad */
    $(document).on('click','.reservationMedic',function(e){
        e.preventDefault(e)
        //alert('Medico')
        $.ajax({
            type:'GET',
            url:'/create_medical_appointments',
            data:$(this).serialize(),
            success:function(data){
                $('#load_page_appointsment').html(data)
                //alert("asdsad")
            }
        })       
    })
    $(document).on('click','.load_date_medic',function(e){
        $('#modalSelect_date').modal({
            show: 'true',
            backdrop: 'static',
            keyboard: false,
        })     
        $('#id_schedul').val(id=$(this).attr('value'))   
    })
    $(document).on('click','.btn_select_date_cita',function(e){
        $('#modalSelect_date').modal('toggle')
        $('.borrar').remove()
        //alert("llego")
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/select_turns_free',
            data:$(this).serialize(),
            data:{id_schedule:$('input:hidden[name=id_schedul]').val(),fecha:$('input:text[name=fecha]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#load_list_medics').remove()
                //$("#contentGlobal").html(data)
                $('#table_load_turns').html(data)         
            },error:function(data){
                swal(
                    'Error!',
                    'El Paciente aun no esta registrado',
                    'error'
                  )
            }

        })
    })
    $(document).on('click','.create_assignments_medic',function(e){
        alert("llego")
        $('.borrar').remove()
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_dates_medic_patients',
            data:$(this).serialize(),
            data:{id_turn:$(this).attr('value'),id_assignments:$('input:hidden[name=id_schedul]').val(),fecha:$('input:hidden[name=fecha]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#load_list_medics').remove()
                //$("#contentGlobal").html(data)
                $('#table_load_turns').html(data)
            },error:function(data){
                swal(
                    'Error!',
                    'El Paciente aun no esta registrado',
                    'error'
                  )
            }

        })
    })
    $(document).on('submit','.sendform_insert_appointsment_medic',function(e){
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
                    'Los datos de se guardaron correctamente',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('click','.search_patient',function(e){
        //alert("llego")
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/search_patients',
            data:$(this).serialize(),
            data:{ci_patient:$('input:text[name=ci_patient]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){                
                //$("#contentGlobal").html(data)
                //$('#table_load_turns').html(data)
                $('#name_patient').val(data[0].nombres)
                $('#name_patient').prop('disabled', true);

                $('#apaterno_patient').val(data[0].ap_paterno)
                $('#apaterno_patient').prop('disabled', true);

                $('#amaterno_patient').val(data[0].ap_materno)
                $('#amaterno_patient').prop('disabled', true);

                $('#fnacimiento_patient').val(data[0].fecha_nacimento)
                $('#fnacimiento_patient').prop('disabled', true);

                $('#sexo').val(data[0].sexo)
                $('#sexo').prop('disabled', true);

                $('#direccion_patient').val(data[0].direccion)
                $('#direccion_patient').prop('disabled', true);

                $('#id_patient').val(data[0].id_paciente)
                swal(
                    '',
                    'El Paciente esta registrado',
                    'success'
                  )
            },error:function(data){
                swal(
                    'Error!',
                    'El Paciente aun no esta registrado',
                    'error'
                  )
            }

        })
    })
    $(document).on('submit','.store_emergencies',function(e){
        //alert("asdasdsa")
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
                    'Los datos de se guardaron correctamente',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('click','.start_appointment',function(e){
        //alert("llego")
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/start_appointment_date',
            data:$(this).serialize(),
            data:{id_appointments:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){                
                $("#contentGlobal").html(data) 
                
            },error:function(data){
                swal(
                    'Error!',
                    'El Paciente aun no esta registrado',
                    'error'
                  )
            }

        })
    })
    $(document).on('click','.filiation_completing',function(e){   
        //alert('asdasdas')
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/filiation_completing',
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#datos_paciente").remove()
                $(".cargar_aqui").html(data)                   
            },
            error:function(data){
                //console.log(data)
            }
        })
    })    
    $(document).on('click','.add_date_new_medic',function(e){   
        //alert('asdasdas')        
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/add_date_new_medic_url',
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#modal-add-dates_medic').modal({
                    show: 'true',
                    backdrop: 'static',
                    keyboard: false,
                })
                //$('.table_dates_medics tbody').remove()
                $('.table_dates_medics tbody tr').closest('tr').remove()
                //console.log(data) 
                $('.id_patient_dates').val(data.id) 
                var da = (data.datos).length
                for(var i = 0; i < da ; i++)
                {                    
                    x = i+1          
                    $('.table_dates_medics').append('<tr><td>'+x+'</td><td>'+data.datos[i].nombre_dato_medico+'</td><td><input type="checkbox" name="dates_medic_add[]" value="'+data.datos[i].id_dato_medico+'"></td></tr>')
                }
                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })
    $(document).on('submit','.sendform_completing_dates',function(e){
        $('#modal-add-dates_medic').modal('toggle')
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
                $(".update_dates_medic").remove()
                $(".load_date_medic").html(data)
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
    $(document).on('click','.delete_dates_medic_patient',function(e){   
        //alert($(this).attr('value'))
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/delete_dates_medic_patient',
            data:{id:$(this).attr('value'),id_patient:$('input:hidden[name=id_patient]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('.update_dates_medic').remove()                
                //alert(data)
                $('.load_date_medic').html(data)
            },
            error:function(data){
                //console.log(data)
            }
        })
    }) 
    $(document).on('submit','.sendform_patients_update',function(e){
        //alert('llega')  
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
                //$(".update_dates_medic").remove()                
                $(".add_completing").remove()
                console.log(data)
                $(".cargar_aqui").html(data)
                swal(
                    'Felicidades',
                    'Se Completaron los datos del Paciente',
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
                        $( "textarea[name='"+frutas[i]+"']" ).parent().parent().parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                    }else{
                        $( "input[name='"+frutas[i]+"']" ).parent().find("small").text('')
                        $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text('')
                    }              
                    
                }                
            }
        })
    })
    $(document).on('click','.load_dates_appoinments',function(e){
        //alert("llego")
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_dates_appoinments',
            data:$(this).serialize(),
            data:{id_appointments:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){                
                $(".load_dates_appointments_one").html(data) 
                swal(
                    '',
                    'Correcto',
                    'success'
                  )
            },error:function(data){
                swal(
                    'Error!',
                    'El Paciente aun no esta registrado',
                    'error'
                  )
            }

        })
    })
    $(document).on('click', '.eliminar_medicine', function(e){        
        $(this).closest('tr').remove()
    })
    $(document).on('click','.move_file',function(e){        
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_medicine_table',
            data:{id_medicine:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){                
                //$("#contentGlobal").html(data) 
                //alert('asdasdasd')
                $('.add_medicines tbody').append('<tr style="text-align:center"><td>'+data[0].name_medicine+'</td><td style="text-align:center"><input type="text" name="cantidad[]" style="width:50px; text-align:center;" value="1"><input type="hidden" name="id_medicine[]" style="width:50px; text-align:center;" value="'+data[0].id_medicines+'"></td><td><button class="btn btn-danger btn-sm eliminar_medicine"><span class="fa fa-times-circle">Eliminar</span></button></td></tr>')               
            },error:function(data){
                //alert('asdsad')                
            }

        })
    })
    $(document).on('submit','.form_send_dates_appointments_send',function(e){
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serialize(),
            success:function(data){  
                $('.load_notes_medic').remove()
                console.log(data)
                $(".cargar_aqui").html(data)          
                swal(
                    'Felicidades',
                    'Se registro correctamente el Nuevo Dato Medico',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('click','.click_cancel_1',function(e){
        //alert('#.'+$(this).attr('value'))
        var x = $(this).attr('value')
        //$('#'+x).removeAttr("disabled")
        $('#datos').prop('disabled', true);
    })
    $(document).on('click','.click_exec_1',function(e){
        //alert('#.'+$(this).attr('value'))
        var x = $(this).attr('value')
        $('#datos').removeAttr("disabled")
    })
    $(document).on('submit','.form_send_dates_treatment',function(e){
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serialize(),
            success:function(data){  
                $(".borrar_1").remove()
                $(".treat_content").html(data)          
                swal(
                    'Felicidades',
                    'Se registro correctamente el Nuevo Dato Medico',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('submit','.sendform_medical_exam_1',function(e){
        $('#medical_exam_modal').modal('toggle')
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serialize(),
            success:function(data){
                $('.con1').remove()
                $(".con2").html(data)          
                swal(
                    'Felicidades',
                    'Se registro correctamente el Nuevo Dato Medico',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('submit','.sendform_transfer_patients',function(e){
        $.ajaxSetup({
            header:$('meta[name="_token"]').attr('content')
        })
        e.preventDefault(e)
        $.ajax({
            type:$(this).attr('method'),
            url:$(this).attr('action'),
            data:$(this).serialize(),
            success:function(data){  
                $('.c_transfer1').remove()
                $(".c_transfer2").html(data)        
                swal(
                    'Felicidades',
                    'Se registro correctamente el Nuevo Dato Medico',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('click','.end_medical_appointments',function(e){
        //alert($(this).attr('value'))
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/end_medical_appointment',
            data:$(this).serialize(),
            data:{id_appointments:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)                
            },error:function(data){
            }

        })
    })
    $(document).on('click','.get_BajaDate_register',function(e){   
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/darBajaDates_register',
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)   
                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })   
    $(document).on('click','.edit_date_register_function',function(e){
        //alert($(this).attr('value'))
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/edit_date_register_functions',
            data:$(this).serialize(),
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('#edit_dates_register').modal({
                    show: 'true',
                    backdrop: 'static',
                    keyboard: false,
                })  
                $('#_id').val(data[0].id_date_register)
                $('#name_date').val(data[0].name_date)
                $('#_description').val(data[0].description_dates)
                //$("#contentGlobal").html(data)                
            },error:function(data){
            }

        })
    })
    $(document).on('submit','.sendform_phatologies_edit',function(e){
        frutas = []
        $('.name_form').each(function(){
            aux = $(this).attr("name")
            frutas.push(aux)
            
        })
        //$('#medical_exam_modal').modal('toggle')
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
                //$('.con1').remove()
                //$(".con2").html(data)          
                swal(
                    'Felicidades',
                    'Se registro correctamente el Nuevo Dato Medico',
                    'success'
                  )
                  $('.modal-backdrop').remove()  
            },
            error:function(data){
                var asd = Object.keys(data.responseJSON.errors)
                  for(i = 0; i<frutas.length; i++){
                      if(asd.includes(frutas[i])) {
                          $( "input[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                          //$( "input[name='"+frutas[i]+"']" ).parent().find("label").text(data.responseJSON.errors[frutas[i]][0])
                          //$( "input[name='"+frutas[i]+"']" ).attr("placeholder", data.responseJSON.errors[frutas[i]][0])
                          $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text(data.responseJSON.errors[frutas[i]][0])
                      }else{
                          $( "input[name='"+frutas[i]+"']" ).parent().find("small").text('')
                          $( "textarea[name='"+frutas[i]+"']" ).parent().find("small").text('')
                    }   
                }
            }
        })
    })
    $(document).on('submit','.sendform_date_register',function(e){
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
                    'Se creo correctamente el Nuevo Dato',
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
    $(document).on('click','.view_day',function(e){
        //alert($(this).attr('value'))
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/view_day',
            data:$(this).serialize(),
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){                
                $(".load_page_appointsment").html(data)                
            },error:function(data){
            }

        })
    })    
    $(document).on('click','.view_range',function(e){
        //alert($(this).attr('value'))
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/view_range',
            data:$(this).serialize(),
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){                
                $(".load_page_appointsment").html(data)                
            },error:function(data){
            }

        })
    })
    
    $(document).on('click','.view_range_report',function(e){
        //alert($(this).attr('value'))
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/view_range_reports',
            data:$(this).serialize(),
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){                
                $(".load_page_appointsment").html(data)                
            },error:function(data){
            }

        })
    })
    $(document).on('click','.view_day_report',function(e){
        //alert($(this).attr('value'))
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/view_day_reports',
            data:$(this).serialize(),
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){                
                $(".load_page_appointsment").html(data)                
            },error:function(data){
            }

        })
    })  
    $(document).on('click','.view_general_report',function(e){
        //alert($(this).attr('value'))
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/view_general_reports',
            data:$(this).serialize(),
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){                
                $(".load_page_appointsment").html(data)                
            },error:function(data){
            }

        })
    })  
    $(document).on('click','.view_range_general_report',function(e){
        //alert($(this).attr('value'))
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/view_range_general_report',
            data:$(this).serialize(),
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){                
                $(".load_page_appointsment").html(data)                
            },error:function(data){
            }

        })
    })  
   
    $(document).on('click','.ver_info',function(e){
        //alert($('input:text[name=fecha]').val())
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/statistic_for_day',
            data:$(this).serialize(),
            data:{fecha:$('input:text[name=fecha]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $(".load_statistic").html(data)     
                           
            },error:function(data){
            }

        })
    })
    $(document).on('click','.ver_info_report',function(e){
        //alert($('input:text[name=fecha]').val())
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/report_for_day',
            data:$(this).serialize(),
            data:{fecha:$('input:text[name=fecha]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $(".load_statistic").html(data)     
                           
            },error:function(data){
            }

        })
    })
    
    $(document).on('click','.ver_info_statics',function(e){
        //alert($('input:text[name=fecha]').val())
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/statistic_for_range',
            data:$(this).serialize(),
            data:{fecha:$('input:text[name=date_range]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $(".load_statistic").html(data)     
                           
            },error:function(data){
            }

        })
    })
    $(document).on('click','.ver_info_report_range',function(e){
        //alert($('input:text[name=fecha]').val())
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/ver_info_report_ranges',
            data:$(this).serialize(),
            data:{fecha:$('input:text[name=date_range]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $(".load_statistic").html(data)     
                           
            },error:function(data){
            }

        })
    })
    $(document).on('submit','.sendform_group_disease',function(e){
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
    $(document).on('click','.get_group_disease',function(e){   
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/baja_group_disease',
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)   
                
            },
            error:function(data){
                //console.log(data)
            }
        })
    })
    $(document).on('click','.edit_group_disease',function(e){  
        $('#modal_edit_group').modal({
            show: 'true',
            backdrop: 'static',
            keyboard: false,
        })
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_dates_edit_group',
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                //$("#contentGlobal").html(data)    
                //alert('asdsadas')            
                $('#id').val(data[0]._id)
                $('#name').val(data[0].name_group)
                $('#_description').val(data[0].description_group)

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
    $(document).on('submit','.sendform_group_edit',function(e){
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
    $(document).on('click','.ver_info_report_general',function(e){
        //alert($('input:text[name=fecha]').val())
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/ver_info_report_general',
            data:$(this).serialize(),
            data:{fecha:$('input:text[name=fecha]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $(".load_statistic").html(data)     
                           
            },error:function(data){
            }

        })
    })
    $(document).on('click','.ver_info_report_range_full',function(e){
        //alert($('input:text[name=fecha]').val())
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/ver_info_report_range_full',
            data:$(this).serialize(),
            data:{fecha:$('input:text[name=date_range]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $(".load_statistic").html(data)     
                           
            },error:function(data){
            }

        })
    })
    $(document).on('click','.view_dates_for_exam',function(e){  
        $('#exampleModal').modal({
            show: 'true',
            backdrop: 'static',
            keyboard: false,
        })
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/view_dates_for_exam',
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                //$("#contentGlobal").html(data)    
                //alert('asdsadas')            
                $('#med').text(data[0].name + data[0].apellidos)
                $('#id_').val(data[0].id_medical_exam_patient)
                $('#fecha').text(data[0].date_appointments)
                $('#examen').text(data[0].name_medical_exam)
                $('#descripcion').text(data[0].reason_medical_examn)

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
    $(document).on('submit','.sendform_completing_examn',function(e){
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
    
    $(document).on('click','.load_dates_reserva',function(e){
        //alert($('input:text[name=fecha]').val())
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/load_dates_reserva',
            data:$(this).serialize(),
            data:{id:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $(".load_edit_reserva").html(data)     
                           
            },error:function(data){
            }

        })
    })
    $(document).on('click','.view_schedules_free',function(e){
        //alert($('select[name=id_]').val())
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/view_schedules_free',
            data:$(this).serialize(),
            data:{schedul:$('select[name=id_]').val(),id:$('input:hidden[name=id]').val(),fecha:$('input:text[name=fecha]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $(".view_schedules_free1").html(data)     
                           
            },error:function(data){
            }

        })
    })
    $(document).on('click','.create_assignments_1',function(e){
        //lert('asdasdsads')
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/update_appoinment_patient',
            data:$(this).serialize(),
            data:{id:$(this).attr('value'),id_ap:$('input:hidden[name=id]').val(),fecha:$('input:hidden[name=schedul]').val(),fecha:$('input:hidden[name=fecha]').val(),id_turno:document.getElementById("selec_schedule").value,_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)
            }
        })
    })    
    $(document).on('click','.confirm_function',function(e){
        swal({
            title: "Estas Seguro?",
            text: "La Cita Medica se Confirmara para la fecha y hora!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                e.preventDefault(e)
                    $.ajax({
                        type:'POST',
                        url:'/confirm_function',
                        data:{id_appointments:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
                        success:function(data){
                            $('#contentGlobal').html(data)
                        }
                    }) 
              swal("Bien! Se CONFIRMO correctamente!", {
                icon: "success",
              });
            } else {
              swal("No se Realizo ninguna CONFIRMACION!");
            }
          })     
    })
    $(document).on('click','.view_patient_dates',function(e){
        //alert($('select[name=id_]').val())
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/view_patient_dates',
            data:$(this).serialize(),
            data:{id_appointments:$('input:hidden[name=id_app]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $(".cargar_aqui").html(data)     
                           
            },error:function(data){
            }

        })
    })
    $(document).on('click','.view_attention_patient',function(e){
        //alert($('select[name=id_]').val())
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/view_attention_patient',
            data:$(this).serialize(),
            data:{id_appointments:$('input:hidden[name=id_app]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $(".cargar_aqui").html(data)     
                           
            },error:function(data){
            }

        })
    })
    $(document).on('click','.view_cites_previus',function(e){
        //alert($('select[name=id_]').val())
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/view_cites_previus',
            data:$(this).serialize(),
            data:{id_appointments:$('input:hidden[name=id_app]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $(".cargar_aqui").html(data)     
                           
            },error:function(data){
            }

        })
    })
    $(document).on('click','.view_treatment_form',function(e){
        //alert($('select[name=id_]').val())
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/view_treatment_form',
            data:$(this).serialize(),
            data:{id_appointments:$('input:hidden[name=id_app]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $(".cargar_aqui").html(data)     
                           
            },error:function(data){
            }

        })
    })
    $(document).on('click','.view_exam_medic',function(e){
        //alert($('select[name=id_]').val())
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/view_exam_medic',
            data:$(this).serialize(),
            data:{id_appointments:$('input:hidden[name=id_app]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $(".cargar_aqui").html(data)     
                           
            },error:function(data){
            }

        })
    })
    $(document).on('click','.vew_transfer_patient',function(e){
        //alert($('select[name=id_]').val())
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/vew_transfer_patient',
            data:$(this).serialize(),
            data:{id_appointments:$('input:hidden[name=id_app]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $(".cargar_aqui").html(data)     
                           
            },error:function(data){
            }

        })
    })
    $(document).on('click','.view_end_cite_medic',function(e){
        //alert($('select[name=id_]').val())
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/view_end_cite_medic',
            data:$(this).serialize(),
            data:{id_appointments:$('input:hidden[name=id_app]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $(".cargar_aqui").html(data)     
                           
            },error:function(data){
            }

        })
    })
    $(document).on('click','.view_turns_schedul',function(e){
        //alert($('select[name=id_]').val())
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/view_turns_schedul',
            data:$(this).serialize(),
            data:{id_sche:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)     
                           
            },error:function(data){
            }
        })        
    })
    $(document).on('click','.baja_turn',function(e){
        //alert($('select[name=id_]').val())
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/baja_turn',
            data:$(this).serialize(),
            data:{id_turn:$(this).attr('value'),id_hour:$('input:hidden[name=turno]').val(),_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $('.agregar tbody tr').closest('tr').remove()  
                var da = (data).length
                for(var i = 0; i < da ; i++)
                {                    
                    x = i+1          
                    $('.agregar').append('<tr><td>'+x+'</td><td>'+data[i].start_time+'</td><td>'+data[i].end_time+'</td><td>'+data[i].state_turn+'</td><td>'+data[i].date+'</td><td>'+data[i].name_schedules+'</td><td><button type="button" class="btn btn-primary btn-xs baja_turn" value="'+data[i].id_hour_turn+'"> <span class="glyphicon glyphicon-show"></span> Dar de Baja</button></td></tr>')
                }   
                           
            },error:function(data){
            }

        })
    })
    
    $(document).on('submit','.sendform_turn_new',function(e){
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
                $('.agregar tbody tr').closest('tr').remove()  
                var da = (data).length
                for(var i = 0; i < da ; i++)
                {                    
                    x = i+1          
                    $('.agregar').append('<tr><td>'+x+'</td><td>'+data[i].start_time+'</td><td>'+data[i].end_time+'</td><td>'+data[i].state_turn+'</td><td>'+data[i].date+'</td><td>'+data[i].name_schedules+'</td><td><button type="button" class="btn btn-primary btn-xs baja_turn" value="'+data[i].id_hour_turn+'"> <span class="glyphicon glyphicon-show"></span> Dar de Baja</button></td></tr>')
                }   
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
    $(document).on('submit','.sendform_medicines',function(e){
        $('#medicines_register_modal').modal('toggle')
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
                    'Se registro correctamente el Nuevo Dato Medico',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('submit','.sendform_stock_medicines',function(e){
        $('#medicines_stock_register_modal').modal('toggle')
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
                    'Se registro correctamente el Nuevo Dato Medico',
                    'success'
                  )
            },
            error:function(data){
                swal(
                    'Good job!',
                    'You clicked the button!',
                    'error'
                  )
            }
        })
    })
    $(document).on('click','.create_assignments_1',function(e){
        //lert('asdasdsads')
        e.preventDefault(e)
        $.ajax({
            type:'POST',
            url:'/update_appoinment_patient',
            data:$(this).serialize(),
            data:{id:$(this).attr('value'),id_ap:$('input:hidden[name=id]').val(),fecha:$('input:hidden[name=schedul]').val(),fecha:$('input:hidden[name=fecha]').val(),id_turno:document.getElementById("selec_schedule").value,_token:$('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                $("#contentGlobal").html(data)
            }
        })
    })    
    $(document).on('click','.hability_dates_patients',function(e){
        swal({
            title: "Estas Seguro?",
            text: "Se habilitara la edicion de datos del Paciente!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                e.preventDefault(e)
                    $.ajax({
                        type:'POST',
                        url:'/hability_dates_patients',
                        data:{id_patients:$(this).attr('value'),_token:$('meta[name="csrf-token"]').attr('content')},
                        success:function(data){
                            $('#contentGlobal').html(data)
                        }
                    }) 
              swal("Bien! Se Habilito la Edicion!", {
                icon: "success",
              });
            } else {
              swal("No se Realizo ninguna MODIFICACION!");
            }
          })     
    })   
})