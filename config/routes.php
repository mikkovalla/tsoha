<?php

  $routes->get('/', function () {
    HelloWorldController::index();
    #JobsController
  });

  $routes->get('/hiekkalaatikko', function () {
    HelloWorldController::sandbox();
  });

  $routes->post('jobs/addjob', function () {
    HelloWorldController::addjob();
    #JobsController
  });

  $routes->get('/details', function () {
    JobsController::details();
    #JobsController
  });

  $routes->get('/employee', function () {
    HelloWorldController::employee();
    #EmployeeController
  });

  $routes->get('/employer', function () {
    HelloWorldController::employer();
    #EmployeeController
  });

  $routes->get('/jobs', function () {
    HelloWorldController::jobs();
    #JobsController
  });

  $routes->get('/login_employee', function () {
    HelloWorldController::login_employee();
    #EmployeeController
  });

  $routes->get('/login_employer', function () {
    HelloWorldController::login_employer();
    #EmployerController
  });

  $routes->get('/register_employee', function () {
    HelloWorldController::register_employee();
    #EmployeeController
  });

  $routes->get('/register_employer', function () {
    HelloWorldController::register_employer();
    #EmployerController
  });

  $routes->get('/updatejob', function () {
    HelloWorldController::updatejob();
    #JobsController
  });
