<?php

use PHPUnit\Framework\TestCase;
use Organogram\Employee;

class EmployeeTest extends TestCase{
	
    public function testDuplicateEmployeeRole(){
        $employee = new Employee;
    
        $roles = $employee->getEmployeeRoles(4, 1);

        $this->assertEquals(1, sizeof($roles));
    }

    public function testEmployeesUnderEmployee(){
        $employee = new Employee;
    
        $myData = $employee->getEmployeeUnerMe(1, 1);

        $this->assertIsArray($myData);
        $this->assertEquals(3, sizeof($myData));
    }
	
}