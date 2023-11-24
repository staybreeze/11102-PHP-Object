<?php

//宣告類別

// class Animal {
//     public $name;

//     public function setName($name) {
//                // $this代表的是這個class Animal
//         $this->name = $name;
//     }
// }

// $animal = new Animal; // 實例化(實體化) instant

// echo '顯示名稱: ' . $animal->name; // 顯示名稱: (空白)
// echo "<br>";

// $animal->name = '小花'; // 直接修改 $name
// echo '顯示名稱: ' . $animal->name; // 顯示名稱: 小花
// echo "<br>";

// // 在這個例子中，$name 是 public 屬性，外部程式碼可以直接訪問和修改。
// // 通過 $animal->name，我們可以直接設置和讀取名稱的值。

// ----Protected、Private----

// class Animal {
//     protected $name;

//     public function setName($name) {
//         $this->name = $name;
//     }

//     public function getName() {
//         return $this->name;
//     }
// }

// $animal = new Animal; // 實例化 instant

// echo '顯示名稱: ' . $animal->getName(); // 顯示名稱: (空白)
// echo "<br>";

// $animal->setName('小花'); // 透過方法設定 $name
// echo '顯示名稱: ' . $animal->getName(); // 顯示名稱: 小花
// echo "<br>";

// // // 在protected、private失敗
// // $animal->name = '花枝丸'; 
// // echo '顯示名稱: ' . $animal->name; 
// // echo "<br>";

// // 在這個例子中，$name 是 protected 屬性，外部程式碼不能直接訪問 $animal->name。
// // 取而代之的是，我們使用 setName 方法來設定 $name 的值，而使用 getName 方法來取得 $name 的值。

// // 這樣的寫法保護了 $name 的直接存取，強迫外部程式碼透過類別提供的公共方法進行操作，從而實現封裝的概念。


// ----建構式----

class Animal
{
    protected $name;

    // __construct()NEW時便會執行，若有沒使用__construct()，初始值是空的
    // 如果我們希望NEW時就直接啟動什麼指令，就可以在建構式這邊設定
    public function __construct($name)
    {

        $this->name = $name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

$animal = new Animal('阿明'); //實例化 instant

echo '顯示名稱:' . $animal->getName();
echo "<br>";
$animal->setName('小花');
echo '顯示名稱:' . $animal->getName();
echo "<br>";
// $animal->name='阿中';
// echo '顯示名稱:'.$animal->name;
echo "<br>";



// ----extends----

class Dog extends Animal
{
    function sit()
    {
        echo $this->name;
        echo "坐下";
    }
}

$dog = new Dog('soymilk');
echo $dog->getName();
echo '<br>';
echo $dog->setName('咪咪');
echo $dog->getName();
echo '<br>';
$dog->sit();
