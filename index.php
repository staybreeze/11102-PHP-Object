<?php

//宣告類別
class Animal{

    public $name;

    public function setName($name){
        $this->name=$name;
    }
}


$animal=new Animal; //實例化(實體化) instant

echo $animal;