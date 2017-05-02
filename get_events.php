<?php



$json = file_get_contents('php://input');

//convert json object to php associative array
$data = json_decode($json, true);





$db = mysqli_connect("localhost","root", ""); 

if (!$db)
 { die('Could not connect to db: ' . mysqli_error());
   echo "error";
    }
  //Select the Database
   mysqli_select_db($db, 'events');

   
   $query = mysqli_query($db,"Select * from event");
   
   while($r = mysqli_fetch_assoc($query))
	   $output[] = $r ;
   $response['result'] = $output ;
   
   echo json_encode($response);
    
    ?>
   
    