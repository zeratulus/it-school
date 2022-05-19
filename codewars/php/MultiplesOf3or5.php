<?php
//https://www.codewars.com/kata/514b92a657cdc65150000006/train/php

function solution($number){
    if ($number <= 0) return 0;
    $sum = 0;
    for ($i = 0; $i < $number; $i++) {
        if ($i % 3 == 0 || $i % 5 == 0) {
            $sum += $i;
        }
    }
    return $sum;
}

var_dump(solution(10));

//class SolutionFunction extends TestCase
//{
//  public function testBasics() {
//    $this->assertEquals(23, solution(10));
//  }
//}