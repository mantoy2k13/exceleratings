<?php

require_once('../MMAPI.php');

define ('USERNAME', 'your_username');
define ('PASSWORD', 'your_password');
define ('TEST_CUSTOMER_ID', 'your_customer_id');
define ('TEST_USER_ID', 'test_customer_id');

$reporting = new MMReporting(USERNAME, PASSWORD);

// ----------------------------------------------------------------------------
//
// showReportForUser
//
// ----------------------------------------------------------------------------

$response = $reporting->showReportForUser(
    TEST_USER_ID,
    null,     // Default rangeStart = 0
    null,     // Default rangeLimit = 50
    'S'       // Report on sent messages
);

if ($response === null) {
    die($reporting->getLastError());
}

echo "showReportForUser response:\n";
var_export($response);
echo "\n";

// ----------------------------------------------------------------------------
//
// showReportForCustomer
//
// ----------------------------------------------------------------------------

$response = $reporting->showReportForCustomer(
    TEST_CUSTOMER_ID,
    null,     // Default rangeStart = 0
    null,     // Default rangeLimit = 50
    'S'       // Report on sent messages
);

if ($response === null) {
    die($reporting->getLastError());
}

echo "showReportForCustomer response:\n";
var_export($response);
echo "\n";

// ----------------------------------------------------------------------------
//
// showSummaryReportForUser
//
// ----------------------------------------------------------------------------

$response = $reporting->showSummaryReportForUser(
    TEST_USER_ID,
    'S',      // Report on sent messages
    null,     // Default timezone, as set in Manager
    null,     // Default to reporting on all broadcasts
    null,     // Default broadcast fields
    null,     // Do not specify beginning timestamp
    null,     // Do not specify end timestamp
    'date'    // Group results by date
);

if ($response === null) {
    die($reporting->getLastError());
}

echo "showSummaryReportForUser response:\n";
var_export($response);
echo "\n";

// ----------------------------------------------------------------------------
//
// showSummaryReportForCustomer
//
// ----------------------------------------------------------------------------

$response = $reporting->showSummaryReportForCustomer(
    TEST_CUSTOMER_ID,
    'S',      // Report on sent messages
    null,     // Default timezone, as set in Manager
    null,     // Do not specify beginning timestamp
    null,     // Do not specify end timestamp
    'date'    // Group results by date
);

if ($response === null) {
    die($reporting->getLastError());
}

echo "showSummaryReportForCustomer response:\n";
var_export($response);
echo "\n";

// ----------------------------------------------------------------------------
//
// showCsvReportForUser
//
// ----------------------------------------------------------------------------

$response = $reporting->showCsvReportForUser(
    TEST_USER_ID,
    'S',      // Report on sent messages
    null,     // Default timezone, as set in Manager
    null,     // Default to all broadcasts
    null,     // Default broadcast fields
    null,     // Do not specify beginning timestamp
    null      // Do not specify end timestamp
);

if ($response === null) {
    die($reporting->getLastError());
}

echo "showCsvReportForUser response:\n";
echo "$response\n";

// ----------------------------------------------------------------------------
//
// showCsvReportForCustomer
//
// ----------------------------------------------------------------------------

$response = $reporting->showCsvReportForCustomer(
    TEST_CUSTOMER_ID,
    'S',      // Report on sent messages
    null,     // Default timezone, as set in Manager
    null,     // Do not specify beginning timestamp
    null      // Do not specify end timestamp
);

if ($response === null) {
    die($reporting->getLastError());
}

echo "showCsvReportForCustomer response:\n";
echo "$response\n";

