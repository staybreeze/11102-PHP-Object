<?php

//宣告類別
class Animal{

    public $name;

    public function setName($name){
        $this->name=$name;
    }
}


$animal=new Animal; //實例化(實體化) instant

echo '顯示名稱'. $animal->name;
echo "<br>";
$animal->setName('小花');
echo '顯示名稱'. $animal->name;
echo "<br>";
