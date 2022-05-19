<?php
//https://www.codewars.com/kata/5264d2b162488dc400000001/train/php

function spinWords(string $str): string {
    $words = explode(' ', $str);
    for ($i = 0; $i < count($words); $i++) {
        if (strlen($words[$i]) > 4) $words[$i] = strrev($words[$i]);
    }
    return implode(' ', $words);
}


var_dump(spinWords('This is another tests'));

//class MyTestCases extends TestCase
//{
//    public function testBasicTests() {
//      $this->assertEquals("emocleW", spinWords("Welcome"));
//      $this->assertEquals("Hey wollef sroirraw", spinWords("Hey fellow warriors"));
//      $this->assertEquals("This is a test", spinWords("This is a test"));
//      $this->assertEquals("This is rehtona test", spinWords("This is another test"));
//      $this->assertEquals("You are tsomla to the last test", spinWords("You are almost to the last test"));
//      $this->assertEquals("Just gniddik ereht is llits one more", spinWords("Just kidding there is still one more"));
//      $this->assertEquals("ylsuoireS this is the last one", spinWords("Seriously this is the last one"));
//    }
//}