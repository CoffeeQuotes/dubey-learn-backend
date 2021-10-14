<?php

class order implements crud {
    public function  insert($data, $conn=""){
        echo "insert order";
    }
    public function read($conn = "")
    {
        echo "read order";
    }
    public function edit($id, $conn="") {
        echo "edit order";
    }
    public function update($id, $data, $conn="")
    {
        echo "update order";
    }
    public function delete($id, $conn="")
    {
        echo "delete order";
    }
}
?>