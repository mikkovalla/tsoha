<?php

/**
 *
 */
class Employer extends BaseModel
{
    public $id, $company_name, $email, $username, $password, $company_description, $created;
    public function __construct($attributes)
    {
        parent::__construct($attributes);
    }

    public static function allEmployers()
    {
        $query = DB::connection()->prepare('SELECT * FROM Employer');
        $query->execute();
        $rows = $query->fetchAll();
        $jobs = array();
        foreach ($rows as $row) {
            $employer[] = new self(array(
      'id' => $row['id'],
      'company_name' => $row['company_name'],
      'email' => $row['email'],
      'username' => $row['username'],
      'password' => $row['password'],
      'company_description' => $row['company_description'],
      'created' => $row['created'],
    ));
        }

        return $employer;
    }

    public static function find($employer_id)
    {
        $query = DB::connection()->prepare('SELECT * FROM Employer WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $employer_id));
        $row = $query->fetch();
        if ($row) {
            $employer = new self(array(
            'id' => $row['id'],
            'company_name' => $row['company_name'],
            'email' => $row['email'],
            'username' => $row['username'],
            'password' => $row['password'],
            'company_description' => $row['company_description'],
            'created' => $row['created'],
    ));

            return $employer;
        }

        return;
    }

    public function newEmployer()
    {
        $query = DB::connection()->prepare(
        'INSERT INTO Employer
        (company_name, email, username, password, company_description, created)
        VALUES
        (:company_name, :email, :username, :password, :company_description, :created)
        RETURNING id'
      );
        $query->execute(array(
        'company_name' => $this->company_name,
        'email' => $this->email,
        'username' => $this->username,
        'password' => $this->password,
        'company_description' => $this->company_description,
        'created' => $this->created));

        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function updateEmployer()
    {
        $query = DB::connection()->prepare(
        'UPDATE Employer SET
        company_name = :company_name,
        email = :email,
        username = :username,
        password = :password,
        company_description =  :company_description
        WHERE id = :id');

        $query->execute(array(
      'company_name' => $this->company_name,
      'email' => $this->email,
      'username' => $this->username,
      'password' => $this->password,
      'company_description' => $this->company_description,
      'id' => $this->id
      ));

        return true;
    }

    public function deleteEmployer()
    {
        $query = DB::connection()->prepare('DELETE FROM Employer Where id = :id');
        $query->execute(array('id' => $this->id));
    }

    public function auth($username, $password)
    {
        $query = DB::connection()->prepare(
        'SELECT * FROM Employer
        WHERE username = :username
        AND password = :password
        LIMIT 1');
        $query->execute(array('username' => $username, 'password' => $password));
        $row = $query->fetch();

        if ($row) {
            $employer = new self(array(
            'id' => $row['id'],
            'company_name' => $row['company_name'],
            'email' => $row['email'],
            'username' => $row['username'],
            'password' => $row['password'],
            'company_description' => $row['company_description'],
            'created' => $row['created'],
          ));

            return $employer;
        }

        return;
    }
}
