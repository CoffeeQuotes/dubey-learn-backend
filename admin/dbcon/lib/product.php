<?php

class product implements crud {
    private  $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function  insert($data): string
    {
        $name =  $data['name'];
        $brand =  $data['brand'];
        $color =  $data['color'];
        $image =  $data['image'];
        $price =  $data['price'];
        $desc =  $data['desc'];

        $sql = "INSERT INTO products (product_name, product_brand, product_color, product_img, product_price, product_desc)
        VALUES (?,?,?,?,?,?)";

        try {
            $stmt = $this->conn->prepare($sql);
            if($stmt->execute([$name,
                $brand,
                $color,
                $image,
                $price,
                $desc])) {
                return "New record created successfully";
            }
        }
        catch (PDOException $e) {

            return $sql . "<br>" . $e->getMessage();
        }
        return "Failed to create record!";
    }

    public function read()
    {
        $stmt = $this->conn->prepare("SELECT * FROM products");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function edit($id)
    {
        $sql = "SELECT * FROM products WHERE id=$id";
        $stmt =  $this->conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    public function update($id, $data) {
        $name =  $data['name'];
        $brand =  $data['brand'];
        $color =  $data['color'];
        $image =  $data['image'];
        $price =  $data['price'];
        $desc =  $data['desc'];

        try {
            $sql = "UPDATE products SET product_name='".$name."', product_brand='".$brand."', product_color='".$color."',product_img='".$image."', product_price='".$price."', product_desc='".$desc."' WHERE id=$id";
            //        echo $sql;
            // Prepare statement
            $stmt = $this->conn->prepare($sql);
            // execute the query
            if($stmt->execute()) {
                return $stmt->rowCount() . " records UPDATED successfully";
            }
        } catch(PDOException $e) {
            return  $sql . "<br>" . $e->getMessage();
        }
       return false;
    }

    public function delete($id)
    {
        try {
            $sql = "DELETE FROM products WHERE id=$id";
//            echo $sql;
            // use exec() because no results are returned
            $stmt = $this->conn->prepare($sql);
            if($stmt->execute()) {
                return "Record deleted successfully";
            }
        } catch(PDOException $e) {
            return $sql . "<br>" . $e->getMessage();
        }
        return false;
    }

}
