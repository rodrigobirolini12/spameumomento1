/**
 * Arquivo que conten funções comuns a serem utilizadas em todas as paginas
 */

/**
 * Remove elementos do array cujo naos estao dentro do intervalo [minimo,maximo]
 * 
 * @param array dadosAnalise são dos dados a serem tratados
 * @param int|float minimo
 * @param int|float maximo
 * @return array newDadosAnalise1
 */
function removeElementsMinMax(dadosAnalise, minimo, maximo){
		newDadosAnalise1 = [];
		indice = 0;
		
		//alert(minimo);alert(maximo);
		for (i = 0; i < dadosAnalise.length; i++) { 
			if(dadosAnalise[i] >= minimo && dadosAnalise[i] <= maximo){
				
				newDadosAnalise1[indice] =  dadosAnalise[i];
				indice++;
            }
		}
		;
		return newDadosAnalise1;
		
	}


//obten valor maximo de um array
	function getMaxOfArray(numArray) {
	    return Math.max.apply(null, numArray);
	}
//obtem valor minimo de um array
	function getMinOfArray(numArray) {
	    return Math.min.apply(null, numArray);
	}