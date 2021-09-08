<?php

class Login
{
    //check login credentials
    public static function checkCredentials($loginData)
    {
        $checkUser = UserDAO::findUser($loginData['username']);

        if (!empty($checkUser)) {
            if (password_verify($loginData['password'], $checkUser->getPassword())) {
                $_SESSION['name'] = $checkUser->getName();
                $_SESSION['username'] = $checkUser->getUsername();
                $_SESSION['role'] = $checkUser->getRole();
                $_SESSION['isvalid'] = true;
                // Login time is stored in a session variable 
                $_SESSION["start_time"] = time();
            } else {
                session_unset();
                session_destroy();
                Messages::setMessage('User and/or password does not match');
            }
        } else {
            session_unset();
            session_destroy();
            Messages::setMessage('User and/or password does not match');
        }
    }

    //register a new user
    public static function registerUser($userData)
    {
        $checkUser = UserDAO::findUser($userData['username']);
        if (!empty($checkUser)) {
            Messages::setMessage("User already exists");
        } else {
            $newUser = new User();

            $newUser->setName($userData['name']);
            $newUser->setEmail($userData['email']);
            $newUser->setUsername($userData['username']);
            $newUser->setPassword(password_hash($userData['password'], PASSWORD_DEFAULT));

            $newUser->setRole($userData['role']);
            $newUser->setCompanyname($userData['companyname']);
            $isAdded = UserDAO::insertUser($newUser);

            if (!empty($isAdded)) {
                Messages::setMessage('User created successfully!');
            }
        }
    }
    //update an user
    public static function updateUser($userData)
    {
        $u = new User();
        $u->setId($userData['id']);
        $u->setName($userData['name']);
        $u->setEmail($userData['email']);
        $u->setUsername($userData['username']);
        $u->setPassword(password_hash($userData['password'], PASSWORD_DEFAULT));
        $u->setRole($userData['role']);
        $u->setCompanyname($userData['companyname']);
        $isAdded = UserDAO::updateUser($u);

        if (!empty($isAdded)) {
            Messages::setMessage('User updated successfully!');
        }
    }
}
