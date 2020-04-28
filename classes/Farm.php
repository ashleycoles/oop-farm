<?php

class Farm
{
    protected $barns;

    public function addBarn(Barn $barn)
    {
        $this->barns[$barn->getName()] = $barn;
    }

    /**
     * Removes a barn from the farm by name
     *
     * @param string $name the barn name
     * @return bool
     */
    public function removeBarn(string $name)
    {
        if (array_key_exists($name, $this->barns)) {
            unset($this->barns[$name]);
            return true;
        }
        return false;
    }

    /**
     * Adds an animal to a given barn
     *
     * @param Animal $animal
     * @param string|Barn $destinationBarn
     * @return bool
     */
    public function addAnimal(Animal $animal, $destinationBarn)
    {
        if (!$destinationBarn instanceof Barn) {
            if (array_key_exists($destinationBarn, $this->barns)) {
                $destinationBarn = $this->barns[$destinationBarn];
            }
        }

        if ($destinationBarn->addAnimal($animal))  {
            return true;
        }
        return false;
    }

    /**
     * Moves an animal from one barn to another
     *
     * @param string $animal
     * @param string $destinationBarn destination barn name
     * @param string $originBarn origin barn name
     * @return bool
     */
    public function moveAnimal(string $animal, string $destinationBarn, string $originBarn): bool
    {
        $destinationBarnObj = ($this->getBarnByName($destinationBarn) ?: false);
        $originBarnObj = ($this->getBarnByName($originBarn) ?: false);

        if ($destinationBarnObj && $originBarnObj) {
            $animalObj = ($originBarnObj->getAnimal($animal) ?: false);

            if ($animalObj) {
                $originBarnObj->removeAnimal($animalObj->getName());
                $destinationBarnObj->addAnimal($animalObj);
                return true;
            }
        }
        return false;
    }

    /**
     * Display the full farm inventory of animals
     *
     * @return string
     */
    public function farmInventory(): string
    {
        $output = '';

        if (count($this->barns) > 0) {
            foreach ($this->barns as $barn) {
                $output .= $barn->displayAnimalInventory();
            }
        } else {
            $output .= 'The farm is empty!';
        }
        return $output;

    }

    /**
     * Load a barn object based on name, the barn must be in the farm
     *
     * @param string $barn
     * @return null|array
     */
    protected function getBarnByName(string $barn): ?Barn
    {
        if (array_key_exists($barn, $this->barns)) {
            return $this->barns[$barn];
        }
        return null;
    }
}