<?php

class Messages {

    private static $message = "";

    /**
     * Get the value of message
     */ 
    public static function getMessage()
    {
        return self::$message;
    }

    /**
     * Set the value of message
     *
     * @return  self
     */ 
    public static function setMessage($message)
    {
        self::$message = $message;
    }
}