<!-- initialize session_start()  -->
<?php
    session_start();
    ini_set('session.gc_maxlifetime', 3600);
    session_set_cookie_params(3600);
?>