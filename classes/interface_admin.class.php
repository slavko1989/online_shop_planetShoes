<?php

class Interface_admin
{

    public function __construct()
    {

    }


public function path(){
    //return "C:\wamp64\www\php_projects\planet_shoes\admin/";
   return "../../../php_projects/planet_shoes/admin/";

}
    public function head()
    {
        include_once( $this->path()."head.php");

    }

    public function top_c()
    {
        include_once( $this->path()."top_c.php");

    }

    public function sidebar()
    {
        include_once( $this->path()."sidebar.php");
    }

    public function dashboard()
    {
        include_once( $this->path()."dashboard.php");
    }

    public function profile()
    {
        include_once( $this->path()."profile.php");
    }

    public function footer()
    {
        include_once( $this->path()."footer.php");
    }

    public function sub()
    {
        include_once( $this->path()."subscribe.php");
    }

}