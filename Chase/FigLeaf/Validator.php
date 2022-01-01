<?php

namespace Chase\FigLeaf;

/**
 * Csrf validator for good humans.
 */
class Validator
{
    private $__passed;
    private $__failed;

    /**
     * @param string $correctValue
     * @param string $submittedValue
     */
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

    /**
     * Check if csrf validation was successful.
     * 
     * @return bool
     */
    public function passed(): bool
    {
        return $this->__passed;
    }

    /**
     * Check if csrf validation failed.
     * 
     * @return bool
     */
    public function failed(): bool
    {
        return $this->__failed;
    }
}
