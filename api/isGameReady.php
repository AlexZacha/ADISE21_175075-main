<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');


    include_once '../config/Database.php';
    include_once '../config/functions.php';

    $database = new Database();
    $db = $database->connect();

    // Post Object
    $post_id = new Post_Id($db);

    $data = json_decode(file_get_contents("php://input"));

    $post_id->game_id = $data->game_id;

    if($post_id->isGameReady() != null){
        echo json_encode(array('message' => 'ready'));
    }else{
        echo json_encode(array('message' => 'waiting for seccond player'));
    }