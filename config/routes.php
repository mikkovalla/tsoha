<?php

  $routes->get('/', function () {
    JobsController::index();
  });

  $routes->get('/hiekkalaatikko', function () {
    HelloWorldController::sandbox();
  });

  $routes->get('/addjob/:id', function () {
    JobsController::addjob();
  });

  $routes->post('/addjob/:id', function () {
    JobsController::addjob_handler();
  });

  $routes->get('/jobs/:id', function ($id) {
    JobsController::details($id);
  });

  $routes->get('/employee/:id', function ($id) {
    EmployeeController::employee($id);
  });

  $routes->get('/employer/:id', function ($id) {
        EmployerController::employer($id);
  });

  $routes->get('/jobs', function () {
    JobsController::index();
  });

  $routes->get('/login_employee', function () {
    EmployeeController::login_employee();
  });

  $routes->get('/login_employer', function () {
    EmployerController::login();
  });
  $routes->post('/login_employer', function () {
    EmployerController::handle_login();
  });

  $routes->post('/logout', function () {
    EmployerController::logout();
  });

  $routes->get('/register_employee', function () {
    EmployeeController::register_employee();
  });

  $routes->post('/register_employer', function () {
  EmployerController::handle_register();
  });

  $routes->get('/register_employer', function () {
    EmployerController::register();
  });

  $routes->post('/employer/:id/update', function ($id) {
    EmployerController::update($id);
  });

  $routes->post('/employer/:id/delete', function ($id) {
    EmployerController::delete($id);
  });

  $routes->get('/updatejob', function () {
    JobsController::updatejob();
  });
