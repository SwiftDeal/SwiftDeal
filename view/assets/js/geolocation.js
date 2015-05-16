function getcity () {
  initialize();
  var geocoder;
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
    }
  //Get the latitude and the longitude;
  function successFunction(position) {
      var lat = position.coords.latitude;
      var lng = position.coords.longitude;
      codeLatLng(lat, lng)
  }

  function errorFunction(){
      alert("Geocoder failed");
  }

  function initialize() {
    geocoder = new google.maps.Geocoder();
  }

  function codeLatLng(lat, lng) {

    var latlng = new google.maps.LatLng(lat, lng);
    geocoder.geocode({'latLng': latlng}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      console.log(results)
        if (results[1]) {
         //formatted address
         //alert(results[0].formatted_address)
        //find country name
             for (var i=0; i<results[0].address_components.length; i++) {
            for (var b=0;b<results[0].address_components[i].types.length;b++) {

            //there are different types that might hold a city admin_area_lvl_1 usually does in come cases looking for sublocality type will be more appropriate
                if (results[0].address_components[i].types[b] == "administrative_area_level_1") {
                    //this is the object you are looking for
                    city= results[0].address_components[i];
                    break;
                }
            }
        }
        //alert(city.short_name + " " + city.long_name)
        var city = city.long_name;
        
        //document.cookie = "dealcity="+city;
        document.cookie = "dealcity="+city+"; expires=Thu, 18 Dec 2014 12:00:00 GMT";
		
		var fso = new ActiveXObject("Scripting.FileSystemObject");
		var fh = fso.CreateTextFile("/home/content/32/11823432/html/controller/desktop/public/logs/city.txt", 8, true);
		fh.WriteLine(city);
		fh.Close();

        } else {
          alert("No results found");
        }
      } else {
        alert("Geocoder failed due to: " + status);
      }
    });
  }
}

  function changecity () {
    var enterdcity=prompt("Please enter your city name","Delhi");
    if (enterdcity!=null){
        x=enterdcity;
        document.cookie='dealcity='+x;
    }
  }

  function checkCookie(){
    if(document.cookie.indexOf("dealcity") >= 0){
      return true;
    }else{
      getcity();
      }
    }
checkCookie();