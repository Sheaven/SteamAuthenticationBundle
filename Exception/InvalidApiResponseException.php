<?php

namespace Soljian\SteamAuthenticationBundle\Exception;

/**
 * @author Soljian
 */
class InvalidApiResponseException extends \Exception
{
    /**
     * @param string $message
     */
    public function __construct(string $message)
    {
        parent::__construct($message, 500);
    }
}