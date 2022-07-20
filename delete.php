<?php

include_once(dirname(__FILE__) . "/controller/Actions.php");

    $message['message'] = '';
    $message['status'] = '';

    $id = $_GET['id'];

    $status = Actions::delete($id);

    if($status == true){
        header("location: index.php");
    }else{
        echo "Erro";
    }

?>
