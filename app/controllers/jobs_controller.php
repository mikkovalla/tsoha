<?php

require 'app/models/jobs.php';


class JobsController extends BaseController
{
    public static function index()
    {
        $jobs = Jobs::all();
        View::make('home.html', array('jobs' => $jobs));
    }

    public static function addjob()
    {
        #todo job per employer id
        $params = $_POST;

        $job = new Jobs(array(
          '',
        ));
        $job->newJob();
    }

    public static function details($id)
    {
        # code...
    }
}
