<!-- disconnection - destroys cookies and session -->
<?php
    include 'session.php';
    session_destroy();
    setcookie(session_name(), null, time() - 86400);
    unset($_COOKIE[session_name()]);

    // not connected anymore, display basic menu
    require 'overallHeader.html';
    include 'menuBar.php';
    include 'content.php';
    require 'overallfooter.php';
?>