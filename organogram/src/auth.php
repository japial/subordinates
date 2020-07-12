<?php

namespace Organogram;


use Organogram\model;

/**
 * Auth Class manage user authentication. 
 * Usages: 
 * ```
 * use \Organogram\Auth <br />
 * $auth = new Auth(); <br />
 * call of your desire method from view or anywhere. 
 * 
 */
class Auth
{

    function __construct()
    {
    }

    /**
     * check the authenticated user 
     * @param type $email and $password
     * @return employeeID / boolean
     */
    public function login($email = false, $password = false)
    {
        $employee = Model::get()->employeeByEmail($email);
        if($employee && $employee['password'] == MD5($password)){
            return $employee['id'];
        }
        return false;
    }
}
