
/**
 * Controla a exibição de mapas no modo dinamico
 * 
 */
function showDinamicMaps() {

    if (loopDinamicMaps == 1) {
        alteraLegenda(dadosMapas[1][1]);
        alteraTitulo(dadosMapas[1][2]);
        geoXml.hideDocument(geoXml.docs[0]);
        console.log('geoXml.hideDocument(geoXml.docs[0])');
        geoXml.showDocument(geoXml1.docs[1]);
        console.log('geoXml.showDocument(geoXml1.docs[1])');
        loopDinamicMaps++;
    } else if (loopDinamicMaps == mapas.length + 1) {
        alteraLegenda(dadosMapas[1][1]);
        alteraTitulo(dadosMapas[1][2]);
        geoXml.hideDocument(geoXml1.docs[loopDinamicMaps - 1]);
        loopDinamicMaps = 1;
        geoXml.showDocument(geoXml1.docs[loopDinamicMaps]);
        loopDinamicMaps++;
    } else {
        alteraLegenda(dadosMapas[loopDinamicMaps][1]);
        alteraTitulo(dadosMapas[loopDinamicMaps][2]);
        geoXml.hideDocument(geoXml1.docs[loopDinamicMaps - 1]);
        geoXml.showDocument(geoXml1.docs[loopDinamicMaps]);
        loopDinamicMaps++;
    }
}


/**
 * @deprecated
 * 
 */
function showMap(atributoAnalise, transparencia, classe, metodo, cor,
    token, minimo, maximo, casasDecimais, intervaloManual, titulo, tempoAtualizacao) {


    indicesArray = countColunas - 1;

    jQuery.ajax({
        url: "/mapa/busca-dados-atributo",
        type: "POST",
        dataType: "json",
        data: {
            'atributoAnalise': loop,
            '_token': $("input[name='_token']").val()

        },
        success: function(data) {
            arrDadosDeAnaliseDinamica = data.dadosAnalise;
            maximo = (maximo == "") ? getMaxOfArray(arrDadosDeAnaliseDinamica) : maximo;
            minimo = (minimo == "") ? getMinOfArray(arrDadosDeAnaliseDinamica) : minimo;
            arrDadosDeAnaliseDinamica = removeElementsMinMax(arrDadosDeAnaliseDinamica, parseFloat(minimo), parseFloat(maximo));

            if (metodo == 1) {
                intervaloJenks = getJenksBreaks(arrDadosDeAnaliseDinamica, classe, casasDecimais);
                console.log(intervaloJenks);
            } else if (metodo == 3) {
                intervaloQuantis = getQuantilesBreaks(arrDadosDeAnaliseDinamica, classe, casasDecimais);
                console.log(intervaloQuantis);
            }

            processamento(loop, transparencia, classe, metodo, cor,
                token, minimo, maximo, casasDecimais, intervaloManual, intervaloQuantis, intervaloJenks, titulo, tempoAtualizacao);
        }

    });
}

/**
 * Limpa o mapa para uma nova consula
 * 
 */
function clearMaps() {

    if (geoXml1.docs.length == 1) {
        return;
    } else {
        if (tipoIteracao == 0) {
            alteraLegenda("Sem Dados");
            alteraTitulo("Analise Espacial");
            geoXml.hideDocument(geoXml1.docs[1]);
        } //end if
        else if (tipoIteracao == 1) {

            alteraLegenda('Sem Dados');
            alteraTitulo('Análise Espacial');
            geoXml.hideDocument(geoXml1.docs[loopDinamicMaps - 1]);
            loopDinamicMaps = 1;
            tipoIteracao = 0;

        }

        while (geoXml1.docs.length != 1) {
            geoXml1.docs.pop();
        }

        //alert('limpou');
        return false;
    } //end else externo
}

/**
 * Executa processamento de uma determinada consulta
 * 
 * @param
 * @return data.nomeMapa, data.legenda, data.titulo
 */
function processamento(atributoAnalise, transparencia, classe, metodo, cor,
    token, minimo, maximo, casasDecimais, intervaloManual, intervaloQuantis, intervaloJenks, titulo, tempoAtualizacao) {
    //alert(loop);
    jQuery.ajax({
        url: "/mapa/processamento",
        type: "POST",
        dataType: "JSON",
        data: {
            'atributoAnalise': loop,
            'transparencia': transparencia,
            'classe': classe,
            'metodo': metodo,
            'cor': cor,
            'cores': cores,
            '_token': $("input[name='_token']").val(),
            'minimo': minimo,
            'maximo': maximo,
            'casasDecimais': casasDecimais,
            'intervaloManual': intervaloManual,
            'intervaloQuantis': intervaloQuantis,
            'intervaloJenks': intervaloJenks,
            'titulo': titulo,
            'tempoAtualizacao': tempoAtualizacao
        },
        success: function(data) {
            //trocaMapa(data.nomeMapa, data.legenda,data.titulo);
            dadosMapas[countMapas] = [data.nomeMapa, data.legenda, data.titulo];
            countMapas++;
            //geoXml1.parse('http://analisedadosbeta.herokuapp.com/assets/kml/'+data.nomeMapa+'.kml');
            console.log(dadosMapas);

            if (loop == indicesArray) {
                //alert('entrou');
                stopProcessamento();
                loop = 1;
                createArrayMaps();
            } else {
                loop++;
            }
        }
    });
}

//busca endereço de todos kmls relacionados a pesquisa
function createArrayMaps() {

    for (i = 1; i < dadosMapas.length; i++) {
        mapas.push('http://analisedadosbeta.herokuapp.com/assets/kml/' + dadosMapas[i][0] + '.kml');
    }
    //carrega todos os mapas
    loadMaps();

} //end function createArrayMaps


//carrega todos os mapas antes do inicio da exibição
function loadMaps() {
    geoXml1.parse(mapas);
    flagLoadMaps = 1;
    tipoIteracao = 1;
}

//inicia carreagamento do mapa normal
function initLoadMap() {
    map1 = setInterval(showMapNormal, 1000);
}

//Exibe mapa no modo normal
function showMapNormal() {
    alteraLegenda(mapaLegenda);
    alteraTitulo(mapaTitulo);
    geoXml.hideDocument(geoXml.docs[0]);
    //console.log('geoXml.hideDocument(geoXml.docs[0])');
    geoXml.showDocument(geoXml1.docs[1]);
    //console.log('geoXml.showDocument(geoXml1.docs[1])');
    stopMap1();

}

//inicia processo de troca de mapas
function initLoopMaps() {

    //faz o carregamento do primeiro mapa mais rapido
    if (duracaoLoop != 1 && duracaoLoop != 2 && duracaoLoop != 3) {
        intervalMap1 = setInterval(showMap1, 1);
    }

    intervalBetweenMaps = setInterval(showDinamicMaps, duracaoLoop);
}


function showMap1() {
    alteraLegenda(dadosMapas[1][1]);
    alteraTitulo(dadosMapas[1][2]);
    geoXml.hideDocument(geoXml.docs[0]);
    console.log('geoXml.hideDocument(geoXml.docs[0])');
    geoXml.showDocument(geoXml1.docs[1]);
    console.log('geoXml.showDocument(geoXml1.docs[1])');
    loopDinamicMaps++;
    stopIntervalMap1();
}



// A function to hide the loading message
function hideLoad() {
    var loaddiv = document.getElementById("loaddiv");
    if (loaddiv == null) {
        alert("Sorry can't find the loaddiv");
        return;
    }
    //div found
    loaddiv.style.visibility = "hidden";
}

// A function to hide the loading message
function showLoad() {
    var loaddiv = document.getElementById("loaddiv");
    if (loaddiv == null) {
        alert("Sorry can't find your loaddiv");
        return;
    }
    //div found
    loaddiv.style.visibility = "visible";
}

//Legenda default
function constroiLegenda() {

    return "<b>Legenda</b><br><span style='background-color:rgb(116,196,118)' class='gpmCaixaCor'></span><span class='spanLegenda'>217583-6491851</span></br><span style='background-color:rgb(65,171,93)' class='gpmCaixaCor'></span><span class='spanLegenda'>6491851-12766119</span></br><span style='background-color:rgb(35,139,69)' class='gpmCaixaCor'></span><span class='spanLegenda'>12766119-19040387</span></br><span style='background-color:rgb(0,109,44)' class='gpmCaixaCor'></span><span class='spanLegenda'>19040387-25314655</span></br><span style='background-color:rgb(0,68,27)' class='gpmCaixaCor'></span><span class='spanLegenda'>25314655-31588925</span></br>";
}
/**
 * The CenterControl adds a control to the map that recenters the map on Chicago.
 * This constructor takes the control DIV as an argument.
 * @constructor
 */
function CenterControl(controlDiv, map, legenda) {

    // Set CSS for the control border.
    controlUI = document.createElement('div');
    controlUI.style.backgroundColor = '#fff';
    controlUI.style.border = '2px solid #fff';
    controlUI.style.borderRadius = '3px';
    controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
    controlUI.style.cursor = 'pointer';
    controlUI.style.margin = '10px';
    controlUI.style.textAlign = 'center';
    controlUI.style.width = '150px';
    controlUI.title = 'Click to recenter the map';
    controlDiv.appendChild(controlUI);

    // Set CSS for the control interior.
    controlText = document.createElement('div');
    controlText.style.color = 'rgb(25,25,25)';
    controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
    controlText.style.fontSize = '12px';
    controlText.style.lineHeight = '20px';
    controlText.style.paddingLeft = '5px';
    controlText.style.paddingRight = '5px';
    controlText.innerHTML = legenda;
    controlUI.appendChild(controlText);



}
//altera lgenda
function alteraLegenda(legenda) {
    controlText.innerHTML = legenda;
}
//altera titulo no mapa
function alteraTitulo(titulo) {
    controlTextTitulo.innerHTML = titulo;
}

/**
 * The CenterControl adds a control to the map that recenters the map on Chicago.
 * This constructor takes the control DIV as an argument.
 * @constructor
 */
function ConfigTitulo(controlDiv, map) {

    // Set CSS for the control border.
    controlUI = document.createElement('div');
    controlUI.style.backgroundColor = '#fff';
    controlUI.style.border = '2px solid #fff';
    controlUI.style.borderRadius = '3px';
    controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
    controlUI.style.cursor = 'pointer';
    controlUI.style.marginBottom = '22px';
    controlUI.style.marginTop = '10px';
    controlUI.style.textAlign = 'center';
    controlUI.title = 'Click to recenter the map';
    controlDiv.appendChild(controlUI);

    // Set CSS for the control interior.
    controlTextTitulo = document.createElement('div');
    controlTextTitulo.style.color = 'rgb(25,25,25)';
    controlTextTitulo.style.fontFamily = 'Roboto,Arial,sans-serif';
    controlTextTitulo.style.fontSize = '16px';
    controlTextTitulo.style.lineHeight = '38px';
    controlTextTitulo.style.paddingLeft = '5px';
    controlTextTitulo.style.paddingRight = '5px';
    controlTextTitulo.innerHTML = 'Análise De Dados';
    controlUI.appendChild(controlTextTitulo);


}

//Para processamento dinamico
function stopProcessamento() {
    clearInterval(configInterval);
}

//Para processamento
function stopIntervalMap1() {
    clearInterval(intervalMap1);
}

//para mapa 11
function stopMap1() {
    clearInterval(map1);
}

//Execut depois dos mapas estiverem carregados
function verifyLoadMaps() {
	hideLoad();

    if (tipoIteracao == 0) {
        initLoadMap();
    } else if (flagLoadMaps == 1 && tipoIteracao == 1) {
        initLoopMaps();
    }
}