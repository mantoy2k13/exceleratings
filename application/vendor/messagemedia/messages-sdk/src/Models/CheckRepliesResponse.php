<?php
/*
 * MessageMediaMessages
 *
 */

namespace MessageMediaMessagesLib\Models;

use JsonSerializable;

/**
 * @todo Write general description for this model
 */
class CheckRepliesResponse implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @var array $replies public property
     */
    public $replies;

    /**
     * Constructor to set initial or default values of member properties
     * @param array $replies Initialization value for $this->replies
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->replies = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['replies'] = $this->replies;

        return $json;
    }
}
