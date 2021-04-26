<?php
namespace DB1OS\tests;

use PHPUnit\Framework\TestCase;
use DB1OS\core\entity\UnsignedInteger;
use DB1OS\core\entity\CMemorySlotAddress;

class CMemorySlotAddressTest extends TestCase
{
    public function testGet() : void
    {
        $memorySlotAddress = new CMemorySlotAddress(new UnsignedInteger(0), new UnsignedInteger(0));

        $this->assertEquals($memorySlotAddress->getRow()->getUint(), 0, "Not is possible get Row");
    }
}