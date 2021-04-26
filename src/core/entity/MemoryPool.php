<?php
namespace DB1OS\core\entity;

Class MemoryPool
{
    private array $memory;

    public function __construct(array $memory)
    {
        $this->memory = $memory;
    }

    public function getMemory() : array
    {
        return $this->memory;
    }

    public function setMemory(array $memory) : void
    {
        $this->memory = $memory;
    }
}