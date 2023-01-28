<?php
include_once (__DIR__ ."../../database/database.php");
//include_once ("../../php_projects/planet_shoes/database/database.php");
class Model extends Database
{
    private $cat_name;
    private $cat_id;
    private $brand_name;
    private $brand_id;
    private $gender_name;
    private $gender_id;
    private $product_name;
    private $product_price;
    private $product_img;
    private $product_text;
    private $product_id;
    private $product_img_tmp;
    private $search_name;
    private $status_name;
    private $shop_id;
    private $shop_status;
    private $quantity;
    private $date;
    private $wish_id;
    private $sold_id;
    private $sold_status;
    private $sold_date;
    private $order_number;

    private $user_id;
    private $user_name;
    private $user_email;
    private $user_pass;
    private $user_img;
    private $user_info;
    private $user_img_tmp;

    private $user_info_id;
    private $state;
    private $city;
    private $streat;
    private $phone;
    private $add_text;
    private $p_code;

    private $comm_id;
    private $comm_text;
    private $comm_date;
    private $replay_id;

    public function __construct()
    {
        parent:: __construct();
        $this->category_name();
        $this->category_id();
        $this->brand_name();
        $this->brand_id();
        $this->gender_name();
        $this->gender_id();
        $this->product_name();
        $this->product_id();
        $this->product_price();
        $this->product_img();
        $this->product_text();
        $this->product_img_tmp();
        $this->search_name();
        $this->status_name();
        $this->shop_status();
        $this->shop_id();
        $this->quantity();
        $this->date();
        $this->wish_id();
        $this->sold_id();
        $this->sold_status();
        $this->sold_date();
        $this->order_number();

        $this->user_id();
        $this->user_name();
        $this->user_email();
        $this->user_pass();
        $this->user_img();
        $this->user_info();
        $this->user_img_tmp();

        $this->user_info_id();
        $this->state();
        $this->city();
        $this->streat();
        $this->phone();
        $this->p_code();
        $this->add_text();

        $this->comm_id();
        $this->comm_text();
        $this->comm_date();
        $this->replay_id();
    }
public function comm_id()
    {
        if (isset($_POST["com_id"])) {
            $this->comm_id = $_POST["comm_id"];
            return $this->comm_id;
        }
    }
    public function comm_text()
    {
        if (isset($_POST["text_comm"])) {
            $this->comm_text = $_POST["text_comm"];
            return $this->comm_text;
        }
    }
    public function comm_date()
    {
        if (isset($_POST["date_comm"])) {
            $this->comm_date = $_POST["date_comm"];
            return $this->comm_date;
        }
    }
    public function replay_id()
    {
        if (isset($_POST["parent_id"])) {
            $this->replay_id = $_POST["parent_id"];
            return $this->replay_id;
        }
    }

 public function user_info_id()
    {
        if (isset($_POST["user_info_id"])) {
            $this->user_info_id = $_POST["user_info_id"];
            return $this->user_info_id;
        }
    }
     public function streat()
    {
        if (isset($_POST["streat"])) {
            $this->streat = $_POST["streat"];
            return $this->streat;
        }
    }
     public function city()
    {
        if (isset($_POST["city"])) {
            $this->city = $_POST["city"];
            return $this->city;
        }
    }
     public function phone()
    {
        if (isset($_POST["phone"])) {
            $this->phone = $_POST["phone"];
            return $this->phone;
        }
    }
    public function state()
    {
        if (isset($_POST["state"])) {
            $this->state = $_POST["state"];
            return $this->state;
        }
    }
     public function add_text()
    {
        if (isset($_POST["add_text"])) {
            $this->add_text = $_POST["add_text"];
            return $this->add_text;
        }
    }
     public function p_code()
    {
        if (isset($_POST["p_code"])) {
            $this->p_code = $_POST["p_code"];
            return $this->p_code;
        }
    }
     public function user_id()
    {
        if (isset($_POST["user_id"])) {
            $this->user_id = $_POST["user_id"];
            return $this->user_id;
        }
    }
// CATEGORY
    public function category_name()
    {
        if (isset($_POST["cat_name"])) {
            $this->cat_name = $_POST["cat_name"];
            return $this->cat_name;

        }
    }

    public function category_id()
    {
        if (isset($_POST["cat_id"])) {
            $this->cat_id = $_POST["cat_id"];
            return $this->cat_id;
        }
    }

    // BRANDS

    public function brand_name()
    {
        if (isset($_POST["brand_name"])) {
            $this->brand_name = $_POST["brand_name"];
            return $this->brand_name;

        }
    }

    public function brand_id()
    {
        if (isset($_POST["brand_id"])) {
            $this->brand_id = $_POST["brand_id"];
            return $this->brand_id;
        }
    }

    //GENDER

    public function gender_name()
    {
        if (isset($_POST["for_who_name"])) {
            $this->gender_name = $_POST["for_who_name"];
            return $this->gender_name;

        }
    }

    public function gender_id()
    {
        if (isset($_POST["for_who_id"])) {
            $this->gender_id = $_POST["for_who_id"];
            return $this->gender_id;
        }
    }

    //PRODUCT

  public function product_name()
    {
        if (isset($_POST["product_name"])) {
            $this->product_name = $_POST["product_name"];
            return $this->product_name;

        }
    }

    public function product_id()
    {
        if (isset($_POST["product_id"])) {
            $this->product_id = $_POST["product_id"];
            return $this->product_id;
        }
    }
    public function product_price()
    {
        if (isset($_POST["product_price"])) {
            $this->product_price = $_POST["product_price"];
            return $this->product_price;

        }
    }
    public function product_img()
    {
        if (isset($_FILES["product_img"]["name"])) {
            $this->product_img = $_FILES["product_img"]["name"];
            return $this->product_img;

        }
    }
     public function product_img_tmp()
    {
        if (isset($_FILES["product_img"]["tmp_name"])) {
            $this->product_img_tmp = $_FILES["product_img"]["tmp_name"];
            return $this->product_img_tmp;

        }
    }
    public function product_text()
    {
        if (isset($_POST["product_text"])) {
            $this->product_text = $_POST["product_text"];
            return $this->product_text;

        }
    }
    public function search_name()
    {
        if (isset($_POST["search"])) {
            $this->search_name = $_POST["search"];
            return $this->search_name;

        }
    }
     public function status_name()
    {
        if (isset($_POST["status_name"])) {
            $this->status_name = $_POST["status_name"];
            return $this->status_name;

        }
    }
    

    //shopping cart

    public function shop_status()
    {
        if (isset($_POST["shopping_status"])) {
            $this->shop_status = $_POST["shopping_status"];
            return $this->shop_status;

        }
    }
    public function shop_id()
    {
        if (isset($_POST["shopping_cart_id"])) {
            $this->shop_id = $_POST["shopping_cart_id"];
            return $this->shop_id;
        }
    }
     public function quantity()
    {
        if (isset($_POST["quantity"])) {
            $this->quantity = $_POST["quantity"];
            return $this->quantity;
        }
    }
    public function date()
    {
        if (isset($_POST["date_shop"])) {
            $this->date = $_POST["date_shop"];
            return $this->date;
        }
    }
    //wish
    public function wish_id()
    {
        if (isset($_POST["wish_cart_id"])) {
            $this->wish_id = $_POST["wish_cart_id"];
            return $this->wish_id;
        }
    }
//sold
    public function order_number()
    {
        if (isset($_POST["order_number"])) {
            $this->order_number = $_POST["order_number"];
            return $this->order_number;
        }
    }
     public function sold_id()
    {
        if (isset($_POST["sold_id"])) {
            $this->sold_id = $_POST["sold_id"];
            return $this->sold_id;
        }
    }
     public function sold_status()
    {
        if (isset($_POST["sold_status"])) {
            $this->sold_status = $_POST["sold_status"];
            return $this->sold_status;
        }
    }
     public function sold_date()
    {
        if (isset($_POST["date_sold"])) {
            $this->date_sold = $_POST["date_sold"];
            return $this->sold_date;
        }
    }

    //user
    public function user_name(){
        if (isset($_POST["user_name"])) {
            $this->user_name = $_POST["user_name"];
            return $this->user_name;
        }
    }
    public function user_email(){
        if (isset($_POST["user_email"])) {
            $this->user_email = $_POST["user_email"];
            return $this->user_email;
        }
    }
    public function user_pass(){
        if (isset($_POST["user_pass"])) {
            $this->user_pass = $_POST["user_pass"];
            return $this->user_pass;
        }
    }
    
    public function user_img()
    {
        if (isset($_FILES["user_img"]["name"])) {
            $this->user_img = $_FILES["user_img"]["name"];
            return $this->user_img;

        }
    }
    public function user_info(){
        if (isset($_POST["user_info"])) {
            $this->user_info = $_POST["user_info"];
            return $this->user_info;
        }
    }

     public function user_img_tmp()
    {
        if (isset($_FILES["user_img"]["tmp_name"])) {
            $this->user_img_tmp = $_FILES["user_img"]["tmp_name"];
            return $this->user_img_tmp;

        }
    }

}
