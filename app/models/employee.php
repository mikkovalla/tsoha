<?php

class Employee extends BaseModel
{
    public $id, $first_name, $last_name, $email, $username, $password, $description, $created;
    public function __construct($attributes)
    {
        parent::__construct($attributes);
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

    public function updateEmployee($id)
    {
        #Tämä funktio on vielä kesken. Päivitän sen kun saan html osan valmiiksi.
      $query = DB::connection()->prepare(
      'UPDATE Employee SET (
        first_name = :first_name,
        last_name = :last_name,
        email = :email,
        username = :username,
        password = :password,
        description =  :description,
        created = :created)
      WHERE id = :id'
    );
        $query->execute(array(
      'first_name' => $this->first_name,
      'last_name' => $this->last_name,
      'email' => $this->email,
      'username' => $this->username,
      'password' => $this->password,
      'description' => $this->description,
      'created' => $this->created, ));

        return true;
    }

    public function deleteEmployee($id)
    {
        $message = 'Tietosi on poistettu!';
        $query = DB::connection()->prepare('DELETE FROM Employee Where id = :id');
        $query = execute(array('id' => $this->id));

        return $message;
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
