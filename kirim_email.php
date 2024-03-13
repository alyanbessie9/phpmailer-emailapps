<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Memuat autoload.php PHPMailer
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Memeriksa apakah form telah disubmit
if(isset($_POST['submit'])){

  // Mendapatkan data dari form
  $to = $_POST['to'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Membuat instance PHPMailer
  $mail = new PHPMailer();

  // Mengatur pengaturan SMTP
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "your9@gmail.com"; // Ganti dengan email pengirim
  $mail->Password = "password"; // Ganti dengan password email pengirim
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  // Mengatur informasi pengirim dan penerima email
  $mail->setFrom('your@gmail.com', 'Your Name');
  $mail->addAddress($to);

  // Mengatur format email
  $mail->isHTML(true);

  // Mengatur subjek dan isi pesan email
  $mail->Subject = $subject;
  $mail->Body = $message;

  // Mengirim email dan menangani hasilnya
  if(isset($_POST['submit'])){
    // ...
    // Mengirim email dan menangani hasilnya
    if($mail->send()) {
        echo "<script>alert('Email berhasil dikirim.');</script>";
    } else{
        echo "<script>alert('Gagal mengirim email, coba lagi nanti. Error: " . $mail->ErrorInfo . "');</script>";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kirim Email</title>
  <style>
      * body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }
        form {
            max-width: 500px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="email"],
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        textarea {
            height: 150px;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

</head>
<body>
        
<h1 style='
      font-family: Great Vibes, cursive;
      font-size: 3em;
      text-align: center;
      color: #fafafa;
      text-shadow: 2px 13px 16px #D00000;
      position: absolute; 
      top: 5px; 
      left: 50%; 
      transform: translateX(-50%); 
  '>Kirim Email</h1>

  <form method="post">

    <label for="to">Kepada:</label>
    <input type="email" id="to" name="to" required>
    <br>
    <label for="subject">Subjek:</label>
    <input type="text" id="subject" name="subject" required>
    <br>
    <label for="message">Pesan:</label>
    <br>
    <textarea id="message" name="message" rows="10" cols="50" required></textarea>
    <br>
    <button type="submit" name="submit">Kirim Email</button>
   
  </form>
</body>
</html>
