<?php
namespace DB1OS\core\entity;
use \Exception;


class UnsignedInteger
{
    private string $uInt;

    public function __construct(int $integer)
    {
        $this->uInt = $integer;
    }

    public function getUint() : string
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
