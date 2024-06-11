<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));

    // Check if data is valid
    if (!empty($name) && !empty($email) && !empty($message) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set the recipient email address
        $recipient = "info@example.com"; // Change this to your desired email address

        // Set the email subject
        $subject = "New contact from $name";

        // Build the email content
        $email_content = "Name: $name\n";
        $email_content = "Email: $email\n\n";
        $email_content = "Message:\n$message\n";

        // Build the email headers
        $email_headers = "From: $name <$email>";

        // Send the email
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Redirect to a thank you page (optional)
            header("Location: thank_you.html");
        } else {
            // Email sending failed
            echo "Oops! Something went wrong and we couldn't send your message.";
        }
    } else {
        // Invalid form data
        echo "Oops! There was a problem with your submission. Please complete the form and try again.";
    }
} else {
    // Not a POST request
    echo "There was a problem with your submission. Please try again.";
}
?>
