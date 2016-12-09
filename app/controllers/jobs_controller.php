<?php

require 'app/models/jobs.php';
require 'app/models/employer.php';
require 'app/models/types.php';
require 'app/models/categories.php';
require 'app/models/employeeJobsApply.php';
require 'app/models/employee.php';

class JobsController extends BaseController
{
    public static function index()
    {
        $employees = Employee::allEmployees();
        $employers = Employer::allEmployers();
        $types = Type::allTypes();
        $jobs = Jobs::all();
        View::make('home.html', array('jobs' => $jobs, 'employers' => $employers, 'types' => $types, 'employees' => $employees));
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
        $job = Jobs::find($id);
        $types = Type::allTypes();
        $employer = Employer::find($job->employer_id);
        $employees = Employee::allEmployees();
        $appliedJobs = EmployeeJobsApply::all();
        View::make('jobs/details.html', array('job' => $job, 'employer' => $employer, 'types' => $types, 'appliedJobs' => $appliedJobs, 'employees' => $employees));
    }

    public static function deleteJob($id)
    {
        $employer = self::get_employer_logged_in();

        if ($employer) {
            $job = new Jobs(array('id' => $id));
            $job->deleteJob();
            Redirect::to('/employer/employer.html', array('message' => 'Duuni poistettu palvelusta!'));
        }
        Redirect::to('/', array('message' => 'Sinun pitää kirjautua!'));
    }

    public static function apply($id)
    {
        $employee = self::get_employee_logged_in();
        $job = Jobs::findOne($id);
        $jobToApply = new EmployeeJobsApply(array(
              'job_id' => $job,
              'employee_id' => $employee->id,
            ));
        $jobToApply->apply();
        Redirect::to('/employee/employee.html', array('message' => 'Kiitos että hait duunia!'));
    }
}
