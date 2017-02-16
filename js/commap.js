/**
 * Created by nerminyildiz on 5.04.2016.
 * function: Create community map and its sidebar
 */

//locate me button for the map
function CenterControl(controlDiv, map) {

    // Set CSS for the control border.
    var controlUI = document.createElement('div');
    // controlUI.style.backgroundColor = '#fff';
    // controlUI.style.border = '2px solid #fff';
    // controlUI.style.borderRadius = '3px';
    // controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
    controlUI.style.cursor = 'pointer';
    // controlUI.style.marginBottom = '2px';
    controlUI.style.marginLeft = '880px';
    controlUI.style.marginTop = '20px';
    controlUI.style.textAlign = 'center';
    controlUI.title = 'Click to see your location';
    controlDiv.appendChild(controlUI);

    // Set CSS for the control interior.
    var controlText = document.createElement('div');
    controlText.style.color = 'rgb(25,25,25)';
    controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
    controlText.style.fontSize = '16px';
    controlText.style.lineHeight = '38px';
    controlText.style.paddingLeft = '5px';
    controlText.style.paddingRight = '5px';
    controlText.innerHTML = '<img src="../images/locateme.png" width="30px">';
    controlUI.appendChild(controlText);

    // Setup the click event listeners: simply set the map to Chicago.
    controlUI.addEventListener('click', function() {
        navigator.geolocation.getCurrentPosition(function(position) {

            var geolocate = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

            var marker = new google.maps.Marker({
                map: map,
                position: geolocate
            });

            map.setCenter(geolocate);

        });
    });


}

function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)", "i"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}

function isRealValue(obj){
    return obj && obj !== "null" && obj!== "undefined";
}

function firstLoad(){

    var clt = getParameterByName('clt');
    if(clt == null){
        load('test');

    }else{
        //alert(clt);
        load(clt);
    }
}

//community map
function load(culture) {

    //alert(culture);
    var markerBounds = new google.maps.LatLngBounds();
    var markerArray = [];
    var map = new google.maps.Map(document.getElementById("map-canvas"), {
        center: new google.maps.LatLng(-37.814396, 144.963616),
        zoom: 13,
        mapTypeId: 'roadmap',
        minZoom: 9
        // maxZoom: 14
    });
    //map.setMyLocationEnabled(true);
    //test(map);

    map.set('styles', [
        {
            featureType: 'all',
            elementType: 'all',
            stylers: [
                { hue: '' },
                { lightness: -5 },
                { saturation: 10 },
                { gamma: 0.8}
            ]
        }
    ]);

    var centerControlDiv = document.createElement('div');
    var centerControl = new CenterControl(centerControlDiv, map);

    centerControlDiv.index = 1;
    map.controls[google.maps.ControlPosition.TOP_CENTER].push(centerControlDiv);



    var sidebar = document.getElementById("sidebar");
    sidebar.innerHTML="";

    var infoWindow = new google.maps.InfoWindow({minWidth: 300, maxWidth: 350});


    // Change this depending on the name of your PHP file
    downloadUrl("../php/gencommap.php", function (data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        var b = culture;
        for (var i = 0; i < markers.length; i++) {
            var name = markers[i].getAttribute("comname");
            var address = markers[i].getAttribute("comaddress");
            var phone = markers[i].getAttribute("comphone");
            var website = markers[i].getAttribute("web");
            var cultur = markers[i].getAttribute("cul");
            var point = new google.maps.LatLng(
                parseFloat(markers[i].getAttribute("lat")),
                parseFloat(markers[i].getAttribute("lon")));
            //document.write(type);

            //content of the infowindow on map
            var html = '<div id="iw-container">' +
                '<div class="iw-title">' + name + '</div>' +
                '<div align="center" class="iw-content">' +
                '<p class="iw-subTitle">Address</p>'+ address+
                '<br><p class="iw-subTitle">Phone</p>'+ phone+
                '<br><br><a href="'+website+'" target="_blank">Visit Their Website'+
                '</div>' +
                '<div class="iw-bottom-gradient"></div>' +
                '</div>';

            //content of the sidebar
            var html1 = '<div id="container" style="text-align: center">' +
                '<h3 style="color: black">' + name + '</h3>' +
                '<div class="row" style="color: black"><b>Address</b><br>'+ address+
                '</div><br><div class="row" style="color: black"><b>Phone</b><br>'+ phone+
                '</div><br><div class="row"><a href="'+website+'" target="_blank">Visit Their Website</a></div>'+
                '</div>';;


            if ((cultur == b && b == 'Greek') || cultur == b && b == 'China' || cultur == b && b == 'Turkish' || cultur == b && b == 'Indian' || cultur == b && b == 'Italian' || b=='test') {

                if (cultur == 'Greek') {
                    var icon1 = '../images/Greece48.png';
                }
                else if (cultur == 'China') {
                    var icon1 = '../images/China48.png';
                }
                else if (cultur == 'Turkish') {
                    var icon1 = '../images/Turkey48.png';
                }
                else if (cultur == 'Indian') {
                    var icon1 = '../images/India48.png';
                }
                else if (cultur == 'Italian') {
                    var icon1 = '../images/Italy48.png';
                }

                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    icon: icon1
                });
                var options={
                    sidebarItem: html1,
                    sidebarItemWidth: "100%"
                }
                marker.setOptions(options);

                bindInfoWindow(marker, map, infoWindow, html, point);
                var idleIcon = marker.getIcon();

                if(options.sidebarItem){
                    marker.sidebarButton = new SidebarItem(marker, options);
                    marker.sidebarButton.addIn("sidebar");
                }
                markerBounds.extend(point);
                markerArray.push(marker);
            }

        }


    });

    //binding infowindow and markers into map
    function bindInfoWindow(marker, map, infoWindow, html, point) {
        google.maps.event.addListener(marker, 'click', function () {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
            map.setCenter(point);
            if(this.sidebarButton)this.sidebarButton.button.focus();
        });


        google.maps.event.addListener(map, 'click', function () {
            infoWindow.close();
        });


    }
}

function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function () {
        if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
        }
    };

    request.open('GET', url, true);
    request.send(null);
}

function doNothing() {
}

//generating sidebar
function SidebarItem(marker, opts){
    var tag = opts.sidebarItemType || "button";
    var row = document.createElement(tag);
    row.innerHTML = opts.sidebarItem;
    row.className = opts.sidebarItemClassName || "sidebar_item";
    row.style.display = "block";
    row.style.width = opts.sidebarItemWidth || "120px";
    row.onclick = function(){
        google.maps.event.trigger(marker, 'click');
    }
    row.onmouseover = function(){
        google.maps.event.trigger(marker, 'mouseover');
    }
    row.onmouseout = function(){
        google.maps.event.trigger(marker, 'mouseout');
    }
    this.button = row;
}
// adds a sidebar item to a

SidebarItem.prototype.addIn = function(block){

    this.div= document.getElementById("sidebar");
    this.div.appendChild(this.button);
}
// deletes a sidebar item
SidebarItem.prototype.remove = function(){
    if(!this.div) return false;
    this.div.removeChild(this.button);
    return true;
}

