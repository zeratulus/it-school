<?php
//https://www.codewars.com/kata/5277c8a221e209d3f6000b56/php
set_time_limit(10);
header('Content-type: text/plain; charset: utf-8;');

const B_CURLY = '{}';
const B_BRACES = '()';
const B_RECT = '[]';

class TBraceParser {
    private $originalString;
    private $buffer;
    private $bracesList;
    private $lastLeftPos = 0;
    private $lastRightPos = 0;
    private $bracesOpened = [B_BRACES => '(', B_CURLY => '{', B_RECT => '['];
    private $bracesClosed = [B_BRACES => ')', B_CURLY => '}', B_RECT => ']'];
    private $openedBracesCount = [
        B_CURLY => 0,
        B_BRACES => 0,
        B_RECT => 0
    ];
    private $closedBracesCount = [
        B_CURLY => 0,
        B_BRACES => 0,
        B_RECT => 0
    ];

    public function __construct()
    {
        $this->bracesList = new TBraceList();
    }

    private function countBraces()
    {
        for ($i = 0; $i < strlen($this->buffer); $i++) {
            if ($key = array_search($this->buffer[$i], $this->bracesOpened)) {
                $this->openedBracesCount[$key] += 1;
            } elseif ($key = array_search($this->buffer[$i], $this->bracesClosed)) {
                $this->closedBracesCount[$key] += 1;
            }
        }
    }

    private function parseLeft()
    {
        $len = strlen($this->buffer);
        for ($i = 0; $i < $len; $i++) {
            if ($key = array_search($this->buffer[$i], $this->bracesOpened)) {
                $this->bracesList->add(new TBraceInfo($key, $i + $this->lastLeftPos));
                $this->lastLeftPos += $i + 1;
                $this->buffer = substr($this->buffer, $i + 1, $len - 1);
                return $key;
            }
        }
    }

    private function parseRight($braceType)
    {
        $len = strlen($this->buffer);
        for ($i = $len; $i > 0; $i--) {
            $key = array_search(substr($this->buffer, $i - 1, 1), $this->bracesClosed);
            if ($key === $braceType) {
                if ($info = $this->bracesList->getOpenedBraceForClose($key)) {
                    $this->lastRightPos += $len - $i;
                    $info->closedAt = $i;
                    $info->strInScope = substr($this->originalString, $info->startedAt , $info->closedAt - $info->startedAt);
                    $this->buffer = substr($this->buffer, 0, $i);
                    break;
                }
            }
        }
    }

    public function parse($str)
    {
        $this->originalString = $this->buffer = $str;
        $this->countBraces();
        $isActive = strlen($this->originalString);
        do {
            $type = $this->parseLeft();
//            $this->parseRight($type);
            $isActive -= 1;
        } while (!empty($this->buffer) || $isActive > 0);
        return $this->validate();
    }

    private function validate()
    {
        foreach ($this->openedBracesCount as $key => $count) {
            if ($count <> $this->closedBracesCount[$key]) return false;
        }

        /**
         * @var TBraceInfo $info
         */
        foreach ($this->bracesList->all() as $id => $info) {
            if (!$info->checkBraceScope()) return false;
        }

        return true;
    }

}

class TBraceList
{
    private $braces = [];

    public function add(TBraceInfo $info)
    {
        $this->braces[] = $info;
    }

    public function get(int $idx)
    {
        return $this->braces[$idx] ?? null;
    }

    public function all(): array
    {
        return $this->braces;
    }

    public function getOpenedBraceForClose($type)
    {
        foreach ($this->braces as $info) {
            if ($info->type === $type && $info->closedAt === -1) {
                return $info;
            }
        }
        return null;
    }

}

class TBraceInfo
{
    public $type = B_BRACES; //B_...
    public $startedAt = -1;
    public $closedAt = -1;
    public $strInScope = '';
    public $isValid = false;

    public function checkBraceScope()
    {
        $result = (new TBraceParser())->parse($this->strInScope);
        $this->isValid = $result;
        return $result;
    }

    public function isClosed()
    {
        return $this->closedAt >= 0 && $this->startedAt > $this->closedAt;
    }

    public function __construct($type, $startedAt)
    {
        $this->type = $type;
        $this->startedAt = $startedAt;
    }

}

function checkBraces($str)
{
    $parser = new TBraceParser();
    $res = $parser->parse($str);
    var_dump($parser);
    return $res;
}

function validBraces($str) {
    return checkBraces($str);
}

//var_dump(checkBraces("(){}[]"));
//var_dump(checkBraces('([{}])'));
//var_dump(checkBraces('(}'));
//var_dump(checkBraces("[(])"));
//var_dump(checkBraces('[({})](]'));
//var_dump(checkBraces('}[P{}{}|{][][[p[][({})](]'));


//var_dump(validBraces("({})[({})]"));
//var_dump(validBraces("(})"));
var_dump(validBraces("(({{[[]]}}))"));
//var_dump(validBraces("{}({})[]"));
//var_dump(validBraces(")(}{]["));
//var_dump(validBraces("())({}}{()][]["));
//var_dump(validBraces("(((({{"));
//var_dump(validBraces("}}]]))}])"));

//$this->assertEquals(true, validBraces("({})[({})]"));
//$this->assertEquals(false, validBraces("(})"));
//$this->assertEquals(true, validBraces("(({{[[]]}}))"));
//$this->assertEquals(true, validBraces("{}({})[]"));
//$this->assertEquals(false, validBraces(")(}{]["));
//$this->assertEquals(false, validBraces("())({}}{()][]["));
//$this->assertEquals(false, validBraces("(((({{"));
//$this->assertEquals(false, validBraces("}}]]))}])"));

//Examples
//"(){}[]"   =>  True
//"([{}])"   =>  True
//"(}"       =>  False
//"[(])"     =>  False
//"[({})](]" =>  False


//class ValidBracesTestCases extends TestCase
//{
//    public function testSamples() {
//      $this->assertEquals(true, validBraces("()"));
//      $this->assertEquals(false, validBraces("[(])"));
//    }
//}