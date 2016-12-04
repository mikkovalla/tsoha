<?php


/**
 *
 */
class Type extends BaseModel
{
    public $id, $name, $color;

    public function __construct($attributes)
    {
        parent::__construct($attributes);
    }
    public static function allTypes()
    {
        $query = DB::connection()->prepare('SELECT * FROM Types');
        $query->execute();
        $rows = $query->fetchAll();
        $jobs = array();
        foreach ($rows as $row) {
            $types[] = new self(array(
            'id' => $row['id'],
            'name' => $row['name'],
            'color' => $row['color'],
  ));
        }

        return $types;
    }
    public static function findOne($name)
    {
        $query = DB::connection()->prepare('SELECT * FROM Types WHERE name = :name LIMIT 1');
        $query->execute(array('name' => $name));
        $row = $query->fetch();
        if ($row) {
            $type = new self(array(
        'id' => $row['id'],
        'name' => $row['name'],
        'color' => $row['color'],
      ));

            return $type->id;
        }
    }
}
