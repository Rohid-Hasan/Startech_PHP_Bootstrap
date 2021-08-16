<?php 

class Product{
    private $id;
    private $title;
    private $imagePath;
    private $price;
    private $category;
    private $keyFeatures;

    function __construct($id,$title,$imagePath,$price,$category,$keyFeatures)
    {
        $this->id = $id;
        $this->title = $title;
        $this->imagePath = $imagePath;
        $this->price = $price;
        $this->category = $category;
        $this->keyfeatures = array();
        $this->keyFeatures =  $keyFeatures;
    }

    function get_id(){
        return $this->id;
    }

    function get_title(){
        return $this->title;
    }

    function get_imagePath(){
        return $this->imagePath;
    }

    function get_price(){
        return $this->price;
    }

    function get_category(){
        return $this->category;
    }

    function get_keyFeatures(){
        return $this->keyFeatures;
    }

    function set_id($id){
        $this->id = $id;
    }

    function set_title($title){
        $this->title = $title;
    }
    
    function set_imagePath($imagePath){
        $this->imagePath = $imagePath;
    }

    function set_price($price){
        $this->price = $price;
    }

    function set_category($category){
        $this->category = $category;
    }

    function set_keyFeatures($keyFeatures){
        $this->keyFeatures = $keyFeatures;
    }


}