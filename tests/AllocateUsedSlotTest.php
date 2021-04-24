<?php

namespace DB1OS\tests;

use PHPUnit\Framework\TestCase;

class AllocateUsedSlotTest extends TestCase
{
    protected function assertPreConditions() : void
    {
        $this->assertTrue(
            class_exists("AllocateUsedSlot"),
            "The class does not exists."
        );
    }

    public function testAllocation() : void
    {
        $this->assertTrue(false, "Not possible allocate");
    }
}