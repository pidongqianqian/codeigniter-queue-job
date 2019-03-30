<?php

namespace pidong\queue;


class Controller extends \yidas\queue\worker\Controller
{
    protected function init()
    {
        // Optional autoload (Load your own libraries or models)
        $this->load->helper('url');
        $this->load->library('jobs', array('redis' => array('connection_group' => 'notify')));
        $this->config->load('queue');
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
        $queueNames = $this->jobs->queues();
        return $this->jobs->doWorker('worker', $queueNames);
    }

    protected function handleListen()
    {
        // Your own method to detect job existence
        // return `true` for job existing, which leads to dispatch worker(s).
        // return `false` for job not found, which would keep detecting new job
        //return $this->myjobs->exists();
        $opt= getopt('-queue=:');
        log_message('debug', 'cccc:' . json_encode($opt));
        $queueNames = $this->jobs->queues();
        return $this->jobs->jobExistInRedis($queueNames);
    }
}
