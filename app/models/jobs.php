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
            $jobs = new self(array(
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

    public static function findOne($id)
    {
        $query = DB::connection()->prepare('SELECT * FROM Jobs WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $id));
        $row = $query->fetch();
        if ($row) {
            $jobs = new self(array(
        'id' => $row['id'],
        'category_id' => $row['category_id'],
        'employer_id' => $row['employer_id'],
        'type_id' => $row['type_id'],
        'job_name' => $row['job_name'],
        'description' => $row['description'],
        'area' => $row['area'],
        'created' => $row['created'],
      ));

            return $jobs->id;
        }

        return;
    }

    public static function findByParam($keyword, $area, $category)
    {
      #hakukenttien käyttöön tarkoitettu metodi
    }

    public static function findByEmployer()
    {
        #SELECT pitää tarkistaa
        $query = DB::connection()->prepare(
          'SELECT * FROM Jobs');

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

    public function newJob()
    {
        $query = DB::connection()->prepare(
      'INSERT INTO Jobs
      (category_id, employer_id, type_id, job_name, description, area, created)
      VALUES
      (:category_id, :employer_id, :type_id, :job_name, :description, :area, :created)
      RETURNING id'
    );
        $query->execute(array(
      'category_id' => $this->category_id,
      'employer_id' => $this->employer_id,
      'type_id' => $this->type_id,
      'job_name' => $this->job_name,
      'description' => $this->description,
      'area' => $this->area,
      'created' => $this->created, ));

        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function deleteJob()
    {
        $query = DB::connection()->prepare(
          'DELETE FROM Jobs
          Where id = :id');
        $query->execute(array('id' => $this->id));
    }
}
