<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Recipient email
    $to = "www.miyurumanusha@gmail.com";

    // Email subject
    $email_subject = "New Contact Form Submission: $subject";

    // Email body
    $email_body = "
        You have received a new message from your contact form.\n\n
        Name: $name\n
        Email: $email\n
        Subject: $subject\n
        Message: \n$message
    ";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "error";
}
?>
