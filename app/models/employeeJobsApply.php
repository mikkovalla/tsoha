<?php

/**
 *
 */
class EmployeeJobsApply extends BaseModel
{
    public $id, $job_id, $employee_id;

    public function __construct($attributes)
    {
        parent::__construct($attributes);
    }

    public function apply()
    {
        $query = DB::connection()->prepare(
          'INSERT INTO Employee_Jobs_Apply
          (job_id, employee_id)
          VALUES
          (:job_id, :employee_id)
          RETURNING id'
  );
        $query->execute(array(
          'job_id' => $this->job_id,
          'employee_id' => $this->employee_id,
    ));
        $row = $query->fetch();
        $this->id = $row['id'];
    }

    public static function all()
    {
        $query = DB::connection()->prepare('SELECT * FROM Employee_Jobs_Apply');
        $query->execute();
        $rows = $query->fetchAll();
        $jobs = array();
        foreach ($rows as $row) {
            $jobs[] = new self(array(
        'id' => $row['id'],
        'job_id' => $row['job_id'],
        'employee_id' => $row['employee_id'],
      ));
        }

        return $jobs;
    }
}
