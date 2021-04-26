<?php
namespace DB1OS\core\entity;

use DB1OS\core\entity\QuarternaryNode;

class QuarternaryTree 
{
    private ?QuarternaryNode $root;

    public function __construct() 
    {
        $this->root = null;
    }

    public function getRoot() : ?QuarternaryNode
    {
        return $this->root;
    }

    public function isEmpty() : bool
    {
        return $this->root === null;
    }

    public function insert(QuarternaryNode $node) : ?QuarternaryNode
    {
        if ($this->isEmpty()) {
            $this->root = $node;
        } else {
            $this->insertNode($node, $this->root, '');
        }

        return $this->root;
    }

    private function insertNode(QuarternaryNode $node, QuarternaryNode $current, string $orientation) : void
    {
        if ($orientation === 'up') {
            $current->setUp($node);
        } else if ($orientation === 'down') {
            $current->setDown($node);
        } else if ($orientation === 'left') {
            $current->setDown($node);
        } else {
            $current->setRight($node);
        }
    }
}