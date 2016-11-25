<?php

  class HelloWorldController extends BaseController
  {
      public static function index()
      {
          // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('home.html');
      }

      public static function sandbox()
      {
          // Testaa koodiasi täällä
      echo 'Hello World!';
      }

      public static function addjob()
      {
          View::make('suunnitelmat/addjob.html');
      }
      public static function details()
      {
          View::make('suunnitelmat/details.html');
      }
      public static function employee()
      {
          View::make('suunnitelmat/employee.html');
      }
      public static function employer()
      {
          View::make('suunnitelmat/employer.html');
      }
      public static function jobs()
      {
          View::make('suunnitelmat/jobs.html');
      }
      public static function login()
      {
          View::make('suunnitelmat/login.html');
      }
      public static function register()
      {
          View::make('suunnitelmat/register.html');
      }
      public static function updatejob()
      {
          View::make('suunnitelmat/updatejob.html');
      }
  }
