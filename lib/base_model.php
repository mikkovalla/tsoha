<?php

  class BaseModel
  {
      // "protected"-attribuutti on käytössä vain luokan ja sen perivien luokkien sisällä
    protected $validators;

      public function __construct($attributes = null)
      {
          // Käydään assosiaatiolistan avaimet läpi
      foreach ($attributes as $attribute => $value) {
          // Jos avaimen niminen attribuutti on olemassa...
        if (property_exists($this, $attribute)) {
            // ... lisätään avaimen nimiseen attribuuttin siihen liittyvä arvo
          $this->{$attribute} = $value;
        }
      }
      }

      public static function formatErrors($errors)
      {
          $problem = array();

          foreach ($errors as $error) {
              foreach ($error as $er) {
                  $problem[] = $er;
              }
          }

          return $problem;
      }
  }
