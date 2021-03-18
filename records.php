<?php require_once 'authController.php'; 
if (!isset($_SESSION['password'])) {
    header('location: login.php');
}
function fetch_data(){
    $output = "";
    $connect = mysqli_connect("sql201.epizy.com", "epiz_28067526", "dZNcQBy9jOjwqkO", "epiz_28067526_pdf");
    if ($connect->connect_error) {
    	die('Database error ' .$connect->connect_error);
	}
    $query = "SELECT * FROM pdf";
    $result = mysqli_query($connect, $query);
    $num = mysqli_num_rows($result);
    $num = mysqli_num_rows($result);
        while($row = mysqli_fetch_array($result)){
        $output .= '
            <tr>
                <td>'.$row["Id"].'</td>
                <td>'.$row["Name"].'</td>
                <td>'.$row["Class"].'</td>
                <td>'.$row["Date"].'</td>
                <td>'.$row["For_Month"].'</td>
                <td>'.$row["Amount"].'</td>
            </tr>
            ';
        }
        
    
    return $output;
} 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="shortcut icon" href="logos.png" type="image/png">
   </head>
   <body>
<br><br>
<div class="container" style="width: 700px;">
    <h3 align="center"> Records you have added </h3>
    <a href="/" class="btn btn-danger"> Go Back </a><br><br>
    <div class="table-responsive">
        <table class="table table-bordered>
            <tr>
                <th width="">  </th>
                <th width=""> Id </th>
                <th width=""> Name </th>
                <th width=""> Class </th>
                <th width=""> Date </th>
                <th width=""> Month </th>
                <th width=""> Amount </th>
            <tr>
            <?php
                echo fetch_data();
            ?>
        <table>
        <br>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>