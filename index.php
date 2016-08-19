<?php
//session_start();

require "app/classe.php";

if(isset($_GET['view'])){
    $view = $_GET['view'];
}else{
    $view = "index";
}

ob_start();

//START ROUTE

if($view === 'index'){require "view/index.php";}

$content = ob_get_clean();

require "view/template.php";

// END ROUTE