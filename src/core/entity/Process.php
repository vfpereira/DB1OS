<?php
namespace DB1OS\core\entity;

Class Process 
{
    private string $pid;

    public function __construct(string $pid)
    {
        $this->pid = $pid;
    }

    public function getPid() : string
    {
        return $this->pid;
    }

    public function setPid(string $pid) : void
    {
        $this->pid = $pid;
    }
}