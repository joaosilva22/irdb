function initMap() {
    let div = document.getElementById('map') || false;

    if (div) {
	let lat = div.getAttribute('lat');
	let lng = div.getAttribute('lng');
	let uluru = {lat: parseFloat(lat), lng: parseFloat(lng)};
	let map = new google.maps.Map(div, {
	    zoom: 15,
	    center: uluru
	});
	let marker = new google.maps.Marker({
	    position: uluru,
	    map: map
	});
    }
}

