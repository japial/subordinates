<?php

namespace Organogram;


use Organogram\model;

/**
 * Department Class provides all department data. 
 * Usages: 
 * ```
 * use \Organogram\Department <br />
 * $department = new Department(); <br />
 * call of your desire method from view or anywhere. 
 * 
 */
class Department
{

    function __construct()
    {
    }

    /**
     * Get the department array 
     * @return Array List of departments 
     */
    public function getAll()
    {
        return Model::get()->departments();
    }

    /**
     * Get the department data
     * @param type $id
     * @return department data array
     */
    public function find($id)
    {
        return Model::get()->department($id);
    }
}
