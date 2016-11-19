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
          // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('suunnitelmat/addjob.html');
      }
      public static function details()
      {
          // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('suunnitelmat/details.html');
      }
      public static function employee()
      {
          // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('suunnitelmat/employee.html');
      }
      public static function employer()
      {
          // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('suunnitelmat/employer.html');
      }
      public static function jobs()
      {
          // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('suunnitelmat/jobs.html');
      }
      public static function login()
      {
          // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('suunnitelmat/login.html');
      }
      public static function register()
      {
          // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('suunnitelmat/register.html');
      }
      public static function updatejob()
      {
          // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
      View::make('suunnitelmat/updatejob.html');
      }
  }
