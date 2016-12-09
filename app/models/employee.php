<?php

class Employee extends BaseModel
{
    public $id, $first_name, $last_name, $email, $username, $password, $description, $created;
    public function __construct($attributes)
    {
        parent::__construct($attributes);
    }

    public static function allEmployees()
    {
        $query = DB::connection()->prepare('SELECT * FROM Employee');
        $query->execute();
        $rows = $query->fetchAll();
        $jobs = array();
        foreach ($rows as $row) {
            $employee[] = new self(array(
      'id' => $row['id'],
      'first_name' => $row['first_name'],
      'last_name' => $row['last_name'],
      'email' => $row['email'],
      'username' => $row['username'],
      'password' => $row['password'],
      'description' => $row['description'],
      'created' => $row['created'],
    ));
        }

        return $employee;
    }

    public function newEmployee()
    {
        $query = DB::connection()->prepare(
        'INSERT INTO Employee
        (first_name, last_name, email, username, password, description, created)
        VALUES
        (:first_name, :last_name, :email, :username, :password, :description, :created)
        RETURNING id'
      );
        $query->execute(array(
        'first_name' => $this->first_name,
        'last_name' => $this->last_name,
        'email' => $this->email,
        'username' => $this->username,
        'password' => $this->password,
        'description' => $this->description,
        'created' => $this->created, ));

        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public static function find($employee_id)
    {
        $query = DB::connection()->prepare('SELECT * FROM Employee WHERE id = :id LIMIT 1');
        $query->execute(array('id' => $employee_id));
        $row = $query->fetch();
        if ($row) {
            $employee = new self(array(
            'id' => $row['id'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
            'username' => $row['username'],
            'password' => $row['password'],
            'description' => $row['description'],
            'created' => $row['created'],
    ));

            return $employee;
        }

        return;
    }

    public function updateEmployee()
    {
        $query = DB::connection()->prepare(
      'UPDATE Employee SET
        first_name = :first_name,
        last_name = :last_name,
        email = :email,
        description =  :description
      WHERE id = :id'
    );
        $query->execute(array(
      'id' => $this->id,
      'first_name' => $this->first_name,
      'last_name' => $this->last_name,
      'email' => $this->email,
      'description' => $this->description,
       ));

        return true;
    }

    public function deleteEmployee()
    {
        $query = DB::connection()->prepare('DELETE FROM Employee Where id = :id');
        $query->execute(array('id' => $this->id));
    }

    public function auth($username, $password)
    {
        $query = DB::connection()->prepare(
        'SELECT * FROM Employee
        WHERE username = :username
        AND password = :password
        LIMIT 1');
        $query->execute(array('username' => $username, 'password' => $password));
        $row = $query->fetch();

        if ($row) {
            $employee = new self(array(
            'id' => $row['id'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
            'username' => $row['username'],
            'password' => $row['password'],
            'description' => $row['description'],
            'created' => $row['created'],
          ));

            return $employee;
        }

        return;
    }

    public static function checkUsername($username)
    {
        $query = DB::connection()->prepare(
          'SELECT FROM Employee
          WHERE username = :username
          LIMIT 1');
        $query->execute(array());
        $row = $query->fetch();

        if ($row) {
            return true;
        } else {
            return false;
        }
    }
}
