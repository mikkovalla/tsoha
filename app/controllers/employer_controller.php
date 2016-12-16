<?php

require 'app/models/jobs.php';
require 'app/models/employer.php';
require 'app/models/types.php';
require 'app/models/employeeJobsApply.php';

class EmployerController extends BaseController
{
    public static function login()
    {
        View::make('/employer/login_employer.html');
    }
    public static function handle_login()
    {
        $params = $_POST;
        $username = $params['username'];
        $password = $params['password'];

        $employer = Employer::auth($username, $password);

        if (!$employer) {
            View::make('/employer/login_employer.html', array('error' => 'Väärä käyttäjätunnus tai salasana!', 'username' => $params['username']));
        } else {
            #Kint::dump($employer);
            $_SESSION['employer'] = $employer->id;
            Redirect::to('/employer/employer.html', array('message' => 'Tervetuloa taas '.$employer->company_name.'!'));
        }
    }

    public static function register()
    {
        View::make('/employer/register_employer.html');
    }

    public static function handle_register()
    {
        $params = $_POST;
        $validate = Employer::validate($params['company_name'], $params['email'], $params['username'], $params['password'], $params['company_description']);

        if (Employer::checkUsername($params['username'])) {
            View::make('/employer/register_employer.html', array('message' => 'Käyttäjätunnus on jo varattu!!!'));
        }
        if (!is_array($validate)) {
            $employer = new Employer(array(
          'company_name' => $params['company_name'],
          'email' => $params['email'],
          'username' => $params['username'],
          'password' => $params['password'],
          'company_description' => $params['company_description'],
          'created' => date('Y-m-d'),
        ));
            $employer->newEmployer();

            $_SESSION['employer'] = $employer->id;
            Redirect::to('/employer/employer.html', array('message' => 'Tervetuloa palveluun '.$employer->company_name.'!'));
        } else {
            View::make('/employer/register_employer.html', array('message' => 'Syötit väärää tietoa!!!'));
        }
    }
    public static function employer($id)
    {
        $employer = self::get_employer_logged_in();
        if ($employer) {
            $types = Type::allTypes();
            $jobs = Jobs::findByEmployer();
            if ($jobs) {
                View::make('/employer/employer.html', array('jobs' => $jobs, 'employer' => $employer, 'types' => $types));
            }
            View::make('/employer/employer.html', array('message' => 'Et ole vielä lisännyt yhtään duunia!'));
        }
        Redirect::to('/employer/login_employer.html');
    }

    public static function logout()
    {
        session_destroy();
        Redirect::to('/', array('message' => 'Olet kirjautunut ulos'));
    }

    public static function update($id)
    {
        $params = $_POST;
        $validate = Employer::validate($params['company_name'], $params['email'], null, null, $params['company_description']);

        if (!is_array($validate)) {
            $attributes = array(
        'id' => $id,
        'company_name' => $params['company_name'],
        'email' => $params['email'],
        'username' => $params['username'],
        'password' => $params['password'],
        'company_description' => $params['company_description'],
      );
            $employer = new Employer($attributes);

            $employer->updateEmployer();

            Redirect::to('/employer/employer.html', array('message' => 'Tiedot päivitetty!'));
        } else {
            Redirect::to('/employer/employer.html', array('message' => 'Syötit väärää tietoa!!!'));
        }
    }

    public static function delete($id)
    {
        $employer = new Employer(array('id' => $id));
        $employer->deleteEmployer();
        session_destroy();

        Redirect::to('/', array('byebye' => 'Tiedot poistettu palvelusta!'));
    }
}
