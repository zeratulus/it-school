<?php

function arrayDiff($a, $b) {
    $result = [];
    foreach ($a as $item) {
        if (!in_array($item, $b)) $result[] = $item;
    }
    return $result;
}


var_dump(arrayDiff([1, 2, 2, 2, 3], [2, 1]));
// use PHPUnit\Framework\TestCase;
//class MyTestCasesTest extends TestCase
//{
//    public function testSampleTests() {
//      $this->assertEquals([2], arrayDiff([1,2], [1]), "a was [1,2], b was [1], expected [2]");
//      $this->assertEquals([2,2], arrayDiff([1,2,2], [1]), "a was [1,2,2], b was [1], expected [2,2]");
//      $this->assertEquals([1], arrayDiff([1,2,2], [2]), "a was [1,2,2], b was [2], expected [1]");
//      $this->assertEquals([1,2,2], arrayDiff([1,2,2], []), "a was [1,2,2], b was [], expected [1,2,2]");
//      $this->assertEquals([], arrayDiff([], [1,2]), "a was [], b was [1,2], expected []");
//      $this->assertEquals([3], arrayDiff([1, 2, 3], [1,2]), "a was [1, 2, 3], b was [1,2], expected [3]");
//    }
//}