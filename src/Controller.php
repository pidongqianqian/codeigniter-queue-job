<?php

namespace Pidong\Queue;
use Pidong\Queue\Libraries\jobs;


class Controller extends \yidas\queue\worker\Controller
{
    protected function init()
    {
        // Optional autoload (Load your own libraries or models)
        $this->load->helper('url');
        $this->config->load('queue');
        $connections = $this->config->item('queue_connections');
        foreach ($connections as $name => $connection) {
            $this->{'queue_' . $name} = new jobs(array('redis' => array('connection_group' => $name)));
            //$this->load->library('jobs', array('redis' => array('connection_group' => $name)), 'queue_' . $name);
        }
    }

    protected function handleWork()
    {
        // Your own method to get a job from your queue in the application
        // $job = $this->myjobs->popJob();

        // return `false` for job not found, which would close the worker itself.
        // if (!$job)
        //    return false;

        // Your own method to process a job
        //$this->myjobs->processJob($job);

        // return `true` for job existing, which would keep handling.
        //return true;

        $connections = $this->config->item('queue_connections');

        foreach ($connections as $name => $connection) {
            $queueNames = $this->{'queue_' . $name}->queues();
            log_message('debug', '$queueNames'.json_encode($queueNames));
            if ($this->{'queue_' . $name}->doWorker('worker', $queueNames)) {
                return true;
            };
        }

        return false;
    }

    protected function handleListen()
    {
        // Your own method to detect job existence
        // return `true` for job existing, which leads to dispatch worker(s).
        // return `false` for job not found, which would keep detecting new job
        //return $this->myjobs->exists();
        $connections = $this->config->item('queue_connections');

        foreach ($connections as $name => $connection) {
            $queueNames = $this->{'queue_' . $name}->queues();
            if ($this->{'queue_' . $name}->jobExistInRedis($queueNames)) {
                return true;
            };
        }

        return false;
    }
}
