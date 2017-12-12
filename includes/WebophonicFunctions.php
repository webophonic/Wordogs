<?php

function readPostParameter($key,$default = null){
  return !isset($_POST[$key])?$default:strip_tags($_POST[$key]);
}

function readGetParameter($key,$default= null){
  return !isset($_REQUEST[$key])?$default:strip_tags($_REQUEST[$key]);
}


function readParameter($key,$default = null){
 $_POSTValue = readPostParameter($key,null);
 if (!is_null($_POSTValue)) {
   return $_POSTValue;
 }
 $_REQUESTValue = readGetParameter($key,null);
 if (!is_null($_REQUESTValue)){
 	return $_REQUESTValue;
 }
 return $default;
}

function webophonic_insertTerm($term,$taxonomy,$args=null,$field='name'){
	$termFound = get_term_by($field,$term,$taxonomy);
    if (!$termFound) {
    	if (!is_null($args)) {
        wp_insert_term( $term, $taxonomy,$args);
   		} else {
    	wp_insert_term( $term, $taxonomy);
    	}
    } 
}

?>