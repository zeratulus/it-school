<?php
//https://www.codewars.com/kata/515de9ae9dcfc28eb6000001/train/php

function solution($str) {
    $splited = str_split($str, 2);
    if (count($splited) == 1 && $splited[0] === '') return [];
    for ($i = 0; $i < count($splited); $i++) {
        $substr = $splited[$i];
        if (strlen($substr) < 2 && !empty($substr)) {
            $splited[$i] = substr($substr, 0, 1) . '_';
        }
    }
    return $splited;
}

var_dump(solution('abcde'));

//class MyTestCases extends TestCase
//{
//    public function testBasicTests() {
//        $this->assertEquals(["ab", "cd", "ef"], solution("abcdef"));
//        $this->assertEquals(["ab", "cd", "ef", "g_"], solution("abcdefg"));
//        $this->assertEquals([], solution(""));
//    }
//}

