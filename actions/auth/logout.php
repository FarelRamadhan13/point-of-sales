<?php 

require '../../system/action.php';

session_start();
session_destroy();
redirect('/login');