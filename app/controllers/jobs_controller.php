<?php

require 'app/models/jobs.php';
require 'app/models/employer.php';
require 'app/models/types.php';
require 'app/models/categories.php';

class JobsController extends BaseController
{
    public static function index()
    {
        $employers = Employer::allEmployers();
        $types = Type::allTypes();
        $jobs = Jobs::all();
        View::make('home.html', array('jobs' => $jobs, 'employers' => $employers, 'types' => $types));
    }

    public static function addjob()
    {
        $employer = self::get_employer_logged_in();
        if ($employer) {
            View::make('/jobs/addjob.html');
        }
        Redirect::to('/employer/login_employer.html');
    }

    public static function addjob_handler()
    {
        $params = $_POST;

        $type = Type::findOne($params['type']);
        $category = Category::findOne($params['category']);
        $employer = self::get_employer_logged_in();

        $job = new Jobs(array(
          'category_id' => $category,
          'employer_id' => $employer->id,
          'type_id' => $type,
          'job_name' => $params['job_name'],
          'description' => $params['description'],
          'area' => $params['area'],
          'created' => date('Y-m-d'),
        ));
        $job->newJob();

        Redirect::to('/employer/employer.html', array('message' => 'Duuni lisätty!'));
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
