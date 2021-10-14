<?php


class uploadImage
{
    public  $errors = array();
    protected $file_name;
    protected $file_size;
    protected $file_tmp;
    protected $file_type;
    protected $file_ext;
    private $extensions= array("jpeg","jpg","png");

    public function __construct($data)
    {
        $this->file_name =  $data['image']['name'];
        $this->file_size = $data['image']['size'];
        $this->file_tmp = $data['image']['tmp_name'];
        $this->file_type= $data['image']['type'];
        $explode = explode('.', $data['image']['name']);
        $this->file_ext= strtolower(end($explode));
//        $this->upload();
    }

    public function upload() {
        if(in_array($this->file_ext, $this->extensions)=== false){
                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($this->file_size > 2097152){
                $errors[]='File size must be exactly 2 MB';
        }

        if(empty($errors)==true){
        move_uploaded_file($this->file_tmp,"images/".$this->file_name);
       // $product = $_POST;
       return $this->file_name;
       // $msg =  $newProduct->insert($product, $conn); // return string based on operation status success/ failure
//                echo "Success";
    }
}
}