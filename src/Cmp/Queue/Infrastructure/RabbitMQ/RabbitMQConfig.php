<?php

namespace Cmp\Queue\Infrastructure\RabbitMQ;

class RabbitMQConfig
{

    private $host;

    private $port;

    private $user;

    private $password;

    private $exchange;

    private $queue;

    private $vhost;

    public function __construct($host, $port, $user, $password, $exchange, $queue='', $vhost='/')
    {
        $this->host = $host;
        $this->port = $port;
        $this->user = $user;
        $this->password = $password;
        $this->exchange = $exchange;
        $this->queue = $queue;
        $this->vhost = $vhost;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getExchange()
    {
        return $this->exchange;
    }

    /**
     * @return string
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * @return string
     */
    public function getVhost()
    {
        return $this->vhost;
    }

}