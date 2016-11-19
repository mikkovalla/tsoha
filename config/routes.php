<?php

  $routes->get('/', function () {
    HelloWorldController::index();
  });

  $routes->get('/hiekkalaatikko', function () {
    HelloWorldController::sandbox();
  });

  $routes->get('/addjob', function () {
    HelloWorldController::addjob();
  });

  $routes->get('/details', function () {
    HelloWorldController::details();
  });

  $routes->get('/employee', function () {
    HelloWorldController::employee();
  });

  $routes->get('/employer', function () {
    HelloWorldController::employer();
  });

  $routes->get('/jobs', function () {
    HelloWorldController::jobs();
  });

  $routes->get('/login', function () {
    HelloWorldController::login();
  });

  $routes->get('/register', function () {
    HelloWorldController::register();
  });

  $routes->get('/updatejob', function () {
    HelloWorldController::updatejob();
  });
