<?php

  class View
  {
      public static function make($view, $content = array())
      {
          // Alustetaan Twig
      $twig = self::get_twig();

          try {
              // Asetetaan uudelleenohjauksen yhteydessä lisätty viesti
        self::set_flash_message($content);

        // Asetetaan näkymään base_path-muuttuja index.php:ssa määritellyllä BASE_PATH vakiolla
        $content['base_path'] = BASE_PATH;

        $content['employee_logged_in'] = BaseController::get_employee_logged_in();
        $content['employer_logged_in'] = BaseController::get_employer_logged_in();

        // Tulostetaan Twig:n renderöimä näkymä
        echo $twig->render($view, $content);
          } catch (Exception $e) {
              die('Virhe näkymän näyttämisessä: '.$e->getMessage());
          }

          exit();
      }

      private static function get_twig()
      {
          Twig_Autoloader::register();

          $twig_loader = new Twig_Loader_Filesystem('app/views');

          return new Twig_Environment($twig_loader);
      }

      private static function set_flash_message(&$content)
      {
          if (isset($_SESSION['flash_message'])) {
              $flash = json_decode($_SESSION['flash_message']);

              foreach ($flash as $key => $value) {
                  $content[$key] = $value;
              }

              unset($_SESSION['flash_message']);
          }
      }
  }
