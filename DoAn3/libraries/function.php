<?php 


    /**
     *  input
     */
    
    function  getInput($string)
    {
        return isset($_GET[$string]) ? $_GET[$string] : '';
    }

    
    /**
     * post Input
     */
    
    function  postInput($string)
    {
        return isset($_POST[$string]) ? $_POST[$string] : '';
    }



    function base_url()
    {
        // return $url  = "http://codedoan.com/"; 
        return $url  = "http://localhost/Webphp/DoAn3/"; 
    }

    function modules($url)
    {
        return base_url() . "admin/modules/" .$url ;
    }

    /**
     *  redirect về các trang 
     */
    if ( ! function_exists('redirectAdmin'))
    {
        function redirectAdmin($url = "")
        {
            header("location: ".base_url()."admin/modules/{$url}");exit();
        }
    }

    if ( ! function_exists('redirectLeader'))
    {
        function redirectLeader($url = "")
        {
            header("location: ".base_url()."leader/modules/{$url}");exit();
        }
    }
    /**
     *  redirect về các trang 
     */
    if ( ! function_exists('redirect'))
    {
        function redirect($url = "")
        {
            header("location: ".base_url().$url);exit();
        }
    }

    ?>