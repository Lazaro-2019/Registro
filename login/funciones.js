function entrando(){
    window.location='../inicio/index.php';
}

function cambioContra(){
    $("#cuerpo").hide();
    $("#cambiarContra").fadeIn('low');
    alertify.warning("Debes de cambiar tu contraseña , ya que es tu primer ingreso al sistema",3);
    $("#vContra1").val('');
    $("#vContra2").val('');
    $("#vContra1").focus();
}

$("#frmIngreso").submit(function(e){
    var usuario,contra;
    var usuario = $("#username").val();
    var contra  = $("#pass").val();
    var usuario=usuario.trim();
    
    // contra=contra.trim();
    if(usuario=='' || contra==''){
        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

        alertify.alert()
        .setting({
            'title':'Acceso denegado',
            'label':'Aceptar',
            'message': 'Debes de colocar nombre de usuario y contraseña' ,
            'onok': function(){ 
                alertify.message('Gracias !');
                $("#username").val('');
                $("#pass").val('');
                $("#username").focus();
            }
        }).show();
        return false;    
    }else{
        $.ajax({
            url:"verificar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'usuario':usuario,
                    'contra':contra
                 },
            success:function(respuesta){
              console.log(respuesta);
              respuesta=parseInt(respuesta);
              switch(respuesta){
                  case 0 :
                        alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();

                        alertify.alert()
                        .setting({
                            'title':'Acceso denegado',
                            'label':'Aceptar',
                            'message': 'Nombre de usuario o contraseña incorrectos' ,
                            'onok': function(){ 
                             responsiveVoice.speak("usuario o contraseña incorrectos", "Spanish Female");
                                alertify.message('Gracias !');
                                $("#username").val('');
                                $("#pass").val('');

                            }
                        }).show();   
                    break;
                  case 1 :
                        var valorChk=$('#chkContra').val();
                        if(valorChk=='si'){
                            cambioContra();
                            $("#usuario").val(usuario);                       
                        }else{
                                responsiveVoice.speak("bienvenido administrador", "Spanish Female");
                            alertify.success('Ingresando....') ; 
                            preCarga(2000,2);
                            setInterval(entrando, 2000);
                    }
                    break;
                  case 2 :
                        cambioContra();
                        $("#usuario").val(usuario);

                    break;
              }

            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
    } 
        e.preventDefault();
        return false;
});

function evaluarCheck(valor){
    
    if(valor=='no'){
        $('#chkContra').val('si');
    }else{
        $('#chkContra').val('no');
    }

    console.log(valor);
   
}

function cancelar(){
        // console.log("Saliendo del sistema...")
        alertify.confirm('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
        alertify.confirm(
            'Sistema de Registro de Alumnos', 
            '¿ Deseas cancelar el cambio de contraseña?', 
            function(){ 
                $("#cuerpo").fadeIn();
                $("#cambiarContra").hide('low'); 
                $("#frmIngreso")[0].reset();   
                $("#frmCambiar")[0].reset();    
                $("#username").focus();      
                }, 
            function(){ 
                    alertify.error('Cancelar') ; 
                    console.log('cancelado')}
        ).set('labels',{ok:'Si',cancel:'No'});
}

$("#frmCambiar").submit(function(e){
  
    var usuario = $("#usuario").val();
    var contra  = $("#vContra1").val();
    var vContra  = $("#vContra2").val();

      if (contra !=vContra) {
           alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
   
           alertify.alert()
           .setting({
               'title':'Información',
               'label':'Salir',
               'message': 'Las contraseñas deben ser iguales' ,
               'onok': function(){ alertify.message('Gracias !');}
           }).show();
           return false;       
       }
   
    //var ide= $("#usuario").val();

        $.ajax({
            url:"actualizar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'usuario':usuario,
                    'contra':contra,
                    //'usuario':usuario
                    //'ide':ide
                    //'restaurar':1
                 },
            success:function(respuesta){

            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Se ha actualizado el registro' );
            $("#frmCambiar")[0].reset();
           entrando();
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
});


function verregistro(){
    $("#registro").slideDown('low');
    $("#login2").slideUp('low');
    $("#matricula").focus();
}

function verlogin(){
    $("#login2").slideDown('low');
    $("#registro").slideUp('low');
    $("#username").focus();
}

function llenar_datos(){
    var matricula= document.getElementById("matricula").value;
     // console.log("Se ha llenado lista");
    // preCarga(1000,4);
    $.ajax({
        url:"datos.php",
        type:"POST",
        dateType:"html",
        data:{
                'matricula':matricula
        },
        success:function(respuesta){
            $("#datos").html(respuesta);
             $("#datos").slideDown("fast");
        },
        error:function(xhr,status){
            alert("no se muestra");
        }
    }); 
}

function selecion(event){   
    if (event.keyCode == 13) {
        var matricula= document.getElementById("matricula").value;
        var img = document.getElementById("foto").value;
        var foto ="img/"+matricula+".jpg";
        $.ajax({
            url:"validar.php",
            type:"POST",
            dateType:"html",
            data:{
                    'matricula':matricula
                 },
            success:function(respuesta,res){
            $('matricula').val('');
            $('#nombre').val(res["nombre"]);
            alertify.success('Ingresando....') ; 
            preCarga(1500,2);
            $("#foto").attr("src",foto);
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
    }
}

