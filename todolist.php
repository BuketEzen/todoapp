<?php

class TodoList{

    private $todolistName;
    private $myTodoList;
    private $db;
    

    
    public function __construct(string $todoListName)
    {
        $this->todolistName=$todoListName;

        $conf=new DbConfig($todoListName);
        $this->db=$conf->getDbFile();
        

    }

    public function getTodos():array{
        $this->myTodoList = json_decode(file_get_contents($this->db));
        return $this->myTodoList;


    }

  

    private function create(){

    }

    public function add(){
        $task=$_POST['mytodo'];
        if(!empty($task)){
            $this->myTodoList[]=$task;
            $this->save();

        }
      
    }
    public function delete(int $id){
        $id--;
        unset($this->myTodoList[$id]);
        $this->myTodoList = array_values( $this->myTodoList );
        $this->save();
    }
    public function update(){
      
    }
    public function statusChange(){
      
    }

    public function save(){
        file_put_contents($this->db,json_encode($this->myTodoList));
        header('location:index.php');
    }
}












// $dataPath= 'data/';

// if(!$dirCheck){
//     mkdir($dataPath);
    
// }/*else{
//     $message='Dosya oluşturulamadı.';
//     throw new ErrorException($message);
// }*/

// if(!$fileCheck){
//     $tempData=[];
//     file_put_contents($dataPath.'todolist.json',json_encode($tempData));
// }

// $todolist=json_decode(
//     file_get_contents($dataPath.'todolist.json')
// );



// $action=$_GET['action'];
// $newtask=$_POST['mytodo'];

// if(!empty($newtask)&& $action==='add'){
//     $todolist[] = $newtask;
//     file_put_contents($dataPath.'todolist.json',json_encode($todolist));
//     header('location: http://localhost/new/index.php');
// }



?>