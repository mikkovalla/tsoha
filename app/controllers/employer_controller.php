<?php

require 'app/models/employer.php';
/**
 *
 */
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
            Redirect::to('/employer/employer.html', array('message' => 'Tervetuloa taas '.$employer->name.'!'));
        }
    }

    public static function register()
    {
        View::make('/employer/register_employer.html');
    }

    public static function handle_register()
    {
        $params = $_POST;
        if (!Employer::checkUsernameEmployer($params['username'])) {
            $employer = new Employer(array(
          'company_name' => $params['company_name'],
          'email' => $params['email'],
          'username' => $params['username'],
          'password' => $params['password'],
          'company_description' => $params['company_description'],
          'created' => date('dd/mm/YY'),
        ));
            $employer->newEmployer();

            Redirect::to('/employer/login_employer.html', array('message' => 'Voit nyt kirjautua sisään '.$employer->name.'!'));
        }
    }
}
