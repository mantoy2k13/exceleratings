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
class CheckDeliveryReportsResponse implements JsonSerializable
{
    /**
     * @todo Write general description for this property
     * @required
     * @maps delivery_reports
     * @var array $deliveryReports public property
     */
    public $deliveryReports;

    /**
     * Constructor to set initial or default values of member properties
     * @param array $deliveryReports Initialization value for $this->deliveryReports
     */
    public function __construct()
    {
        if (1 == func_num_args()) {
            $this->deliveryReports = func_get_arg(0);
        }
    }


    /**
     * Encode this object to JSON
     */
    public function jsonSerialize()
    {
        $json = array();
        $json['delivery_reports'] = $this->deliveryReports;

        return $json;
    }
}
