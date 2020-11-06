<?php


namespace App\Factory\Classes;


class Elector
{
    private $values;
    private $uniqueValues;

    public function __construct(array $values) {
        $this->values = $values;
        $this->uniqueValues = $values;
    }
    public function getUnique() {
        if(count($this->uniqueValues) > 0) {
            while (true) {
                $index = rand(0, count($this->uniqueValues) - 1);
                $value = $this->uniqueValues[$index];
                if(isset($this->uniqueValues[$index])) {
                    unset($this->uniqueValues);
                    return $value;
                } else {
                    $this->uniqueValues = sort($this->uniqueValues);
                }
            }
        }
    }


}
