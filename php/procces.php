<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values
    $name = $_POST["name"];
    $age = $_POST["age"];

    // Output them
    echo "<h2>Hello, $name!</h2>";
    echo "<p>You are $age years old.</p>";
} else {
    echo "Form not submitted.";
}
?>
