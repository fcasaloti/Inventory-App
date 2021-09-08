DROP DATABASE IF EXISTS assessment;
CREATE DATABASE assessment;
USE assessment;
CREATE TABLE user (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name TINYTEXT NOT NULL,
    email TINYTEXT NOT NULL,
    username TINYTEXT NOT NULL,
    password TINYTEXT NOT NULL,
    role TINYTEXT NOT NULL,
    companyname TINYTEXT NOT NULL
) Engine = InnoDB;
CREATE TABLE employee (
    eId INT AUTO_INCREMENT PRIMARY KEY,
    eStatus TINYTEXT NOT NULL,
    eFullName TINYTEXT NOT NULL,
    eEmail TINYTEXT NOT NULL,
    eCompany TINYTEXT NOT NULL,
    ePosition TINYTEXT NOT NULL,
    eDepartment TINYTEXT NOT NULL,
    ePhone TINYTEXT NOT NULL,
    eMobile TINYTEXT NOT NULL,
    eCountry TINYTEXT NOT NULL,
    eState TINYTEXT NOT NULL,
    eCity TINYTEXT NOT NULL,
    eAddress TINYTEXT NOT NULL,
    eLocation TINYTEXT NOT NULL,
    username TINYTEXT NOT NULL,
    time TINYTEXT NOT NULL
) Engine = InnoDB;
CREATE TABLE computer (
    computerId INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    eId INT NOT NULL,
    computerOwner TINYTEXT NOT NULL,
    computerTag TINYTEXT NOT NULL,
    computerHostname TINYTEXT NOT NULL,
    computerType TINYTEXT NOT NULL,
    computerStatus TINYTEXT NOT NULL,
    computerBrand TINYTEXT NOT NULL,
    computerModel TINYTEXT NOT NULL,
    computerProc TINYTEXT NOT NULL,
    computerMem TINYTEXT NOT NULL,
    computerSerial TINYTEXT NOT NULL,
    computerIp TINYTEXT NOT NULL,
    computerHDModel TINYTEXT NOT NULL,
    computerHDSize TINYTEXT NOT NULL,
    computerNetMap TINYTEXT NOT NULL,
    monitorOwner TINYTEXT NOT NULL,
    monitorBrand TINYTEXT NOT NULL,
    monitorSize TINYTEXT NOT NULL,
    monitorSerial TINYTEXT NOT NULL,
    monitorTag TINYTEXT NOT NULL,
    os TINYTEXT NOT NULL,
    osVersion TINYTEXT NOT NULL,
    osArc TINYTEXT NOT NULL,
    osLicType TINYTEXT NOT NULL,
    swAvType TINYTEXT NOT NULL,
    swWeb TINYTEXT NOT NULL,
    notes TINYTEXT NOT NULL,
    username TINYTEXT NOT NULL,
    time TINYTEXT NOT NULL,
    FOREIGN KEY (eId) REFERENCES employee(eId) ON DELETE
    CASCADE ON UPDATE CASCADE
) Engine = InnoDB;
CREATE TABLE software (
    swId INT AUTO_INCREMENT PRIMARY KEY,
    computerId INT NOT NULL,
    swName TINYTEXT NOT NULL,
    swVersion TINYTEXT NOT NULL,
    swVendor TINYTEXT NOT NULL,
    FOREIGN KEY (computerId) REFERENCES computer(computerId) ON DELETE CASCADE ON UPDATE CASCADE
) Engine = InnoDB;
CREATE TABLE device (
    deviceId INT AUTO_INCREMENT PRIMARY KEY,
    eId INT NOT NULL,
    deviceOwner TINYTEXT NOT NULL,
    deviceStatus TINYTEXT NOT NULL,
    deviceType TINYTEXT NOT NULL,
    deviceBrand TINYTEXT NOT NULL,
    deviceModel TINYTEXT NOT NULL,
    deviceSerial TINYTEXT NOT NULL,
    deviceIp TINYTEXT NOT NULL,
    deviceTag TINYTEXT NOT NULL,
    deviceOS TINYTEXT NOT NULL,
    notes TINYTEXT NOT NULL,
    username TINYTEXT NOT NULL,
    time TINYTEXT NOT NULL,
    FOREIGN KEY (eId) REFERENCES employee(eId) ON DELETE
    CASCADE ON UPDATE CASCADE
) Engine = InnoDB;
INSERT INTO user (
        name,
        email,
        username,
        password,
        role,
        companyname
    )
VALUES (
        'Administrator',
        'admin@domain.com',
        'admin',
        "$2y$09$lGEbs3lV9V5gtHRs0xCUV.82npyHgbjAkfvIysz10b7hotLV6vQUW",
        'admin',
        'COMPANYNAME'
    );
INSERT INTO employee (
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
    time)
VALUES (
        'inactive',
        'Blank',
        'blank@domain.com',
        'Blank',
        'Blank',
        'Blank',
        'Blank',
        'Blank',
        'Blank',
        'Blank',
        'Blank',
        'Blank',
        'Blank',
        'Blank',
        0
    );
