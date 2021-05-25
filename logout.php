<?php 
//This includes the session_start() to resume the session on this page.
include_once 'includes/session.php'?>
<?php 
// session_destroy() destroys the session. 
    session_destroy();
    header('Location: login.php');
?>