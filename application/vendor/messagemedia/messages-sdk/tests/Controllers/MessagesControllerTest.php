<?php
/*
 * MessageMediaMessages
 *
 */

namespace MessageMediaMessagesLib\Tests;

use MessageMediaMessagesLib\Tests\BaseTestController;
use MessageMediaMessagesLib\APIException;
use MessageMediaMessagesLib\Exceptions;
use MessageMediaMessagesLib\APIHelper;
use MessageMediaMessagesLib\Models;

class MessagesControllerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \MessageMediaMessagesLib\Controllers\MessagesController Controller instance
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
        self::$controller = $client->getMessages();
    }

    /**
     * Setup test
     */
    protected function setUp()
    {
        $this->httpResponse = new HttpCallBackCatcher();
    }

    /**
     * Submit one or more (up to 100 per request) SMS or text to voice messages for delivery.
        The most basic message has the following structure:
        ```json
        {
            "messages": [
                {
                    "content": "My first message!",
                    "destination_number": "+61491570156"
                }
            ]
        }
        ```
        More advanced delivery features can be specified by setting the following properties in a message:
        - ```callback_url``` A URL can be included with each message to which Webhooks will be pushed to
          via a HTTP POST request. Webhooks will be sent if and when the status of the message changes as
          it is processed (if the delivery report property of the request is set to ```true```) and when replies
          are received. Specifying a callback URL is optional.
        - ```content``` The content of the message. This can be a Unicode string, up to 5,000 characters long.
          Message content is required.
        - ```delivery_report``` Delivery reports can be requested with each message. If delivery reports are requested, a webhook
          will be submitted to the ```callback_url``` property specified for the message (or to the webhooks)
          specified for the account every time the status of the message changes as it is processed. The
          current status of the message can also be retrieved via the Delivery Reports endpoint of the
          Messages API. Delivery reports are optional and by default will not be requested.
        - ```destination_number``` The destination number the message should be delivered to. This should be specified in E.164
          international format. For information on E.164, please refer to http://en.wikipedia.org/wiki/E.164.
          A destination number is required.
        - ```format``` The format specifies which format the message will be sent as, ```SMS``` (text message)
          or ```TTS``` (text to speech). With ```TTS``` format, we will call the destination number and read out the
          message using a computer generated voice. Specifying a format is optional, by default ```SMS``` will be used.
        - ```source_number``` A source number may be specified for the message, this will be the number that
          the message appears from on the handset. By default this feature is _not_ available and will be ignored
          in the request. Please contact <support@messagemeda.com> for more information. Specifying a source
          number is optional and a by default a source number will be assigned to the message.
        - ```source_number_type``` If a source number is specified, the type of source number may also be
          specified. This is recommended when using a source address type that is not an internationally
          formatted number, available options are ```INTERNATIONAL```, ```ALPHANUMERIC``` or ```SHORTCODE```. Specifying a
          source number type is only valid when the ```source_number``` parameter is specified and is optional.
          If a source number is specified and no source number type is specified, the source number type will be
          inferred from the source number, however this may be inaccurate.
        - ```scheduled``` A message can be scheduled for delivery in the future by setting the scheduled property.
          The scheduled property expects a date time specified in ISO 8601 format. The scheduled time must be
          provided in UTC and is optional. If no scheduled property is set, the message will be delivered immediately.
        - ```message_expiry_timestamp``` A message expiry timestamp can be provided to specify the latest time
          at which the message should be delivered. If the message cannot be delivered before the specified
          message expiry timestamp elapses, the message will be discarded. Specifying a message expiry
          timestamp is optional.
        - ```metadata``` Metadata can be included with the message which will then be included with any delivery
          reports or replies matched to the message. This can be used to create powerful two-way messaging
          applications without having to store persistent data in the application. Up to 10 key / value metadata data
          pairs can be specified in a message. Each key can be up to 100 characters long, and each value up to
          256 characters long. Specifying metadata for a message is optional.
        The response body of a successful POST request to the messages endpoint will include a ```messages```
        property which contains a list of all messages submitted. The list of messages submitted will
        reflect the list of messages included in the request, but each message will also contain two new
        properties, ```message_id``` and ```status```. The returned message ID will be a 36 character UUID
        which can be used to check the status of the message via the Get Message Status endpoint. The status
        of the message which reflect the status of the message at submission time which will always be
        ```queued```. See the Delivery Reports section of this documentation for more information on message
        statues.
        *Note: when sending multiple messages in a request, all messages must be valid for the request to be successful.
        If any messages in the request are invalid, no messages will be sent.*
     */
    public function testSendMessages1()
    {
        // Parameters for the API call
        $body = APIHelper::deserialize(
            '{"messages": [{"callback_url": "https://my.callback.url.com","co' .
            'ntent": "My first message","destination_number": "+61491570156","delivery_re' .
            'port": true,"format": "SMS","message_expiry_timestamp": "2016-11-03T11:49:02' .
            '.807Z","metadata": {"key1": "value1","key2": "value2" ' .
            ' },"scheduled": "2016-11-03T11:49:02.807Z","source_number": "+614915' .
            '70157","source_number_type": "INTERNATIONAL"},{"callback_url' .
            '": "https://my.callback.url.com","content": "My second message","destination' .
            '_number": "+61491570158","delivery_report": true,"format": "SMS", ' .
            ' "message_expiry_timestamp": "2016-11-03T11:49:02.807Z","metadata": {"ke' .
            'y1": "value1","key2": "value2"},"scheduled": "2016-11-03T11:' .
            '49:02.807Z","source_number": "+61491570159","source_number_type": "INTERNATIONAL"}]}',
            new Models\SendMessagesRequest()
        );

        // Set callback and perform API call
        $result = null;
        self::$controller->setHttpCallBack($this->httpResponse);

        try
        {
            $result = self::$controller->createSendMessages($body);
        }
        catch (APIException $e) {
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

        // Test whether the captured response is as we expected
        $this->assertNotNull($result, "Result does not exist");

        $this->assertEquals("https://my.callback.url.com", $result->messages[0]->callback_url, "Callback url must match.");
        $this->assertEquals("My first message", $result->messages[0]->content, "Content must match.");
        $this->assertEquals("+61491570156", $result->messages[0]->destination_number, "Destination number must match.");
        $this->assertEquals("+61491570157", $result->messages[0]->source_number, "Source number must match.");
        $this->assertEquals(true, $result->messages[0]->delivery_report, "Delivery report must match.");
        $this->assertEquals("SMS", $result->messages[0]->format, "Format must match.");
        $this->assertNotNull($result->messages[0]->metadata, "Metadata must exist.");
        $this->assertNotEmpty($result->messages[0]->message_id, "Message ID must not be empty.");
        $this->assertNotEmpty($result->messages[0]->message_expiry_timestamp, "Message expiry must not be empty.");
        $this->assertNotEmpty($result->messages[0]->scheduled, "Scheduled time must not be empty.");
        $this->assertEquals("value1", $result->messages[0]->metadata->key1, "Key1 must match.");
        $this->assertEquals("value2", $result->messages[0]->metadata->key2, "Key2 must match.");

        $this->assertEquals("https://my.callback.url.com", $result->messages[1]->callback_url, "Callback url must match.");
        $this->assertEquals("My second message", $result->messages[1]->content, "Content must match.");
        $this->assertEquals("+61491570158", $result->messages[1]->destination_number, "Destination number must match.");
        $this->assertEquals("+61491570159", $result->messages[1]->source_number, "Source number must match.");
        $this->assertEquals(true, $result->messages[1]->delivery_report, "Delivery report must match.");
        $this->assertEquals("SMS", $result->messages[1]->format, "Format must match.");
        $this->assertNotNull($result->messages[1]->metadata, "Metadata must exist.");
        $this->assertNotEmpty($result->messages[1]->message_id, "Message ID must not be empty.");
        $this->assertNotEmpty($result->messages[1]->message_expiry_timestamp, "Message expiry must not be empty.");
        $this->assertNotEmpty($result->messages[1]->scheduled, "Scheduled time must not be empty.");
        $this->assertEquals("value1", $result->messages[1]->metadata->key1, "Key1 must match.");
        $this->assertEquals("value2", $result->messages[1]->metadata->key2, "Key2 must match.");
    }

    /**
     *  Make sure our SDK fails when passed an invalid account id
     */
    public function testConfirmRepliesAsReceived1WithDummyAccount()
    {
        // Parameters for the API call
        $body = APIHelper::deserialize(
            '{"messages": [{"callback_url": "https://my.callback.url.com","co' .
            'ntent": "My first message","destination_number": "+61491570156","delivery_re' .
            'port": true,"format": "SMS","message_expiry_timestamp": "2016-11-03T11:49:02' .
            '.807Z","metadata": {"key1": "value1","key2": "value2" ' .
            ' },"scheduled": "2016-11-03T11:49:02.807Z","source_number": "+614915' .
            '70157","source_number_type": "INTERNATIONAL"},{"callback_url' .
            '": "https://my.callback.url.com","content": "My second message","destination' .
            '_number": "+61491570158","delivery_report": true,"format": "SMS", ' .
            ' "message_expiry_timestamp": "2016-11-03T11:49:02.807Z","metadata": {"ke' .
            'y1": "value1","key2": "value2"},"scheduled": "2016-11-03T11:' .
            '49:02.807Z","source_number": "+61491570159","source_number_type": "INTERNATIONAL"}]}',
            new Models\SendMessagesRequest()
        );

        // Set callback and perform API call
        $result = null;
        self::$controller->setHttpCallBack($this->httpResponse);
        try {
            self::$controller->createSendMessages($body, "INVALID ACCOUNT");
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
