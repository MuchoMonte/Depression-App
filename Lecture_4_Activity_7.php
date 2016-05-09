<?php

// str_replace method

$string = 'The quick brown fox jumps over the lazy dog'; 
echo str_replace('fox', 'cat', $string).'<br>';

// preg_replace method for multiple replacements

$string2 = 'The quick brown fox jumps over the lazy dog';
$patterns = array();
$patterns[0] = '/fox/';
$replacements = array();
$replacements[0] = 'cat';
echo preg_replace($patterns, $replacements, $string).'<br>';

// preg_replace for singular replacement (simpler than previous method)

$string3 = 'The quick brown fox jumps over the lazy dog';
$original = '/fox/';
$replace = 'cat';
echo preg_replace($original, $replace, $string3).'<br>';

// preg_replace method for multiple replacements

$string2 = 'The quick brown fox jumps over the lazy dog';
$patterns = array();
$patterns[0] = '/fox/';
$patterns[1] = '/dog/';
$replacements = array();
$replacements[0] = 'cat';
$replacements[1] = 'mouse';
echo preg_replace($patterns, $replacements, $string).'<br>';

?>