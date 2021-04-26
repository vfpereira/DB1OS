<?php
namespace DB1OS\core\useCases;

use DB1OS\core\entity\CMemorySlotAddress;
use DB1OS\core\entity\QuarternaryTree;
use DB1OS\core\entity\QuarternaryNode;
use DB1OS\core\useCases\FillQuarternaryTreeNode;
use DB1OS\core\entity\MemoryPool;

Class FillQuartenaryTree
{
    private QuarternaryTree $quarternaryTree;
    private ?QuarternaryNode $quarternaryTreeNode;
    private MemoryPool $memoryPool;

    public function __construct(QuarternaryTree $quarternaryTree, MemoryPool $memoryPool)
    {
        $this->quarternaryTree = $quarternaryTree;
        $this->quarternaryTreeNode = $this->quarternaryTree->getRoot();
        $this->memoryPool = $memoryPool;
    }

    public function fill(CMemorySlotAddress $memoryAddress) : ?QuarternaryNode
    {
        $quarternaryTreeNode = new FillQuarternaryTreeNode(new QuarternaryTree());
        $quarternaryTreeNode->fill($memoryAddress);
        $node = $quarternaryTreeNode->getQuarternaryTreeNode();
        $this->quarternaryTree->insert($node);
        return $node;
    }

    public function fillAdjacents(CMemorySlotAddress $memoryAddress) : void
    {
        $selfQuarternaryTreeNode = $this->fill($memoryAddress);
        $memory = $this->memoryPool->getMemory();
        
        if ($selfQuarternaryTreeNode->getLeft()) {
            $indexLeft = $selfQuarternaryTreeNode->getLeft()->getData()->getRow()->getUint();
            if ($indexLeft > 0 && $indexLeft < count($memory[0])) {
                $this->fillAdjacents($selfQuarternaryTreeNode->getLeft()->getData());
            }
        }

        if ($selfQuarternaryTreeNode->getRight() && $$selfQuarternaryTreeNode->getRight()->getData()->getRow()->getUint() < count($memory[0])) {
            $this->fillAdjacents($selfQuarternaryTreeNode->getRight()->getData());
        }

        if ($selfQuarternaryTreeNode->getDown() && $selfQuarternaryTreeNode->getDown()->getData()->getColumn()->getUint() < count($memory[1])) {
            $this->fillAdjacents($selfQuarternaryTreeNode->getDown()->getData());
        }

        if ($selfQuarternaryTreeNode->getUp()) {
            $indexUp = $selfQuarternaryTreeNode->getUp()->getData()->getColumn()->getUint();
            if ($indexUp > 1 && $indexUp < count($memory[1])) {
                $this->fillAdjacents($selfQuarternaryTreeNode->getUp()->getData());
            }
        }
    }
    
    public function getQuarternaryTree() : QuarternaryTree
    {
        return $this->quarternaryTree;
    }

    public function getQuarternaryTreeNode() : QuarternaryNode
    {
        return $this->quarternaryTreeNode;
    }
}