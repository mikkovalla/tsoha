<?php

#JobsControllers

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

  $routes->get('/jobs', function () {
    JobsController::index();
  });

  $routes->get('/jobs', function () {
    JobsController::index();
  });

  $routes->post('/jobs/:id/delete', function ($id) {
    JobsController::deleteJob($id);
  });
#End JobsControllers

#EmployeeControllers

  $routes->get('/employee/:id', function ($id) {
    EmployeeController::employee($id);
  });

  $routes->get('/login_employee', function () {
    EmployeeController::login();
  });

  $routes->post('/login_employee', function () {
    EmployeeController::handle_login();
  });

  $routes->post('/logout', function () {
    EmployeeController::logout();
  });

  $routes->post('/register_employee', function () {
  EmployeeController::handle_register();
  });

  $routes->get('/register_employee', function () {
    EmployeeController::register();
  });

  $routes->post('/employee/:id/update', function ($id) {
    EmployeeController::update($id);
  });

  $routes->post('/employee/:id/delete', function ($id) {
    EmployeeController::delete($id);
  });

  #End EmployerControllers

  #EmployerControllers

  $routes->get('/employer/:id', function ($id) {
    EmployerController::employer($id);
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

  #End EmployerControllers
