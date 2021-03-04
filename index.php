<?php require_once 'authController.php'; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
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
    </style>
    <title> Register </title>
  </head>
  <body>
  


<div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
                <form action="index.php" method="post">
                    <h3 class="text-center"> Generate <b>PDF</b></h3>
                    <h6><a href="invoice-demo.html">sample</a></h6>
                    <div class="form-group">
                        <label for="name">Name: </label>
                        <input type="text" name="name" class="form-control form-control-lg" required placeholder="Student's name">
                    </div>
                    <div class="form-group">
                        <label for="class">Class: </label>
                        <input type="text" class="form-control form-control-lg" name="class" Required placeholder="Student's class">
                    </div>
                    <div class="form-group">
                        <label for="date">Date: <i>(date of fee payment)</i> </label>
                        <input type="Date" name="date" class="form-control form-control-lg" required>
                    </div>
                    <div class="form-group">
                        <label for="month">For-Month: </label>
                        <select name="month" class="form-select form-control form-control-lg" aria-label="Default select example" required>
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
                        <input type="number" class="form-control form-control-lg" name="amt" Required placeholder="Fees paid">
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