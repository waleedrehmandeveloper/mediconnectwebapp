<?php
session_start();         // Session start karo
session_unset();         // Sare session variables remove karo
session_destroy();       // Session destroy karo

// User ko login/signin page pe redirect karo
header("Location: signin.php");
exit();
?>
