<?php
    require_once('../../../private/initialize.php');
    if (is_post_request()) {
        $menu_name = $_POST['menu_name'] ?? '';
        $position  = $_POST['position']  ?? '';
        $visible   = $_POST['visible']   ?? '';

        
    echo "Frorm Parameter <br />";
    echo "Menu name: " . $menu_name . "<br />";
    echo "Position: "  . $position  . "<br />";
    echo "Visible: "   . $visible   . "<br />";
    }
    else{
        redirect_to(url_for('/staff/pages/index.php'));
    }


?>