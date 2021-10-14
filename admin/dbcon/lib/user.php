<?php

class user implements crud {

    private  $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function  insert($data){
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];

        $sql = "INSERT INTO users(name, email, phone) VALUES(?, ?, ?)";
        try{
            $stmt =$this->conn->prepare($sql);
            if($stmt->execute([$name, $email, $phone])){
                return "New record created successfully";
            }
        }
        catch (PDOException $e) {
            return $sql . "<br>" . $e->getMessage();
        }
        return false;
    }

    public function read()
    {
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function edit($id) {
        $sql = "SELECT * FROM users WHERE id=$id";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();

    }

    public function update($id, $data)
    {
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];

        try{
        $sql = "UPDATE users SET name='".$name."',email='".$email."',phone='".$phone."' WHERE id=$id";
        $stmt = $this->conn->prepare($sql);
        if($stmt->execute()){
            return $stmt->rowCount(). " record updated successfully ";
        }
        }catch(PDOException $e) {
            return  $sql . "<br>" . $e->getMessage();
        }
        return false;
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM users WHERE id=$id";
            $stmt = $this->conn->prepare($sql);
            if($stmt->execute()){
                return "Record deleted successfully";
            }
        } catch (PDOException $e) {
            return $sql . "<br>" . $e->getMessage();
        }
        return false;
        }
}
?>