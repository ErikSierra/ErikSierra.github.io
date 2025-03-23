<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Update the email address below to your email
    $to = "your_email@example.com";
    $name = strip_tags($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);
    $subject = "Contact Form Submission from $name";
    $body = "Name: $name\nEmail: $email\nMessage:\n$message";
    
    // Adjust the From address to an email on your domain to help prevent spam issues
    $headers = "From: no-reply@yourdomain.com\r\n";
    $headers .= "Reply-To: $email\r\n";
    
    if (mail($to, $subject, $body, $headers)) {
      echo "Thank you for contacting us. We'll get back to you soon.";
    } else {
      echo "Sorry, there was a problem sending your message. Please try again later.";
    }
} else {
    echo "Invalid request.";
}
?>
