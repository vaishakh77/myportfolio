<?php
$confirmationMessage = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    // Collect the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    
    // Define the recipient email address
    $to = "vaishakhn67@gmail.com";  // Replace with your actual email address

    // Subject of the email
    $emailSubject = "New Message from Contact Form";

    // Compose the message
    $emailMessage = "Name: $name\n";
    $emailMessage .= "Email: $email\n";
    $emailMessage .= "Message:\n$message";

    // Additional headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $emailSubject, $emailMessage, $headers)) {
        $confirmationMessage = "Your message has been sent. We will get back to you soon!";
    } else {
        $confirmationMessage = "Error: Unable to send the email. Please try again later.";
    }
}
?>

<!-- Confirmation Message -->
<?php if (!empty($confirmationMessage)): ?>
    <p><?php echo $confirmationMessage; ?></p>
<?php endif; ?>
