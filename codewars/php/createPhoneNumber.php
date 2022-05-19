<?php
//https://www.codewars.com/kata/525f50e3b73515a6db000b83/train/php
function createPhoneNumber($numbersArray) {
    return sprintf('(%d%d%d) %d%d%d-%d%d%d%d', ...$numbersArray);
}
var_dump(createPhoneNumber([1, 2, 3, 4, 5, 6, 7, 8, 9, 0]));

//class MyTestCases extends TestCase {
//  public function testBasicTests() {
//    $this->assertEquals('(123) 456-7890', createPhoneNumber([1, 2, 3, 4, 5, 6, 7, 8, 9, 0]));
//    $this->assertEquals('(111) 111-1111', createPhoneNumber([1, 1, 1, 1, 1, 1, 1, 1, 1, 1]));
//  }
//}