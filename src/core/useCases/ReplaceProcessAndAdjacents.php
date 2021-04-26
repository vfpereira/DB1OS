<?php
namespace DB1OS\core\useCases;
use DB1OS\core\useCases\AddressIsUsedByAnotherProcess;
use DB1OS\core\useCases\FillQuarternaryTree;
use DB1OS\core\entity\CMemorySlotAddress;
use DB1OS\core\entity\MemoryPool;
use DB1OS\core\entity\Process;
use DB1OS\core\entity\QuarternaryTree;

Class ReplaceProcessAndAdjacents
{
    private Process $processNew;
    private CMemorySlotAddress $memorySlotAddress;
    private MemoryPool $memoryPool;

    public function __construct(Process $process, MemoryPool $memoryPool, CMemorySlotAddress $memorySlotAddress)
    {
        $this->processNew = $process;
        $this->memorySlotAddress = $memorySlotAddress;
        $this->memoryPool = $memoryPool;
    }

    public function replace() : MemoryPool
    {
        $addressIsUsedByAnotherProcess = new AddressIsUsedByAnotherProcess($this->processNew, $this->memorySlotAddress, $this->memoryPool);
        if (!$addressIsUsedByAnotherProcess->isUsed()) {
            $replaceUsedSlot = new ReplaceUsedSlot(
                $this->processNew, 
                new Process($addressIsUsedByAnotherProcess->getProcess()), 
                $this->memorySlotAddress, 
                $this->memoryPool
            );
            $replaceUsedSlot->replace();
        }
    }

    public function replaceAll() : MemoryPool
    {
        $fillQuartenaryTree = new FillQuartenaryTree(new QuarternaryTree(), $this->memoryPool);
        $fillQuartenaryTree->getQuarternaryTree();
        $fillQuartenaryTree->fillAdjacents($this->memorySlotAddress);
        
        $node = $fillQuartenaryTree->getQuarternaryTreeNode();
        var_dump($node);
    }


}