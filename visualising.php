<?php
// PHP TO INITIALLY LOAD THE PRODUCTS - PRETEND ITS FROM A DB

// Start the session
session_start();
// Create an array of product data
$data = [
	["Type" => "Drink", "Name" => "Cola", "Quantity" => 24, "Units" => "Litres"],
	["Type" => "Drink", "Name" => "Diet Cola", "Quantity" => 20, "Units" => "Litres"],
	["Type" => "Drink", "Name" => "Lemonade", "Quantity" => 19, "Units" => "Litres"],
	["Type" => "Drink", "Name" => "Dandelion and Burdock", "Quantity" => 60, "Units" => "Litres"],
	["Type" => "Drink", "Name" => "Orangeade", "Quantity" => 10, "Units" => "Litres"],

	["Type" => "Sweets", "Name" => "Teacakes", "Quantity" => 600, "Units" => "g"],
	["Type" => "Sweets", "Name" => "Lollipops", "Quantity" => 700, "Units" => "g"],
	["Type" => "Sweets", "Name" => "Parma Violets", "Quantity" => 3000, "Units" => "g"],
	["Type" => "Sweets", "Name" => "Chocolate Coins", "Quantity" => 500, "Units" => "g"],
];

// Store data in a session variable if it doesn't exist
if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = $data;
}


// Get the data from the session
$dataFromSession = $_SESSION['data'];

// Set the header to tell the browser it's a JSON response
header('Content-Type: application/json');

// Encode the session variable as a JSON string and output it
echo json_encode($dataFromSession);
