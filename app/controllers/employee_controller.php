<?php

require 'app/models/jobs.php';
require 'app/models/employee.php';
require 'app/models/employer.php';
require 'app/models/types.php';
require 'app/models/employeeJobsApply.php';

class EmployeeController extends BaseController
{
    public static function login()
    {
        View::make('/employee/login_employee.html');
    }
    public static function handle_login()
    {
        $params = $_POST;
        $username = $params['username'];
        $password = $params['password'];

        $employee = Employee::auth($username, $password);

        if (!$employee) {
            View::make('/employee/login_employee.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'username' => $params['username']));
        } else {
            #Kint::dump($employee);
            $_SESSION['employee'] = $employee->id;
            Redirect::to('/employee/employee.html', array('message' => 'Tervetuloa taas '.$employee->first_name.' '.$employee->last_name.'!'));
        }
    }

    public static function register()
    {
        View::make('/employee/register_employee.html');
    }

    public static function handle_register()
    {
        $params = $_POST;

        $employee = new Employee(array(
          'first_name' => $params['first_name'],
          'last_name' => $params['last_name'],
          'email' => $params['email'],
          'username' => $params['username'],
          'password' => $params['password'],
          'description' => $params['description'],
          'created' => date('Y-m-d'),
        ));
        $employee->newEmployee();
        $_SESSION['employee'] = $employee->id;
        Redirect::to('/employee/employee.html', array('message' => 'Tervetuloa palveluun '.$employee->first_name.' '.$employee->last_name.'!'));
    }
    public static function employee($id)
    {
        $employee = self::get_employee_logged_in();
        if ($employee) {
            $types = Type::allTypes();
            $jobs = Jobs::findByEmployer();
            $employers = Employer::allEmployers();
            $appliedJobs = EmployeeJobsApply::all();
            if ($jobs) {
                View::make('/employee/employee.html', array('jobs' => $jobs, 'employee' => $employee, 'types' => $types, 'employers' => $employers, 'appliedJobs' => $appliedJobs));
            }
        }
        Redirect::to('/employee/login_employee.html');
    }

    public static function logout()
    {
        session_destroy();
        Redirect::to('/', array('message' => 'Olet kirjautunut ulos'));
    }

    public static function update($id)
    {
        $params = $_POST;

        $attributes = array(
        'id' => $id,
        'first_name' => $params['first_name'],
        'last_name' => $params['last_name'],
        'email' => $params['email'],
        'username' => $params['username'],
        'password' => $params['password'],
        'description' => $params['description'],
      );
        $employee = new Employee($attributes);

        $employee->updateEmployee();

        Redirect::to('/employee/employee.html', array('message' => 'Tiedot päivitetty!'));
    }

    public static function delete($id)
    {
        $employee = new Employee(array('id' => $id));
        $employee->deleteEmployee();
        session_destroy($_SESSION['employee']);

        Redirect::to('/', array('byebye' => 'Tiedot poistettu palvelusta!'));
    }

}
