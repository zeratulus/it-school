<?php
//https://www.codewars.com/kata/5266876b8f4bf2da9b000362/train/php

function likes( $names ) {
    $count = count($names);
    switch ($count) {
        case 0: return "no one likes this";
        case 1: return "$names[0] likes this";
        case 2: return "$names[0] and $names[1] like this";
        case 3: return "$names[0], $names[1] and $names[2] like this";
        default: return "$names[0], $names[1] and ".($count - 2)." others like this";
    }
}


//class ExampleTestCases extends TestCase {
//
//    public function testReturnCorrectText() {
//
//        $this->assertEquals( 'no one likes this', likes( [] ) );
//        $this->assertEquals( 'Peter likes this', likes( [ 'Peter' ] ) );
//        $this->assertEquals( 'Jacob and Alex like this', likes( [ 'Jacob', 'Alex' ] ) );
//        $this->assertEquals( 'Max, John and Mark like this', likes( [ 'Max', 'John', 'Mark' ]) );
//        $this->assertEquals( 'Alex, Jacob and 2 others like this', likes( [ 'Alex', 'Jacob', 'Mark', 'Max' ] ) );
//    }
//}