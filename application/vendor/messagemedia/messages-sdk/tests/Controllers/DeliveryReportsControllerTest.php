<?php
/*
 * MessageMediaMessages
 *
 */

namespace MessageMediaMessagesLib\Tests;

use MessageMediaMessagesLib\APIException;
use MessageMediaMessagesLib\APIHelper;
use MessageMediaMessagesLib\Models;

class DeliveryReportsControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \MessageMediaMessagesLib\Controllers\DeliveryReportsController Controller instance
     */
    protected static $controller;

    /**
     * @var HttpCallBackCatcher Callback
     */
    protected $httpResponse;

    /**
     * Setup test class
     */
    public static function setUpBeforeClass()
    {
        TestHelper::getAuthorizationFromEnvironment();
        $client = new \MessageMediaMessagesLib\MessageMediaMessagesClient();
        self::$controller = $client->getDeliveryReports();
    }

    /**
     * Setup test
     */
    protected function setUp()
    {
        $this->httpResponse = new HttpCallBackCatcher();
    }

    /**
     * Check for any delivery reports that have been received.
        Delivery reports are a notification of the change in status of a message as it is being processed.
        Each request to the check delivery reports endpoint will return any delivery reports received that
        have not yet been confirmed using the confirm delivery reports endpoint. A response from the check
        delivery reports endpoint will have the following structure:
        ```json
        {
            "delivery_reports": [
                {
                    "callback_url": "https://my.callback.url.com",
                    "delivery_report_id": "01e1fa0a-6e27-4945-9cdb-18644b4de043",
                    "source_number": "+61491570157",
                    "date_received": "2017-05-20T06:30:37.642Z",
                    "status": "enroute",
                    "delay": 0,
                    "submitted_date": "2017-05-20T06:30:37.639Z",
                    "original_text": "My first message!",
                    "message_id": "d781dcab-d9d8-4fb2-9e03-872f07ae94ba",
                    "vendor_account_id": {
                        "vendor_id": "MessageMedia",
                        "account_id": "MyAccount"
                    },
                    "metadata": {
                        "key1": "value1",
                        "key2": "value2"
                    }
                },
                {
                    "callback_url": "https://my.callback.url.com",
                    "delivery_report_id": "0edf9022-7ccc-43e6-acab-480e93e98c1b",
                    "source_number": "+61491570158",
                    "date_received": "2017-05-21T01:46:42.579Z",
                    "status": "enroute",
                    "delay": 0,
                    "submitted_date": "2017-05-21T01:46:42.574Z",
                    "original_text": "My second message!",
                    "message_id": "fbb3b3f5-b702-4d8b-ab44-65b2ee39a281",
                    "vendor_account_id": {
                        "vendor_id": "MessageMedia",
                        "account_id": "MyAccount"
                    },
                    "metadata": {
                        "key1": "value1",
                        "key2": "value2"
                    }
                }
            ]
        }
        ```
        Each delivery report will contain details about the message, including any metadata specified
        and the new status of the message (as each delivery report indicates a change in status of a
        message) and the timestamp at which the status changed. Every delivery report will have a
        unique delivery report ID for use with the confirm delivery reports endpoint.
        *Note: The source number and destination number properties in a delivery report are the inverse of
        those specified in the message that the delivery report relates to. The source number of the
        delivery report is the destination number of the original message.*
        Subsequent requests to the check delivery reports endpoint will return the same delivery reports
        and a maximum of 100 delivery reports will be returned in each request. Applications should use the
        confirm delivery reports endpoint in the following pattern so that delivery reports that have been
        processed are no longer returned in subsequent check delivery reports requests.
        1. Call check delivery reports endpoint
        2. Process each delivery report
        3. Confirm all processed delivery reports using the confirm delivery reports endpoint
        *Note: It is recommended to use the Webhooks feature to receive reply messages rather than
        polling the check delivery reports endpoint.*
     */
    public function testCheckDeliveryReports1()
    {
        // Set callback and perform API call
        $result = null;
        self::$controller->setHttpCallBack($this->httpResponse);
        try {
            $result = self::$controller->getCheckDeliveryReports();
        } catch (APIException $e) {
        }

        // Test response code
        $this->assertEquals(
            200,
            $this->httpResponse->getResponse()->getStatusCode(),
            "Status is not 200"
        );

        // Test headers
        $headers = [];
        $headers['Content-Type'] = null ;
        
        $this->assertTrue(
            TestHelper::areHeadersProperSubsetOf($headers, $this->httpResponse->getResponse()->getHeaders(), true),
            "Headers do not match"
        );

        // Test whether the captured response is as we expected
        $this->assertNotNull($result, "Result does not exist");

        $this->assertStringStartsWith('{"delivery_reports":[', $this->httpResponse->getResponse()->getRawBody(),
            "Result should start with the delivery_reports JSON ");
    }

    /**
     *  Make sure our SDK fails when passed an invalid account id
     */
    public function testConfirmRepliesAsReceived1WithDummyAccount()
    {
        // Set callback and perform API call
        $result = null;
        self::$controller->setHttpCallBack($this->httpResponse);
        try {
            self::$controller->getCheckDeliveryReports("INVALID ACCOUNT");
        } catch (APIException $e) {
            $this->assertEquals(403, $e->getResponseCode());
            $this->assertEquals("{\"message\":\"Invalid account 'INVALID ACCOUNT' in header Account\"}\n", $e->getResponseBody());
        }

        // Test response code
        $this->assertEquals(
            403,
            $this->httpResponse->getResponse()->getStatusCode(),
            "Status is not 403"
        );
    }

    /**
     * Mark a delivery report as confirmed so it is no longer return in check delivery reports requests.
     */
    public function testConfirmDeliveryReportsAsReceived1()
    {
        // Parameters for the API call
        $body = APIHelper::deserialize(
            '{"delivery_report_ids":["011dcead-6988-4ad6-a1c7-6b6c68ea628d","3487b3fa-6586-4979'.
            '-a233-2d1b095c7718","ba28e94b-c83d-4759-98e7-ff9c7edb87a1"]}',
            new Models\ConfirmDeliveryReportsAsReceivedRequest()
        );

        // Set callback and perform API call
        $result = null;
        self::$controller->setHttpCallBack($this->httpResponse);
        try {
            $result = self::$controller->createConfirmDeliveryReportsAsReceived($body);
        } catch (APIException $e) {
        }

        // Test response code
        $this->assertEquals(
            202,
            $this->httpResponse->getResponse()->getStatusCode(),
            "Status is not 202"
        );

        // Test headers
        $headers = [];
        $headers['Content-Type'] = null ;
        
        $this->assertTrue(
            TestHelper::areHeadersProperSubsetOf($headers, $this->httpResponse->getResponse()->getHeaders(), true),
            "Headers do not match"
        );
    }

    /**
     *  Make sure our SDK fails when passed an invalid account id
     */
    public function testConfirmDeliveryReportsAsReceivedWithDummyAccount()
    {
        $body = APIHelper::deserialize(
            '{    "delivery_report_ids": [        "011dcead-6988-4ad6-a1c7-6b6c68ea628d",        "3487b3fa-6586-4' .
            '979-a233-2d1b095c7718",        "ba28e94b-c83d-4759-98e7-ff9c7edb87a1"    ]}',
            new Models\ConfirmDeliveryReportsAsReceivedRequest()
        );

        // Set callback and perform API call
        $result = null;
        self::$controller->setHttpCallBack($this->httpResponse);
        try {
            self::$controller->createConfirmDeliveryReportsAsReceived($body, "INVALID ACCOUNT");
        } catch (APIException $e) {
            $this->assertEquals(403, $e->getResponseCode());
            $this->assertEquals("{\"message\":\"Invalid account 'INVALID ACCOUNT' in header Account\"}\n", $e->getResponseBody());
        }

        // Test response code
        $this->assertEquals(
            403,
            $this->httpResponse->getResponse()->getStatusCode(),
            "Status is not 403"
        );
    }

}
