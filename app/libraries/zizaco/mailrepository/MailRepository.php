<?php namespace Zizaco\MailRepository;

use Mail, Config, View;

/**
* This class has testing and monitoring purposes
*
* @author Zizaco <zizaco@gmail.com>  
*/
class MailRepository {
    
    /**
     * Sent email array
     */
    protected $sent = array();

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
    public function send( $destination, $subject, $view, $params = array() )
    {
        foreach( (array)$destination as $address ) {

            if(Config::getEnvironment() == 'testing')
            {
                $this->sent[] = array(
                    'destination'=>$address,
                    'subject'=>$subject,
                    'content'=>View::make($view, $params)->render()
                );
            }
            else
            {
                try{
                    Mail::send($view, $params, function($m) use ($address, $subject){
                        $m->to( $address )
                            ->subject( $subject );
                    });
                }catch(Swift_SwiftException $e){
                    Log::error(
                        'Unable to send mail: '.$e->getMessage().
                        "\n".$e->getCode()."\n".$e->getTraceAsString()
                    );
                }
            }
        }
    }

    /**
     * Return the last sent email information
     *
     * @return array LastSent email
     */
    public function lastSent()
    {
        if(isset($this->sent[count($this->sent)-1]))
            return $this->sent[count($this->sent)-1];

        return null;
    }

    /**
     * Return all emails sent
     *
     * @return array All sent email
     */
    public function allSent()
    {
        return $this->sent;
    }
}
