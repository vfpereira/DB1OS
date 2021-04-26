<?php

namespace DB1OS\tests;

use DB1OS\core\entity\Process;
use DB1OS\core\entity\CMemorySlotAddress;
use DB1OS\core\entity\MemoryPool;
use DB1OS\core\entity\UnsignedInteger;
use PHPUnit\Framework\TestCase;
use DB1OS\core\useCases\ReplaceProcessAndAdjacents;

Class ReplaceProcessAndAjacentsTest extends TestCase
{
    public function testReplacement() : void
    {
        $replacement = new ReplaceProcessAndAdjacents(
            new Process('A'), 
            new MemoryPool(['B', 'B']),
            new CMemorySlotAddress(
                new UnsignedInteger(1), 
                new UnsignedInteger(0)
            )
        );

        $replacement->replace();
    }
}