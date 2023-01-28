<?php

class Interface_class
{

    public function __construct()
    {

    }


public function path(){
    return __DIR__."../../interface/";

}
    public function head()
    {
        include_once( $this->path()."head.php");

    }

    public function sidebar()
    {
        include_once( $this->path()."sidebar.php");

    }

    public function top_menu()
    {
        include_once( $this->path()."top_menu.php");
    }

    public function img_header()
    {
        include_once( $this->path()."image_header.php");
    }

    public function product()
    {
        include_once( $this->path()."product_grid.php");
    }

    public function footer()
    {
        include_once( $this->path()."footer.php");
    }

    public function sub()
    {
        include_once( $this->path()."subscribe.php");
    }
    public function user_sidebar()
    {
        include_once( $this->path()."user_panel_sidebar.php");
    }
    public function user_dashboard()
    {
        include_once( $this->path()."users_dashboard.php");
    }

}