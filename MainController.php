<?php
//requiring files
require_once "inc/config.inc.php";
require_once "inc/entities/User.class.php";
require_once "inc/entities/Employee.class.php";
require_once "inc/entities/Computer.class.php";
require_once "inc/entities/Device.class.php";
require_once "inc/entities/Software.class.php";
require_once "inc/utilities/FileService.class.php";
require_once "inc/utilities/DataParser.class.php";
require_once "inc/utilities/EmployeeDAO.class.php";
require_once "inc/utilities/ComputerDAO.class.php";
require_once "inc/utilities/SoftwareDAO.class.php";
require_once "inc/utilities/DeviceDAO.class.php";
require_once "inc/utilities/Login.class.php";
require_once "inc/utilities/PDOService.class.php";
require_once "inc/utilities/UserDAO.class.php";
require_once "inc/utilities/Messages.class.php";
require_once "views/HeaderFooterPage.class.php";
require_once "views/NavbarPage.class.php";
require_once "views/FormsPage.class.php";
require_once "views/AlertsPage.class.php";
require_once "views/TablesPage.class.php";
require_once "views/LinksPage.class.php";
require_once "views/DashboardPage.class.php";

// Start the session
session_start();

//check if the user is authenticated
if (
    !isset($_SESSION['isvalid']) ||
    !$_SESSION['isvalid'] ||
    !isset($_SESSION['username']) ||
    !isset($_SESSION['role'])
) {
    header('Location: index.php');

    //if user is authenticated.............
} else {

    //set timeout and url for logout
    $timeout = SESSION_TIMEOUT;
    $logout_redirect_url = "index.php";
    date_default_timezone_set(TIMEZONE_DEFAULT);

    if (isset($_SESSION['start_time'])) {
        //check how much time since login. If timout, redirect to login page, if not, renew session time
        $elapsed_time = time() - $_SESSION['start_time'];
        if ($elapsed_time >= $timeout) {
            session_unset();
            session_destroy();
            header("Location: $logout_redirect_url");
        } else {
            $_SESSION['start_time']  = time();
        }
    }

    //initializing DAOs
    EmployeeDAO::initialize();
    ComputerDAO::initialize();
    DeviceDAO::initialize();
    UserDAO::initialize();
    SoftwareDAO::initialize();

    //header HTML
    HeaderFooterPage::$headTitle = "Company Assessment";
    HeaderFooterPage::header();

    //Insert a NAVBAR according with the role of user
    if ($_SESSION['role'] == 'admin') {
        NavbarPage::adminnavbar();
    } else {
        NavbarPage::usernavbar();
    }

    //uploading files
    if (!empty($_FILES) && isset($_POST['action'])) {
        if ($_POST['action'] == 'importFile' && !empty($_FILES['importFile']['tmp_name'])) {
            //reading file
            FileService::readFile($_FILES['importFile']['tmp_name']);
            $content = FileService::$fileContents;

            //if file name contain either hw or sw as a substring
            if (strpos($_FILES['importFile']['name'], 'HW') !== false) {
                $equipData = DataParser::parseDataHW($content);
                $_SESSION['computerData'] =  $equipData;
            } elseif (strpos($_FILES['importFile']['name'], 'SW') !== false) {
                $software = DataParser::parseDataSW($content);
                $stringSoftware = "";
                foreach ($software as $key => $value) {
                    $stringSoftware .= $value->swName . ",";
                    $stringSoftware .= $value->swVersion . ",";
                    $stringSoftware .= $value->swVendor . "\n";
                }
                $_SESSION['software'] =  $stringSoftware;
            }

            $message = Messages::getMessage();
            //status of the file upload
            if (empty($message)) {
                AlertsPage::$message = "File Uploaded Successfully";
                AlertsPage::$alert = 'success';
                AlertsPage::alerts();
            }
        } else {
            AlertsPage::$message = "File Upload Failed";
            AlertsPage::$alert = 'danger';
            AlertsPage::alerts();
        }
    }

    //check if it is a POST request
    if (!empty($_POST)) {
        //register a new user
        if (isset($_POST['action']) && $_POST['action'] == 'registration') {
            Login::registerUser($_POST);
            FormsPage::registration();
            AlertsPage::$message = Messages::getMessage();
            AlertsPage::$alert = 'success';
            AlertsPage::alerts();
            $users = UserDAO::getUser();
            TablesPage::listUsers($users);
        }
        //update an user information
        if (isset($_POST['action']) && $_POST['action'] == 'updateuser') {
            //parse data from the form and send it to DAO
            $e = UserDAO::findUser($_POST['username']);
            if ($e->getId() != $_POST['id']) {
                AlertsPage::$message = "User already on the system";
                AlertsPage::$alert = 'warning';
                AlertsPage::alerts();
            } else {
                Login::updateUser($_POST);
                AlertsPage::$message = Messages::getMessage();
                AlertsPage::$alert = 'success';
                AlertsPage::alerts();
            }
            FormsPage::registration();
            $users = UserDAO::getUser();
            TablesPage::listUsers($users);
        }

        //add a new employee
        if (isset($_POST['action']) && $_POST['action'] == 'addEmployee') {
            //parse data from the form and send it to DAO
            $e = EmployeeDAO::getSingleEmployeeByEmail($_POST['eEmail']);
            if (!empty($e)) {
                AlertsPage::$message = "User already on the system";
                AlertsPage::$alert = 'warning';
                AlertsPage::alerts();
            } else {
                $ne = DataParser::formEmployeeParser($_POST);
                $eId = EmployeeDAO::addEmployee($ne, $_SESSION['username']);
                $eData = EmployeeDAO::getSingleEmployee($eId);
                $_SESSION['eEmail'] = $eData->eEmail;

                //if there are info of success from DAOs, set a message to the PAGE
                if (!empty($eId)) {
                    AlertsPage::$message = "Inserted successfully on id # $eId";
                    AlertsPage::$alert = 'success';
                    AlertsPage::alerts();
                }
            }
        }

        //add a new assessment
        if (isset($_POST['action']) && $_POST['action'] == 'addComputer') {
            //first, check if email typed is on db
            $eData = EmployeeDAO::getSingleEmployeeByEmail($_POST['eEmail']);
            if (!empty($eData)) {
                //setting superglobals to have data according with email provided 
                $_SESSION['eEmail'] = $eData->eEmail;
                $_POST['eId'] = $eData->eId;
                //parse data from the form and send it to DAO
                $na = DataParser::formComputerParser($_POST);
                $computerId = ComputerDAO::addComputer($na, $_SESSION['username']);

                $software = DataParser::parseFormSW($_POST['swInstalled']);
                foreach ($software as $key => $sw) {
                    $sw->computerId = $computerId;
                    $swId = SoftwareDAO::addSoftware($sw);
                }

                //check if session already has info of software (from the file upload)
                if (isset($_SESSION['software'])) {
                    unset($_SESSION['software']);
                }

                //check if session already has info of hardware (from the file upload)
                if (isset($_SESSION['computerData'])) {
                    unset($_SESSION['computerData']);
                }

                //if there are info of success from DAOs, set a message to the PAGE
                if (!empty($computerId)) {
                    AlertsPage::$message = "Inserted successfully on id # $computerId";
                    AlertsPage::$alert = 'success';
                    AlertsPage::alerts();
                }
            } else {
                AlertsPage::$message = "User not found. Please, check the email address provided";
                AlertsPage::$alert = 'warning';
                AlertsPage::alerts();
            }
        }

        //add a new assessment
        if (isset($_POST['action']) && $_POST['action'] == 'updateComputer') {
            //first, check if email typed is on db
            $eData = EmployeeDAO::getSingleEmployeeByEmail($_POST['eEmail']);
            if (!empty($eData)) {
                //parse data from the form and send it to DAO
                $_POST['eId'] = $eData->eId;

                $na = DataParser::formComputerParser($_POST);
                $isUpdated = ComputerDAO::updateComputer($na, $_SESSION['username']);

                $isDeleted = SoftwareDAO::deleteSoftware($na->computerId);

                $software = DataParser::parseFormSW($_POST['swInstalled']);
                foreach ($software as $key => $sw) {
                    $sw->computerId = $na->computerId;
                    $swId = SoftwareDAO::addSoftware($sw);
                }

                //if there are info of success from DAOs, set a message to the PAGE
                if (!empty($isUpdated)) {
                    AlertsPage::$message = "Updated successfully";
                    AlertsPage::$alert = 'success';
                    AlertsPage::alerts();
                }
            } else {
                AlertsPage::$message = "User not found. Please, check the email address provided";
                AlertsPage::$alert = 'warning';
                AlertsPage::alerts();
            }
        }

        //POST request to add other devices
        if (isset($_POST['action']) && $_POST['action'] == 'addDevice') {
            //first, check if email typed is on db
            $eData = EmployeeDAO::getSingleEmployeeByEmail($_POST['eEmail']);
            if (!empty($eData)) {
                //setting superglobals to have data according with email provided 
                $_SESSION['employee'] = $eData;
                $_POST['eId'] = $eData->eId;
                $nao = DataParser::formDeviceParser($_POST);
                $inserted = DeviceDAO::addDevice($nao, $_SESSION['username']);
                if (!empty($inserted)) {
                    AlertsPage::$message = "Inserted successfully on id # $inserted";
                    AlertsPage::$alert = 'success';
                    AlertsPage::alerts();
                }
            } else {
                AlertsPage::$message = "User not found. Please, check the email address provided";
                AlertsPage::$alert = 'warning';
                AlertsPage::alerts();
            }
        }

        //POST request to update other devices
        if (isset($_POST['action']) && $_POST['action'] == 'updateDevice') {
            //first, check if email typed is on db
            $eData = EmployeeDAO::getSingleEmployeeByEmail($_POST['eEmail']);
            if (!empty($eData)) {
                $_POST['eId'] = $eData->eId;
                $dev = DataParser::formDeviceParser($_POST);
                $isUpdated = DeviceDAO::updateDevice($dev, $_SESSION['username']);
                if (!empty($isUpdated)) {
                    AlertsPage::$message = "Updated successfully";
                    AlertsPage::$alert = 'success';
                    AlertsPage::alerts();
                }
            } else {
                AlertsPage::$message = "User not found. Please, check the email address provided";
                AlertsPage::$alert = 'warning';
                AlertsPage::alerts();
            }
        }

        if (isset($_POST['action']) && $_POST['action'] == 'updateEmployee') {
            //parse data from the form and send it to DAO
            $e = EmployeeDAO::getSingleEmployeeByEmail($_POST['eEmail']);
            if (!empty($e) && $_POST['eId'] != $e->eId) {
                AlertsPage::$message = "User already on the system";
                AlertsPage::$alert = 'warning';
                AlertsPage::alerts();
            } else {
                $e = DataParser::formEmployeeParser($_POST);
                $isUpdated = EmployeeDAO::updateEmployee($e, $_SESSION['username']);
                if (!empty($isUpdated)) {
                    AlertsPage::$message = "Updated successfully";
                    AlertsPage::$alert = 'success';
                    AlertsPage::alerts();
                }
            }
            FormsPage::search();
            $e = EmployeeDAO::getEmployeeList();
            TablesPage::listEmployee($e);
        }
    }

    //customized GET request
    if (!empty($_GET)) {

        //if it is a logout request
        if (isset($_GET['logout'])) {
            session_destroy();
            header("Location: $logout_redirect_url");
        }

        //tab to add computers and users
        if (isset($_GET['addEmployee'])) {
            FormsPage::AddEmployee();
        }

        //tab to add computers and users
        if (isset($_GET['addComputer'])) {
            FormsPage::importFiles();
            FormsPage::addComputer();
        }
        //tab to add other devices like printers and switchs
        if (isset($_GET['addDevice'])) {
            FormsPage::addDevice();
        }
        //tab to get procedures
        if (isset($_GET['procedures'])) {
            LinksPage::downloadFiles();
        }
        //case user is an admin, it will access to further tabs
        if ($_SESSION['role'] == 'admin') {
            //tab to get a list of all assessed computers
            if (isset($_GET['computerList'])) {
                $a = ComputerDAO::getComputersList();
                $fileContents = DataParser::parseComputerListDB($a);
                FileService::$fileContents = $fileContents;
                FileService::writeFile(FILE_COMPUTER);
                FormsPage::search();
                TablesPage::listComputers($a);
            }
            //tab to get a list of all printers/network devices
            if (isset($_GET['deviceList'])) {
                $a = DeviceDAO::getDevicesList();
                $fileContents = DataParser::parseDeviceListDB($a);
                FileService::$fileContents = $fileContents;
                FileService::writeFile(FILE_DEVICE);
                FormsPage::search();
                TablesPage::listDevices($a);
            }
            //tab to get all the software
            if (isset($_GET['softwareList'])) {
                $s = SoftwareDAO::getSoftwareList();
                $fileContents = DataParser::parseSwListDB($s);
                FileService::$fileContents = $fileContents;
                FileService::writeFile(FILE_SOFTWARE);
                FormsPage::search();
                TablesPage::listSoftware($s);
            }
            //tab to get all the employee
            if (isset($_GET['employeeList'])) {
                $e = EmployeeDAO::getEmployeeList();
                $fileContents = DataParser::parseEmployeeListDB($e);
                FileService::$fileContents = $fileContents;
                FileService::writeFile(FILE_EMPLOYEE);
                FormsPage::search();
                TablesPage::listEmployee($e);
            }
            //if it is a request to delete a computer
            if (isset($_GET['action']) && $_GET['action'] == "deleteComputer") {
                $deleted = ComputerDAO::deleteComputer($_GET['computerId']);
                if (!empty($deleted)) {
                    AlertsPage::$message = "Deleted Successfully";
                    AlertsPage::$alert = 'success';
                    AlertsPage::alerts();
                    $a = ComputerDAO::getComputersList();
                    FormsPage::search();
                    TablesPage::listComputers($a);
                }
            }
            //if it is a request to edit a computer
            if (isset($_GET['action']) && $_GET['action'] == "editComputer") {
                $c = ComputerDAO::getSingleComputer($_GET['computerId']);
                if (!empty($c)) {
                    $sw = SoftwareDAO::getSoftwareByComputer($_GET['computerId']);
                    $stringSW = DataParser::parseSoftwareDBToForm($sw);
                    FormsPage::editComputer($c, $stringSW);
                    $a = ComputerDAO::getComputersList();
                    FormsPage::search();
                    TablesPage::listComputers($a);
                }
            }
            //if it is a request to delete a device such printer/network
            if (isset($_GET['action']) && $_GET['action'] == "deleteDevice") {
                $deleted = DeviceDAO::deleteDevice($_GET['deviceId']);
                if (!empty($deleted)) {
                    AlertsPage::$message = "Deleted Successfully";
                    AlertsPage::$alert = 'success';
                    AlertsPage::alerts();
                    $a = DeviceDAO::getDevicesList();
                    FormsPage::search();
                    TablesPage::listDevices($a);
                }
            }

            //if it is a request to update a device such printer/network
            if (isset($_GET['action']) && $_GET['action'] == "editDevice") {
                $d = DeviceDAO::getSingleDevice($_GET['deviceId']);
                if (!empty($d)) {
                    AlertsPage::$message = "Updating...";
                    AlertsPage::$alert = 'warning';
                    AlertsPage::alerts();
                    FormsPage::editDevice($d);
                    $a = DeviceDAO::getDevicesList();
                    FormsPage::search();
                    TablesPage::listDevices($a);
                }
            }

            //if it is a request to delete a device such printer/network
            if (isset($_GET['action']) && $_GET['action'] == "deleteEmployee") {
                if ($_GET['eId'] != 1) {
                    $blankEmployee = EmployeeDAO::getSingleEmployeeByEmail('anonymous@domain.com');
                    ComputerDAO::updateComputerByEid($_GET['eId'], $blankEmployee->eId);
                    DeviceDAO::updateDeviceByEid($_GET['eId'], $blankEmployee->eId);
                    $deleted = EmployeeDAO::deleteEmployee($_GET['eId']);
                    if (!empty($deleted)) {
                        AlertsPage::$message = "Deleted Successfully";
                        AlertsPage::$alert = 'success';
                        AlertsPage::alerts();
                    }
                } else {
                    AlertsPage::$message = "Employee cannot be deleted";
                    AlertsPage::$alert = 'danger';
                    AlertsPage::alerts();
                }
                FormsPage::search();
                $e = EmployeeDAO::getEmployeeList();
                TablesPage::listEmployee($e);
            }
            if (isset($_GET['action']) && $_GET['action'] == "updateEmployee") {
                if ($_GET['eId'] != 1) {
                    $e = EmployeeDAO::getSingleEmployee($_GET['eId']);
                    FormsPage::updateEmployee($e);
                } else {
                    AlertsPage::$message = "Employee cannot be updated";
                    AlertsPage::$alert = 'danger';
                    AlertsPage::alerts();
                }
                FormsPage::search();
                $e = EmployeeDAO::getEmployeeList();
                TablesPage::listEmployee($e);
            }
            //list of users....
            if (isset($_GET['users'])) {
                FormsPage::registration();
                $users = UserDAO::getUser();
                TablesPage::listUsers($users);
            }
            //get data to edit an user
            if (isset($_GET['action']) && $_GET['action'] == "edituser") {
                $u = UserDAO::findUserById($_GET['id']);
                if (!empty($u)) {
                    FormsPage::updateUser($u);
                }
                $users = UserDAO::getUser();
                TablesPage::listUsers($users);
            }
            //delete an user
            if (isset($_GET['action']) && $_GET['action'] == "deleteuser") {

                $isAdmin = UserDAO::findUserById($_GET['id']);
                if ($isAdmin->getUsername() != 'admin') {
                    $u = UserDAO::deleteUser($_GET['id']);
                    if (!empty($u)) {
                        AlertsPage::$message = "Deleted Successfully";
                        AlertsPage::$alert = 'success';
                    }
                } else {
                    AlertsPage::$message = "Admin user cannot be deleted";
                    AlertsPage::$alert = 'danger';
                }
                FormsPage::registration();
                if (!empty(AlertsPage::$message)) {
                    AlertsPage::alerts();
                }
                $users = UserDAO::getUser();
                TablesPage::listUsers($users);
            }

            //dashboard
            if (isset($_GET['dashboard'])) {
                DashboardPage::osTypeDash();
            }
        }
    }

    //footer HTML
    HeaderFooterPage::footer();
}
