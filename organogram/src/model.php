<?php
/**
 * Model - All kind of database query and fetching result.  
 *
 *
 * PHP version 7.3
 *
 *
 * @category   CategoryName
 * @package    Organogram
 * @author     Sarwar Hossain <sarwar@instabd.com>
 * @copyright  2020 Intalogic Bangaldesh
 * @version    1.0.1
 */
namespace Organogram;

// Include the configration file 
include_once 'config.php';


/**
 * Model Class Statically use to all over the system.
 * Usage: \Model::get()->
 * 
 */
class Model{

    /**
     * @var MySQLi Object  
     */
    private $_dbcon;

    /**
     * Constructor 
     */
    public function __construct(){
        $this->_dbcon = new \MySQLi(env('DB_HOST', 'localhost'), env('DB_USER', 'dbuser'), env('DB_PASSWORD', 'password'), env('DB_NAME', 'dbname'));
        
        if ($this->_dbcon->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }
    
    
    /**
     * Static method get the Model Object 
     * @return \Organogram\Model
     */
    public static function get() {
        return new Model();
    }

    /**
     * Query : Execute the base query 
     * @param String $sql
     * @return mixed 
     */
    private function query($sql){
        return $this->_dbcon->query($sql);
    }
    
    /**
     * fetch : get the first result 
     * @param mixed $result
     * @return Array
     */
    private function fetch($result){
        $data = $result->fetch_assoc();
        $result->free_result();
        $this->_dbcon->close();
        return $data; 

    }
    /**
     * fetchAll : get the full result of query
     * @param type $result
     * @return type
     */
    private function fetchAll($result){        
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free_result();
        $this->_dbcon->close();
        return $data; 
    }

    /**
     * employee: get the employee data
     * @param type $id
     * @return type
     */
    public function employees($id = false){
        $where = $id ? "WHERE id='{$id}'" : "";
        $sql= "SELECT * FROM employee {$where}"; 
        $result = $this->query($sql);
        $data = $this->fetchAll($result);
        return $data; 
    }

    /**
     * role: get the employee roles
     * @param type $employeeId, $departmentId
     * @return Array List of Employee Roles
     */
    public function roles($employeeId, $departmentId){
        $sql = "SELECT roles.name, roles.hierarchy FROM employee_roles 
                INNER JOIN roles ON roles.id=employee_roles.roles_id
                WHERE employee_roles.employee_id='{$employeeId}' AND employee_roles.departments_id='{$departmentId}'";
        $result = $this->query($sql);
        $data = $this->fetchAll($result);
        return $data; 
    }

    /**
     * role: get the employee role
     * @param type $employeeId, $departmentId
     * @return Employee Role
     */
    public function role($employeeId, $departmentId){
        $sql = "SELECT roles.name, roles.hierarchy FROM employee_roles 
                INNER JOIN roles ON roles.id=employee_roles.roles_id
                WHERE employee_roles.employee_id='{$employeeId}' AND employee_roles.departments_id='{$departmentId}'";
        $result = $this->query($sql);
        $data = $this->fetch($result);
        return $data; 
    }

    /**
     * departments: get All Department data
     * @return Array List of Departments
     */
    public function departments(){;
        $sql = "SELECT departments.id, departments.name  FROM departments"; 
        $result = $this->query($sql);
        $data = $this->fetchAll($result);
        return $data; 
    }

    /**
     * departments: get Department data
     * @param type $departmentId
     * @return Department Data Array
     */
    public function department($id){;
        $sql = "SELECT departments.id, departments.name  FROM departments WHERE id='{$id}'"; 
        $result = $this->query($sql);
        $data = $this->fetch($result);
        return $data; 
    }

    /**
     * role: get the subordinates
     * @param type $employeeId, $departmentId
     * @return Array List of subordinates 
     */
    public function employeeUnderMe($employeeId, $departmentId){
        $sql = "SELECT roles.name as role_name, employee_roles.manager_id, employee.id, employee.name FROM employee_roles 
                INNER JOIN roles ON roles.id=employee_roles.roles_id
                INNER JOIN employee ON employee.id=employee_roles.employee_id
                WHERE employee_roles.manager_id='{$employeeId}' AND employee_roles.departments_id='{$departmentId}'";
        $result = $this->query($sql);
        $data = $this->fetchAll($result);
        return $data; 
    }

    /**
     * employee: get the employee data
     * @param type $email
     * @return Employee Info / boolean
     */
    public function employeeByEmail($email = false)
    {
        if($email){
            $sql = "SELECT employee.id, employee.password  FROM employee WHERE email='{$email}'";
            $result = $this->query($sql);
            $data = $this->fetch($result);
            return $data;
        }
        return false;
    }

    /**
     * employee: get the employee data
     * @param type $id
     * @return Employee Info Array / boolean
     */
    public function employeeById($id = false)
    {
        if ($id) {
            $sql = "SELECT employee.name FROM employee WHERE id='{$id}'";
            $result = $this->query($sql);
            $data = $this->fetch($result);
            return $data;
        }
        return false;
    }

}


