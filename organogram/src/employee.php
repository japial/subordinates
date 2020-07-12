<?php
/**
 * Library which provide all kind of employee information and data
 *
 * @package Organogram
 * @author Sarwar Hossain <sarwar@instabd.com> 
 * @copyright   Instalogic
 * @link URL description
 * @version 1.0.0
 * 
 */
namespace Organogram;


use Organogram\model;

/**
 * Employee Class provides all employee data. 
 * Usages: 
 * ```
 * use \Organogram\Employee <br />
 * $emp = new Employee(); <br />
 * call of your desire method from view or anywhere. 
 * 
 */
 class Employee
{

    function __construct(){
        
    }

    /**
     * Get the employee array 
     * @param type $id
     * @return type
     */
    function getEmployee($id = 0){
        return Model::get()->employees();
    }

    /**
     * Get the employee roles 
     * @param type $employeeId, $departmentId
     * @return Array of Roles
     */
    function getEmployeeRoles($employeeId, $departmentId){
        return Model::get()->roles($employeeId, $departmentId);
    }
    
    /**
     * @param Integer $employeeId
     * @param Integer $departmentId
     * @return Array List of employees 
     */
    function getEmployeeUnerMe($employeeId, $departmentId){
        $data['myInfo'] = Model::get()->employeeById($employeeId);
        $data['myRole'] = Model::get()->role($employeeId, $departmentId);
        $data['mySubordinates'] = $this->mySubordinatesList($employeeId, $departmentId);
        return $data;
    }

    /**
     * @param Integer $employeeId
     * @param Integer $departmentId
     * @return HTML Tree of subordinates 
     */
    private function mySubordinatesList($employeeId, $departmentId)
    {
        $html = '';
        $subordinates = Model::get()->employeeUnderMe($employeeId, $departmentId);
        if(sizeof($subordinates) > 0){
            $html .= "<ul>";
            foreach ($subordinates as $key => $subordinate) {
                $html .= "<li>";
                $html .= "<span>" . $subordinate['name'] . " <small class='font-weight-bold'> | " . $subordinate['role_name']. "</small></span>";
                $html .= $this->mySubordinatesList($subordinate['id'], $departmentId);
                $html .= "</li>";
            }
            $html .= "</ul>";
        }
        return $html;
    }

}