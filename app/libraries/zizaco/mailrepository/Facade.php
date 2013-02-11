<?php namespace Zizaco\MailRepository;

class Facade {

    static protected $instance = null;

    /**
     * Send an email and save it to the MailRepository
     * sent array
     * 
     * @param string $destination
     * @param string $subject    
     * @param string $view       
     * @param array $params      
     * @return void
     */
    public static function send( $destination, $subject, $view, $params = array() )
    {
        return static::getInstance()->send( $destination, $subject, $view, $params );
    }

    /**
     * Return the last sent email information
     *
     * @return array LastSent email
     */
    public static function lastSent()
    {
        return static::getInstance()->lastSent();
    }

    /**
     * Return all emails sent
     *
     * @return array All sent email
     */
    public static function allSent()
    {
        return static::getInstance()->allSent();
    }

    /**
     * Gets existing instance
     * 
     * @return Zizaco\MailRepository\MailRepository
     */
    protected static function getInstance()
    {
        if( static::$instance == null )
        {
            static::$instance = new MailRepository;
        }
            
        return static::$instance;
    }

}
