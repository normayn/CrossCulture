/**
 * Created by nerminyildiz on 16.04.2016.
 * Function: creating story map, markers, popup content and sidebars
 */

//locate me button for story map
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

//story map
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

    // var infoWindow = new google.maps.InfoWindow({minWidth: 300, maxWidth: 350});


    // Change this depending on the name of your PHP file
    downloadUrl("../php/genstorymap.php", function (data) {
        var xml = data.responseXML;
        var markers = xml.documentElement.getElementsByTagName("marker");
        var b = culture;
        for (var i = 0; i < markers.length; i++) {
            var title = markers[i].getAttribute("tit");
            var text = markers[i].getAttribute("descp");
            var pic = markers[i].getAttribute("img");
            var postdate = markers[i].getAttribute("pdate");
            var cultur = markers[i].getAttribute("cul");
            var uname = markers[i].getAttribute("user");
            var point = new google.maps.LatLng(
                parseFloat(markers[i].getAttribute("lat")),
                parseFloat(markers[i].getAttribute("lon")));
            //document.write(type);


            //content of the story popup
            var popupdiv =  '<div><img onclick="closepop();" src="../images/close_btn.jpeg" height="20px" style="float: right; margin-top: 2px; margin-right: 2px;"></div>' +
                '<div id="popupdiv" style="text-align: center; margin-top: 7px;">'+
                '<h2>'+title+'</h2></div>'+
                '<div style="text-align: center"><b>'+cultur+' Story</b></div>'+
                '<div style="text-align: center"><b>Posted by: '+uname+'</b></div>'+
                '<div style="text-align: center; margin-top: 7px;" ><img src="'+pic+'" height="200px"></div>'+
                '<div class="show-read-more" style="text-align: center; margin-left: 30px; margin-right: 30px; margin-top: 7px;"><b>'+text+'</b></div>'+
                '<div style="text-align: center; margin-top: 7px; margin-bottom: 7px;"><b>Posted on: '+postdate.substr(8,2)+'/'+
                postdate.substr(5,2)+'/'+postdate.substr(0,4) +'</b></div>';

            //
            // var html = '<div id="iw-container">' +
            //     '<div class="iw-title">' + title + '</div>' +
            //     '<img src="../photos/'+pic+'" width="300px;"></div>'+
            //     '<div align="center" class="iw-content">' +
            //     '<p>'+  text +'</p>'+
            //     '<div class="iw-bottom-gradient">' +
            //     '</div>';


            //content of the sidebar items
            var html1 = '<div id="container" style="text-align: center">' +
                '<h3 style="color: black">' + title + '</h3>' +
                '<div class="row" style="color: black">'+ cultur+ ' Story</div>' +
                '<div class="row" style="color: black">Posted by:'+ uname+ '</div>' +
                '<div class="row" style="color: black">' +'<img src="' + pic + '" height="150" class="img-rounded" style="max-width: 90%" onerror="imgError(this);">' + '</div>' +
                '</div>';;

            if ((cultur == b && b == 'Greek') || cultur == b && b == 'Chinese' || cultur == b && b == 'Turkish' || cultur == b && b == 'Indian' || cultur == b && b == 'Italian' || b=='test') {

                if (cultur == 'Greek') {
                    var icon1 = '../images/Greece48.png';
                }
                else if (cultur == 'Chinese') {
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


                bindPopup(marker,map,popupdiv,point);
                // bindInfoWindow(marker, map, infoWindow, html);
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

    //binding popup windows to markers
    function bindPopup(marker,map,popupdiv,point) {
        google.maps.event.addListener(marker, 'click', function(){
            story('show',popupdiv);
            //map.setCenter(point);
            // window.document.write(popupdiv);
        })
        google.maps.event.addListener(map, 'click', function(){
            story('hide');
            // window.document.write(popupdiv);
        })


    }
    // function bindInfoWindow(marker, map, infoWindow, html) {
    //     google.maps.event.addListener(marker, 'click', function () {
    //         infoWindow.setContent(popupdiv);
    //         infoWindow.open(map, marker);
    //         if(this.sidebarButton)this.sidebarButton.button.focus();
    //     });
    //
    //
    //     google.maps.event.addListener(map, 'click', function () {
    //         infoWindow.close();
    //     });
    //
    //
    // }
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

//creating sidebar items
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

function closepop() {
    story('hide');

}