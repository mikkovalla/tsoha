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
        'created' => $this->created, ));

        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public function updateEmployer($id)
    {
        #Tämä funktio on vielä kesken. Päivitän sen kun saan html osan valmiiksi.
      $query = DB::connection()->prepare(
      'UPDATE Employer SET (
        company_name = :company_name,
        email = :email,
        username = :username,
        password = :password,
        company_description =  :company_description,
        created = :created)
      WHERE id = :id'
    );
        $query->execute(array(
      'company_name' => $this->company_name,
      'email' => $this->email,
      'username' => $this->username,
      'password' => $this->password,
      'company_description' => $this->company_description,
      'created' => $this->created, ));

        return true;
    }

    public function deleteEmployer($id)
    {
        $message = 'Tietosi on poistettu!';
        $query = DB::connection()->prepare('DELETE FROM Employer Where id = :id');
        $query = execute(array('id' => $this->id));

        return $message;
    }

    public static function checkUsernameEmployer($username)
    {
        $query = DB::connection()->prepare(
          'SELECT FROM Employer
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
