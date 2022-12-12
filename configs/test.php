<?php
//make crud in pdo?
class connection{

    public $cnn;

    public function __construct(){  

        $host = 'localhost';
        $db_name = "db_name";
        $username = "db_username";
        $password = "db_password";

        try {
            $this->cnn = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);         
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }

    }


    public function select($query){ //this function is created for get data
        $result = $this->cnn->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($query){ //this function is created for insert data. it will be return last inserted id.
        $this->cnn->exec($query);
        return $this->cnn->lastInsertId();      
    }

    public function update($query){ //this function is created for update data and it will be return effected rows (which are updated)
        return $this->cnn->exec($query);        
    }

    public function delete($query){ // this function is use to delete data.
        return $this->cnn->exec($query);        
    }
}

$action = new connection;

$result = $action->select("select * from table_name");
print_r($result);

$result = $action->insert("insert into table_name set column_1 = 'first_value', column_2='second_value'");
$result = $action->update("update table_name set column_1 = 'first_value', column_2='second_value' where id=1");
$result = $action->delete("delete from table_name where id=1");
?>