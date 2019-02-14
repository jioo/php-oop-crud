<?php 
include 'Includes/header.php'; 

if ( isset($_SESSION['current_user']) ) {
    var_dump($_SESSION['current_user']);
} else {
    echo 'Unauthorized User';
}
?>