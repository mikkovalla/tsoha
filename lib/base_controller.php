<?php

  class BaseController
  {
      public static function get_employee_logged_in()
      {
          if (isset($_SESSION['employee'])) {
              $employee_id = $_SESSION['employee'];
              $employee = Employee::find($employee_id);

              return $employee;
          }

          return;
      }

      public static function get_employer_logged_in()
      {
          if (isset($_SESSION['employer'])) {
              $employer_id = $_SESSION['employer'];
              $employer = Employer::find($employer_id);

              return $employer;
          }

          return;
      }

      public static function check_logged_in_employee()
      {
          if (!isset($_SESSION['employee'])) {
              Redirect::to('employee/login_employee', array('error' => 'Kirjaudu sisään!'));
          }
      }
      public static function check_logged_in_employer()
      {
          if (!isset($_SESSION['employer'])) {
              Redirect::to('employer/login_employer', array('error' => 'Kirjaudu sisään!'));
          }
      }
  }
