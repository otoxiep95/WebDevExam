<?php


session_start(); // remember me

session_destroy(); // destroy me

header("Location:index.php");
