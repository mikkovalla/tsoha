<?php

require 'app/models/jobs.php';
require 'app/models/employer.php';
require 'app/models/types.php';

class JobsController extends BaseController
{
    public static function index()
    {
        $employers = Employer::allEmployers();
        $types = Type::allTypes();
        $jobs = Jobs::all();
        View::make('home.html', array('jobs' => $jobs, 'employers' => $employers, 'types' => $types));
    }

    public static function addjob($employer_id)
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
        $job = Jobs::find($id);
        $types = Type::allTypes();
        $employers = Employer::allEmployers();
        View::make('jobs/details.html', array('jobs' => $job, 'employers' => $employers, 'types' => $types));
    }
}
