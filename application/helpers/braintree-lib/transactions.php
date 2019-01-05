<?php
/**
 * Created by IntelliJ IDEA.
 * User: Andress
 * Date: 6/14/2018
 * Time: 1:53 PM
 */

$gateway = new Braintree_Gateway([
    'environment' => 'sandbox',
    'merchantId' => '5288gkfmzrh7bzyp',
    'publicKey' => '37r7jyjnqn7hv4tg',
    'privateKey' => 'c41d6f73d3797f59b8e138ad0fe2a8df'
]);

$transaction = $gateway->transaction()->find($_GET["id"]);

var_dump($transaction);