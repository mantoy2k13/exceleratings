<?php
/*
 * MessageMediaMessages
 *
 */

namespace MessageMediaMessagesLib\Controllers;

use MessageMediaMessagesLib\APIException;
use MessageMediaMessagesLib\APIHelper;
use MessageMediaMessagesLib\Configuration;
use MessageMediaMessagesLib\Models;
use MessageMediaMessagesLib\Http\HttpRequest;
use MessageMediaMessagesLib\Http\HttpResponse;
use MessageMediaMessagesLib\Http\HttpMethod;
use MessageMediaMessagesLib\Http\HttpContext;
use Unirest\Request;

/**
 * @todo Add a general description for this controller.
 */
class RepliesController extends BaseController
{
    /**
     * @var RepliesController The reference to *Singleton* instance of this class
     */
    private static $instance;

    /**
     * Returns the *Singleton* instance of this class.
     * @return RepliesController The *Singleton* instance.
     */
    public static function getInstance()
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }
        
        return static::$instance;
    }

    /**
     * Mark a reply message as confirmed so it is no longer returned in check replies requests.
     * The confirm replies endpoint is intended to be used in conjunction with the check replies endpoint
     * to allow for robust processing of reply messages. Once one or more reply messages have been
     * processed
     * they can then be confirmed using the confirm replies endpoint so they are no longer returned in
     * subsequent check replies requests.
     * The confirm replies endpoint takes a list of reply IDs as follows:
     * ```json
     * {
     * "reply_ids": [
     * "011dcead-6988-4ad6-a1c7-6b6c68ea628d",
     * "3487b3fa-6586-4979-a233-2d1b095c7718",
     * "ba28e94b-c83d-4759-98e7-ff9c7edb87a1"
     * ]
     * }
     * ```
     * Up to 100 replies can be confirmed in a single confirm replies request.
     *
     * @param Models\ConfirmRepliesAsReceivedRequest $body TODO: type description here
     * @param null $accountHeaderValue TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     * @throws \Unirest\Exception
     */
    public function createConfirmRepliesAsReceived($body, $accountHeaderValue = null)
    {
        $_requestUrl = '/v1/replies/confirmed';
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.$_requestUrl;

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array (
            'user-agent'    => parent::$UserAgent,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json; charset=utf-8'
        );

        $jsonBody = Request\Body::Json($body);
        $_headers = parent::addAccountHeaderTo($_headers, $accountHeaderValue);
        $_headers = parent::addAuthorizationHeadersTo($_headers, $_requestUrl, $jsonBody);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::post($_queryUrl, $_headers, $jsonBody);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //Error handling using HTTP status codes
        if ($response->code == 400) {
            throw new APIException('', $_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        return $response->body;
    }

    /**
     * Check for any replies that have been received.
     * Replies are messages that have been sent from a handset in response to a message sent by an
     * application or messages that have been sent from a handset to a inbound number associated with
     * an account, known as a dedicated inbound number (contact <support@messagemedia.com> for more
     * information on dedicated inbound numbers).
     * Each request to the check replies endpoint will return any replies received that have not yet
     * been confirmed using the confirm replies endpoint. A response from the check replies endpoint
     * will have the following structure:
     * ```json
     * {
     * "replies": [
     * {
     * "metadata": {
     * "key1": "value1",
     * "key2": "value2"
     * },
     * "message_id": "877c19ef-fa2e-4cec-827a-e1df9b5509f7",
     * "reply_id": "a175e797-2b54-468b-9850-41a3eab32f74",
     * "date_received": "2016-12-07T08:43:00.850Z",
     * "callback_url": "https://my.callback.url.com",
     * "destination_number": "+61491570156",
     * "source_number": "+61491570157",
     * "vendor_account_id": {
     * "vendor_id": "MessageMedia",
     * "account_id": "MyAccount"
     * },
     * "content": "My first reply!"
     * },
     * {
     * "metadata": {
     * "key1": "value1",
     * "key2": "value2"
     * },
     * "message_id": "8f2f5927-2e16-4f1c-bd43-47dbe2a77ae4",
     * "reply_id": "3d8d53d8-01d3-45dd-8cfa-4dfc81600f7f",
     * "date_received": "2016-12-07T08:43:00.850Z",
     * "callback_url": "https://my.callback.url.com",
     * "destination_number": "+61491570157",
     * "source_number": "+61491570158",
     * "vendor_account_id": {
     * "vendor_id": "MessageMedia",
     * "account_id": "MyAccount"
     * },
     * "content": "My second reply!"
     * }
     * ]
     * }
     * ```
     * Each reply will contain details about the reply message, as well as details of the message the reply
     * was sent
     * in response to, including any metadata specified. Every reply will have a reply ID to be used with
     * the
     * confirm replies endpoint.
     * *Note: The source number and destination number properties in a reply are the inverse of those
     * specified in the message the reply is in response to. The source number of the reply message is the
     * same as the destination number of the original message, and the destination number of the reply
     * message is the same as the source number of the original message. If a source number
     * wasn't specified in the original message, then the destination number property will not be present
     * in the reply message.*
     * Subsequent requests to the check replies endpoint will return the same reply messages and a maximum
     * of 100 replies will be returned in each request. Applications should use the confirm replies
     * endpoint
     * in the following pattern so that replies that have been processed are no longer returned in
     * subsequent check replies requests.
     * 1. Call check replies endpoint
     * 2. Process each reply message
     * 3. Confirm all processed reply messages using the confirm replies endpoint
     * *Note: It is recommended to use the Webhooks feature to receive reply messages rather than polling
     * the check replies endpoint.*
     *
     * @param null $accountHeaderValue TODO: type description here
     * @return mixed response from the API call
     * @throws APIException Thrown if API call fails
     */
    public function getCheckReplies($accountHeaderValue = null)
    {
        $_requestUrl = '/v1/replies';
        //the base uri for api requests
        $_queryBuilder = Configuration::$BASEURI;
        
        //prepare query string for API call
        $_queryBuilder = $_queryBuilder.$_requestUrl;

        //validate and preprocess url
        $_queryUrl = APIHelper::cleanUrl($_queryBuilder);

        //prepare headers
        $_headers = array(
            'user-agent' => parent::$UserAgent,
            'Accept'     => 'application/json'
        );

        $_headers = parent::addAccountHeaderTo($_headers, $accountHeaderValue);
        $_headers = parent::addAuthorizationHeadersTo($_headers, $_requestUrl);

        //call on-before Http callback
        $_httpRequest = new HttpRequest(HttpMethod::GET, $_headers, $_queryUrl);

        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }

        //and invoke the API call request to fetch the response
        $response = Request::get($_queryUrl, $_headers);

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        //handle errors defined at the API level
        $this->validateResponse($_httpResponse, $_httpContext);

        $mapper = $this->getJsonMapper();

        return $mapper->mapClass($response->body, 'MessageMediaMessagesLib\\Models\\CheckRepliesResponse');
    }
}
