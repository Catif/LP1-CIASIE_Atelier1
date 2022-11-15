<?php
namespace atelier\utils;

class HttpRequest extends AbstractHttpRequest{
    function __construct(){
        $this->script_name = $_SERVER['SCRIPT_NAME'];
        $this->path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : null;
        $this->root = dirname($_SERVER['SCRIPT_NAME'],1);
        $this->method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : null;
        $this->get = isset($_GET) ? $_GET : [];
        $this->post = isset($_POST) ? $_POST : [];
    }
}