<?php

use DB1OS\core\entity\MemoryPool;
use DB1OS\core\entity\CMemorySlotAddress;
use DB1OS\core\entity\Process;
use DB1OS\core\repository\MemorySlotAddress;
use DB1OS\core\useCases\ReplaceProcessAndAdjacents;

function allocatePIDAtMemorySlotAddress(
    string $processPID,
    MemorySlotAddress $memorySlotAddress,
    array $memoryPool // array of arrays where each represents a row and its inner positions the columns of the memory pool matrix
): MemoryPool {
    $replace = new ReplaceProcessAndAdjacents(new Process($processPID), new MemoryPool($memoryPool), new CMemorySlotAddress($memorySlotAddress[0], $memorySlotAddress[1]));
    return $replace->replaceAll();
}


