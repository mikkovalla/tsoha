<?php

class Jobs extends BaseModel
{
    public $id, $category_id, $employer_id, $type_id, $job_name, $description, $area, $created;

    public function __construct($attributes)
    {
        parent::__construct($attributes);
    }

    public static function all()
    {
        $query = DB::connection()->prepare('SELECT * FROM Jobs');
        $query->execute();
        $rows = $query->fetchAll();
        $jobs = array();
        foreach ($rows as $row) {
            $jobs[] = new self(array(
        'id' => $row['id'],
        'category_id' => $row['category_id'],
        'employer_id' => $row['employer_id'],
        'type_id' => $row['type_id'],
        'job_name' => $row['job_name'],
        'description' => $row['description'],
        'area' => $row['area'],
        'created' => $row['created'],
      ));
        }

        return $jobs;
    }
    public static function find($id)
    {
        $query = DB::connection()->prepare('SELECT * FROM Jobs WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        if ($row) {
            $jobs[] = new self(array(
        'id' => $row['id'],
        'category_id' => $row['category_id'],
        'employer_id' => $row['employer_id'],
        'type_id' => $row['type_id'],
        'job_name' => $row['job_name'],
        'description' => $row['description'],
        'area' => $row['area'],
        'created' => $row['created'],
      ));

            return $jobs;
        }

        return;
    }

    public static function findByParam($keyword, $area, $category)
    {
    }

    public static function findByEmployer($employer_id)
    {
        #SELECT pitää tarkistaa
        $query = DB::connection()->prepare(
          'SELECT * FROM Jobs
          LEFT JOIN Jobs.employer_id = :employer_id');

        $query->execute(array('employer_id' => Employer.'.'.$employer_id));

        $rows = $query->fetchAll();
        $jobs = array();

        foreach ($rows as $row) {
            $jobs[] = new self(array(
        'id' => $row['id'],
        'category_id' => $row['category_id'],
        'employer_id' => $row['employer_id'],
        'type_id' => $row['type_id'],
        'job_name' => $row['job_name'],
        'description' => $row['description'],
        'area' => $row['area'],
        'created' => $row['created'],
      ));
        }

        return $jobs;
    }

    public function newJob($employer_id, $category_id, $type_id)
    {
        # code...
    }
}
