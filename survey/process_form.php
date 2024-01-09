<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $overall_impression = isset($_POST["overall_impression"]) ? $_POST["overall_impression"] : null;
    $best_thing = isset($_POST["best_thing"]) ? $_POST["best_thing"] : null;
    $improvements = isset($_POST["improvements"]) ? $_POST["improvements"] : null;
    $ease_of_finding = isset($_POST["ease_of_finding"]) ? $_POST["ease_of_finding"] : null;
    $website_speed = isset($_POST["website_speed"]) ? $_POST["website_speed"] : null;
    $site_appearance = isset($_POST["site_appearance"]) ? $_POST["site_appearance"] : null;
    $understanding = isset($_POST["understanding"]) ? $_POST["understanding"] : null;
    $trust_information = isset($_POST["trust_information"]) ? $_POST["trust_information"] : null;
    $factors_to_increase_trust = isset($_POST["factors_to_increase_trust"]) ? $_POST["factors_to_increase_trust"] : null;
    $likelihood_recommendation = isset($_POST["likelihood_recommendation"]) ? $_POST["likelihood_recommendation"] : null;
    
    // Database connection parameters
    $servername = "localhost";
    $username = "id20982182_admin";
    $password = "ASD9875zxc#";
    $dbname = "id20982182_survey";

    // Create a new database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("INSERT INTO user_feedback (overall_impression, best_thing, improvements, ease_of_finding, website_speed, site_appearance, understanding, trust_information, factors_to_increase_trust, likelihood_recommendation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssss", $overall_impression, $best_thing, $improvements, $ease_of_finding, $website_speed, $site_appearance, $understanding, $trust_information, $factors_to_increase_trust, $likelihood_recommendation);
    
    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Feedback submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>