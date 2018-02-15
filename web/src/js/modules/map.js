let startCoord;
let markerList;
let map;
let pinPath;
let mapApiKey;
const initMap = () => {
    var mapOptions = {
        center: startCoord,
        zoom: 16,
        panControl: false,
        zoomControl: true,
        scaleControl: false,
        scrollwheel: false,
        streetViewControl: false,
        disableDoubleClickZoom: true,
        mapTypeControl: false,
        gestureHandling: 'cooperative',
        fullscreenControl: false,
        zoomControlOptions: {
            style: google.maps.ZoomControlStyle.SMALL,
            position: google.maps.ControlPosition.RIGHT_BOTTOM
        }
    };

    // headquarter pin
    var pinImagePath = pinPath;
    var dynamicMarkerIcon = new google.maps.MarkerImage(pinImagePath, null, null, null, new google.maps.Size(29, 44));

    map = new google.maps.Map(document.getElementById("map"), mapOptions);
    map.setOptions({
        styles: [
            {
                "featureType": "landscape",
                "stylers": [
                    {
                        "hue": "#FFBB00"
                    },
                    {
                        "saturation": 43.400000000000006
                    },
                    {
                        "lightness": 37.599999999999994
                    },
                    {
                        "gamma": 1
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "stylers": [
                    {
                        "hue": "#FFC200"
                    },
                    {
                        "saturation": -61.8
                    },
                    {
                        "lightness": 45.599999999999994
                    },
                    {
                        "gamma": 1
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "stylers": [
                    {
                        "hue": "#FF0300"
                    },
                    {
                        "saturation": -100
                    },
                    {
                        "lightness": 51.19999999999999
                    },
                    {
                        "gamma": 1
                    }
                ]
            },
            {
                "featureType": "road.local",
                "stylers": [
                    {
                        "hue": "#FF0300"
                    },
                    {
                        "saturation": -100
                    },
                    {
                        "lightness": 52
                    },
                    {
                        "gamma": 1
                    }
                ]
            },
            {
                "featureType": "water",
                "stylers": [
                    {
                        "hue": "#0078FF"
                    },
                    {
                        "saturation": -13.200000000000003
                    },
                    {
                        "lightness": 2.4000000000000057
                    },
                    {
                        "gamma": 1
                    }
                ]
            },
            {
                "featureType": "poi",
                "stylers": [
                    {
                        "hue": "#00FF6A"
                    },
                    {
                        "saturation": -1.0989010989011234
                    },
                    {
                        "lightness": 11.200000000000017
                    },
                    {
                        "gamma": 1
                    }
                ]
            }
        ]
    });

    // hotel pin
    markerList.forEach(function(marker){
        if (marker.latitude && marker.longitude) {
            new google.maps.Marker({
                position: startCoord,
                map: map,
                icon: dynamicMarkerIcon,
                title: 'Holiday Inn Makati'
            });
        }
    });
};
const init = (mapDataInfo) => {
    var mapInit = false;
        startCoord = mapDataInfo.startingInfo;
        markerList = mapDataInfo.markerList;
        pinPath = mapDataInfo.pinPath;
        mapApiKey = mapDataInfo.mapApiKey;
        if (!window.google || !window.google.maps || !mapInit) {
            //Load google and init
            var script = document.createElement( 'script' );
            script.type = 'text/javascript';
            script.src = 'https://maps.googleapis.com/maps/api/js?key='+mapApiKey+'&sensor=false&callback=startMap&language=en&region=US';
            script.async = true;
            script.defer = true;
            $("#map").append(script);
            mapInit = true;
        } else {
            google.maps.event.addDomListener(window, 'resize', function() {
                map.setCenter(new google.maps.LatLng(markerList[0].latitude, markerList[0].longitude));
            });
        }
};

export { init ,initMap};