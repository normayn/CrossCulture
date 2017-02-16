/**
 * Created by nerminyildiz on 21.04.2016.
 * Function: show/hide for story popup window at story page
 * Adding animation for story popup
 */
function story(showhide,html){
    if(showhide == "show"){
        $('.pop-up').removeClass('blur-out');
        $('.pop-up').hide();
        $('.pop-up').fadeIn(1500);
        $('#back').addClass('blur-in');
        document.getElementById('popupdiv').style.visibility="visible";
        document.getElementById('popupdiv').innerHTML = html;
    }else if(showhide == "hide"){
        $('.pop-up').addClass('blur-out');
        // $('#back').removeClass('op');
        $('#back').removeClass('blur-in');
        // e.stopPropagation();
        document.getElementById('popupdiv').style.visibility="hidden";
    }

}

