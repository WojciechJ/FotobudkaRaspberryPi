<?php
define("SERVER", "localhost");
define("USER", "id9844448_fotobudka");
define("PASSWORD", "fotobudka");
define("DB", "id9844448_fotobudka");

$mysql = new mysqli(SERVER,USER,PASSWORD,DB);

$response = array();

if($mysql->connect_error){
    echo "SERVER ERROR - CANNOT CONNECT WITH DB";
}else{

$code_from_request = $_GET["code"];

$sql = 'SELECT name FROM Photos where code ='.  $code_from_request;
$result = $mysql->query($sql);
$row = $result->fetch_assoc();

$file_name = $row['name'];

$photo_url = 'https://fotobudkaraspberry.000webhostapp.com/photos/' . $file_name;

$data['url'] = $photo_url;

echo json_encode($data);

}
