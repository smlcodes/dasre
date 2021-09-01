 	
<?php

session_start();
// if the user is not logged in, then redirect to the logout page
if(!isset($_SESSION["user_id"])){
    header("location: login.php");
    exit();
}

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(0);
//error_reporting(E_ALL);
date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
include 'db.php';

		
	$sql = "SELECT * FROM investors ORDER BY id";
	//echo "=============== SQL Select =============".$sql;

	$result = mysqli_query($conn, $sql);        
	//echo "=============== Rows =============".mysqli_num_rows($result);

	
if (mysqli_num_rows($result) > 0) {
				$count=0;
               while($row = mysqli_fetch_assoc($result)) {
		 
				  
				
			echo "<tr>";
				echo "<td>".$row["id"]."</td>";
				echo "<td>".$row["name"]."</td>";
				echo "<td>".$row["email"]."</td>";
				echo "<td>".$row["address"]."</td>";
				echo "<td>".$row["phone"]."</td>";
				echo "<td>".$row["accredited_investor"]."</td>";
				echo "<td>".$row["investor_type"]."</td>";
				echo "<td>".$row["interests"]."</td>"; 					
			echo "</tr>";
		 	
				  
				  
				  
		}
	}
	
	
	?>
	
