<?php
namespace DB1OS\tests;

use PHPUnit\Framework\TestCase;
use DB1OS\core\entity\UnsignedInteger;
use DB1OS\core\entity\CMemorySlotAddress;
use DB1OS\core\entity\QuarternaryNode;

class BinaryNodeTest extends TestCase
{
    public function testAddAllNullChildNode() : void
    {
        $memorySlotAddress = new CMemorySlotAddress(new UnsignedInteger(0), new UnsignedInteger(0));
        $quarternaryNode = new QuarternaryNode($memorySlotAddress);
        $quarternaryNode->addChildren(new QuarternaryNode(null), new QuarternaryNode(null), new QuarternaryNode(null), new QuarternaryNode(null));
        $conditionUp = $quarternaryNode->getUp()->getData() === null; 
        $conditionDown = $quarternaryNode->getDown()->getData() === null; 
        $conditionLeft = $quarternaryNode->getLeft()->getData() === null; 
        $conditionRight = $quarternaryNode->getRight()->getData() === null; 
        $this->assertTrue($conditionUp && $conditionDown && $conditionLeft && $conditionRight, "Childs should be null");
    }

    public function testAddLeftNullChildNodeLeftHasValue() : void
    {
        $memorySlotAddress = new CMemorySlotAddress(new UnsignedInteger(1), new UnsignedInteger(0));
        $quarternaryNode = new QuarternaryNode($memorySlotAddress);
        $quarternaryNode->addChildren(new QuarternaryNode($memorySlotAddress), new QuarternaryNode(null), new QuarternaryNode(null), new QuarternaryNode(null));
        $conditionUp = $quarternaryNode->getUp()->getData() === null; 
        $conditionDown = $quarternaryNode->getDown()->getData() === null; 
        $conditionLeft = $quarternaryNode->getLeft()->getData()->getRow()->getUint() === (new UnsignedInteger(1))->getUint();
        $conditionRight = $quarternaryNode->getRight()->getData() === null; 
        $this->assertTrue($conditionUp && $conditionDown && $conditionLeft && $conditionRight, "All Childs should be null except left row = 1");
    }

    public function testAddLeftNullChildNodeRightHasValue() : void
    {
        $memorySlotAddress = new CMemorySlotAddress(new UnsignedInteger(1), new UnsignedInteger(0));
        $quarternaryNode = new QuarternaryNode($memorySlotAddress);
        $quarternaryNode->addChildren(new QuarternaryNode(null), new QuarternaryNode($memorySlotAddress), new QuarternaryNode(null), new QuarternaryNode(null));
        $conditionUp = $quarternaryNode->getUp()->getData() === null; 
        $conditionDown = $quarternaryNode->getDown()->getData() === null; 
        $conditionLeft = $quarternaryNode->getLeft()->getData() === null;
        $conditionRight = $quarternaryNode->getRight()->getData()->getRow()->getUint() === (new UnsignedInteger(1))->getUint();
        $this->assertTrue($conditionUp && $conditionDown && $conditionLeft && $conditionRight, "All Childs should be null except right row = 1");
    }

    public function testAddLeftNullChildNodeUpHasValue() : void
    {
        $memorySlotAddress = new CMemorySlotAddress(new UnsignedInteger(1), new UnsignedInteger(0));
        $quarternaryNode = new QuarternaryNode($memorySlotAddress);
        $quarternaryNode->addChildren(new QuarternaryNode(null), new QuarternaryNode(null), new QuarternaryNode($memorySlotAddress), new QuarternaryNode(null));
        $conditionUp = $quarternaryNode->getUp()->getData()->getRow()->getUint() === (new UnsignedInteger(1))->getUint();
        $conditionDown = $quarternaryNode->getDown()->getData() === null; 
        $conditionLeft = $quarternaryNode->getLeft()->getData() === null;
        $conditionRight = $quarternaryNode->getRight()->getData() === null;
        $this->assertTrue($conditionUp && $conditionDown && $conditionLeft && $conditionRight, "All Childs should be null except up row = 1");
    }

    public function testAddLeftNullChildNodeDownHasValue() : void
    {
        $memorySlotAddress = new CMemorySlotAddress(new UnsignedInteger(1), new UnsignedInteger(0));
        $quarternaryNode = new QuarternaryNode($memorySlotAddress);
        $quarternaryNode->addChildren(new QuarternaryNode(null), new QuarternaryNode(null), new QuarternaryNode(null), new QuarternaryNode($memorySlotAddress));
        $conditionUp = $quarternaryNode->getUp()->getData() === null;
        $conditionDown = $quarternaryNode->getDown()->getData()->getRow()->getUint() === (new UnsignedInteger(1))->getUint();
        $conditionLeft = $quarternaryNode->getLeft()->getData() === null;
        $conditionRight = $quarternaryNode->getRight()->getData() === null;
        $this->assertTrue($conditionUp && $conditionDown && $conditionLeft && $conditionRight, "All Childs should be null except down row = 1");
    }

    /*

    public function testAddRightNullChildNodeLeftHasValue() : void
    {
        $memorySlotAddress = new CMemorySlotAddress(new UnsignedInteger(0), new UnsignedInteger(0));
        $binaryNode = new BinaryNode($memorySlotAddress);
        $binaryNode->addChildren(new BinaryNode($memorySlotAddress), new BinaryNode(null));
        $leftCondition = $memorySlotAddress === $binaryNode->getLeft()->getData();
        $this->assertTrue(null === $binaryNode->getRight()->getData() && $leftCondition, "Child rigth should be null e left don't");
    }

    public function testAddChildBothHasValues() : void
    {
        $memorySlotAddress = new CMemorySlotAddress(new UnsignedInteger(0), new UnsignedInteger(0));
        $binaryNode = new BinaryNode($memorySlotAddress);
        $binaryNode->addChildren(new BinaryNode($memorySlotAddress), new BinaryNode($memorySlotAddress));
        $leftCondition = $memorySlotAddress === $binaryNode->getLeft()->getData();
        $rightCondition = $memorySlotAddress === $binaryNode->getRight()->getData();
        $this->assertTrue($leftCondition && $rightCondition, "Both childs should have values");
    }
    */
}