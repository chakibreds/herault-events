var long = 0;
var lat = 0;



   






$().ready(function () {
    console.log("ok");

    $.getJSON("js/JSON/map.json", function (data) {
        console.log("ok");
        $.each(data, function (indice, entry) {
            lat = entry["lat"];
            long = entry["long"];
            var marker = document.querySelector("#marker");
            var map = new ol.Map(
                {
                    target: 'map',
                    layers: [
                        new ol.layer.Tile(
                            { source: new ol.source.OSM() }
                            )
                        ],
                        view: new ol.View(
                        {
                            center: ol.proj.fromLonLat([long,lat]),
                            zoom: 15           //max 11 pour vue satellitaire (sat)
                        }
                    )
                }
            );
            
            map.addOverlay(new ol.Overlay(
                {
                    position: ol.proj.fromLonLat([long, lat]),
                    element: marker
                })
                );
            });
        });
        
        
    });
 