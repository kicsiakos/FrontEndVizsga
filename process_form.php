<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["keresztnev"];
    $name = $_POST["vezeteknev"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    $to = "kissakos23@gmail.com";
    $subject = "New Contact Form Submission";
    $headers = "From: $email";
    
    $mailBody = "Name: $name\nEmail: $email\nMessage: $message";
    
    mail($to, $subject, $mailBody, $headers);
    
    echo "Thank you for your submission!";
} else {
    echo "Error: Invalid form submission.";
}
?>
