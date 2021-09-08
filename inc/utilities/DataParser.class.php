<?php

//class responsible to handle data
class DataParser
{


    public static function parseDataHW($fileContents)
    {
        $c = new Computer();
        $fileContents = str_replace('"', '', $fileContents);
        $lines = explode("\n", $fileContents);

        foreach ($lines as $key => $line) {
            $column = explode(",", $line);
            if ($key == 1) {
                $c->computerProc = $column[0];

                $memory = $column[1];
                $memory = (float)$memory / 1024 / 1024 / 1024;
                $c->computerMem = number_format($memory, 2);

                $c->computerHostname = $column[2];
                $c->computerType = $column[3];
                $c->computerIp = $column[4];
                $c->computerModel = $column[5];
                $c->computerSerial = $column[6];
                $swAvType = $column[7];
                $c->swAvType = strcasecmp($swAvType, "true") == 0 ? 'Windows Defender' : '';
                $c->computerBrand = $column[8];
                $c->os = $column[9];
                $c->osVersion = $column[10];
                $c->osArc = $column[11];
                $c->osLicType = $column[12];
                $c->computerHDModel = $column[13];

                $hd = $column[14];
                $hd = (float)$hd / 1024 / 1024 / 1024;
                $c->computerHDSize = number_format($hd, 2);
                
                $c->computerNetMap = str_replace("|", "\n", $column[15]);
            }
        }

        return $c;
    }

    public static function parseDataSW($fileContents)
    {
        $software = array();
        $lines = explode("\n", $fileContents);
        foreach ($lines as $i => $line) {
            $column = explode(",", $line);
            foreach ($column as $j => $value) {
                $column[$j] = str_replace('"', '', $column[$j]);
                $column[$j] = str_replace(',', ';', $column[$j]);
            }
            if ($i > 0 && !empty($column[0])) {
                $s = new Software();
                $s->swName = $column[0];
                $s->swVersion = $column[1];
                $s->swVendor = $column[2];
                $software[] = $s;
            }
        }
        return $software;
    }

    public static function parseSoftwareDBToForm($sw)
    {
        $stringSW = "";
        foreach ($sw as $key => $s) {
            $stringSW .= $s->swName . ",";
            $stringSW .= $s->swVersion . ",";
            $stringSW .= $s->swVendor . "\n";
        }
        return $stringSW;
    }

    public static function parseFormSW($sw)
    {
        $software = array();
        $lines = explode("\n", $sw);
        foreach ($lines as $i => $line) {
            $column = explode(",", $line);
            if (!empty($column[0])) {
                $s = new Software();
                if (isset($column[0]) && !is_null($column[0])) {
                    $s->swName = trim($column[0]);
                }
                if (isset($column[1]) && !is_null($column[1])) {
                    $s->swVersion = trim($column[1]);
                }
                if (isset($column[2]) && !is_null($column[2])) {
                    $s->swVendor = trim($column[2]);
                }

                $software[] = $s;
            }
        }
        return $software;
    }

    public static function parseComputerListDB($data)
    {

        $fileContents = "computerId,eId,eStatus,eFullName, eEmail,eCompany,ePosition,eDepartment,ePhone,eMobile,";
        $fileContents .= "eCountry,eState,eCity,eAddress,eLocation,computerOwner,computerTag,computerHostname,";
        $fileContents .= "computerType,computerStatus,computerBrand,computerModel,computerProc,computerMem,";
        $fileContents .= "computerSerial,computerIp,computerHDModel, computerHDSize, computerNetMap,monitorOwner,monitorTag,monitorBrand,monitorSize,";
        $fileContents .= "monitorSerial,os,osVersion,osArc,osLicType,swAvType,notes,Analyst,AsessmentDate" . "\n";

        foreach ($data as $a) {
            $fileContents .= $a->computerId . ",";
            $fileContents .= $a->eId . ",";
            $fileContents .= $a->eStatus . ",";
            $fileContents .= $a->eFullName . ",";
            $fileContents .= $a->eEmail . ",";
            $fileContents .= $a->eCompany . ",";
            $fileContents .= $a->ePosition . ",";
            $fileContents .= $a->eDepartment . ",";
            $fileContents .= $a->ePhone . ",";
            $fileContents .= $a->eMobile . ",";
            $fileContents .= $a->eCountry . ",";
            $fileContents .= $a->eState . ",";
            $fileContents .= $a->eCity . ",";
            $fileContents .= $a->eAddress . ",";
            $fileContents .= $a->eLocation . ",";
            $fileContents .= $a->computerOwner . ",";
            $fileContents .= $a->computerTag . ",";
            $fileContents .= $a->computerHostname . ",";
            $fileContents .= $a->computerType . ",";
            $fileContents .= $a->computerStatus . ",";
            $fileContents .= $a->computerBrand . ",";
            $fileContents .= $a->computerModel . ",";
            $fileContents .= $a->computerProc . ",";
            $fileContents .= $a->computerMem . ",";
            $fileContents .= $a->computerSerial . ",";
            $fileContents .= $a->computerIp . ",";
            $fileContents .= $a->computerHDModel . ",";
            $fileContents .= $a->computerHDSize . ",";
            $fileContents .= '"' . trim($a->computerNetMap) . '",';
            $fileContents .= $a->monitorOwner . ",";
            $fileContents .= $a->monitorTag . ",";
            $fileContents .= $a->monitorBrand . ",";
            $fileContents .= $a->monitorSize . ",";
            $fileContents .= $a->monitorSerial . ",";
            $fileContents .= $a->os . ",";
            $fileContents .= $a->osVersion . ",";
            $fileContents .= $a->osArc . ",";
            $fileContents .= $a->osLicType . ",";
            $fileContents .= $a->swAvType . ",";
            $notes = str_replace(array("\n", "\r"), '|', $a->notes);
            $fileContents .= $notes . ",";
            $fileContents .= $a->cUsername . ",";
            $fileContents .= date("Y-m-d",$a->cTime) . "\n";
        }
        return $fileContents;
    }

    public static function parseDeviceListDB($data)
    {

        $fileContents = "deviceId,eId,eStatus,eFullName, eEmail,eCompany,ePosition,eDepartment,ePhone,eMobile,";
        $fileContents .= "eCountry,eState,eCity,eAddress,eLocation,";
        $fileContents .= "deviceOwner,deviceTag,deviceStatus,deviceType,deviceBrand,deviceModel,";
        $fileContents .= "deviceSerial,deviceIp,deviceOS,";
        $fileContents .= "notes,Analyst,AssessmentDate" . "\n";

        foreach ($data as $a) {
            $fileContents .= $a->deviceId . ",";
            $fileContents .= $a->eId . ",";
            $fileContents .= $a->eStatus . ",";
            $fileContents .= $a->eFullName . ",";
            $fileContents .= $a->eEmail . ",";
            $fileContents .= $a->eCompany . ",";
            $fileContents .= $a->ePosition . ",";
            $fileContents .= $a->eDepartment . ",";
            $fileContents .= $a->ePhone . ",";
            $fileContents .= $a->eMobile . ",";
            $fileContents .= $a->eCountry . ",";
            $fileContents .= $a->eState . ",";
            $fileContents .= $a->eCity . ",";
            $fileContents .= $a->eAddress . ",";
            $fileContents .= $a->eLocation . ",";
            $fileContents .= $a->deviceOwner . ",";
            $fileContents .= $a->deviceTag . ",";
            $fileContents .= $a->deviceStatus . ",";
            $fileContents .= $a->deviceType . ",";
            $fileContents .= $a->deviceBrand . ",";
            $fileContents .= $a->deviceModel . ",";
            $fileContents .= $a->deviceSerial . ",";
            $fileContents .= $a->deviceIp . ",";
            $fileContents .= $a->deviceOS . ",";
            $notes = str_replace(array("\n", "\r"), '|', $a->notes);
            $fileContents .= $notes . ",";
            $fileContents .= $a->dUsername . ",";
            $fileContents .= date("Y-m-d",$a->dTime) . "\n";
        }
        return $fileContents;
    }

    public static function parseSwListDB($data)
    {

        $fileContents = "swId,computerId,eId,eStatus,eFullName, eEmail,eCompany,ePosition,eDepartment,ePhone,eMobile,";
        $fileContents .= "eCountry,eState,eCity,eAddress,eLocation,";
        $fileContents .= "computerHostname,os,osVersion,osArc,osLicType,swWeb,";
        $fileContents .= "swName,swVersion,swVendor" . "\n";

        foreach ($data as $a) {
            $fileContents .= $a->swId . ",";
            $fileContents .= $a->computerId . ",";
            $fileContents .= $a->eId . ",";
            $fileContents .= $a->eStatus . ",";
            $fileContents .= $a->eFullName . ",";
            $fileContents .= $a->eEmail . ",";
            $fileContents .= $a->eCompany . ",";
            $fileContents .= $a->ePosition . ",";
            $fileContents .= $a->eDepartment . ",";
            $fileContents .= $a->ePhone . ",";
            $fileContents .= $a->eMobile . ",";
            $fileContents .= $a->eCountry . ",";
            $fileContents .= $a->eState . ",";
            $fileContents .= $a->eCity . ",";
            $fileContents .= $a->eAddress . ",";
            $fileContents .= $a->eLocation . ",";
            $fileContents .= $a->computerHostname . ",";
            $fileContents .= $a->os . ",";
            $fileContents .= $a->osVersion . ",";
            $fileContents .= $a->osArc . ",";
            $fileContents .= $a->osLicType . ",";
            $swWeb = str_replace(array("\n", "\r"), '|', $a->swWeb);
            $fileContents .= $swWeb . ",";
            $fileContents .= $a->swName . ",";
            $fileContents .= $a->swVersion . ",";
            $fileContents .= $a->swVendor . "\n";
        }
        return $fileContents;
    }

    public static function parseEmployeeListDB($data)
    {

        $fileContents = "eId,eStatus,eFullName, eEmail,eCompany,ePosition,eDepartment,ePhone,eMobile,";
        $fileContents .= "eCountry,eState,eCity,eAddress,eLocation,Analyst,AssessmentDate" . "\n";

        foreach ($data as $e) {
            $fileContents .= $e->eId . ",";
            $fileContents .= $e->eStatus . ",";
            $fileContents .= $e->eFullName . ",";
            $fileContents .= $e->eEmail . ",";
            $fileContents .= $e->eCompany . ",";
            $fileContents .= $e->ePosition . ",";
            $fileContents .= $e->eDepartment . ",";
            $fileContents .= $e->ePhone . ",";
            $fileContents .= $e->eMobile . ",";
            $fileContents .= $e->eCountry . ",";
            $fileContents .= $e->eState . ",";
            $fileContents .= $e->eCity . ",";
            $fileContents .= $e->eAddress . ",";
            $fileContents .= $e->eLocation . ",";
            $fileContents .= $e->eUsername . ",";
            $fileContents .= date("Y-m-d",$e->eTime) . "\n";
        }
        return $fileContents;
    }

    static function formEmployeeParser($data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = str_replace(",", ";", $data[$key]);
        }
        $ne = new Employee();
        if (isset($data['eId'])) {
            $ne->eId = $data['eId'];
        }
        $ne->eStatus = trim($data['eStatus']);
        $ne->eFullName = trim($data['eFullName']);
        $ne->eEmail = trim($data['eEmail']);
        $ne->eCompany = trim($data['eCompany']);
        $ne->ePosition = trim($data['ePosition']);
        $ne->eDepartment = trim($data['eDepartment']);
        $ne->ePhone = trim($data['ePhone']);
        $ne->eMobile = trim($data['eMobile']);
        $ne->eCountry = trim($data['eCountry']);
        $ne->eState = trim($data['eState']);
        $ne->eCity = trim($data['eCity']);
        $ne->eAddress = trim($data['eAddress']);
        $ne->eLocation = trim($data['eLocation']);
        return $ne;
    }

    static function formComputerParser($data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = str_replace(",", ";", $data[$key]);
        }
        $c = new Computer();
        if(isset($data['computerId'])){
            $c->computerId = trim($data['computerId']);
        }
        $c->computerOwner = trim($data['computerOwner']);
        $c->computerHostname = trim($data['computerHostname']);
        $c->computerType = trim($data['computerType']);
        $c->computerStatus = trim($data['computerStatus']);
        $c->computerProc = trim($data['computerProc']);
        $c->computerBrand = trim($data['computerBrand']);
        $c->computerModel = trim($data['computerModel']);
        $c->computerMem = trim($data['computerMem']);
        $c->computerSerial = trim($data['computerSerial']);
        $c->computerIp = trim($data['computerIp']);
        $c->computerHDModel = trim($data['computerHDModel']);
        $c->computerHDSize = trim($data['computerHDSize']);
        $c->computerNetMap = trim($data['computerNetMap']);
        $c->computerTag = trim($data['computerTag']);
        $c->monitorOwner = trim($data['monitorOwner']);
        $c->monitorBrand = trim($data['monitorBrand']);
        $c->monitorSize = trim($data['monitorSize']);
        $c->monitorSerial = trim($data['monitorSerial']);
        $c->monitorTag = trim($data['monitorTag']);
        $c->os = trim($data['os']);
        $c->osVersion = trim($data['osVersion']);
        $c->osArc = trim($data['osArc']);
        $c->osLicType = trim($data['osLicType']);
        $c->swAvType = trim($data['swAvType']);
        $c->swWeb = trim($data['swWeb']);
        $c->notes = trim($data['notes']);
        $c->eId = trim($data['eId']);
        return $c;
    }

    static function formDeviceParser($data)
    {
        foreach ($data as $key => $value) {
            $data[$key] = str_replace(",", ";", $data[$key]);
        }

        $d = new Device();
        if(isset($data['deviceId'])){
            $d->deviceId = trim($data['deviceId']);
        }
        $d->deviceOwner = trim($data['deviceOwner']);
        $d->deviceType = trim($data['deviceType']);
        $d->deviceStatus = trim($data['deviceStatus']);
        $d->deviceBrand = trim($data['deviceBrand']);
        $d->deviceModel = trim($data['deviceModel']);
        $d->deviceSerial = trim($data['deviceSerial']);
        $d->deviceIp = trim($data['deviceIp']);
        $d->deviceTag = trim($data['deviceTag']);
        $d->deviceOS = trim($data['deviceOS']);
        $d->notes = trim($data['notes']);
        $d->eId = trim($data['eId']);
        return $d;
    }
}
