<?php
namespace DB1OS\core\entity;

class QuarternaryNode 
{
    private ?CMemorySlotAddress $data;
    private ?QuarternaryNode $up;
    private ?QuarternaryNode $down;
    private ?QuarternaryNode $left;
    private ?QuarternaryNode $right;
    
    public function __construct(?CMemorySlotAddress $data = null)
    {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
        $this->up = null;
        $this->down = null;
    }

    public function addChildren(?QuarternaryNode $left, ?QuarternaryNode $right, ?QuarternaryNode $up, ?QuarternaryNode $down) : void
    {
        $this->left = $left;
        $this->right = $right;
        $this->up = $up;
        $this->down = $down;
    }

    public function setLeft(?QuarternaryNode $left)
    {
        $this->left = $left;
    }

    public function getLeft() : ?QuarternaryNode
    {
        return $this->left;
    }

    public function setRight(?QuarternaryNode $right)
    {
        $this->left = $right;
    }

    public function getRight() : ?QuarternaryNode
    {
        return $this->right;
    }

    public function setUp(?QuarternaryNode $up)
    {
        $this->up = $up;
    }
    
    public function getUp() : ?QuarternaryNode
    {
        return $this->up;
    }

    public function setDown(?QuarternaryNode $down)
    {
        $this->down = $down;
    }

    public function getDown() : ?QuarternaryNode
    {
        return $this->down;
    }

    public function getData() : ?CMemorySlotAddress
    {
        return $this->data;
    }

}