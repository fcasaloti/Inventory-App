<?php

class DeviceDAO
{

    //Store an instance of the PDO class here
    private static $_db;

    static function initialize()
    {
        self::$_db = new PDOService("Device");
    }

    //Get all the 
    static function getDevicesList()
    {

        $sql = "SELECT 
        device.deviceId,
        device.deviceOwner,
        device.deviceTag,
        device.deviceType,
        device.deviceStatus,
        device.deviceBrand,
        device.deviceModel,
        device.deviceSerial,
        device.deviceIp,
        device.deviceOS,
        device.notes,
        device.username as dUsername,
        device.time as dTime,        
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
        FROM device,employee WHERE device.eId = employee.eId;";

        //Prepare the query
        self::$_db->query($sql);
        //Execute
        self::$_db->execute();
        //Return the results
        return self::$_db->resultSet();
    }

    static function getSingleDevice(int $deviceId)
    {
        $sql = "SELECT device.* ,employee.* FROM device,employee WHERE device.eId = employee.eId AND deviceId = :deviceId;";

        self::$_db->query($sql);
        self::$_db->bind(":deviceId", $deviceId);
        self::$_db->execute($sql);

        return self::$_db->singleResult();
    }

    static function addDevice(Device $na, $username)
    {
        $sql = "INSERT INTO device (
                deviceOwner,
                deviceTag,
                deviceType,
                deviceStatus,
                deviceBrand,
                deviceModel,
                deviceSerial,
                deviceIp,
                deviceOS,
                notes,
                username,
                time,
                eId    
        ) VALUES (
                :deviceOwner,
                :deviceTag,
                :deviceType,
                :deviceStatus,
                :deviceBrand,
                :deviceModel,
                :deviceSerial,
                :deviceIp,
                :deviceOS,
                :notes,
                :username,
                :time,
                :eId     
        );";

        self::$_db->query($sql);
        self::$_db->bind(":deviceOwner", $na->deviceOwner);
        self::$_db->bind(":deviceTag", $na->deviceTag);
        self::$_db->bind(":deviceType", $na->deviceType);
        self::$_db->bind(":deviceStatus", $na->deviceStatus);
        self::$_db->bind(":deviceBrand", $na->deviceBrand);
        self::$_db->bind(":deviceModel", $na->deviceModel);
        self::$_db->bind(":deviceSerial", $na->deviceSerial);
        self::$_db->bind(":deviceIp", $na->deviceIp);
        self::$_db->bind(":deviceOS", $na->deviceOS);
        self::$_db->bind(":notes", $na->notes);
        self::$_db->bind(":username", $username);
        self::$_db->bind(":time", time());
        self::$_db->bind(":eId", $na->eId);

        self::$_db->execute();

        return self::$_db->lastInsertId();
    }

    static function deleteDevice(int $deviceId)
    {
        $sql = "DELETE FROM device WHERE deviceId = :deviceId;";

        self::$_db->query($sql);
        self::$_db->bind(":deviceId", $deviceId);
        self::$_db->execute();
        return self::$_db->rowCount();
    }

    static function updateDevice(Device $na, $username)
    {
        $sql = "UPDATE device SET 
                deviceOwner = :deviceOwner,
                deviceTag = :deviceTag,
                deviceType = :deviceType,
                deviceStatus = :deviceStatus,
                deviceBrand = :deviceBrand,
                deviceModel = :deviceModel,
                deviceSerial = :deviceSerial,
                deviceIp = :deviceIp,
                deviceOS = :deviceOS,
                notes = :notes,
                username = :username,
                time = :time,
                eId = :eId  
        WHERE deviceId = :deviceId;";

        self::$_db->query($sql);
        self::$_db->bind(":deviceId", $na->deviceId);
        self::$_db->bind(":deviceOwner", $na->deviceOwner);
        self::$_db->bind(":deviceType", $na->deviceType);
        self::$_db->bind(":deviceStatus", $na->deviceStatus);
        self::$_db->bind(":deviceBrand", $na->deviceBrand);
        self::$_db->bind(":deviceModel", $na->deviceModel);
        self::$_db->bind(":deviceSerial", $na->deviceSerial);
        self::$_db->bind(":deviceIp", $na->deviceIp);
        self::$_db->bind(":deviceTag", $na->deviceTag);
        self::$_db->bind(":deviceOS", $na->deviceOS);
        self::$_db->bind(":notes", $na->notes);
        self::$_db->bind(":username", $username);
        self::$_db->bind(":time", time());
        self::$_db->bind(":eId", $na->eId);
        self::$_db->execute();
        return self::$_db->rowCount();
    }

    static function updateDeviceByEid($eIdToUpdate, $newEId)
    {
        $sql = "UPDATE device SET 
                eId = :newEId
        WHERE eId = :eIdToUpdate;";

        self::$_db->query($sql);
        self::$_db->bind(":newEId", $newEId);
        self::$_db->bind(":eIdToUpdate", $eIdToUpdate);

        self::$_db->execute();
        return self::$_db->rowCount();
    }
}
