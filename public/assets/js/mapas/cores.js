/**
 * Cores e suas respectivas transparencias utilizadas na exibicao dos mapas
 */


/**
 * Obten cores e transparencias
 * 
 *@param string cor  
 *@param int|floa transparencia - transparencia a ser aplicada nas 9 cores 
 *@return array cores
 */
function getCoresWithTrasnparencia(cor, transparencia){

		var cores = [];
		concatenando = "'0,68,27,"+transparencia+"'";
		//console.log(concatenando);
		
		if(cor == "verde"){
			
				 cores[1] = converter.rgbaToKml('0,68,27,'+transparencia);
				 cores[2] = converter.rgbaToKml('0,109,44,'+transparencia);
				 cores[3] = converter.rgbaToKml('35,139,69,'+transparencia);
				 cores[4] = converter.rgbaToKml('65,171,93,'+transparencia);
			  	 cores[5] = converter.rgbaToKml('116,196,118,'+transparencia);
			  	 cores[6] = converter.rgbaToKml('161,217,155,'+transparencia);
			  	 cores[7] = converter.rgbaToKml('199,233,192,'+transparencia);
			  	 cores[8] = converter.rgbaToKml('229,245,224,'+transparencia);
			  	 cores[9] = converter.rgbaToKml('247,252,245,'+transparencia);
			  	 return cores;
			}
		else if(cor == "azul"){
			 cores[1] = converter.rgbaToKml('8,48,107,'+transparencia);
			 cores[2] = converter.rgbaToKml('8,81,156,'+transparencia);
			 cores[3] = converter.rgbaToKml('33,113,181,'+transparencia);
			 cores[4] = converter.rgbaToKml('66,146,198,'+transparencia);
		  	 cores[5] = converter.rgbaToKml('107,174,214,'+transparencia);
		  	 cores[6] = converter.rgbaToKml('158,202,225,'+transparencia);
		  	 cores[7] = converter.rgbaToKml('198,219,239,'+transparencia);
		  	 cores[8] = converter.rgbaToKml('222,235,247,'+transparencia);
		  	 cores[9] = converter.rgbaToKml('247,251,255,'+transparencia);
		  	 return cores;
		}
		else if(cor == "vermelho"){
			 cores[1] = converter.rgbaToKml('103,0,13,'+transparencia);
			 cores[2] = converter.rgbaToKml('165,15,21,'+transparencia);
			 cores[3] = converter.rgbaToKml('203,24,29,'+transparencia);
			 cores[4] = converter.rgbaToKml('239,59,44,'+transparencia);
		  	 cores[5] = converter.rgbaToKml('251,106,74,'+transparencia);
		  	 cores[6] = converter.rgbaToKml('252,146,114,'+transparencia);
		  	 cores[7] = converter.rgbaToKml('252,187,161,'+transparencia);
		  	 cores[8] = converter.rgbaToKml('252,187,161,'+transparencia);
		  	 cores[9] = converter.rgbaToKml('255,245,240,'+transparencia);
		  	 return cores;
		}
		else if(cor == "espectral"){
			 cores[1] = converter.rgbaToKml('50,136,189,'+transparencia);
			 cores[2] = converter.rgbaToKml('102,194,165,'+transparencia);
			 cores[3] = converter.rgbaToKml('171,221,164,'+transparencia);
			 cores[4] = converter.rgbaToKml('230,245,152,'+transparencia);
		  	 cores[5] = converter.rgbaToKml('255,255,191,'+transparencia);
		  	 cores[6] = converter.rgbaToKml('254,224,139,'+transparencia);
		  	 cores[7] = converter.rgbaToKml('253,174,97,'+transparencia);
		  	 cores[8] = converter.rgbaToKml('244,109,67,'+transparencia);
		  	 cores[9] = converter.rgbaToKml('213,62,79,'+transparencia);
		  	 return cores;
		}

		else if(cor == "vermelhoAzul" && classe ==9 ){
			 cores[1] = converter.rgbaToKml('33,102,172,'+transparencia);
			 cores[2] = converter.rgbaToKml('67,147,195,'+transparencia);
			 cores[3] = converter.rgbaToKml('146,197,222,'+transparencia);
			 cores[4] = converter.rgbaToKml('209,229,240,'+transparencia);
		  	 cores[5] = converter.rgbaToKml('247,247,247,'+transparencia);
		  	 cores[6] = converter.rgbaToKml('244,165,130,'+transparencia);
		  	 cores[7] = converter.rgbaToKml('214,96,77,'+transparencia);
		  	 cores[8] = converter.rgbaToKml('214,96,77,'+transparencia);
		  	 cores[9] = converter.rgbaToKml('178,24,43,'+transparencia);
		  	 return cores;
		}
		else if(cor == "vermelhoAzul" && classe == 3 ){
			 cores[1] = converter.rgbaToKml('103,169,207,'+transparencia);
			 cores[2] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[3] = converter.rgbaToKml('239,138,98,'+transparencia);
			 cores[4] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[5] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[6] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[7] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[8] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[9] = converter.rgbaToKml('247,247,247,'+transparencia);
		  	 return cores;
		}
		else if(cor == "vermelhoAzul" && classe == 4 ){
			 cores[1] = converter.rgbaToKml('5,113,176,'+transparencia);
			 cores[2] = converter.rgbaToKml('146,197,222,'+transparencia);
			 cores[3] = converter.rgbaToKml('244,165,130,'+transparencia);
			 cores[4] = converter.rgbaToKml('202,0,32,'+transparencia);
			 cores[5] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[6] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[7] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[8] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[9] = converter.rgbaToKml('247,247,247,'+transparencia);
		  	 return cores;
		}
		else if(cor == "vermelhoAzul" && classe == 5 ){
			 cores[1] = converter.rgbaToKml('5,113,176,'+transparencia);
			 cores[2] = converter.rgbaToKml('146,197,222,'+transparencia);
			 cores[3] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[4] = converter.rgbaToKml('244,165,130,'+transparencia);
			 cores[5] = converter.rgbaToKml('202,0,32,'+transparencia);
			 cores[6] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[7] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[8] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[9] = converter.rgbaToKml('247,247,247,'+transparencia);
		  	 return cores;
		}
		else if(cor == "vermelhoAzul" && classe == 6 ){
			 cores[1] = converter.rgbaToKml('33,102,172,'+transparencia);
			 cores[2] = converter.rgbaToKml('103,169,207,'+transparencia);
			 cores[3] = converter.rgbaToKml('209,229,240,'+transparencia);
			 cores[4] = converter.rgbaToKml('253,219,199,'+transparencia);
			 cores[5] = converter.rgbaToKml('239,138,98,'+transparencia);
			 cores[6] = converter.rgbaToKml('178,24,43,'+transparencia);
			 cores[7] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[8] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[9] = converter.rgbaToKml('247,247,247,'+transparencia);
		  	 return cores;
		}
		else if(cor == "vermelhoAzul" && classe == 7 ){
			 cores[1] = converter.rgbaToKml('33,102,172,'+transparencia);
			 cores[2] = converter.rgbaToKml('103,169,207,'+transparencia);
			 cores[3] = converter.rgbaToKml('209,229,240,'+transparencia);
			 cores[4] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[5] = converter.rgbaToKml('253,219,199,'+transparencia);
			 cores[6] = converter.rgbaToKml('239,138,98,'+transparencia);
			 cores[7] = converter.rgbaToKml('178,24,43,'+transparencia);
			 cores[8] = converter.rgbaToKml('247,247,247,'+transparencia);
			 cores[9] = converter.rgbaToKml('247,247,247,'+transparencia);
		  	 return cores;
		}
		else if(cor == "vermelhoAzul" && classe == 8 ){
			 cores[1] = converter.rgbaToKml('33,102,172,'+transparencia);
			 cores[2] = converter.rgbaToKml('67,147,195,'+transparencia);
			 cores[3] = converter.rgbaToKml('146,197,222,'+transparencia);
			 cores[4] = converter.rgbaToKml('209,229,240,'+transparencia);
			 cores[5] = converter.rgbaToKml('253,219,199,'+transparencia);
			 cores[6] = converter.rgbaToKml('244,165,130,'+transparencia);
			 cores[7] = converter.rgbaToKml('214,96,77,'+transparencia);
			 cores[8] = converter.rgbaToKml('178,24,43,'+transparencia);
			 cores[9] = converter.rgbaToKml('247,247,247,'+transparencia);
		  	 return cores;
		}
		else if(cor == "diversas"){
			 cores[1] = converter.rgbaToKml('228,26,28,'+transparencia);
			 cores[2] = converter.rgbaToKml('55,126,184,'+transparencia);
			 cores[3] = converter.rgbaToKml('77,175,74,'+transparencia);
			 cores[4] = converter.rgbaToKml('152,78,163,'+transparencia);
		  	 cores[5] = converter.rgbaToKml('255,127,0,'+transparencia);
		  	 cores[6] = converter.rgbaToKml('255,255,51,'+transparencia);
		  	 cores[7] = converter.rgbaToKml('166,86,40,'+transparencia);
		  	 cores[8] = converter.rgbaToKml('247,129,191,'+transparencia);
		  	 cores[9] = converter.rgbaToKml('153,153,153,'+transparencia);
		  	 return cores;
		}
		


	}