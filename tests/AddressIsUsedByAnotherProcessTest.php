<?php
namespace DB1OS\tests;

use DB1OS\core\entity\Process;
use DB1OS\core\entity\CMemorySlotAddress;
use DB1OS\core\entity\MemoryPool;
use DB1OS\core\entity\UnsignedInteger;
use PHPUnit\Framework\TestCase;
use DB1OS\core\useCases\AddressIsUsedByAnotherProcess;

Class AddressIsUsedByAnotherProcessTest extends TestCase
{
    public function testCheckUsed() : void 
    {
        $address = new AddressIsUsedByAnotherProcess(
            new Process('A'), 
            new CMemorySlotAddress(
                new UnsignedInteger(0), 
                new UnsignedInteger(0)
            ), 
            new MemoryPool(['A'])
        );

        $this->assertTrue($address->isUsed(), "Address is used by another process");
    }

    public function testCheckNotUsed() : void 
    {
        $address = new AddressIsUsedByAnotherProcess(
            new Process('C'), 
            new CMemorySlotAddress(
                new UnsignedInteger(0), 
                new UnsignedInteger(0)
            ), 
            new MemoryPool(['A'])
        );

        $this->assertFalse($address->isUsed(), "Address is not used by another process");
    }

}