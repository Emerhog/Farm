<?php
/*
Решение должно быть расширяемым, добавление новых типов животных 
и продукции не должно приводить к модификации непосредственно класса Farm.

P.s Значит методы класса можно хардкодить.
*/

abstract class Farm
{
    public $animals = [];
    protected $typeProduct;
    protected $min;
    protected $max;
    protected $countValue = 0;
    protected $days;

    public function __set($id, $name)
    {
        $this->animals[$id] = [$name, rand($this->min, $this->max)];
    }

    public function value()
    {
        for ($i = 0; $i < 7; $i++) {
            foreach ($this->animals as $e) {
                $this->countValue += $e[1];
            }
        }
        return $this->countValue;
    }
}

class Cow extends Farm
{
    public $typeProduct = 'Молоко';
    protected $min = 8;
    protected $max = 12;

    public function __set($id, $name)
    {
        parent::__set($name, $id);
    }
}

class Chicken extends Farm
{
    public $typeProduct = 'Яичко';
    protected $min = 0;
    protected $max = 1;

    public function __set($id, $name)
    {
        parent::__set($name, $id);
    }
}

$kfc = new Chicken();
$kfc->chak = 777;
$kfc->larry = 786;
$kfc->alex = 142;
$kfc->hue = 432;
echo '<pre>';
var_dump($kfc->animals);
echo '</pre>';
echo "Общее кол-во $kfc->typeProduct за неделю: " . $kfc->value();

$animals = new Cow();
$animals->bool = 123;
$animals->buck = 855;
$animals->tank = 179;
$animals->dolby = 593;
$animals->gektor = 937;
$animals->stand = 299;
echo '<pre>';
var_dump($animals->animals);
echo '</pre>';
echo "Общее кол-во $animals->typeProduct за неделю: " . $animals->value();

$kfc->gordon = 937;
$kfc->sully = 593;
$kfc->tony = 328;
$kfc->ruby = 955;
$kfc->dolly = 373;
echo '<pre>';
var_dump($kfc->animals);
echo '</pre>';
echo "Общее кол-во $kfc->typeProduct за неделю: " . $kfc->value();

$animals->hanck = 959;
echo '<pre>';
var_dump($animals->animals);
echo '</pre>';
echo "Общее кол-во $animals->typeProduct за неделю: " . $animals->value();
