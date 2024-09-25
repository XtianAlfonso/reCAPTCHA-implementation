<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // reCAPTCHA verification
    $recaptcha_secret = "6LddqE4qAAAAADOSizX6zBMY-PXS8smYv-ayYYPj";
    $recaptcha_response = $_POST['g-recaptcha-response'];

    $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
    $response_data = json_decode($verify_response);

    if ($response_data->success) {
        // reCAPTCHA validation OK
        echo "Form submitted successfully!";
    } else {
        // reCAPTCHA validation failed
        echo "reCAPTCHA verification failed. Please try again.";
    }
} else {
    // If not a POST request, redirect to the form page
    header("Location: your_form_page.php");
    exit();
}
?>
