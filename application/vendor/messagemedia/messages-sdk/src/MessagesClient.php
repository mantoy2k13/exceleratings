<?php
/*
 * MessagesLib
 *
 */

namespace MessageMediaMessagesLib;

use MessageMediaMessagesLib\Controllers;

/**
 * MessagesLib client class
 */
class MessagesClient
{
    /**
     * Singleton access to Messages controller
     * @return Controllers\MessagesController The *Singleton* instance
     */
    public function getMessages()
    {
        return Controllers\MessagesController::getInstance();
    }
    /**
     * Singleton access to DeliveryReports controller
     * @return Controllers\DeliveryReportsController The *Singleton* instance
     */
    public function getDeliveryReports()
    {
        return Controllers\DeliveryReportsController::getInstance();
    }
    /**
     * Singleton access to Replies controller
     * @return Controllers\RepliesController The *Singleton* instance
     */
    public function getReplies()
    {
        return Controllers\RepliesController::getInstance();
    }
}
