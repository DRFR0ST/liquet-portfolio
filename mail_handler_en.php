<?php

    // Only process POST reqeusts.
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form fields and remove whitespace.

        if(isset($_POST['name']))
            $name = $_POST['name'];
        if(isset($_POST['email']))
             $email = $_POST['email'];
        if(isset($_POST['message']))
             $message = $_POST['message'];





        // Check that data was sent to the mailer.

        // Set the recipient email address.
        // FIXME: Update this to your desired email address.
        //$recipient = "photon.one@yahoo.com";  
        $recipient = "support@mike-eling.xyz"; //gewinne.wat@grabenhorstundvetterlein.de
        // Set the email subject.

        $subject = "Portfolio - New Message";

        // Build the email content.
        $email_content .= "Email-Adresse:   ".$email."\n";
        $email_content .= "Name:   ".$name."\n";
        $email_content .= "Message:   ".$message."\n";

/*        $special_path = str_replace(".", "_", $email);
        if(!file_exists("users/".$special_path."/info.ini"))
        {
            mkdir("users/".$special_path);
            $path = "users/".$special_path."/info.ini";
            $newlink = fopen($path, "w") or die("Unable to open file!");
            fwrite($newlink, $email_content);
            fclose($newlink);
            exit;
        } else {
            echo "alreadyplayed";
            http_response_code(400);
            exit;
        }*/

        // Build the email headers.
        $email_headers = "From: <$email>";

        // Send the email.
        if (mail($recipient, $subject, $email_content, $email_headers)) {
            // Set a 200 (okay) response code.
            http_response_code(200);
            echo "Thank You! Your application has been sent.";
        } else {
            // Set a 500 (internal server error) response code.
            http_response_code(500);
            echo "Oops! Something went wrong, please try again.";
        }

    } else {
        // Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo "There was a problem with your submission, please try again.";
    }

?>