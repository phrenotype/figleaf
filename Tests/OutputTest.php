<?php

use Chase\FigLeaf\FigLeaf;
use Chase\FigLeaf\Validator;
use PHPUnit\Framework\TestCase;

class OutputTest extends TestCase
{

    public function testToken()
    {
        $t1 = FigLeaf::token();        
        $this->assertNotEmpty($t1);        
    }

    public function testInput(){
        $input = FigLeaf::input();
        $this->assertMatchesRegularExpression("/^<input/", $input);
    }
}
