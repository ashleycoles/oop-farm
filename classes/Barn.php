<?php

class Barn
{
    /**
     * @var array contains animal objects
     */
    protected $animals = [];

    /**
     * @var string|null contains the barn's name
     */
    protected $name;

    /**
     * Barn constructor
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->setName($name);
    }

    /**
     * Adds an animal to the barn, first checks to make sure that the animal isn't already in the barn
     *
     * @param Animal $animal
     * @return bool
     */
    public function addAnimal(Animal $animal)
    {
        // Make sure the animal isn't already in the barn first
        if ($this->animalExists($animal->getName())) {
            return false;
        }
        $this->animals[$animal->getName()] = $animal;
        return true;
    }

    /**
     * Removes an animal from the barn based on name
     *
     * @param string $name
     * @return bool
     */
    public function removeAnimal(string $name)
    {
        if ($this->animalExists($name)) {
            unset($this->animals[$name]);
            return true;
        }
        return false;
    }

    /**
     * Checks to see if a given animal is in the barn
     *
     * @param string $animal
     * @return bool
     */
    public function animalExists(string $animal)
    {
        if (array_key_exists($animal, $this->animals)) {
            return true;
        }
        return false;
    }

    /**
     * List out the full inventory of all animals in the barn
     *
     * @return string
     */
    public function displayAnimalInventory(): string
    {
        $output = '<h3>' . $this->getName() . '</h3>';
        if (count($this->animals) > 0) {
            $output .= '<ul>';
            foreach ($this->animals as $animal) {
                $output .= '<li>' . get_class($animal) . ': ' .  $animal->getName() . '</li>';
            }
            $output .= '</ul>';
        } else {
            $output .= 'The ' . $this->getName() . ' is empty!';
        }
        return $output;
    }

    /**
     * Load an animal object based on the animals name. The animal must be in the barn
     *
     * @param string $animal
     * @return null|Animal Returns either the Animal object if found, or null if not
     */
    public function getAnimal(string $animal): ?Animal
    {
        if (array_key_exists($animal, $this->animals)) {
            return $this->animals[$animal];
        }
        return null;
    }

    /**
     * Getter for the name property
     *
     * @return string
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