<?php 
// Dynamically load class
spl_autoload_register( function( $class_name ) {
    $file_name = $_SERVER['INCLUDE_PATH'].$class_name.'.php';
	if( file_exists( $file_name ) ) {
		require_once $file_name;
	}
});