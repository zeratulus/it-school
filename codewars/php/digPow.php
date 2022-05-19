<?php
//https://www.codewars.com/kata/5552101f47fc5178b1000050/train/php
//digPow(89, 1) should return 1 since 8¹ + 9² = 89 = 89 * 1
//digPow(92, 1) should return -1 since there is no k such as 9¹ + 2² equals 92 * k
//digPow(695, 2) should return 2 since 6² + 9³ + 5⁴= 1390 = 695 * 2
//digPow(46288, 3) should return 51 since 4³ + 6⁴+ 2⁵ + 8⁶ + 8⁷ = 2360688 = 46288 * 51

function digPow($n, $p) {
    // a,b,c,d comes from $n, each digit
    // (a ^ $p + b ^ ($p+1) + c ^($p+2) + d ^ ($p+3) + ...) = $n * k????
    $digits = str_split($n);
//    var_dump($digits);
    $power = $p;
    $res = 0;
    foreach ($digits as $digit) {
        $res += pow($digit, $power++);
    }
    if ($res % $n == 0) {
        return $res / $n;
    } else {
        return -1;
    }
}

var_dump(digPow(89, 1));
var_dump(digPow(92, 1));
var_dump(digPow(695, 2));

//class PlayDigitTestCases extends TestCase
//{
//    private function revTest($actual, $expected) {
//        $this->assertSame($expected, $actual);
//    }
//    public function testBasics() {
//        $this->revTest(digPow(89, 1), 1);
//        $this->revTest(digPow(92, 1), -1);
//        $this->revTest(digPow(46288, 3), 51);
//    }
//}