<?php
namespace DB1OS\core\useCases;

use DB1OS\core\entity\CMemorySlotAddress;
use DB1OS\core\entity\QuarternaryTree;
use DB1OS\core\entity\QuarternaryNode;
use DB1OS\core\useCases\GetAdjacentSlots;

Class FillQuarternaryTreeNode
{
    private QuarternaryTree $quartenaryTree;
    private QuarternaryNode $quarternaryNode;
    
    public function __construct(QuarternaryTree $quartenaryTree)
    {
        $this->quartenaryTree = $quartenaryTree;
    }

    public function getQuarternaryTreeNode() : QuarternaryNode
    {
        return $this->quarternaryNode;
    }

    public function fill(CMemorySlotAddress $memoryAddress)
    {
        $this->quarternaryNode = new QuarternaryNode($memoryAddress);
        $this->setAdjacents($memoryAddress);
        //var_dump($this->quartenaryTree);
        $this->quartenaryTree->insert($this->quarternaryNode);
    }

    public function setAdjacents(CMemorySlotAddress $memoryAddress) : void
    {
        $adjacents = new GetAdjacentSlots($memoryAddress);
        if ($adjacents->getUp()->isValid()) {
            $memoryAddressUp = new CMemorySlotAddress($memoryAddress->getRow(), $adjacents->getUp());
            $this->quarternaryNode->setUp(new QuarternaryNode($memoryAddressUp));
        } 

        if ($adjacents->getLeft()->isValid()) {
            $memoryAddressLeft = new CMemorySlotAddress($adjacents->getLeft(), $memoryAddress->getColumn());
            $this->quarternaryNode->setLeft(new QuarternaryNode($memoryAddressLeft));
        }

        if ($adjacents->getRigth()->isValid()) {
            $memoryAddresRight = new CMemorySlotAddress($adjacents->getRigth(), $memoryAddress->getColumn());
            $this->quarternaryNode->setRight(new QuarternaryNode($memoryAddresRight));
        }

        if ($adjacents->getDown()->isValid()) {
            $memoryAddressDown = new CMemorySlotAddress($memoryAddress->getRow(), $adjacents->getDown());
            $this->quarternaryNode->setDown(new QuarternaryNode($memoryAddressDown));
        }
    }
}