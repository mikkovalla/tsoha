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

    public static function addjob($id)
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
        $employer = self::get_employer_logged_in();
        $job = Jobs::find($id);
        $types = Type::allTypes();
        $employer = Employer::find($job->employer_id);
        View::make('jobs/details.html', array('job' => $job, 'employer' => $employer, 'types' => $types));
    }
}
