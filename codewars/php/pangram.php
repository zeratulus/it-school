<?php

//function detect_pangram1($string) {
//    $toRemove = ['\\', '/','-','+',' ', ',', '.', '!', '?', '@', '#', '$', '%', '^', '&', '*', '[', ']', '(', ')'] + range(0, 9);
//    $str = str_replace($toRemove,'', $string);
//    $arr = array_unique(str_split(strtolower($str)));
//    return (count($arr) === count(range('a', 'z')));
//}

function detect_pangram($string) {
    $alphas = preg_replace("/[^a-zA-Z]+/", "", $string);
    $arr = array_unique(str_split(strtolower($alphas)));
    return (count($arr) === count(range('a', 'z')));
}

//The quick brown fox jumps over the lazy dog
var_dump(detect_pangram("The quick brown fox jumps over the lazy dog.")); //true
var_dump(detect_pangram("A pangram is a sentence that contains every single letter of the alphabet at least once.")); //false
var_dump(detect_pangram("1L%r+f4G!e7w V z q6M h4d F3b+t O2n e K^g+c#S^i4i X7c-u P5d7j Y6a(a B")); //false

//class MyExampleTestCases extends TestCase {
//  public function testBasicTests() {
//  # Pangrams:
//  $result4 = detect_pangram("The quick brown fox jumps over the lazy dog.");
//  $this->assertEquals(true, $result4);
//  $result5 = detect_pangram("1L%r+f4G!e7w V z q6M h4d F3b+t O2n e K^g+c#S^i4i X7c-u P5d7j Y6a(a B");
//  $this->assertEquals(true, $result5);
//
//  # Not pangrams:
//  $result1 = detect_pangram("A pangram is a sentence that contains every single letter of the alphabet at least once.");
//  $this->assertEquals(false, $result1 );
//  $result2 = detect_pangram("5B!e i J x*p F h d!A:o q D y n6L%u9i.G9f2g4C a h+K!m+z:R t!j:B w s C");
//  $this->assertEquals(false, $result2);
//  }
//}