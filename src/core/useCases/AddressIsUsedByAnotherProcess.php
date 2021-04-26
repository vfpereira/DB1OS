<?php
namespace DB1OS\core\useCases;

use DB1OS\core\entity\CMemorySlotAddress;
use DB1OS\core\entity\MemoryPool;
use DB1OS\core\entity\Process;

class AddressIsUsedByAnotherProcess
{
    private Process $processNew;
    private CMemorySlotAddress $memorySlotAddress;
    private MemoryPool $memoryPool;

    public function __construct(Process $processNew, CMemorySlotAddress $memorySlotAddress, MemoryPool $memoryPool)
    {
        $this->processNew = $processNew;
        $this->memorySlotAddress = $memorySlotAddress;
        $this->memoryPool = $memoryPool;
    }

    public function isUsed() : bool
    {
        if ($this->getProcess() === $this->processNew->getPid()) {
            return true;
        }

        return false;
    }

    public function getProcess()
    {
        $memory = $this->memoryPool->getMemory();
        $row = $this->memorySlotAddress->getRow()->getUint();
        $col = $this->memorySlotAddress->getColumn()->getUint();

        return $memory[$row][$col];
    }
}