<?php require_once 'authController.php'; 
if (!isset($_SESSION['password'])) {
    header('location: login.php');
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
    <style>
        @import url('https://fonts.googleapis.com/css?family=Lora');

.form-div{
    margin: 50px auto 50px;
    padding: 25px 15px 10px 15px;
    border: 1px solid #80ced7;
    border-radius: 5px;
    font-size: 1.1em;
}
.form-control:focus{
    box-shadow: none;
}
form p{
    font-size: 0.89em;
}
.form-group{
    margin-top: 25px;
}
.logout{
    float: right;
}
    </style>
    <title> Register </title>
  </head>
  <body>
  


<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
            <h3 class="text-center text-danger"> Welcome <b><?php echo $_SESSION['username'] ?></b></h3>
            <hr>
            <?php if(count($errors) > 0): ?>
                    <div class="alert alert-danger">
                        <?php foreach($errors as $error): ?>
                            <li><?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                <form action="index.php" method="post">
                    <h3 class="text-center"> Generate <b>PDF</b></h3>
                    <h6><a href="records.php">Records</a><a href="logout.php" class="logout">Logout</a></h6>
                    <div class="form-group">
                        <label for="name">Name: </label>
                        <input type="text" name="name" class="form-control form-control-lg" placeholder="Student's name" value="<?php echo $name ?>">
                    </div>
                    <div class="form-group">
                        <label for="class">Class: </label>
                        <input type="text" class="form-control form-control-lg" name="class" placeholder="Student's class" value="<?php echo $class ?>">
                    </div>
                    <div class="form-group">
                        <label for="date">Date: <i>(date of fee payment)</i> </label>
                        <input type="Date" name="date" class="form-control form-control-lg" value="<?php echo $newDate ?>">
                    </div>
                    <div class="form-group">
                        <label for="month">For-Month: </label>
                        <select name="month" class="form-select form-control form-control-lg" aria-label="Default select example">
						  <option selected disabled>---month---</option>
						  <option value="January">January</option>
						  <option value="February">February</option>
						  <option value="March">March</option>
						  <option value="April">April</option>
						  <option value="May">May</option>
						  <option value="June">June</option>
						  <option value="July">July</option>
						  <option value="August">August</option>
						  <option value="September">September</option>
						  <option value="October">October</option>
						  <option value="November">November</option>
						  <option value="December">December</option>
						</select>
                    </div>
                    <div class="form-group">
                        <label for="amt">Amount: </label>
                        <input type="number" class="form-control form-control-lg" name="amt" placeholder="Fees paid" value="<?php echo $amt ?>">
                    </div>
                    <div class="form-group d-grid gap-2">
                        <button type="submit" class="btn btn-block btn-primary btn-lg" name="Generate-btn"> Generate </button>
                    </div>
                

                </form>


            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  </body>
</html>