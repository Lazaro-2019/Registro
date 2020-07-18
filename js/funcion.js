function cambioContra(){
   $("#modalEditarI").modal("show");//AQUI PONLE EL ID DEL MODAL
    $("#frmActulizaI")[0].reset();//AQUI EL FRM DEL MODAL
    $("#contraI").focus();  //AQUI EL ID DEL INPUT DE LA CONTRASEÑA 
}

$("#frmActulizaI").submit(function(e){
  
    var contra  = $("#contraI").val();
    var vContra  = $("#vContraI").val();

       // validacion para que las contraseñas coincidan
       if(contra != vContra){
           alertify.dialog('alert').set({transition:'zoom',message: 'Transition effect: zoom'}).show();
   
           alertify.alert()
           .setting({
               'title':'Información',
               'label':'Salir',
               'message': 'Las contraseñas deben de ser iguales.' ,
               'onok': function(){ alertify.message('Gracias !');}
           }).show();
           $("#contraI").focus();
           return false;       
       }
    var ide = $("#idI").val();
    //alert(contra);

        $.ajax({
            url:"../inicio/cambioContra.php",
            type:"POST",
            dateType:"html",
            data:{
                    'contra':contra,
                    'ide':ide
                 },
            success:function(respuesta){

            alertify.set('notifier','position', 'bottom-right');
            alertify.success('Se ha actualizado la contraseña' );
            $("#frmActulizaI")[0].reset();
            $("#modalEditarI").modal("hide");
            
            },
            error:function(xhr,status){
                alert(xhr);
            },
        });
        e.preventDefault();
        return false;
});


function mostrarContraI(){
    var btnMostrar=$('#btnMostrarI').val();
    // console.log(btnMostrar);
    preCarga(300,2);
    if(btnMostrar=='oculto'){
        $("#contraI").attr("type","text");
        $("#vContraI").attr("type","text");
        $("#btnMostrarI").attr("value","visto");
        $("#icoMostrar").removeClass("far fa-eye fa-lg");
        $("#icoMostrar").addClass("far fa-eye-slash fa-lg");
    }
    else{
        $("#contraI").attr("type","password");
        $("#vContraI").attr("type","password");
        $("#btnMostrarI").attr("value","oculto");
        $("#icoMostrar").removeClass("far fa-eye-slash fa-lg");
        $("#icoMostrar").addClass("far fa-eye fa-lg");       
    }
}