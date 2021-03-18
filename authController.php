<?php

session_start();
$name = '';
$email = '';
$class = '';
$newDate = '';
$date = '';
$month = '';
$amt = '';
$id = '';
$errors = array();
$erroros = array();

// If user clicks on generate button 
if(isset($_POST['Generate-btn'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
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
    if (empty($email)) {
        $errors['email'] = "Email Required";
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Email address is invalid";
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
        $con = " INSERT INTO pdf (Name, email, Class, date, For_Month, Amount) values ('$name', '$email', '$class', '$date', '$month', '$amt') ";
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
                    <th></th>
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
        $htmls = '
                <h1> Dear '.$name.',</h1>
                <h2> Thank you for your payment </h2>
                <h2> we have received your ₹'.$amt.'</h2>
                <h2> Attached PDF with this email is your Invoice </h2>
                <p><b>Note:</b> This is an auto generated mail from <a href="http://www.shuklacommerceclasses.ml">shuklacommerceclasses.ml</a> by <a href="https://instagram.com/vishwajeet4398"> Vishwajeet Sharma </a> It is clarified that this is an totally legal mail from us you can show this invoice with this mail as your evidence<br>Regards,<br><b>Anurag Shukla</b></p>
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
        // $tcpdf->Output(__DIR__ . $id.'-'.$name.'-'.$month.'.pdf', 'F');
        $filename= $id.'-'.$name.'-'.$month.'.pdf'; 
        $filelocation = __dir__."\\invoices";
        $fileNL = $filelocation."\\".$filename;
        $tcpdf->Output($fileNL , 'F');




        //  sending mail 
        require 'PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'messagefromscc@gmail.com';                 // SMTP username
        $mail->Password = 'encrypted';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('messagefromscc@gmail.com', 'SCC - Shukla Comeerce Classes');
        $mail->addAddress($email, $name);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo('messagefromscc@gmail.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        $mail->addAttachment($fileNL);         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Inoice-'.$id.'-'.$name.'-'.$month;
        $mail->Body    = $htmls;
        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            $errors['mail'] = 'Message could not be sent.';
            $errors['mail'] = 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $erroros['mail'] = 'Email has been sent';
        }
        if(file_exists($fileNL)) {
            unlink($fileNL);
        }
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