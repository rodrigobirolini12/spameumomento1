//This is used to get the actual breaks needed:
function getQuantilesBreaks(dataList, numClass, decimals){
	
	//sort the data list from small to large
	dataList.sort(sortNumber);

	//determine interval
	var interval = dataList.length/numClass;

	//determine the classes
	var kclass = [];
	var pot = Math.pow( 10, decimals );
	j = 0;
	for( var i=0; i<numClass; i++ ) {
		j = Math.round( i*interval );
		kclass[i] = Math.round( parseFloat( dataList[j] ) * pot) / pot  ;
	}
	kclass[i] = Math.round(parseFloat(dataList[dataList.length-1] ) * pot) / pot;

	//remove repetitions 
	i=0;
	while( i<kclass.length-1 ) {
		if( kclass[i] == kclass[i+1]) {
			kclass.splice(i+1,1);
			i=-1;
		}
		i++;
	}

	return kclass;	
}