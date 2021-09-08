<?php
//requiring files
require_once "inc/config.inc.php";
require_once "inc/utilities/SQLQueries.class.php";

//getting contents from the request
$requestData = json_decode(file_get_contents('php://input'));

if (isset($_GET["action"])) {
    //checking requests
    switch ($_GET["action"]) {

        case "osData":
            $sql = 'SELECT assessment.computer.os, count(*) as count FROM assessment.computer
            GROUP BY assessment.computer.os;';
            $computers = SQLQueries::getManyResults($sql);

            $osCount = array(
                'home' => 0,
                'pro' => 0,
                'ent' => 0,
                'mac' => 0,
                'others' => 0
            );

            foreach ($computers as $key => $value) {
                if (isset($value['os'])) {
                    if (stripos($value['os'], "10") !== false && stripos($value['os'], "home") !== false) {
                        $osCount['home'] += $value['count'];
                    } elseif (stripos($value['os'], "10") !== false && stripos($value['os'], "pro") !== false) {
                        $osCount['pro'] += $value['count'];
                    } elseif (stripos($value['os'], "10") !== false && stripos($value['os'], "ent") !== false) {
                        $osCount['ent'] += $value['count'];
                    } elseif (stripos($value['os'], "mac") !== false) {
                        $osCount['mac'] += $value['count'];
                    } elseif ($value['os'] !== "") {
                        $osCount['others'] += $value['count'];
                    }
                }
            }

            header('Content-Type: application/json');
            echo json_encode($osCount);
            break;

        case "computers":
            $sql = 'SELECT assessment.computer.computerOwner, count(*) as count FROM assessment.computer
                GROUP BY assessment.computer.computerOwner;';
            $computers = SQLQueries::getManyResults($sql);
            $countCom = array();
            foreach ($computers as $key => $value) {
                if (isset($value['computerOwner'])) {
                    if ($value['computerOwner'] == 'yes') {
                        $countCom['yes'] = $value['count'];
                    } else {
                        $countCom['no'] = $value['count'];
                    }
                }
            }
            header('Content-Type: application/json');
            echo json_encode($countCom);
            break;

        case "devices":
            $sql = 'SELECT assessment.device.deviceOwner, count(*) as count FROM assessment.device
                GROUP BY assessment.device.deviceOwner;';
            $devices = SQLQueries::getManyResults($sql);
            $countDev = array();
            foreach ($devices as $key => $value) {
                if (isset($value['deviceOwner'])) {
                    if ($value['deviceOwner'] == 'yes') {
                        $countDev['yes'] = $value['count'];
                    } else {
                        $countDev['no'] = $value['count'];
                    }
                }
            }
            header('Content-Type: application/json');
            echo json_encode($countDev);
            break;

        case "employees":
            $users = array(
                "activeEmployees" => array(),
                "inactiveEmployees" => array(),
                "activeContractors" => array(),
                "inactiveContractors" => array()
            );

            $sql = 'SELECT count(*) as count FROM assessment.employee WHERE assessment.employee.eEmail != "anonymous@domain.com"
            AND LOWER(assessment.employee.eCompany) LIKE "%MyCompany%" AND assessment.employee.eStatus = "active";';
            $users['activeEmployees'] = SQLQueries::getSingleResult($sql);

            $sql = 'SELECT count(*) as count FROM assessment.employee WHERE assessment.employee.eEmail != "anonymous@domain.com"
            AND LOWER(assessment.employee.eCompany) LIKE "%MyCompany%" AND assessment.employee.eStatus = "inactive";';
            $users['inactiveEmployees'] = SQLQueries::getSingleResult($sql);

            $sql = 'SELECT count(*) as count FROM assessment.employee WHERE assessment.employee.eEmail != "anonymous@domain.com"
            AND LOWER(assessment.employee.eCompany) NOT LIKE "%MyCompany%" AND assessment.employee.eStatus = "active";';
            $users['activeContractors'] = SQLQueries::getSingleResult($sql);

            $sql = 'SELECT count(*) as count FROM assessment.employee WHERE assessment.employee.eEmail != "anonymous@domain.com"
            AND LOWER(assessment.employee.eCompany) NOT LIKE "%MyCompany%" AND assessment.employee.eStatus = "inactive";';
            $users['inactiveContractors'] = SQLQueries::getSingleResult($sql);


            header('Content-Type: application/json');
            echo json_encode($users);
            break;

            case "userspercountry":
                $usersPerCountry = array(
                    "employees" => array(),
                    "contractors" => array(),
                    "countries" => array()
                );
    
                $sql = 'SELECT assessment.employee.eCountry, count(*) as count FROM assessment.employee 
                WHERE assessment.employee.eEmail != "blank@domain.com" 
                AND LOWER(assessment.employee.eCompany) LIKE "%MyCompany%" 
                AND assessment.employee.eStatus = "active" 
                GROUP BY assessment.employee.eCountry;';
                $usersPerCountry['employees'] = SQLQueries::getManyResults($sql);
    
                $sql = 'SELECT assessment.employee.eCountry, count(*) as count FROM assessment.employee 
                WHERE assessment.employee.eEmail != "blank@domain.com" 
                AND LOWER(assessment.employee.eCompany) NOT LIKE "%MyCompany%" 
                AND assessment.employee.eStatus = "active" 
                GROUP BY assessment.employee.eCountry;';
                $usersPerCountry['contractors'] = SQLQueries::getManyResults($sql);

                $sql = 'SELECT DISTINCT assessment.employee.eCountry FROM assessment.employee 
                WHERE assessment.employee.eEmail != "blank@domain.com" 
                AND assessment.employee.eStatus = "active" 
                GROUP BY assessment.employee.eCountry;';
                $usersPerCountry['countries'] = SQLQueries::getManyResults($sql);
    
                header('Content-Type: application/json');
                echo json_encode($usersPerCountry);
                break;

        case "computerspercountry":

            $sql = 'SELECT assessment.employee.eCountry, COUNT(assessment.computer.computerId) AS count 
                FROM assessment.computer, assessment.employee WHERE assessment.computer.eId = assessment.employee.eId
                AND assessment.computer.computerOwner = "yes"
                GROUP BY assessment.employee.eCountry;';

            $computersPerLocation = SQLQueries::getManyResults($sql);
            header('Content-Type: application/json');
            echo json_encode($computersPerLocation);

            break;

        case "oslictypes":
            $sql = 'SELECT assessment.computer.osLicType, 
                count(*) as count FROM assessment.computer 
                WHERE assessment.computer.osLicType != ""
                GROUP BY assessment.computer.osLicType 
                ;';

            $osLicType = SQLQueries::getManyResults($sql);
            $lics = array();
            foreach ($osLicType as $key => $value) {
                if (stripos($value['osLicType'], "oem") !== false) {
                    $lics['oem'] = $value['count'];
                } elseif (stripos($value['osLicType'], "retail") !== false) {
                    $lics['retail'] = $value['count'];
                } elseif (stripos($value['osLicType'], "volume") !== false) {
                    $lics['volume'] = $value['count'];
                }
            }
            header('Content-Type: application/json');
            echo json_encode($lics);
            break;

        case "antivirus":
            $sql = 'SELECT assessment.computer.swAvType, count(*) as count FROM assessment.computer WHERE assessment.computer.swAvType != ""
            GROUP BY assessment.computer.swAvType;';

            $av = SQLQueries::getManyResults($sql);
            header('Content-Type: application/json');
            echo json_encode($av);
            break;

        default:
            header('Content-Type: application/json');
            echo json_encode("Action not recognized");
            break;
    }
}


// if (isset($_REQUEST["REQUEST_METHOD"])) {
//     //checking requests
//     switch ($_REQUEST["REQUEST_METHOD"]) {

//         case "POST":
//             //defining the response array to respond requests
//             $response = array();
//             //if 
//             if (isset($requestData->action) && $requestData->action == 'addsites') {


//                 header('Content-Type: application/json');
//                 echo json_encode($response);
//                 break;
//             }
//             break;


//         default:
//             echo 'You are not using an allowed request method!';
//             break;
//     }
// }
