<?php

class EmployeeDAO
{

    //Store an instance of the PDO class here
    private static $_db;

    static function initialize()
    {
        self::$_db = new PDOService("Employee");
    }

    //Get all 
    static function getEmployeeList()
    {

        $sql = "SELECT 
        employee.eId,
        employee.eStatus,
        employee.eFullName,
        employee.eEmail,
        employee.eCompany,
        employee.ePosition,
        employee.eDepartment,
        employee.ePhone,
        employee.eMobile,
        employee.eCountry,
        employee.eState,
        employee.eCity,
        employee.eAddress,
        employee.eLocation,
        employee.username as eUsername,
        employee.time as eTime
        FROM employee;";

        //Prepare the query
        self::$_db->query($sql);
        //Execute
        self::$_db->execute();
        //Return the results
        return self::$_db->resultSet();
    }

    static function getSingleEmployee(int $eId)
    {
        $sql = "SELECT * FROM employee WHERE eId = :eId;";

        self::$_db->query($sql);
        self::$_db->bind(":eId", $eId);
        self::$_db->execute($sql);

        return self::$_db->singleResult();
    }

    static function getSingleEmployeeByEmail(string $eEmail)
    {
        $sql = "SELECT * FROM employee WHERE eEmail = :eEmail;";

        self::$_db->query($sql);
        self::$_db->bind(":eEmail", $eEmail);
        self::$_db->execute($sql);

        return self::$_db->singleResult();
    }

    static function addEmployee(Employee $ne, $username)
    {
        $sql = "INSERT INTO employee (
                eStatus,
                eFullName,
                eEmail,
                eCompany,
                ePosition,
                eDepartment,
                ePhone,
                eMobile,
                eCountry,
                eState,
                eCity,
                eAddress,
                eLocation,
                username,
                time

        ) VALUES (
                :eStatus,
                :eFullName,
                :eEmail,
                :eCompany,
                :ePosition,
                :eDepartment,
                :ePhone,
                :eMobile,
                :eCountry,
                :eState,
                :eCity,
                :eAddress,
                :eLocation,
                :username,
                :time

        );";

        self::$_db->query($sql);

        self::$_db->bind(":eStatus", $ne->eStatus);
        self::$_db->bind(":eFullName", $ne->eFullName);
        self::$_db->bind(":eEmail", $ne->eEmail);
        self::$_db->bind(":eCompany", $ne->eCompany);
        self::$_db->bind(":ePosition", $ne->ePosition);
        self::$_db->bind(":eDepartment", $ne->eDepartment);
        self::$_db->bind(":ePhone", $ne->ePhone);
        self::$_db->bind(":eMobile", $ne->eMobile);
        self::$_db->bind(":eCountry", $ne->eCountry);
        self::$_db->bind(":eState", $ne->eState);
        self::$_db->bind(":eCity", $ne->eCity);
        self::$_db->bind(":eAddress", $ne->eAddress);
        self::$_db->bind(":eLocation", $ne->eLocation);
        self::$_db->bind(":username", $username);
        self::$_db->bind(":time", time());

        self::$_db->execute();

        return self::$_db->lastInsertId();
    }

    static function deleteEmployee(int $eId)
    {
        $sql = "DELETE FROM employee WHERE eId = :eId;";

        self::$_db->query($sql);
        self::$_db->bind(":eId", $eId);
        self::$_db->execute();
        return self::$_db->rowCount();
    }

    static function updateEmployee(Employee $na, $username)
    {
        $sql = "UPDATE employee SET 
                eStatus = :eStatus,
                eFullName = :eFullName,
                eEmail = :eEmail,
                eCompany = :eCompany,
                ePosition = :ePosition,
                eDepartment = :eDepartment,
                ePhone = :ePhone,
                eMobile = :eMobile,
                eCountry = :eCountry,
                eState = :eState,
                eCity = :eCity,
                eAddress = :eAddress,
                eLocation = :eLocation,
                username = :username,
                time = :time  
        WHERE eId = :eId;";

        self::$_db->query($sql);
        self::$_db->bind(":eId", $na->eId);
        self::$_db->bind(":eStatus", $na->eStatus);
        self::$_db->bind(":eFullName", $na->eFullName);
        self::$_db->bind(":eEmail", $na->eEmail);
        self::$_db->bind(":eCompany", $na->eCompany);
        self::$_db->bind(":ePosition", $na->ePosition);
        self::$_db->bind(":eDepartment", $na->eDepartment);
        self::$_db->bind(":ePhone", $na->ePhone);
        self::$_db->bind(":eMobile", $na->eMobile);
        self::$_db->bind(":eCountry", $na->eCountry);
        self::$_db->bind(":eState", $na->eState);
        self::$_db->bind(":eCity", $na->eCity);
        self::$_db->bind(":eAddress", $na->eAddress);
        self::$_db->bind(":eLocation", $na->eLocation);
        self::$_db->bind(":username", $username);
        self::$_db->bind(":time", time());

        self::$_db->execute();
        return self::$_db->rowCount();
    }
}
