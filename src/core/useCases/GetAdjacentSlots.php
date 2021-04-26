<?php
namespace DB1OS\core\useCases;

use DB1OS\core\entity\CMemorySlotAddress;
use DB1OS\core\entity\UnsignedInteger;

Class GetAdjacentSlots
{
    private UnsignedInteger $up; 
    private UnsignedInteger $down; 
    private UnsignedInteger $left; 
    private UnsignedInteger $rigth; 

    public function __construct(CMemorySlotAddress $slotAddresses)
    {
        $row = $slotAddresses->getRow();
        $column = $slotAddresses->getColumn();
        $this->up = new UnsignedInteger($column->getUint() - 1);
        $this->down = new UnsignedInteger($column->getUint() + 1);
        $this->left = new UnsignedInteger($row->getUint() - 1);
        $this->rigth = new UnsignedInteger($row->getUint() + 1);
    }
    
    public function getUp() : UnsignedInteger
    {
        return $this->up;
    }

    public function getLeft() : UnsignedInteger
    {
        return $this->left;
    }

    public function getRigth() : UnsignedInteger
    {
        return $this->rigth;
    }

    public function getDown() : UnsignedInteger
    {
        return $this->down;
    }

}