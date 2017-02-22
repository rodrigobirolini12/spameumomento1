//Script modified from Python script here: http://danieljlewis.org/files/2010/06/Jenks.pdf
//Original Python script by Daniel Lewis: http://danieljlewis.org/2010/06/07/jenks-natural-breaks-algorithm-in-python/

//use to get the index from a value in an array - gets the first occurence:
Array.prototype.findIndex = function(value){
	var ctr = "";
	for(var i=0;i<this.length;i++){
		// use === to check for Matches. ie., identical (===), ;
		if (this[i] == value) {
			return i;
		}
	}
	return ctr;
};

//this returns a number which represents the "goodness" of the variance fit:
function getGVF(featureSet,attribute,numClass){
	//The Goodness of Variance Fit (GVF) is found by taking the 
  //difference between the squared deviations
  //from the array mean (SDAM) and the squared deviations from the 
  //class means (SDCM), and dividing by the SDAM
	//numClass = number of classes - keep it low (<7)
	//add the numeric data to analyze to the dataList from the featureSet:
	var dataList = []
	for(n=0,nl=featureSet.features.length;n<nl;n++){
		dataList.push(featureSet.features[n].attributes[attribute])
	}
	
	//get the breaks:
  //THIS IS WHAT IS USED TO RENDER THE MAP:
	var breaks = getJenksBreaks(dataList, numClass)

	//the rest of this will calculate the fit:
	//Use for statistical analysis of the fit - don't really need to render the map
	dataList.sort()
	
	//this gets the squared deviations from the array mean (listmean) = SDAM
		//add up the values in the dataList then divide by the length:
	var listMean = sum(dataList)/dataList.length

	var SDAM = 0.0
	//now iterate through all the values and add up the sqDev to get the SDAM:
	for(var i=0,il=dataList.length; i<il; i++){
		//this gets the sqDev: Math.pow,2 = square the (value - listMean) for each value in the list:
		var sqDev = Math.pow((dataList[i] - listMean),2)
    SDAM += sqDev
	}
  
	//this gets the squared deviation of the class means - for each of the classes (should only use up to 7)
	var SDCM = 0.0
	for(var x=0,xl=numClass;x<xl;x++){
		if(breaks[x] == 0){
			var classStart = 0
    }else{
			var classStart = dataList.findIndex(breaks[x])
			classStart += 1
		}
    var classEnd = dataList.findIndex(breaks[x+1])

		//need to put the range of values into this array:
    //var classList = dataList[classStart:classEnd+1]
		var classList = dataList.slice(classStart,classEnd+1)
    var classMean = sum(classList)/classList.length
		
		var preSDCM = 0.0
		//now iterate through the classList and add up the sqDev to get the SDCM:
		for(var j=0,jl=classList.length;j<jl;j++){
	    var sqDev2 = Math.pow((classList[j] - classMean),2)
      preSDCM += sqDev2
		}
		SDCM += preSDCM
	}

	//gets the fit:
	var varFit = (SDAM - SDCM)/SDAM
	console.log("varianceFit:",varFit)

	//only return the breaks for the map:
	return breaks;
}

//This is used to get the actual breaks needed:
//Rotina original: http://danieljlewis.org/files/2010/06/Jenks.pdf
//Adaptação para JS: http://kgs.uky.edu/kgsmap/includes_jsAPI/jenks.js
//Citado por https://github.com/simogeo/geostats/pull/6
function getJenksBreaks(dataList, numClass, decimals){

	//sort the data list from small to large
	dataList.sort(sortNumber);
	
	//now iterate through the datalist:
	//determine mat1 and mat2
	//really not sure how these 2 different arrays are set - the code for each seems the same!
	//but the effect are 2 different arrays: mat1 and mat2
	var mat1 = [];
	for(var x=0,xl=dataList.length+1;x<xl;x++){
		var temp = []
		for(var j=0,jl=numClass+1;j<jl;j++){
			temp.push(0);
		}
		mat1.push(temp);
	}

	var mat2 = [];
	for(var i=0,il=dataList.length+1;i<il;i++){
		var temp2 = [];
		for(var c=0,cl=numClass+1;c<cl;c++){
			temp2.push(0);
		}
		mat2.push(temp2);
	}
	
	//absolutely no idea what this does - best I can tell, it sets the 1st group in the 
	//mat1 and mat2 arrays to 1 and 0 respectively
	for(var y=1,yl=numClass+1;y<yl;y++){
		mat1[0][y] = 1;
		mat2[0][y] = 0;
		for(var t=1,tl=dataList.length+1;t<tl;t++){
			mat2[t][y] = Infinity;
		}
		var v = 0.0;
	}
	
	//and this part - I'm a little clueless on - but it works
	//pretty sure it iterates across the entire dataset and compares each value to
	//one another to and adjust the indices until you meet the rules: minimum deviation 
	//within a class and maximum separation between classes
	for(var l=2,ll=dataList.length+1;l<ll;l++){
		var s1 = 0.0;
		var s2 = 0.0;
		var w = 0.0;
		for(var m=1,ml=l+1;m<ml;m++){
			var i3 = l - m + 1;
			var val = parseFloat(dataList[i3-1]);
			s2 += val * val;
			s1 += val;
			w += 1;
			v = s2 - (s1 * s1) / w;
			var i4 = i3 - 1;
			if(i4 != 0){
				for(var p=2,pl=numClass+1;p<pl;p++){
					if(mat2[l][p] >= (v + mat2[i4][p - 1])){
						mat1[l][p] = i3;
						mat2[l][p] = v + mat2[i4][p - 1];
					}
				}
			}
		}
		mat1[l][1] = 1;
		mat2[l][1] = v;
	}

	var k = dataList.length;
	var kclass = [];

	//fill the kclass (classification) array with zeros:
	for(i=0,il=numClass+1;i<il;i++){
		kclass.push(0);
	}

  //this is the last number in the array:
	kclass[numClass] = parseFloat(dataList[dataList.length - 1]);
	//this is the first number - can set to zero, but want to set to lowest to use for legend:
	kclass[0] = parseFloat(dataList[0]);
	var countNum = numClass;
	while(countNum >= 2){
		var id = parseInt((mat1[k][countNum]) - 2);
		kclass[countNum - 1] = dataList[id];
		k = parseInt((mat1[k][countNum] - 1));
		//spits out the rank and value of the break values:
		//console.log("id="+id,"rank = " + String(mat1[k][countNum]),"val = " + String(dataList[id]))
		//count down:
		countNum -= 1;
	}
			

	// Arredonda os valores			
	var pot = Math.pow( 10, decimals );
	for( i=0; i<kclass.length; i++ )
		kclass[i] = Math.round( kclass[i] * pot) / pot;
		
	//remove repetitions and zeros at the end
	for( i=kclass.length-1; i>0; i-- ) 
		if( kclass[i-1] >= kclass[i] )
			kclass.splice(i,1);

	return kclass; //array of breaks
}

//a sum function:
function sum(arr) {
  var result = 0, n = arr.length || 0; //may use >>> 0 to ensure length is Uint32
  while(n--) {
    result += +arr[n]; // unary operator to ensure ToNumber conversion
  }
  return result;
}

//sorting function - ascending numbers:
function sortNumber(a,b){
	return a - b;
}

