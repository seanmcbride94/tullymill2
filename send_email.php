<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Recipient email address
    $to = "sean@nifoods.com";

    // Subject of the email
    $subject = "New Enquiry from $name";

    // Email body
    $body = "Name: $name";
    $body .= "Email: $email";
    $body .= "Message: $message";

    // Additional headers
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(["success" => true, "message" => "Email sent successfully"]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to send email"]);
    }
} else {
    echo json_encode(["success" => false, "message" => "Invalid request"]);
}
?>