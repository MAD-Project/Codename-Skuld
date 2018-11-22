$(document).ready(function() {
    $('[name="buscador"]').submit(function (event) {
        let valor= $("#search").val().trim();
        //si hay tiempo hacer que la comparacion no sea case sensitive (quitar almohadilla upper...)
        if(valor==="#Duda" || valor==="#Sugerencia" || valor==="#Problema" || valor==="#Urgente" || valor==="#Solucionado"){
            let etiquetas= $(".etiqueta");
            let existe=false;
            for(let x=0;x< etiquetas.length;x++){
                if(valor===etiquetas[x].innerHTML){
                    existe=true;
                    break;
                }
            }
            if(!existe){
                $("#search").before('<div class="etiqueta">'+valor+'</div>');
            }
            $("#search").val('');

            return event.preventDefault();
        }else{
            let etiquetas= $(".etiqueta");
            let stringEtiquetas="";
            etiquetas.each(function (){
                stringEtiquetas+= this.innerHTML.slice(1)+",";
            });
            stringEtiquetas = stringEtiquetas.slice(0, -1);
            $("#search").before('<input type="hidden" name="etiquetas" value="'+stringEtiquetas+'">');
            return true;
        }
    })
});
