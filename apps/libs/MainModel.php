<?php 
class MainModel extends PDO{
    protected $table,$pk;
    public function __construct($table='')
    {
        parent::__construct("mysql:hostname=".HOSTNAME.";dbname=".DBNAME,USERNAME,PASSWORD);
        if(!$this->table)
            $this->table=$table;
        
        if(!$this->pk)
            $this->pk='id';
         
    }
    public function submitData(array $info,$id=null):?int{
        $sql="insert into $this->table set ";
        $wh="";
        if($id){
            $sql="update $this->table set ";
            $wh=" where $this->pk=:$this->pk";
        }
        foreach($info as $colname=>$value){
            $sql.=" $colname=:$colname,";
        }
        $sql=substr($sql,0,-1).$wh;
       if($id){
            $info[$this->pk]=$id;

       }
        $rs=$this->prepare($sql);
        if($rs->execute($info)){
            if($id){
                var_dump($id);
                return $id;
            }
            return $this->lastInsertId();
        }
        return null;
    }
    public function fetchData($cols="*"){
        $sql="select $cols from $this->table order by $this->pk desc";
        $pobj=$this->prepare($sql);
        $pobj->execute();
        return $pobj->fetchAll(PDO::FETCH_ASSOC);
    }
    public function fetchInfo($id,$cols="*"){
        $sql="select $cols from $this->table where $this->pk =$id";
        $pobj=$this->prepare($sql);
        $pobj->execute();
        return $pobj->fetch(PDO::FETCH_ASSOC);
    }
    public function delete($id){
        $sql="delete from $this->table where $this->pk in (?)";
        $pobj=$this->prepare($sql);
        return $pobj->execute([$id]);
    }
    public function fetchQuery($sql){
        $pobj=$this->prepare($sql);
        $pobj->execute();
        return $pobj->fetch(PDO::FETCH_ASSOC);
    }

}
?>