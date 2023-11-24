<?php
// 將希望程式打開即運作的，放在全域之首
    date_default_timezone_set("Asia/Taipei");
    session_start();
class db{

   protected $dsn = "mysql:host=localhost;charset=utf8;dbname=school";
   protected $pdo;
   protected $table;

// 類別宣告即啟用的
public function __construct($table)
{
    $this->table=$table;
    
    // 類別中，要吃到自己所處{}外的變數，需要加上$this->
    $this->pdo=new PDO($this->dsn,'root','');
}


// -----all-----

// SELECT `col1`,`col2`,... FROM `table1`,`table2`,...　WHERE ...

// $table已經存在了，所以可以拿掉
function all($where = '', $other = '')
{


    $sql = "select * from `$this->table` ";


    if (isset($this->table) && !empty($this->table)) {

        if (is_array($where)) {

            if (!empty($where)) {
                foreach ($where as $col => $value) {
                    // 暫時存儲迴圈中生成的條件片段
                    $tmp[] = "`$col`='$value'";
                }
                $sql .= " where " . join(" && ", $tmp);
            }
        } else {
            $sql .= " $where";
        }

        $sql .= $other;
        echo 'all=>' . $sql;
        $rows = $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    } else {
        echo "錯誤:沒有指定的資料表名稱";
    }
}

// -----find-----

function find($id)
{

    $sql = "select * from `$this->table` ";

    if (is_array($id)) {
        foreach ($id as $col => $value) {
            $tmp[] = "`$col`='$value'";
        }
        $sql .= " where " . join(" && ", $tmp);
    } else if (is_numeric($id)) {
        $sql .= " where `id`='$id'";
    } else {
        echo "錯誤:參數的資料型態比須是數字或陣列";
    }
    echo 'find=>' . $sql;
    $row = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    return $row;
}

// -----update-----

// UPDATE `table` SET `col1`='value1',`col2`='value2',...　WHERE ...

function update( $id, $cols)
{


    $sql = "update `$this->table` set ";
    // 因為要填入兩個變數，因此要分別判斷兩個變數
    // 判斷$cols
    if (!empty($cols)) {
        foreach ($cols as $col => $value) {
            $tmp[] = "`$col`='$value'";
        }
    } else {
        echo "錯誤:缺少要編輯的欄位陣列";
    }

    $sql .= join(",", $tmp);

    if (is_array($id)) {
        foreach ($id as $col => $value) {
            $tmp[] = "`$col`='$value'";
        }
        $sql .= " where " . join(" && ", $tmp);
    } else if (is_numeric($id)) {
        $sql .= " where `id`='$id'";
    } else {
        echo "錯誤:參數的資料型態比須是數字或陣列";
    }
    echo $sql;
    return $this->pdo->exec($sql);

}

// -----delete-----

// DELETE FROM `table` WHERE ...

function del( $id)
{

    $sql = "delete from `$this->table` ";

    if (is_array($id)) {
        foreach ($id as $col => $value) {
            $tmp[] = "`$col`='$value'";
        }
        $sql .= " where " . join(" && ", $tmp);
    } else if (is_numeric($id)) {
        $sql .= " where `id`='$id'";
    } else {
        echo "錯誤:參數的資料型態比須是數字或陣列";
    }

    echo 'del=>' . $sql;
    $row = $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    return $row;
}

// -----insert-----


// INSERT INTO `table`(`col1`,`col2`,`col3`,`col4`,`col5`) 
//             VALUES('value1','value1','value1','value1','value1','value1');



function insert($values){

    


$sql = "insert into `$this->table` ";

// $cols="(``,``,``,``,)";
// $vals="('','','','',)";

$cols="(`".join("`,`",array_keys($values))."`)";
$vals="('".join("','",$values)."')";

$sql=$sql . $cols  ." values ".$vals;
// $sql=insert into `$table` . (``,``,``,``,) ." values ".('','','','',);

echo $sql;
return $this->pdo->exec($sql);


}



}

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

$student = new DB('students');
// $result = $student->insert(
//     ['id' => '7',
// 'school_num' => '911007',
// 'name' => '林明珠',
// 'birthday' => '1984-01-06',
// 'uni_id' => 'F200000071',
// 'addr' => '南投縣草屯鎮三爪子坑路106 巷11號3',
// 'parents' => '王學義',
// 'tel' => '04-13974327',
// 'dept' => '16',
// 'graduate_at' => '2',
// 'status_code' => '001']
// );
// $result = $student->update(7, ['name' => '林明珠']);



dd($result);