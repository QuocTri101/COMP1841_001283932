<?php
session_start();
session_destroy(); // Kill session
header('Location: login.php');
exit();