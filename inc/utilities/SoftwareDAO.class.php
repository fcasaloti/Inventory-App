<?php

class SoftwareDAO
{

    //Store an instance of the PDO class here
    private static $_db;

    static function initialize()
    {
        self::$_db = new PDOService("Software");
    }

    //Get all 
    static function getSoftwareList()
    {

        $sql = "SELECT employee.*, software.*, computer.* FROM software, employee,computer
        WHERE software.computerId = computer.computerId AND computer.eId = employee.eId;";

        //Prepare the query
        self::$_db->query($sql);
        //Execute
        self::$_db->execute();
        //Return the results
        return self::$_db->resultSet();
    }

    static function getSingleSoftware(int $swId)
    {
        $sql = "SELECT * FROM software WHERE swId = :swId;";

        self::$_db->query($sql);
        self::$_db->bind(":swId", $swId);
        self::$_db->execute($sql);

        return self::$_db->singleResult();
    }

    static function getSoftwareByComputer(int $computerId)
    {
        $sql = "SELECT * FROM software WHERE computerId = :computerId;";

        self::$_db->query($sql);
        self::$_db->bind(":computerId", $computerId);
        self::$_db->execute($sql);

        return self::$_db->resultSet();
    }

    static function addSoftware(Software $sw)
    {
        $sql = "INSERT INTO software (
                swName,
                swVersion,
                swVendor,
                computerId
            ) VALUES (
                :swName,
                :swVersion,
                :swVendor,
                :computerId
        );";

        self::$_db->query($sql);
        self::$_db->bind(":swName", $sw->swName);
        self::$_db->bind(":swVersion", $sw->swVersion);
        self::$_db->bind(":swVendor", $sw->swVendor);
        self::$_db->bind(":computerId", $sw->computerId);

        self::$_db->execute();

        return self::$_db->lastInsertId();
    }

    static function deleteSoftware(int $computerId)
    {
        $sql = "DELETE FROM software WHERE computerId = :computerId;";

        self::$_db->query($sql);
        self::$_db->bind(":computerId", $computerId);
        self::$_db->execute();
        return self::$_db->rowCount();
    }

}
