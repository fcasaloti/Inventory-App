<?php
class UserDAO
{
//instance of pdo service
    private static $_db;

    //initialize pdo
    public static function initialize()
    {
        self::$_db = new PDOService('User');
        return true;
    }

    public static function getUser()
    {

        $sql = "SELECT * FROM user;";

        //query
        self::$_db->query($sql);

        //execute:
        self::$_db->execute();

        //return
        return self::$_db->resultSet();
    }

    public static function findUser($username)
    {

        $sql = "SELECT * FROM user WHERE username = :username;";

        //query
        self::$_db->query($sql);

        //bind
        self::$_db->bind(":username", $username);

        //execute:
        self::$_db->execute();

        //return
        return self::$_db->singleResult();
    }

    public static function findUserById($id)
    {

        $sql = "SELECT * FROM user WHERE id = :id;";

        //query
        self::$_db->query($sql);

        //bind
        self::$_db->bind(":id", $id);

        //execute:
        self::$_db->execute();

        //return
        return self::$_db->singleResult();
    }


    public static function insertUser(User $newUser)
    {

        $sql = "INSERT INTO user (name,email, username,password,role,companyname) VALUES (:name,:email, :username,:password,:role,:companyname)";
        //query
        self::$_db->query($sql);

        //bind
        self::$_db->bind(":name", $newUser->getName());
        self::$_db->bind(":email", $newUser->getEmail());
        self::$_db->bind(":username", $newUser->getUsername());
        self::$_db->bind(":password", $newUser->getPassword());
        self::$_db->bind(":role", $newUser->getRole());
        self::$_db->bind(":companyname", $newUser->getCompanyName());

        //execute:
        self::$_db->execute();

        //return

        return self::$_db->lastInsertId();
    }

    static function deleteUser(int $id)
    {
        $sql = "DELETE FROM user WHERE id = :id;";

        self::$_db->query($sql);
        self::$_db->bind(":id", $id);
        self::$_db->execute();
        return self::$_db->rowCount();
    }

    static function updateUser(User $u)
    {
        $sql = "UPDATE user SET 
                name = :name,
                email = :email,
                username = :username,
                password = :password,
                role = :role,
                companyname = :companyname
        WHERE id = :id;";

        self::$_db->query($sql);
        self::$_db->bind(":id", $u->getId());
        self::$_db->bind(":name", $u->getName());
        self::$_db->bind(":email", $u->getEmail());
        self::$_db->bind(":username", $u->getUsername());
        self::$_db->bind(":password", $u->getPassword());
        self::$_db->bind(":role", $u->getRole());
        self::$_db->bind(":companyname", $u->getCompanyname());
        
        self::$_db->execute();
        return self::$_db->rowCount();
    }

}
