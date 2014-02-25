<?php
/*
Plugin Name: DL Block Right Mouse Button
Description: Плагин блокирует контекстное меню при нажатии правой кнопки мыши выводя предупреждение
Plugin URI: http://vcard.dd-l.name/wp-plugins/
Version: 1.2
Author: Dyadya Lesha (info@dd-l.name)
Author URI: http://dd-l.name
*/


add_action("wp_head", "dl_block_right_mouse_button");

function dl_block_right_mouse_button() {
	if ( !is_user_logged_in() ) { 
		add_action("wp_footer", "dl_block_right_mouse_button_script");
	};
};

function dl_block_right_mouse_button_script() { ?>
<script language="JavaScript" type="text/javascript"> 
	<!--
    if (document.all) { }
    else if (document.getElementById) { 
		document.captureEvents(Event.MOUSEDOWN)
    }
    else if (document.layers) {
		document.captureEvents(Event.MOUSEDOWN)
    }
document.onmousedown = mousedown_handler
function mousedown_handler(mouse_event) {

	// This is the message that will appear
    var no_right_click = "Извините, но правый клик у нас запрещен!"

	if (document.all) {
	//Probably Internet Explorer 4 and later
		if (event.button == 2 || event.button == 3) {
			alert(no_right_click)
			return false
		}
    }
    else if (document.getElementById) { 
	// Probably Netscape 6 and later
		if (mouse_event.which == 3) {
			alert(no_right_click)
			return false
		}
    }
    else if (document.layers) {
// Probably Netscape 4
		if (mouse_event.which == 3) {
			alert(no_right_click)
			return false
			}
		}
    }    
//-->

var isCtrl = false;
document.onkeyup=function(e){ if(e.which == 17) isCtrl=false; }
document.onkeydown=function(e) {
    if(e.which == 17) isCtrl=true;
    if(e.which == 67 && isCtrl === true) {
        alert("Извините, но 'Ctrl + C' у нас запрещен!"); 
    }
}
</script>
<?php }