<?php


session_start(); // remember me

session_destroy(); // destroy me


echo '{"status":1, "message":"successful logged out"}';
