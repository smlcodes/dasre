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

?>
<!DOCTYPE html> 
<html lang="en"> 
<head> <!-- Required meta tags --> 
  <meta charset="utf-8"> 
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <!-- Bootstrap CSS --> 
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.min.css'>
<link rel='stylesheet' href='https://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css'>
  
  <title>iNSIDEBAR - Stock Screener</title> 
</head> 
<body>
  <div class="container">
    <div class="row">
      <div style="background-color:AliceBlue">
          <h2><center>iNSIDEBAR - Stock Screener</center></h2>
      <!--  <div class="alert alert-success" role="alert">
          Login Successful !
        </div> -->
      </div>
      </div>
      <div class="text-right">
        <a href="logout.php">
          <button type="button" class="btn btn-default">Logout</button>
        </a>
      </div>
     
    </div>
    <div class="container">
	<hr>
	
	
	
	
	
	<!-- Table Start  -->
	
	
<div id="toolbar">
	<!--	<div class="row"><b>Download List</b></div>
		<div class="row"><select class="form-control">
				<option value="">Basic</option>
				<option value="all" selected>All</option>
				<option value="selected">Selected</option>
		</select></div> -->
        <button type="button" class="btn btn-default" onclick="location.reload()">Refresh</button>
</div>


<table id="table" 
			 data-toggle="table"
			 data-filter-control="true" 
			 data-show-export="true"
			 data-toolbar="#toolbar"
       class="table-responsive">
	<thead bgcolor= "AliceBlue">
		<tr>
			<!-- <th data-field="state" data-checkbox="true"></th> -->
			<th data-field="id" data-filter-control="input" data-sortable="true">ID</th>
			<th data-field="name" data-filter-control="input" data-sortable="true">Name</th>
			<th data-field="email" data-filter-control="input" data-sortable="true">Email</th>
			<th data-field="address" data-filter-control="input" data-sortable="true">Address</th>
			<th data-field="phone" data-filter-control="input" data-sortable="true">Phone</th>
			<th data-field="accredited_investor" data-filter-control="input" data-sortable="true">accredited_investor</th>
			<th data-field="investor_type" data-filter-control="select" data-sortable="true">investor_type</th> 
			<th data-field="interests" data-filter-control="input" data-sortable="true">Interests</th>
		</tr>
	</thead>
	<tbody id="tableDataAjax">
	
<?php
	
	$sql = "SELECT * FROM investors ORDER BY id";
	//echo "=============== SQL Select =============".$sql;

	$result = mysqli_query($conn, $sql);                                                			
if (mysqli_num_rows($result) > 0) {
				$count=0;
               while($row = mysqli_fetch_assoc($result)) {
		 
				  
				
			echo "<tr>";
			//	echo "<td class=\"bs-checkbox \"><input data-index=\"".$count."\" name=\"btSelectItem\" type=\"checkbox\"></td>";
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
	

		 
	</tbody>
</table>



      <p id="last_updated"> Last Updated : </p>




	
	
	
	
	
	
	<!-- Table End --->	
  </div>
  <br/><br/><br/>
  
  <!-- Optional JavaScript --> <!-- jQuery first, then Popper.js, then Bootstrap JS --> 
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 

  
  
  
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.10.0/bootstrap-table.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/editable/bootstrap-table-editable.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/export/bootstrap-table-export.js'></script>
<script src='https://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-table/1.9.1/extensions/filter-control/bootstrap-table-filter-control.js'></script>


      <script id="rendered-js" >
//exporte les données sélectionnées
var $table = $('#table');
$(function () {
  $('#toolbar').find('select').change(function () {
    $table.bootstrapTable('refreshOptions', {
      exportDataType: $(this).val() });

  });
});

var trBoldBlue = $("table");

$(trBoldBlue).on("click", "tr", function () {
  $(this).toggleClass("bold-blue");
});
//# sourceURL=pen.js






//ajax Call

function sendAjaxRequest(){
	console.log('Ajax start');
    $.ajax({
        url: "tableAjax.php",
        success: 
        function(result){
            $('#tableDataAjax').html(result); //insert text of test.php into your div
			var dt = new Date();
			var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
			$('#last_updated').html('Last Updated at :  <b>'+time+'</b>'); //insert text of test.php into your div
			
			
            setTimeout(function(){
                sendAjaxRequest(); //this will send request again and again;
            }, 300000);
        }
    });
	console.log('Ajax end');
}




$( document ).ready(function() {
	
    sendAjaxRequest();
	
});


















 





    </script>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
</body> 
</html>
