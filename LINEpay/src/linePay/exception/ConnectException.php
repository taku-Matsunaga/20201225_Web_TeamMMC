<?php

namespace yidas\linePay\exception;

use GuzzleHttp\Exception\ConnectException as BassException;

/**
 * Exception thrown when a connection cannot be established.
 *
 * Note that no response is present for a ConnectException
 */
class ConnectException extends BassException
{
    
}
