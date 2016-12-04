<?php

class Category extends BaseModel
{
    public $id, $name;

    public function __construct($attributes)
    {
        parent::__construct($attributes);
    }
    public static function all()
    {
        $query = DB::connection()->prepare('SELECT * FROM Categories');
        $query->execute();
        $rows = $query->fetchAll();
        $jobs = array();
        foreach ($rows as $row) {
            $categories[] = new self(array(
    'id' => $row['id'],
    'name' => $row['name'],
  ));
        }

        return $categories;
    }
    public static function findOne($name)
    {
        $query = DB::connection()->prepare('SELECT * FROM Categories WHERE name = :name LIMIT 1');
        $query->execute(array('name' => $name));
        $row = $query->fetch();
        if ($row) {
            $cat = new self(array(
        'id' => $row['id'],
        'name' => $row['name'],
      ));

            return $cat->id;
        }
    }
}
