<?php

class ComputerDAO
{

    //Store an instance of the PDO class here
    private static $_db;

    static function initialize()
    {
        self::$_db = new PDOService("Computer");
    }

    //Get all 
    static function getComputersList()
    {

        $sql = "SELECT 
        computer.computerId, 
        computer.computerOwner,
        computer.computerTag,
        computer.computerHostname,
        computer.computerType,
        computer.computerStatus,
        computer.computerBrand,
        computer.computerModel,
        computer.computerProc,
        computer.computerMem,
        computer.computerSerial,
        computer.computerIp,
        computer.computerHDModel,
        computer.computerHDSize,
        computer.computerNetMap,
        computer.monitorOwner,
        computer.monitorBrand,
        computer.monitorSize,
        computer.monitorSerial,
        computer.monitorTag,
        computer.os,
        computer.osVersion,
        computer.osArc,
        computer.osLicType,
        computer.swAvType,
        computer.swWeb,
        computer.notes,
        computer.username as cUsername,
        computer.time as cTime,
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
        employee.eLocation 
        FROM computer,employee WHERE computer.eId = employee.eId;";

        //Prepare the query
        self::$_db->query($sql);
        //Execute
        self::$_db->execute();
        //Return the results
        return self::$_db->resultSet();
    }

    static function getSingleComputer(int $computerId)
    {
        $sql = "SELECT computer.* ,employee.* FROM computer,employee WHERE computer.eId = employee.eId AND computerId = :computerId;";

        self::$_db->query($sql);
        self::$_db->bind(":computerId", $computerId);
        self::$_db->execute($sql);

        return self::$_db->singleResult();
    }

    static function addComputer(Computer $na, $username)
    {
        $sql = "INSERT INTO computer (
                computerOwner,
                computerTag,
                computerHostname,
                computerType,
                computerStatus,
                computerBrand,
                computerModel,
                computerProc,
                computerMem,
                computerSerial,
                computerIp,
                computerHDModel,
                computerHDSize,
                computerNetMap,
                monitorOwner,
                monitorBrand,
                monitorSize,
                monitorSerial,
                monitorTag,
                os,
                osVersion,
                osArc,
                osLicType,
                swAvType,
                swWeb,
                notes,
                username,
                time,
                eId    
        ) VALUES (
                :computerOwner,
                :computerTag,
                :computerHostname,
                :computerType,
                :computerStatus,
                :computerBrand,
                :computerModel,
                :computerProc,
                :computerMem,
                :computerSerial,
                :computerIp,
                :computerHDModel,
                :computerHDSize,
                :computerNetMap,
                :monitorOwner,
                :monitorBrand,
                :monitorSize,
                :monitorSerial,
                :monitorTag,
                :os,
                :osVersion,
                :osArc,
                :osLicType,
                :swAvType,
                :swWeb,
                :notes,
                :username,
                :time,
                :eId
        );";

        self::$_db->query($sql);
        self::$_db->bind(":computerOwner", $na->computerOwner);
        self::$_db->bind(":computerTag", $na->computerTag);
        self::$_db->bind(":computerHostname", $na->computerHostname);
        self::$_db->bind(":computerType", $na->computerType);
        self::$_db->bind(":computerStatus", $na->computerStatus);
        self::$_db->bind(":computerBrand", $na->computerBrand);
        self::$_db->bind(":computerModel", $na->computerModel);
        self::$_db->bind(":computerProc", $na->computerProc);
        self::$_db->bind(":computerMem", $na->computerMem);
        self::$_db->bind(":computerSerial", $na->computerSerial);
        self::$_db->bind(":computerIp", $na->computerIp);
        self::$_db->bind(":computerHDModel", $na->computerHDModel);
        self::$_db->bind(":computerHDSize", $na->computerHDSize);
        self::$_db->bind(":computerNetMap", $na->computerNetMap);
        self::$_db->bind(":monitorOwner", $na->monitorOwner);
        self::$_db->bind(":monitorBrand", $na->monitorBrand);
        self::$_db->bind(":monitorSize", $na->monitorSize);
        self::$_db->bind(":monitorSerial", $na->monitorSerial);
        self::$_db->bind(":monitorTag", $na->monitorTag);
        self::$_db->bind(":os", $na->os);
        self::$_db->bind(":osVersion", $na->osVersion);
        self::$_db->bind(":osArc", $na->osArc);
        self::$_db->bind(":osLicType", $na->osLicType);
        self::$_db->bind(":swAvType", $na->swAvType);
        self::$_db->bind(":swWeb", $na->swWeb);
        self::$_db->bind(":notes", $na->notes);
        self::$_db->bind(":username", $username);
        self::$_db->bind(":time", time());
        self::$_db->bind(":eId", $na->eId);

        self::$_db->execute();

        return self::$_db->lastInsertId();
    }

    static function deleteComputer(int $computerId)
    {
        $sql = "DELETE FROM computer WHERE computerId = :computerId;";

        self::$_db->query($sql);
        self::$_db->bind(":computerId", $computerId);
        self::$_db->execute();
        return self::$_db->rowCount();
    }

    static function updateComputer(Computer $na, $username)
    {
        $sql = "UPDATE computer SET 
                computerOwner = :computerOwner,
                computerTag = :computerTag,
                computerHostname = :computerHostname,
                computerType = :computerType,
                computerStatus = :computerStatus,
                computerProc = :computerProc,
                computerBrand = :computerBrand,
                computerModel = :computerModel,
                computerMem = :computerMem,
                computerSerial = :computerSerial,
                computerIp = :computerIp,
                computerHDModel = :computerHDModel,
                computerHDSize = :computerHDSize,
                computerNetMap = :computerNetMap,
                monitorOwner = :monitorOwner,
                monitorBrand = :monitorBrand,
                monitorSize = :monitorSize,
                monitorSerial = :monitorSerial,
                monitorTag = :monitorTag,
                os = :os,
                osVersion = :osVersion,
                osArc = :osArc,
                osLicType = :osLicType,
                swAvType = :swAvType,
                swWeb = :swWeb,
                notes = :notes,
                username = :username,
                time = :time,
                eId = :eId  
        WHERE computerId = :computerId;";

        self::$_db->query($sql);
        self::$_db->bind(":computerId", $na->computerId);
        self::$_db->bind(":computerOwner", $na->computerOwner);
        self::$_db->bind(":computerTag", $na->computerTag);
        self::$_db->bind(":computerHostname", $na->computerHostname);
        self::$_db->bind(":computerType", $na->computerType);
        self::$_db->bind(":computerStatus", $na->computerStatus);
        self::$_db->bind(":computerProc", $na->computerProc);
        self::$_db->bind(":computerBrand", $na->computerBrand);
        self::$_db->bind(":computerModel", $na->computerModel);
        self::$_db->bind(":computerMem", $na->computerMem);
        self::$_db->bind(":computerSerial", $na->computerSerial);
        self::$_db->bind(":computerIp", $na->computerIp);
        self::$_db->bind(":computerHDModel", $na->computerHDModel);
        self::$_db->bind(":computerHDSize", $na->computerHDSize);
        self::$_db->bind(":computerNetMap", $na->computerNetMap);
        self::$_db->bind(":monitorOwner", $na->monitorOwner);
        self::$_db->bind(":monitorBrand", $na->monitorBrand);
        self::$_db->bind(":monitorSize", $na->monitorSize);
        self::$_db->bind(":monitorSerial", $na->monitorSerial);
        self::$_db->bind(":monitorTag", $na->monitorTag);
        self::$_db->bind(":os", $na->os);
        self::$_db->bind(":osVersion", $na->osVersion);
        self::$_db->bind(":osArc", $na->osArc);
        self::$_db->bind(":osLicType", $na->osLicType);
        self::$_db->bind(":swAvType", $na->swAvType);
        self::$_db->bind(":swWeb", $na->swWeb);
        self::$_db->bind(":notes", $na->notes);
        self::$_db->bind(":username", $username);
        self::$_db->bind(":time", time());
        self::$_db->bind(":eId", $na->eId);

        self::$_db->execute();
        return self::$_db->rowCount();
    }

    static function updateComputerByEid($eIdToUpdate, $newEId)
    {
        $sql = "UPDATE computer SET 
                eId = :newEId
        WHERE eId = :eIdToUpdate;";

        self::$_db->query($sql);
        self::$_db->bind(":newEId", $newEId);
        self::$_db->bind(":eIdToUpdate", $eIdToUpdate);

        self::$_db->execute();
        return self::$_db->rowCount();
    }
}
