<?php
//https://www.codewars.com/kata/51b6249c4612257ac0000005/train/php

function solution($input)
{
    $val = $result = 0;
    $map = ['i' => 1, 'v' => 5, 'x' => 10, 'l' => 50, 'c' => 100, 'd' => 500, 'm' => 1000];
    $input = strrev(strtolower($input));
    $length = strlen($input);
    for ($i = 0; $i < $length; $i++) {
        $prevVal = $val;
        $symbol = substr($input, $i, 1);
        $val = $map[$symbol];
        $prevVal > $val ? $result -= $val : $result += $val;
    }
    return $result;
}

var_dump(solution('XXI'));
var_dump(solution('IV'));

// PHPUnit Test Examples:
// TODO: Replace examples and use TDD development by writing your own tests
//class RomanDecoderTestCases extends TestCase
//{
//    // test function names should start with "test"
//    public function testBasics() {
//      $this->assertEquals(1000, solution("M"));
 //     $this->assertEquals(50, solution("L"));
//      $this->assertEquals(4, solution("IV"));
//    }
    
//    public function testComplex() {
//      $this->assertEquals(2017, solution("MMXVII"));
//      $this->assertEquals(1337, solution("MCCCXXXVII"));
//    }
//}