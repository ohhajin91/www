 window.onload = function() {
    let container = document.getElementById('map');
    let options = {
        center: new daum.maps.LatLng(37.548530,126.932162),
        level: 2
    };

    let map = new daum.maps.Map(container, options);
    
    let mapTypeControl = new daum.maps.MapTypeControl();
    map.addControl(mapTypeControl, daum.maps.ControlPosition.TOPRIGHT);

    let zoomControl = new daum.maps.ZoomControl();
    map.addControl(zoomControl, daum.maps.ControlPosition.RIGHT);
    
    let markerPosition  = new daum.maps.LatLng(37.548530,126.932162); 
    let marker = new daum.maps.Marker({
        position: markerPosition
    });

    marker.setMap(map);
    
    let overlay = new daum.maps.CustomOverlay({
        map: map,
        position: marker.getPosition()       
    });
}