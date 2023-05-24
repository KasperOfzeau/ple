<?php
session_start(); 
session_destroy(); 
header('location: /ple/index.php');