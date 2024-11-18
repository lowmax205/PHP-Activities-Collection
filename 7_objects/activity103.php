<?php
class CustomException extends Exception
{
    public function __construct($message, $errorcode)
    {
        parent::__construct($message, $errorcode);
    }

    public function getCustomMessage()
    {
        return "Error [{$this->code}]: {$this->message}";
    }
}

try {
    // Example usage
    throw new CustomException("An error occurred", 101);
} catch (CustomException $e) {
    echo $e->getCustomMessage();
}
