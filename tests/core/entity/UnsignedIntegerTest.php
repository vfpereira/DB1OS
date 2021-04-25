<?php

namespace DB1OS\tests;

use PHPUnit\Framework\TestCase;
use DB1OS\core\entity\UnsignedInteger;

class UnsignedIntegerTest extends TestCase
{
    public function testValidZero() : void
    {
        $uint = new UnsignedInteger(0);
        $this->assertTrue($uint->isValid(), "Zero is a valid Unsigned Integer");
    }

    public function testValidNegative() : void
    {
        $uint = new UnsignedInteger(-1);   
        $this->assertFalse($uint->isValid(), "-1 is a invalid Unsigned Integer");
    }

    public function testValidPositive() : void
    {
        $uint = new UnsignedInteger(1);
        $this->assertTrue($uint->isValid(), "1 is a valid Unsigned Integer");
    }
}