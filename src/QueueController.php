<?php

namespace Pidong\Queue;
use Pidong\Queue\Libraries\jobs;
use CI_Controller;


class QueueController extends CI_Controller
{
    public $currentJobs;
    /**
     * @param $queue
     * @param $controller
     * @param $method
     * @param $params
     * @return bool
     */
    public function dispatch($queue, $controller, $method, $params)
    {
        if (empty($queue) || empty($controller) || empty($method) || empty($params)) {
            return false;
        }
        $description = '';
        $belongTo = null;
        if(empty($this->currentJobs)) {
            $this->currentJobs = new jobs(array());
        }
        return $this->currentJobs->create($queue, $controller, $method, $params, $description, $belongTo);

    }

    public function onConnection($connectName)
    {
        $this->{'queue_' . $connectName} = new jobs(array('redis' => array('connection_group' => $connectName)));
        $this->currentJobs = $this->{'queue_' . $connectName};
    }
}
