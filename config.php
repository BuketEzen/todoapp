<?php
class Config{
    public $appName='todolist';
    protected $appVersion ='v1';

    

}

class DbConfig extends Config {
    private $dbPath='data/';
    private $dbFile;

    public function __construct(string $dbFile)
    { 
        $this->dbFile=$dbFile;
        $dirCheck=is_dir($this->dbPath);
        $fileCheck=file_exists($this->dbPath.$this->dbFile.'.json');
        
        if(!$dirCheck){
            $this->dirCreate();
        }

        if(!$fileCheck){
            $this->dbCreate($dbFile);
        }
    }

    private function dirCreate():bool{
       return mkdir($this->dbPath);
    
    }

    private function dbCreate(string $dbName):bool{
        return file_put_contents($this->dbPath.$dbName.'.json',json_encode([]));

    }

    public function getDbFile():string{
        return $this->dbPath . $this->dbFile .'.json';

    }

}


?>