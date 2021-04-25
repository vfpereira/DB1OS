<?php
namespace DB1OS\core\useCases;
use DB1OS\core\repository\MemorySlotAddress;

function allocatePIDAtMemorySlotAddress(
    string $processPID,
    MemorySlotAddress $memorySlotAddress,
    array $memoryPool // array of arrays where each represents a row and its inner positions the columns of the memory pool matrix
): MemoryPool {}