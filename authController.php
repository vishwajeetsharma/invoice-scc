<?php

session_start();
$name = '';
$class = '';
$newDate = '';
$date = '';
$month = '';
$amt = '';
$id = '';
$errors = array();

// If user clicks on generate button 
if(isset($_POST['Generate-btn'])){
	$name = $_POST['name'];
	$class = $_POST['class'];
	$newDate = $_POST['date'];
    $date = date("d-m-Y", strtotime($newDate));
	$month = $_POST['month'];
	$amt = $_POST['amt'];
	$id = '';
    $errors = array();


    // validating data
    // empty and correct form validation
    if (empty($name)) {
        $errors['name'] = "Name Required";
    }
    if (empty($class)) {
        $errors['class'] = "Class Required";
    }
    if (empty($newDate)) {
        $errors['date'] = "Date  Required";
    }
    if (empty($month)) {
        $errors['month'] = "Month  Required";
    }
    if (empty($amt)) {
        $errors['amt'] = "Amount  Required";
    }
    if(count($errors) === 0){
        
        $conn = new mysqli("localhost", "root", "", "pdf");
        if ($conn->connect_error) {
            die('Database error ' .$conn->connect_error);
        }
        $con = " INSERT INTO pdf (Name, Class, date, For_Month, Amount) values ('$name', '$class', '$date', '$month', '$amt') ";
        mysqli_query($conn, $con);
        
        $sql = " select * from pdf where Name = '$name' && For_Month ='$month' && Class = '$class' ";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
            if($num == 1){
                // getting user details
                while ($row = mysqli_fetch_assoc($result)) {
                    $id = $row['Id'];
                    
                }
            }

                $html = '
                <!DOCTYPE html>
                <html>
                <head>
                    <title>Invoice</title>
                    <style type="text/css">
                        ul{
                            list-style-type: none;
                        }
                        li{
                            font-size: 45px;
                        }
                        h1{
                            font-size: 55px
                        }
                        .small{
                            font-size: 0.5em;
                        }
                        .img{
                            height:105px;
                            width: auto;
                            float:right;
                        }
                        #hidden{
                            display:hidden;
                        }
                    </style>
                </head>
                <body style="text:center;">
                        <img src="logo.png" height="240px" width="auto">
                        <h1> Shukla Commerce Classes </h1>
                    <div class="list">
                        <ul style="list-style-type: none;text-align:center;">
                            <li style="font-size: 45px;"><b>Invoice No. :</b>';$html .=$id;$html .='</li><br><br>
                            <li style="font-size: 45px;"><b>Name :</b>';$html .=$name;$html .='</li><br><br>
                            <li style="font-size: 45px;"><b>Class :</b>';$html .=$class;$html .='</li><br><br>
                            <li style="font-size: 45px;"><b>Date :</b>';$html .=$date;$html .='</li><br><br>
                            <li style="font-size: 45px;"><b>For Month :</b>';$html .=$month;$html .='</li><br><br>
                            <li style="font-size: 45px;"><b>Amount :</b> Rs. ';$html .=$amt;$html .='</li><br><br><br>
                            
                            <table>
                <thead>
                    <tr>
                    <th></th>
                    <th></th>
                    <th><img src="image.png" width="160px"></th>
                    </tr>
                </thead>
                </table>

                            <li style="font-size: 45px;text-align:center;">
                            <a style="font-size:0.5em" class="small" href="tel:+91 8010604381">+91 80106 04381</a></li><br>
                            <li style="font-size: 45px;text-align:center;"><a style="font-size:0.5em" class="small" href="mailto:shuklacommerceclasses@gmail.com">shuklacommerceclasses@gmail.com</a></li>
                        </ul>
                    </div>
                    <style>
                    *{
                        padding: 0;
                        margin: 0;
                        text-align: center;
                    }
                    ul{
                        list-style-type: none;
                    }
                    li{
                        font-size: 45px;
                    }
                    h1{
                        font-size: 55px
                    }
                    .date-1{
                        text-decoration: underline;
                    }
                    .Date{
                        position: absolute;
                        top: 5%;
                        right: 15%;
                        font-size: 22px;
                        border: 1px solid #000;
                        border-radius: 25px;
                        padding: 5px 20px; 
                    }
                    .small{
                        font-size: 0.5em;
                    }
                    </style>
                </body>
                </html>
            ';
        require_once('tcpdf/tcpdf.php');
        $tcpdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set default monospaced font
        $tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set title of pdf
        $tcpdf->SetTitle('Invoice');

        // set margins
        $tcpdf->SetMargins(10, 10, 10, 10);
        $tcpdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $tcpdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set header and footer in pdf
        $tcpdf->setPrintHeader(false);
        $tcpdf->setPrintFooter(false);
        $tcpdf->setListIndentWidth(3);

        // set auto page breaks
        $tcpdf->SetAutoPageBreak(TRUE, 11);

        // set image scale factor
        $tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        $tcpdf->AddPage();

        $tcpdf->SetFont('times', '', 10.5);

        $tcpdf->writeHTML($html, true, false, false, false, '');

        //Close and output PDF document
        $tcpdf->Output($id.'-'.$name.'-'.$month.'.pdf');
    }
}



if(isset($_POST['Login-btn'])){
	$password = $_POST['password'];
	$pass = "1234";
	if($password == $pass){
		$_SESSION['password'] = $password;
        $_SESSION['username'] = $_POST['username'];
		header('location: /');
	}
}