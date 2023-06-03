<?php require_once 'authController.php';
if (isset($_SESSION['password'])) {
    header('location: /');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="shortcut icon" href="logos.png" type="image/png">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Lora');

        .form-div {
            margin: 50px auto 50px;
            padding: 25px 15px 10px 15px;
            border: 1px solid #80ced7;
            border-radius: 5px;
            font-size: 1.1em;
        }

        .form-control:focus {
            box-shadow: none;
        }

        form p {
            font-size: 0.89em;
        }

        .form-group {
            margin-top: 25px;
        }
    </style>
    <title> Login </title>
</head>

<body>



    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form-div">
                <form action="index.php" method="post">
                    <h3 class="text-center"><b> Login </b></h3>
                    <p align="center">Use password "1234" to login with any username</p>
                    <div class="form-group">
                        <label for="username">User Name: </label>
                        <input type="text" name="username" class="form-control form-control-lg"
                            placeholder="Your random Username" value="">
                    </div>
                    <div class="form-group">
                        <label for="password">Password: </label>
                        <input type="password" name="password" class="form-control form-control-lg" required
                            placeholder="Password for login into SCC">
                    </div>
                    <div class="form-group d-grid gap-2">
                        <button type="submit" class="btn btn-block btn-primary btn-lg" name="Login-btn"> Login
                        </button>
                    </div>


                </form>


            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
        crossorigin="anonymous"></script>
</body>

</html>