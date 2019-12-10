$().ready(function () {
    if (isDouble(lon) && isDouble(lat)) {
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
                        center: ol.proj.fromLonLat([lon, lat]),
                        zoom: 16           //max 11 pour vue satellitaire (sat)
                    }
                )
            }
        );

        map.addOverlay(new ol.Overlay(
            {
                position: ol.proj.fromLonLat([lon, lat]),
                element: marker
            })
        );
    } else {
        // Erreur localisation ne pas afficher la map
        var map = document.querySelector("section.map");
        map.innerHTML = "L'adresse de l'évenement n'a pas été trouvé";
    }
});

function isDouble(n) {
    return Number(n) === n && n % 1 !== 0;
}