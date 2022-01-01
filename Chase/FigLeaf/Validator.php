<?php

namespace Chase\FigLeaf;

class Validator
{
    private $__passed;
    private $__failed;

    public function __construct(string $correctValue, string $submittedValue)
    {
        if ($correctValue === $submittedValue) {
            $this->__passed = true;
            $this->__failed = false;
        } else {
            $this->__passed = false;
            $this->__failed = true;
        }
    }

    public function passed(): bool
    {
        return $this->__passed;
    }

    public function failed(): bool
    {
        return $this->__failed;
    }
}
