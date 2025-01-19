<?php
namespace App\Table;

class Article{

    private $id;
    private $content;

    public function __get($key)
    {
        $method = 'get' . ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }

    public function getUrl(){
        return 'index.php?p=single&id=' . $this->id;
    }

    public function getExtrait(){
        return substr($this->content, 0, 200);
    }
     
}