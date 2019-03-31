<?php
/**
 * !!! when you update the file, you should restart the process !!!
 * here are restart steps (for more details https://github.com/yidas/codeigniter-queue-worker)
 * 1.'ps aux|grep php' will show the process pid, and 'kill pid' to stop it
 * 2.then run 'php .ci-web/public/index.php myjob/launch' to start
 */

class EmailWorker extends \Pidong\Queue\Controller
{

    // Setting for that a listener could fork up to 10 workers
    public $workerMaxNum = 10;

    // Enable text log writen into specified file for listener and worker
    public $logPath = APPPATH.'logs/my-worker.log';


    //$debug	              boolean	true	Debug mode
    //$logPath	              string	null	Log file path
    //$phpCommand	          string	'php'	PHP CLI command for current environment
    //$listenerSleep	      integer	3	Time interval of listen frequency on idle
    //$workerSleep	          integer	0	Time interval of worker processes frequency
    //$workerMaxNum	          integer	5	Number of max workers
    //$workerStartNum	      integer	1	Number of workers at start, less than or equal to $workerMaxNum
    //$workerWaitSeconds	  integer	10	Waiting time between worker started and next worker starting
    //$workerHeathCheck	      boolean	true	Enable worker health check for listener

//    protected function init()
//    {
//        // Optional autoload (Load your own libraries or models)
//    }
//
//    protected function handleWork()
//    {
//        // Your own method to get a job from your queue in the application
//        // $job = $this->myjobs->popJob();
//
//        // return `false` for job not found, which would close the worker itself.
//        // if (!$job)
//        //    return false;
//
//        // Your own method to process a job
//        //$this->myjobs->processJob($job);
//
//        // return `true` for job existing, which would keep handling.
//    }
//
//    protected function handleListen()
//    {
//        // Your own method to detect job existence
//        // return `true` for job existing, which leads to dispatch worker(s).
//        // return `false` for job not found, which would keep detecting new job
//        //return $this->myjobs->exists();
//    }
}