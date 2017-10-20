<?php
class WebAccess {
    function logout()
    {
        unset($_SESSION['fb_access_token']);
        header('Location: index.php');
        exit;
    }
}
