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
            success:function(){
            $('.matricula').val('');
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