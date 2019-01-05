<?php

require_once('../MMAPI.php');

define ('USERNAME', 'your_username');
define ('PASSWORD', 'your_password');
define ('TEST_CUSTOMER_ID', 'your_customer_id');

$acctMgmt = new MMAccountManagement(USERNAME, PASSWORD);

// ----------------------------------------------------------------------------
//
// createNewUser
//
// ----------------------------------------------------------------------------

// Variable that will be used by MMAccountManagement::createNewUser to return 
// the username of the newly created user
$newUser = '';

$result = $acctMgmt->createNewUser(
    TEST_CUSTOMER_ID, 
    "Test Contact Name",  // Contact name 
    "6140000000",         // Contact number (international format without +)
    "test@example.com",   // Contact email
    $newUser              // Variable to return new username (passed by ref)
);

// If the createNewUser function returns null, then an error has occurred
if ($result == null) {
    die($acctMgmt->getLastError());
}

echo "Created new user: $newUser\n";


// ----------------------------------------------------------------------------
//
// getUserCreditLimit
//
// ----------------------------------------------------------------------------

// Variables that will be used by getUserCreditLimit to return the current
// credit limit
$currentLimit = '';

$result = $acctMgmt->getUserCreditLimit(
    $newUser,           // user to query
    $currentLimit
);

if ($result === false) {
    die ($acctMgmt->getLastError());
}

echo "Current limit: $currentLimit\n";


// ----------------------------------------------------------------------------
//
// setUserCreditLimit
//
// ----------------------------------------------------------------------------

$result = $acctMgmt->setUserCreditLimit(
    $newUser,
    $currentLimit - 10
);

if ($result === false) {
    die($acctMgmt->getLastError());
}

echo "Credit limit settings updated for user $newUser\n";

// Verify that credit limit data was updated
$result = $acctMgmt->getUserCreditLimit(
    $newUser,
    $currentLimit
);

if ($result === false) {
    die ($acctMgmt->getLastError());
}

echo "New current limit: $currentLimit\n";

