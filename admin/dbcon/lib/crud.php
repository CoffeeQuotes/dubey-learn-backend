<?php

interface crud {
    public function  insert($data);
    public function read();
    public function edit($id);
    public  function  update($id, $data);
    public  function  delete($id);
}