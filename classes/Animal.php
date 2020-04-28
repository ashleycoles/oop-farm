<?php

/**
 * Class Animal
 *
 * Set as abstract as we never want this class to be instantiated.
 * We only want the farm to contain specific types of animal.
 */
abstract class Animal
{
    /**
     * @var string|null contains the animal's name
     */
    protected $name;

    /**
     * Animal constructor.
     *
     * Used to provide the animals name upon instantiation
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
    }

    /**
     * getter for the name property
     *
     * @return string animals name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Setter for the name property
     *
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }
}