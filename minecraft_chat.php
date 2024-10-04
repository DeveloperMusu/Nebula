<?php
// minecraft_chat.php

// Set the secret key (same as in your WebSend config.yml)
$secret_key = '907669'; // Make sure to replace this with your actual secret key

// Get the incoming POST data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate the secret key to ensure it's coming from the Minecraft server
    if (isset($_POST['secret']) && $_POST['secret'] === $secret_key) {
        // Get the chat message from the POST request
        if (isset($_POST['message'])) {
            $message = htmlspecialchars($_POST['message']); // Sanitize the message
            // Append the message to a file or store it in a database
            file_put_contents('chat_log.txt', $message . PHP_EOL, FILE_APPEND);

            // Optional: Return a success message
            echo "Chat message received and logged!";
        } else {
            echo "No message received.";
        }
    } else {
        echo "Unauthorized request. Invalid secret key.";
    }
} else {
    echo "Invalid request method. Use POST.";
}
?>
