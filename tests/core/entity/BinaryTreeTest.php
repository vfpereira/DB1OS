<?php
/*
namespace DB1OS\tests;

use PHPUnit\Framework\TestCase;
use DB1OS\core\entity\UnsignedInteger;
use DB1OS\core\entity\CMemorySlotAddress;
use DB1OS\core\entity\BinaryNode;
use DB1OS\core\entity\BinaryTree;

class BinaryTreeTest extends TestCase
{
    public function testInsertOrientationLeft() : void
    {
        $binaryTree = new BinaryTree();
        $memorySlotAddress = new CMemorySlotAddress(new UnsignedInteger(0), new UnsignedInteger(0));
        $memorySlotAddressSecond = new CMemorySlotAddress(new UnsignedInteger(1), new UnsignedInteger(0));
        $memorySlotAddressThird = new CMemorySlotAddress(new UnsignedInteger(2), new UnsignedInteger(0));
        $binaryNode = new BinaryNode($memorySlotAddress, 'left');
        $binaryNodeSecond = new BinaryNode($memorySlotAddressSecond, 'left');
        $binaryNodeThird = new BinaryNode($memorySlotAddressThird, 'left');
        $binaryTree->insert($binaryNode);        
        $binaryTree->insert($binaryNodeSecond);
        $binaryTree->insert($binaryNodeThird);
        $condition = $binaryTree->getRoot()->getLeft()->getLeft()->getData()->getRow()->getUint();
        $this->assertEquals($condition, 2, "Third left node should have the row value equals 2");

    }
} */
