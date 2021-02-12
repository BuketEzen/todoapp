<!-- error_reporting(E_ALL);
ini_set(‘display_errors’, 1); -->

<html>


<?php


include ('config.php');
include ('todolist.php');

$app=new TodoList(date('Ymd'));
$todolist=$app->getTodos();


$reqMethod=$_SERVER['REQUEST_METHOD'];

switch($reqMethod){
    
    case 'POST':
        $app->add();
        break;
}

if(isset($_POST['sil']))
{
  $app->delete($_POST['id']);
}
$todolist = $app->getTodos();
?>

<form action="index.php?action=add" method="post">
<input type= "test" name="mytodo" />
<input type= "submit" value="ekle" />
</form>

<ul>
    <?php
    foreach($todolist as $k=>$v){
        echo "<li>" . $v;
        echo "<form action='index.php' method='POST'>";
        echo "<input type='hidden' value='" . ($k+1) . "' name='id' />";
        echo "<input type='submit' name='sil' value='delete' />";
        echo "<input type='submit' name='güncelle' value='güncelle' />";
        echo "</form></li>";
    }
    ?>
</ul>
<html>