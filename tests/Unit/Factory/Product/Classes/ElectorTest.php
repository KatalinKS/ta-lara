<?php

namespace Factory\Product\Classes;

use App\Factory\Classes\Elector;
use PHPUnit\Framework\TestCase;

class ElectorTest extends TestCase
{

    public function dataGetUnique() {
        return [
            '1 значение' => [[1]],
            '10 значение' => [[1, 2, 3, 4, 5, 6, 7, 8, 9, 10]],
        ];
    }

    /**
     * @dataProvider dataGetUnique
     * @param $data
     */
    public function testGetUnique($data)
    {
        $elector = new Elector($data);
        $valuesTmp = [];
        for ($i = 0; $i < $this->count($data); $i++) {
            $value = $elector->getUnique();
            if(empty($valuesTmp)) {
                $this->assertNotContains($value, $valuesTmp, 'Проверка на уникальность');
            }
            $valuesTmp[] = $value;
            $this->assertContains($value, $data, 'Проверка на то, что значение взято из начального масива');
        }
    }
}
