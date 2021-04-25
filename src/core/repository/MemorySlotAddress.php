<?php
namespace DB1OS\core\repository;
use DB1OS\core\entity\UnsignedInteger;
interface MemorySlotAddress {
    public function getRow(): UnsignedInteger;
    public function getColumn(): UnsignedInteger;
}
