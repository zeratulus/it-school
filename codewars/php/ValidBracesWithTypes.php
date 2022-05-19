<?php
//https://www.codewars.com/kata/5277c8a221e209d3f6000b56/php

header('Content-type: text/plain; charset: utf-8;');

const B_CURLY = '{}';
const B_BRACES = '()';
const B_RECT = '[]';

class TBraceParser {
    private string $parseString;
    private TBraceList $bracesList;
    private array $bracesOpened = [B_BRACES => '(', B_CURLY => '{', B_RECT => '['];
    private array $bracesClosed = [B_BRACES => ')', B_CURLY => '}', B_RECT => ']'];
    private array $openedBracesCount = [
        B_CURLY => 0,
        B_BRACES => 0,
        B_RECT => 0
    ];

    public function __construct()
    {
        $this->bracesList = new TBraceList();
    }

    public function parse(string $str): bool
    {
        $this->parseString = $str;

        for ($i = 0; $i < strlen($str); $i++) {
            if ($key = array_search($str[$i], $this->bracesOpened)) {
                $this->openedBracesCount[$key] += 1;
                $this->bracesList->add(new TBraceInfo($key, $i));
            } elseif ($key = array_search($str[$i], $this->bracesClosed)) {
                $this->openedBracesCount[$key] -= 1;
                if ($info = $this->bracesList->getOpenedBraceForClose($key)) {
                    $info->closedAt = $i;
                    $info->strInScope = substr($this->parseString, $info->startedAt + 1, $info->closedAt - $info->startedAt - 1);
                }
            }
        }

        return $this->validate();
    }

    private function validate(): bool
    {
        foreach ($this->openedBracesCount as $key => $count) {
            if ($count <> 0) return false;
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
    private array $braces = [];

    public function add(TBraceInfo $info): void
    {
        $this->braces[] = $info;
    }

    public function get(int $idx): ?TBraceInfo
    {
        return $this->braces[$idx] ?? null;
    }

    public function all(): array
    {
        return $this->braces;
    }

    public function getOpenedBraceForClose($type): ?TBraceInfo
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
    public string $type = B_BRACES; //B_...
    public int $startedAt = -1;
    public int $closedAt = -1;
    public string $strInScope = '';

    public function checkBraceScope(): bool
    {
        return (new TBraceParser())->parse($this->strInScope);
    }

    public function isClosed(): bool
    {
        return $this->closedAt >= 0 && $this->startedAt > $this->closedAt;
    }

    public function __construct($type, $startedAt)
    {
        $this->type = $type;
        $this->startedAt = $startedAt;
    }

}

//TODO: not work =[ ---- > "[(])"     =>  False
function checkBraces(string $str)
{
    $parser = new TBraceParser();
    $res = $parser->parse($str);
    var_dump($parser);
    return $res;
}

//var_dump(checkBraces("(){}[]"));
var_dump(checkBraces("[(])"));

//Examples
//"(){}[]"   =>  True
//"([{}])"   =>  True
//"(}"       =>  False
//"[(])"     =>  False
//"[({})](]" =>  False