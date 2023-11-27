<?php
session_start();
session_destroy();
echo "Session Destroyed";

header("location:login.html");

?>