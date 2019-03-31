<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TaskController extends Pidong\Queue\QueueController
{
    public function generateTasks()
    {
        $users = [
            ['username' => 'Lucy', 'email'=> 'lucy@email.com'],
            ['username' => 'Duke', 'email'=> 'duke@email.com'],
            //....
        ];
        foreach ($users as $user) {
            $this->dispatch('email', 'TaskController', 'handle', ['username' => $user['username'], 'email'=> $user['email']]);
        }
    }

    public function handle()
    {
        $username = $_POST['username'];
        $email = $_POST['email'];

        //$this->sendEmail($username, $email);
    }
}