<?php


ini_set('memory_limit','256M');

require '../vendor/autoload.php';
require 'helpers.php';
require 'config.php';
require 'Database.php';

/* ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);    */


date_default_timezone_set('Asia/Kolkata');

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Slim\Http\UploadedFile;

function connectdb(){
    $db = new Database(DB_NAME, DB_USERNAME, DB_PASSWORD, DB_HOST); 
    return  $db;
}

$dotenv = new Dotenv\Dotenv(__DIR__ . str_repeat(DIRECTORY_SEPARATOR . '..', 2));
$dotenv->load();

/*$config = [
    'apiKey' => $_ENV['API_KEY'],
    'secret' => $_ENV['SECRET'],
    'host' => $_ENV['HOST']
];*/
$config = [
    // 'apiKey' => $_ENV['API_KEY'],
    // 'secret' => $_ENV['SECRET'],
    // 'host' => $_ENV['HOST'],
    'settings' => [
    // Slim Settings
    'determineRouteBeforeAppMiddleware' => true,
    'displayErrorDetails' => true,
    'addContentLengthHeader' => false]
];
$app = new \Slim\App($config);

$container = $app->getContainer();
$container['upload_directory'] = __DIR__ . '/uploads';




function getAccessTokenfromDB($shop){

    $db = connectdb();
    $db->select("csp_sf-stores",array("domain_name"=>$shop));
    $shop =$db->result_array();
    $access_token = $shop[0]['access_token'];
    return $access_token;
}

 

    // insert record
    $app->post('/insert', function($request, $response) {
        $db = connectdb();
        $in = new Database(DB_NAME, DB_USERNAME, DB_PASSWORD, DB_HOST);
        // move_uploaded_file($_FILES["profilepic"]["name"], "uploads");
        $filename = $_FILES["profilepic"]["name"];

        $tempname = $_FILES["profilepic"]["tmp_name"];  
    
        $folder = "uploads/".$filename;   
        
        
        if (move_uploaded_file($tempname, $folder)) {
        //   echo "File is valid, and was successfully uploaded.\n";
        } else {
        //    echo "Upload failed";
        }
        $newhobbies = implode(",", $_POST["hobbies"]);
        $in->insert("users",["profilePic"=>$_FILES["profilepic"]["name"], "firstName"=>$_POST["fname"], "lastName"=>$_POST["lname"], "email"=>$_POST["email"], "gender"=>$_POST["gender"], "course"=>$_POST["course"], "description"=>$_POST["description"] , "hobbies"=>$newhobbies, "password"=>$_POST["password"]]);
        echo "Done";
        exit();
        // $params = $request->getQueryParams();
    
    });


    // view
    $app->post('/view', function($request, $response){
        $db = connectdb();
        
        // echo "select";
        // $v = new Database(DB_NAME, DB_USERNAME, DB_PASSWORD, DB_HOST);
        $result=$db->select("users");
        $jdata = $result->result();
        echo json_encode($jdata);
        
        // exit();

        // $result=$db->select("users");
        // $jdata = $result->result_array();
        // echo json_encode($jdata);

    });


    // delete
    $app->post('/delete', function($request, $response){
        $v = new Database(DB_NAME, DB_USERNAME, DB_PASSWORD, DB_HOST);
        $id = $_POST["id"];
        $v->delete("users", ['id'=>$id]);
        echo "deleted";
    });


    // count total records
    $app->get('/countRecords', function($request, $response){
        $v = new Database(DB_NAME, DB_USERNAME, DB_PASSWORD, DB_HOST);
        $v->countRecords();
        $total_data =  $v->totalrecords;
        echo $total_data;

    });


    // edit data
    $app->post('/edit', function($request, $response){
        $db = connectdb();
        $id = json_decode($_POST["editi"]);
        $result=$db->select("users", ['id'=>$id]);
        $jdata = $result->result();
        echo json_encode($jdata);
        
    });


    $app->post('/update', function($request, $response){
        $in = new Database(DB_NAME, DB_USERNAME, DB_PASSWORD, DB_HOST);
        // move_uploaded_file($_FILES["profilepic"]["name"], "uploads");
        
        if($_FILES["profilepic"]["name"] == ""){
            $newimg = $_POST["oldimgtxt"];
        }else{
            $newimg = $_FILES["profilepic"]["name"];
        }
        
        $filename = $newimg;

        $tempname = $newimg;  
    
        $folder = "uploads/".$filename;   
        
        
        if (move_uploaded_file($tempname, $folder)) {
        //   echo "File is valid, and was successfully uploaded.\n";
        } else {
        //    echo "Upload failed";
        }
        $newhobbies = implode(",", $_POST["hobbies"]);
        $in->update("users",["profilePic"=>$newimg, "firstName"=>$_POST["fname"], "lastName"=>$_POST["lname"], "email"=>$_POST["email"], "gender"=>$_POST["gender"], "course"=>$_POST["course"], "description"=>$_POST["description"] , "hobbies"=>$newhobbies, "password"=>$_POST["password"]], ["id"=>$_POST["nid"]]);
        
        exit();
    });


    $app->POST('/search', function($request, $response){
        $in = new Database(DB_NAME, DB_USERNAME, DB_PASSWORD, DB_HOST);
        echo $_POST['searchdata'];
        $result = $in->select("users", ["firstName"=>$_POST["searchdata"], "lastName"=>$_POST["searchdata"], "email"=>$_POST["searchdata"], "gender"=>$_POST["searchdata"], "course"=>$_POST["searchdata"], "description"=>$_POST["searchdata"],"hobbies"=>$_POST["searchdata"]], false, false, "OR");
        $jdata = $result->result();
        echo json_encode($jdata);
        exit();
    });

$app->run();