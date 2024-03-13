<?php

class View{
    public static function view($page,$data=null){
        require "../Views/$page.php";

    }
}

