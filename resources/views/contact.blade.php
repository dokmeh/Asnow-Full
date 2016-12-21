<div class="map" id="googleMap">

</div>
<div class="contact-container">
    <div class="logo-h">
        <img src="img/logo-dark.svg" alt=""/>
    </div>
    <div class="infos">
        <a href="call:+982122882288">Tel | +982122882288</a>
        <a href="call:+982122882288">Fax | +982122882288</a>
        <a href="mailto:info@aznow.ir">Email | info@aznow.ir</a>
        <a href="#">Address | Tehran, Iran</a>
        <a class="insta" href="#"><img class="insta" src="img/instagram.svg" alt=""/></a>
    </div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAohZK1o3-gNzk1hkee21a4miYPWhH_1vA&callback=initMap"></script>
<script type="text/javascript">
    var rena = new google.maps.LatLng(35.789032, 51.485682);
    var marker;
    // Add a Home control that returns the user to London
    function HomeControl(controlDiv, map) {
        controlDiv.style.padding        = '5px';
        var controlUI                   = document.createElement('div');
        controlUI.style.backgroundColor = '#4F4F4F';
        controlUI.style.color           = '#fff';
        controlUI.style.border          = '1px solid';
        controlUI.style.cursor          = 'pointer';
        controlUI.style.textAlign       = 'center';
        controlUI.title                 = 'Set map to Rena';
        controlDiv.appendChild(controlUI);
        var controlText                = document.createElement('div');
        controlText.style.fontFamily   = 'sans-serif';
        controlText.style.fontSize     = '12px';
        controlText.style.paddingLeft  = '4px';
        controlText.style.paddingRight = '4px';
        controlText.innerHTML          = '<b>&lt; We are here ... ! &gt;<b>'
        controlUI.appendChild(controlText);

        // Setup click-event listener: simply set the map to London
        google.maps.event.addDomListener(controlUI, 'click', function () {
            map.setCenter(rena);
            map.setZoom(17);
        });

    }
    function initialize() {
        var mapProp        = {
            center   : rena,
            zoom     : 12,
            styles   : [
                {
                    "featureType": "administrative",
                    "elementType": "labels.text.fill",
                    "stylers"    : [{
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers"    : [{"hue": "#71ABC3"}, {"saturation": -10}, {"lightness": -21}, {"visibility": "simplified"}]
                    }, {
                        "featureType": "landscape.natural",
                        "elementType": "geometry",
                        "stylers"    : [{"hue": "#7DC45C"}, {"saturation": 37}, {"lightness": -41}, {"visibility": "simplified"}]
                    }, {
                        "featureType": "landscape.man_made",
                        "elementType": "geometry",
                        "stylers"    : [{"hue": "#C3E0B0"}, {"saturation": 23}, {"lightness": -12}, {"visibility": "simplified"}]
                    }, {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers"    : [{"hue": "#A19FA0"}, {"saturation": -98}, {"lightness": -20}, {"visibility": "off"}]
                    }, {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers"    : [{"hue": "#FFFFFF"}, {"saturation": -100}, {"lightness": 100}, {"visibility": "simplified"}]
                    }]
                }
            ],
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map            = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        // Create a DIV to hold the control and call HomeControl()
        var homeControlDiv = document.createElement('div');
        var homeControl    = new HomeControl(homeControlDiv, map);
//  homeControlDiv.index = 1;
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(homeControlDiv);
        var marker = new google.maps.Marker({
            position : rena,
            icon     : 'img/pin.png',
            animation: google.maps.Animation.DROP
        });

        marker.setMap(map);
        google.maps.event.addListener(marker, 'click', function () {
            map.setZoom(17);
            map.setCenter(marker.getPosition());
        });
    }
    //google.maps.event.addDomListener(window, 'load', initialize);
    $('document').ready(function () {
        initialize();
    })
</script>
