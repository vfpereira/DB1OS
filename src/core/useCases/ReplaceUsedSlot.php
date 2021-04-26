<?php
namespace DB1OS\core\useCases;

use DB1OS\core\entity\CMemorySlotAddress;
use DB1OS\core\entity\MemoryPool;
use DB1OS\core\entity\Process;

Class ReplaceUsedSlot
{
    private Process $processNew;
    private Process $processOld;
    private CMemorySlotAddress $memorySlotAddress;
    private MemoryPool $memoryPool;

    public function __construct(Process $processNew, Process $processOld, CMemorySlotAddress $memorySlotAddress, MemoryPool $memoryPool)
    {
        $this->processNew = $processNew;
        $this->processOld = $processOld;
        $this->memorySlotAddress = $memorySlotAddress;
        $this->memoryPool = $memoryPool;
    }

    public function replace() : MemoryPool
    {
        $memory = $this->memoryPool->getMemory();
        $row = $this->memorySlotAddress->getRow()->getUint();
        $col = $this->memorySlotAddress->getColumn()->getUint();
        $memory[$row][$col] = $this->processNew->getPid();
        $this->memoryPool->setMemory($memory);
        return $this->memoryPool;
    }

    public function isValid() : bool
    {
        return $this->processOld->getPid() != 0 && $this->processOld->getPid() !== $this->processNew->getPid();
    }
}