/**
 * Created by Xiao on 17/04/2016.
 * Function: show/hide property of the login popup
 */

function login(showhide){
    if(showhide == "show"){
        document.getElementById('popupbox').style.visibility="visible";
    }else if(showhide == "hide"){
        document.getElementById('popupbox').style.visibility="hidden";
    }
}