<?php
// PHP TO UPDATE QUANTITY 

// Start the session
session_start();

// Set header to allow JSON requests and responses
header('Content-Type: application/json');

// Get the raw POST data from html
$data = json_decode(file_get_contents('php://input'), true);

// Check if both name and newQuantity are provided
if (isset($data['name']) && isset($data['newQuantity'])) {

	// Get the name 
	$name = $data['name'];

	//Get new quantity and insure its an integer
	$newQuantity = intval($data['newQuantity']);

	// Check if session data exists
	if (isset($_SESSION['data'])) {
		// Loop through the data to find and update the quantity
		foreach ($_SESSION['data'] as &$item) {
			// If it's name
			if ($item['Name'] === $name) {
				// Update quantity
				$item['Quantity'] = $newQuantity;
				// Store updated data back to session
				$_SESSION['data'] = $_SESSION['data'];
				// Send success response
				echo json_encode([
					'status' => 'success',
					'message' => "Quantity for $name updated to $newQuantity."
				]);
				exit;
			}
		}

		// If no matching item found - say it wasnt found
		echo json_encode([
			'status' => 'error',
			'message' => "Item '$name' not found."
		]);
	} else {
		echo json_encode([
			'status' => 'error',
			'message' => 'Session error'
		]);
	}
} else {
	// Error response if name or newQuantity is missing
	echo json_encode([
		'status' => 'error',
		'message' => 'Invalid input - provide both name and quantity.'
	]);
}
