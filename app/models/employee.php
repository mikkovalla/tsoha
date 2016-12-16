<?php

class Employee extends BaseModel
{
    public $id, $first_name, $last_name, $email, $username, $password, $description, $created;
    public function __construct($attributes)
    {
        parent::__construct($attributes);
    }

    public function validate($first_name, $last_name, $email, $username, $password, $description)
    {
        $v = new Valitron\Validator(array(
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'username' => $username,
        'password' => $password,
        'description' => $description,
      ));

        $v->rule('required', 'first_name');
        $v->rule('lengthMin', 'first_name', 2);
        $v->rule('lengthMax', 'first_name', 30);
        $v->rule('required', 'last_name');
        $v->rule('lengthMin', 'last_name', 2);
        $v->rule('lengthMax', 'last_name', 50);
        $v->rule('required', 'email');
        $v->rule('email', 'email');
        $v->rule('required', 'description');
        $v->rule('lengthMin', 'description', 10);

        if (isset($username)) {
            $v->rule('required', 'username');
            $v->rule('lengthMin', 'username', 4);
            $v->rule('lengthMax', 'username', 20);
        }
        if (isset($password)) {
            $v->rule('required', 'password');
            $v->rule('lengthMin', 'password', 5);
        }

        $errors[] = '';
        if ($v->validate()) {
            return true;
        } else {
            return $errors = $v->errors();
        }
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
          'SELECT * FROM Employee
          WHERE username = :username
          LIMIT 1');
        $query->execute(array('username' => $username));
        $row = $query->fetch();

        if ($row) {
            return true;
        } else {
            return false;
        }
    }
}
