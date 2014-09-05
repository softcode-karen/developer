<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('out')){
    function out($var,$attr = false){
    	if($attr == true){
	        echo '<pre>';
	        var_dump($var);
	        echo '<pre>';
    	}else{
	        echo '<pre>';
	        print_r($var);
	        echo '<pre>';
    	}		
    }   
}