<?php
//require files
require_once "inc/config.inc.php";
require_once "inc/entities/User.class.php";
require_once "inc/utilities/Login.class.php";
require_once "inc/utilities/PDOService.class.php";
require_once "inc/utilities/UserDAO.class.php";
require_once "inc/utilities/Messages.class.php";
require_once "views/HeaderFooterPage.class.php";
require_once "views/NavbarPage.class.php";
require_once "views/FormsPage.class.php";
require_once "views/AlertsPage.class.php";


// Start the session
session_start();

//initializing DAO
UserDAO::initialize();

HeaderFooterPage::$headTitle = "Company Assessment";
HeaderFooterPage::header();

//check login information
if (!empty($_POST)) {

    Login::checkCredentials($_POST);

    if (isset($_SESSION['isvalid'])) {
        header('Location: MainController.php?addEmployee');
    }
}

HeaderFooterPage::$headTitle = "Login";
FormsPage::login();

$message = Messages::getMessage();

if (!empty($message)) {
    AlertsPage::$message = $message;
    AlertsPage::$alert = 'warning';
    AlertsPage::alerts();
}

HeaderFooterPage::footer();
