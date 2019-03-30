<?php defined('BASEPATH') OR exit('No direct script access allowed');

class queue
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        //$params = array('redis' => array('connection_group' => ''));
        //$this->CI->load->library('jobs', $params);
    }

    /**
     * @param $queue
     * @param $controller
     * @param $method
     * @param $params
     * @return bool
     */
    public function add($queue, $controller, $method, $params)
    {
        //$this->CI->load->library('jobs', array('redis' => array('connection_group' => 'notify')));
        if (empty($queue) || empty($controller) || empty($method) || empty($params)) {
            return false;
        }
        $description = '';
        $belongTo = null;
        return $this->CI->jobs->create($queue, $controller, $method, $params, $description, $belongTo);
    }

    /**
     * @param $queue
     * @param $params
     * @return bool
     */
    public function addOverSpeedCalculate($queue, $params)
    {
        //$this->CI->load->library('jobs', array('redis' => array('connection_group' => 'overspeed')));
        if (empty($queue) || empty($params)) {
            return false;
        }
        $description = '';
        $belongTo = null;
        return $this->CI->jobs->create($queue, 'queue/calculatejob', 'overSpeedHandle', $params, $description, $belongTo);
    }

    /**
     * @param $queue
     * @param $params
     * @return bool
     */
    public function addOffenceCalculate($queue, $params)
    {
        //$this->CI->load->library('jobs', array('redis' => array('connection_group' => 'calculate')));
        if (empty($queue) || empty($params)) {
            return false;
        }
        $description = '';
        $belongTo = null;
        return $this->CI->jobs->create($queue, 'queue/calculatejob', 'offenceHandle', $params, $description, $belongTo);
    }

    /**
     * @param $queue
     * @param $params
     * @return bool
     */
    public function addFenceCalculate($queue, $params)
    {
        //$this->CI->load->library('jobs', array('redis' => array('connection_group' => 'calculate')));
        if (empty($queue) || empty($params)) {
            return false;
        }
        $description = '';
        $belongTo = null;
        return $this->CI->jobs->create($queue, 'queue/calculatejob', 'fenceHandle', $params, $description, $belongTo);
    }

    /**
     * @param $queue
     * @param $params
     * @return bool
     */
    public function addPunchCalculate($queue, $params)
    {
        //$this->CI->load->library('jobs', array('redis' => array('connection_group' => 'calculate')));
        if (empty($queue) || empty($params)) {
            return false;
        }
        $description = '';
        $belongTo = null;
        return $this->CI->jobs->create($queue, 'queue/calculatejob', 'punchHandle', $params, $description, $belongTo);
    }

    /**
     * @param $queue
     * @param $params
     * @return bool
     */
    public function addOverSpeedNotify($queue, $params)
    {
        //$this->CI->load->library('jobs', array('redis' => array('connection_group' => 'notify')));
        if (empty($queue) || empty($params)) {
            return false;
        }
        $description = '';
        $belongTo = null;
        return $this->CI->jobs->create($queue, 'queue/notifyjob', 'overSpeedHandle', $params, $description, $belongTo);
    }

    /**
     * @param $queue
     * @param $params
     * @return bool
     */
    public function addOffenceNotify($queue, $params)
    {
        //$this->CI->load->library('jobs', array('redis' => array('connection_group' => 'notify')));
        if (empty($queue) || empty($params)) {
            return false;
        }
        $description = '';
        $belongTo = null;
        return $this->CI->jobs->create($queue, 'queue/notifyjob', 'offenceHandle', $params, $description, $belongTo);
    }

    /**
     * @param $queue
     * @param $params
     * @return bool
     */
    public function addFenceNotify($queue, $params)
    {
        //$this->CI->load->library('jobs', array('redis' => array('connection_group' => 'notify')));
        if (empty($queue) || empty($params)) {
            return false;
        }
        $description = '';
        $belongTo = null;
        return $this->CI->jobs->create($queue, 'queue/notifyjob', 'fenceHandle', $params, $description, $belongTo);
    }

    /**
     * @param $queue
     * @param $params
     * @return bool
     */
    public function addPunchNotify($queue, $params)
    {
        //$this->CI->load->library('jobs', array('redis' => array('connection_group' => 'notify')));
        if (empty($queue) || empty($params)) {
            return false;
        }
        $description = '';
        $belongTo = null;
        return $this->CI->jobs->create($queue, 'queue/notifyjob', 'punchHandle', $params, $description, $belongTo);
    }
}