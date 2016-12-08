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
  }
