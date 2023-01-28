<?php
include_once(__DIR__."../../classes/interface.class.php");
include_once(__DIR__."../../classes/wish_view.class.php");
include_once(__DIR__."../../classes/brand_view.class.php");
include_once(__DIR__."../../classes/interface_admin.class.php");
include_once(__DIR__."../../classes/category_view.class.php");
include_once(__DIR__."../../classes/gender_view.class.php");
include_once(__DIR__."../../classes/product_view.class.php");
include_once(__DIR__."../../classes/product.class.php");
include_once(__DIR__."../../classes/user_controler.class.php");
include_once(__DIR__."../../classes/shopping_view.class.php");
include_once(__DIR__."../../classes/sold_view.class.php");
include_once(__DIR__."../../classes/sold.class.php");
include_once(__DIR__."../../classes/comm_view.class.php");
include_once(__DIR__."../../classes/model.class.php");
include_once(__DIR__."../../classes/comm.class.php");
include_once(__DIR__."../../classes/valid.class.php");









spl_autoload_register('myAutoLoader');
function myAutoLoader($className){
    echo $className."<br>";
    $path = dirname(__FILE__)."../../classes/";
    echo $path ."<br>";
    $extension = ".class.php";
    echo $extension."<br>";
    $fullPath = $path .  $className . $extension;
    echo $fullPath."<br>";
    if(!file_exists($fullPath)){
        //include_once $fullPath;
        return false;
    }
    include_once $fullPath;
    }
