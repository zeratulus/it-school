<?php
//https://www.codewars.com/kata/57814d79a56c88e3e0000786/train/php
header('Content-type: text/plain; charset: utf-8;');

function encrypt($text, $n)
{
    for ($i = 1; $i <= $n; $i++) {
        $data = str_split($text);
        $odd = array_filter($data, function ($val) {
            return $val % 2 == 0;
        }, ARRAY_FILTER_USE_KEY);
        $even = array_filter($data, function ($val) {
            return $val % 2 <> 0;
        }, ARRAY_FILTER_USE_KEY);
        $text = implode('', array_merge($even, $odd));
    }
    return $text;
}

function decrypt($text, $n)
{
    if ($n <= 0 || trim($text) == '') {
        return $text;
    }
    $result = '';
    $mid = str_split($text, (int)round(strlen($text) / 2, PHP_ROUND_HALF_DOWN));
    $odd = str_split($mid[0]);
    $even = str_split($mid[1]);
    for ($i = 0; $i < (int)(strlen($text) / 2); $i++) {
        $result .= $even[$i] . $odd[$i];
    }
    if (count($mid) > 2) $result .= end($mid);
    return decrypt($result, $n - 1);
}

//var_dump(encrypt("012345", 1));
//var_dump(decrypt("135024", 1)); //012345

var_dump(encrypt("01234", 3)); //  =>  "13024"  ->  "32104"  ->  "20314"
var_dump(decrypt("20314", 3)); //01234

//class MyTestCases extends TestCase
//{
//    public function testEncryptExampleTests() {
//        $this->assertSame("This is a test!", encrypt("This is a test!", 0));
//        $this->assertSame("hsi  etTi sats!", encrypt("This is a test!", 1));
//        $this->assertSame("s eT ashi tist!", encrypt("This is a test!", 2));
//        $this->assertSame(" Tah itse sits!", encrypt("This is a test!", 3));
//        $this->assertSame("This is a test!", encrypt("This is a test!", 4));
//        $this->assertSame("This is a test!", encrypt("This is a test!", -1));
//        $this->assertSame("hskt svr neetn!Ti aai eyitrsig", encrypt("This kata is very interesting!", 1));
//    }
//    public function testDecryptExampleTests() {
//        $this->assertSame("This is a test!", decrypt("This is a test!", 0));
//        $this->assertSame("This is a test!", decrypt("hsi  etTi sats!", 1));
//        $this->assertSame("This is a test!", decrypt("s eT ashi tist!", 2));
//        $this->assertSame("This is a test!", decrypt(" Tah itse sits!", 3));
//        $this->assertSame("This is a test!", decrypt("This is a test!", 4));
//        $this->assertSame("This is a test!", decrypt("This is a test!", -1));
//        $this->assertSame("This kata is very interesting!", decrypt("hskt svr neetn!Ti aai eyitrsig", 1));
//    }
//    public function testNullorEmpty() {
//        $this->assertSame("", encrypt("", 0));
//        $this->assertSame("", decrypt("", 0));
//        $this->assertSame(null, encrypt(null, 0));
//        $this->assertSame(null, decrypt(null, 0));
//    }
//}