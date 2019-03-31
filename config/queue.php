<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Config for the CodeIgniter queue worker
 */


$config['queue_connections'] = [
    'default' => [
        'host'     => 'localhost',
        'port'     => '6379',
        'password' => ''
    ],
    'notify' => [
        'host'     => 'localhost',
        'port'     => '6382',
        'password' => ''
    ]
];
