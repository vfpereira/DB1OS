<?php
interface MemorySlotAddress {
    public function getRow(): UnsignedInteger;
    public function getColumn(): UnsignedInteger;
}