function cambiarcontra(idUsuario,idPersona,usuario,contra,){
   
    $("#frmActuliza")[0].reset();

    llenar_personaU(idPersona);

    $("#idE").val(idUsuario);
    
    $("#usuarioE").val(usuario);
    $("#contraE").val(contra);
    $("#vContraE").val(contra);

    $("#modalEditar").modal("show");

     $('#modalEditar').on('shown.bs.modal', function () {
         $('#usuarioE').focus();
     });   
}


