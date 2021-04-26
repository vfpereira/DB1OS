<?php
namespace DB1OS\core\entity;

Class UnsignedInteger
{
    private int $uInt;

    public function __construct(int $integer)
    {
        $this->uInt = $integer;
    }

    public function getUint() : int
    {
        return $this->uInt;
    }

    public function setUint(int $integer) : void
    {
        $this->uInt = $integer;
    }

    public function isValid() : bool
    {
        return $this->uInt >= 0;
    }
}
