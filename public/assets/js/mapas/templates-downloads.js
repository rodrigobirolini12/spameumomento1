/**
 * Permite o usuarios baixar templates para testes e conferir padroes de entrada
 *
 *
 * @author   Rodrigo B. Vaz <rodrigo_birolini1@hotmail.com>
 * @version  $Revision: 1.0 $
 * @access   public
 * @since    28/11/2016
 */


/**
 * Exec requisição para efetuar download de um template
 * 
 * @param int numeroTemplate 1-mapa normal 2 - mapa dinamico 3 - motion chart
 * @return nothing
 */
function download(numeroTemplate){
	
	jQuery.ajax({
        url: "/template/download",
        type: "POST",
      
        data: {
            'numeroTemplate': numeroTemplate,
            '_token': $("input[name='_token']").val()
        },
        success: function(data) {
           alert('SUCEEESSSSSSSSS');
        }
    });
}

