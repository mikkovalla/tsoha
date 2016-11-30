<?php

  $routes->get('/', function () {
    JobsController::index();
  });

  $routes->get('/hiekkalaatikko', function () {
    HelloWorldController::sandbox();
  });

  $routes->post('/addjob', function () {
    JobsController::addjob();
  });

  $routes->get('/jobs/:id', function ($id) {
    JobsController::details($id);
  });

  $routes->get('/employee', function () {
    EmployeeController::employee();
  });

  $routes->get('/employer', function () {
    EmployerController::employer();
  });

  $routes->get('/jobs', function () {
    JobsController::jobs();
  });

  $routes->get('/login_employee', function () {
    EmployeeController::login_employee();
  });

  $routes->get('/login_employer', function () {
    EmployerController::login_employer();
  });

  $routes->get('/register_employee', function () {
    EmployeeController::register_employee();
  });

  $routes->get('/register_employer', function () {
    EmployerController::register_employer();
  });

  $routes->get('/updatejob', function () {
    JobsController::updatejob();
  });
