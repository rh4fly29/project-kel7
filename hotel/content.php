<?php
if(isset($_GET["page"]) && !empty($_GET["page"])){
    $page = $_GET["page"];
    if(file_exists($page.".php")){
        include($page.".php");
    }else{
        include "404.php";
    }
}else{
    include "home.php";
}
?>