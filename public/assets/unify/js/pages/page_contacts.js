var ContactPage = function () {

    return {
        
    	//Basic Map
        initMap: function () {
			var map;
			$(document).ready(function(){
			  map = new GMaps({
				div: '#map',
				scrollwheel: false,				
				lat: -19.9542175,
				lng: -44.0514538
			  });
			  
			  var marker = map.addMarker({
				lat: -19.9542175,
				lng: -44.0514538,
	            title: 'Company, Inc.'
		       });
			});
        },

        //Panorama Map
        initPanorama: function () {
		    var panorama;
		    $(document).ready(function(){
		      panorama = GMaps.createPanorama({
		        el: '#panorama',
		        lat : -19.9542175,
		        lng : -44.0514538
		      });
		    });
		}        

    };
}();