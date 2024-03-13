<?php
require "View.php";
class Controller{
    public function index(){
        $name ='hello';
        View::view('test',$name);
        // urlencode($name)
    }
    public function show(){
        View::view('show');
    }
} 
