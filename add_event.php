<?php



$json = file_get_contents('php://input');

//convert json object to php associative array
$data = json_decode($json, true);

$title = $data['title_key'];
$description = $data['description_key'];
$address = $data['address_key'];
$date = $data['date_key'];
$image = $data['image_key'];


$db = mysqli_connect("localhost","root", ""); 

if (!$db)
 { die('Could not connect to db: ' . mysqli_error());
   echo "error";
    }
  //Select the Database
   mysqli_select_db($db, 'events');

   
   $query = mysqli_query($db,"insert into event (name , description , date , location , image ) values ('$title' , '$description' , '$date' , '$address' ,'$image') ");
   
   if($query){
 
   $response['key'] = "done";
  echo json_encode($response);

    }
	
	else {
		
		 $response['key'] = "not done";
  echo json_encode($response);
		
	}
    
    ?>
   
    