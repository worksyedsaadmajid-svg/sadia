<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // YOUR WHATSAPP NUMBER
    // Include country code, without + or spaces
    $whatsapp = "+923313312969";

    // Get form values
    $name  = trim($_POST['name'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $date  = trim($_POST['date'] ?? '');

    // Validate
    if (empty($name) || empty($phone) || empty($date)) {
        die("Please fill in all required fields.");
    }

    // Format date
    $formattedDate = date("F j, Y", strtotime($date));

    // Create WhatsApp message
    $message  = "🦷 *HELLO IM LOOKING FOR AN APPOINTMENT*%0A%0A";
    $message .= "*Patient Name:* " . rawurlencode($name) . "%0A";
    $message .= "*Phone:* " . rawurlencode($phone) . "%0A";
    $message .= "*Preferred Date:* " . rawurlencode($formattedDate) . "%0A%0A";
    $message .= "Please contact the patient to confirm the appointment.";

    // WhatsApp URL
    $url = "https://wa.me/" . $whatsapp . "?text=" . $message;

    // Redirect to WhatsApp
    header("Location: " . $url);
    exit;
}

?>