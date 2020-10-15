<?php
session_start();
//extract session data if fruit was selected / form was submitted
if (isset($_SESSION['results'])) {
    extract($_SESSION['results']);
    $haveFruit = true;
} else {
    $haveFruit = false;
}
//reset game data for next page load
$_SESSION['results'] = null;


require 'index-view.php';