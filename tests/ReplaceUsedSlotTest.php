<?php

namespace DB1OS\tests;

use DB1OS\core\entity\Process;
use DB1OS\core\entity\CMemorySlotAddress;
use DB1OS\core\entity\MemoryPool;
use DB1OS\core\entity\UnsignedInteger;
use PHPUnit\Framework\TestCase;
use DB1OS\core\useCases\ReplaceUsedSlot;

Class ReplaceUsedSlotTest extends TestCase
{
    public function testValidDiffProcess() : void
    {
        $replaceUsedSlot = new ReplaceUsedSlot(
            new Process('A'), 
            new Process(('B')), 
            new CMemorySlotAddress(
                new UnsignedInteger(0), 
                new UnsignedInteger(0)
            ), 
            new MemoryPool([])
        );

        $this->assertTrue($replaceUsedSlot->isValid(), "Process A different from Process B and Process B is different of 0");
    
    }

    public function testValidEqualProcess() : void
    {
        $replaceUsedSlot = new ReplaceUsedSlot(
            new Process('A'), 
            new Process(('A')), 
            new CMemorySlotAddress(
                new UnsignedInteger(0), 
                new UnsignedInteger(0)
            ), 
            new MemoryPool([])
        );

        $this->assertFalse($replaceUsedSlot->isValid(), "Process A equals B and Process B is different of 0");
    }

    public function testValidUsedSlot() : void
    {
        $replaceUsedSlot = new ReplaceUsedSlot(
            new Process('A'), 
            new Process(('0')), 
            new CMemorySlotAddress(
                new UnsignedInteger(0), 
                new UnsignedInteger(0)
            ), 
            new MemoryPool([])
        );

        $this->assertFalse($replaceUsedSlot->isValid(), "Process B in memory is empty");
    }

    public function testReplacement() : void
    {
        $memoryPool = new MemoryPool(['B', 'C']);
        $row = new UnsignedInteger(0);
        $column = new UnsignedInteger(0);

        $memorySlot = new CMemorySlotAddress(
            $row, 
            $column
        );

        $replaceUsedSlot = new ReplaceUsedSlot(
            new Process('A'), 
            new Process(('B')), 
            $memorySlot,
            $memoryPool
        );

        $this->assertEquals($replaceUsedSlot->replace()->getMemory(), (new MemoryPool(['A', 'C']))->getMemory(), "A should be replaced B");
    }
}

