<?php


//PDO Utility Class
class PDOService {

    //Pull in the configuration of the database
    private $_host = DB_HOST;
    private $_user = DB_USER;
    private $_pass = DB_PASS;
    private $_dbname = DB_NAME;

    //Store PDO Object
    private $_dbh;

    //Store the name of the class for which we are invoking the PDO Service
    private $_className;

    //Store the current prepared statement
    private $_pstmt;

    //Construct the service, build the DSN
    public function __construct(string $className)  {

        //Store the class we want to "translate"
        $this->_className = $className;

        //Assemble the DSN
        $dsn = 'mysql:host=' .$this->_host. ';dbname=' . $this->_dbname;

        //Set options for PDO (Included ssl files)
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        //Try to get an instance of the PDO class so that we can connect
        try {
            $this->_dbh = new PDO($dsn, $this->_user, $this->_pass, $options);
        } catch (PDOException $pe)  {
            echo $pe->getMessage();
            error_log($pe->getMessage());
        }

    }

    //Function to execute a query (Be careful to use BIND for bind parameters)
    public function query(string $query)    {
        //Take the parameter, pass it to the PDO->prepare, copy the result to prepared statement
        $this->_pstmt = $this->_dbh->prepare($query);
    }

    //This function binds parameters
    public function bind($param, $value, $type = null)
    {

        if (is_null($type)) {
            switch (true) {
                //If the value is an integer
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                //If the value is a boolean
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                //If the value is null
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                //If nothing else the value must be a string
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        //Finally lets bind the paremter
        $this->_pstmt->bindValue($param, $value, $type);

    }

    //Execute the prepared statement
    public function execute() {
        return $this->_pstmt->execute();
    }

    public function resultSet() {
        //Return more than one result of the type of class specified.
        return $this->_pstmt->fetchAll(PDO::FETCH_CLASS, $this->_className);
    }

    //Return one of the type of class specified
    public function singleResult(){
        $this->_pstmt->setFetchMode(PDO::FETCH_CLASS, $this->_className);
        return $this->_pstmt->fetch(PDO::FETCH_CLASS);
    }

    //This function will return the last inserted id
    public function lastInsertId(){
        return $this->_dbh->lastInsertId();
    }

    //This function will return the row count
    public function rowCount(){
        return $this->_pstmt->rowCount();
    }


}