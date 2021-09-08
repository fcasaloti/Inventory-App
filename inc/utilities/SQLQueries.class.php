<?php


class SQLQueries
{

  public static function getManyResults($sql)
  {

    // Create connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS);

    try {
      // Check connection
      if (!$conn) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
      } else {

        $count = array();
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
            $count[] = $row;
          }
        } else {
          echo "0 results";
        }
        $conn->close();
        return $count;
      }
    } catch (Exception $ex) {
      error_log(date('m/d/Y H:i:s', time()) . " " . $_SESSION['username'] . " " . $ex->getMessage(), 3, FILE_LOG);
    }
  }

  public static function getSingleResult($sql)
  {

    // Create connection
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS);

    try {
      // Check connection
      if (!$conn) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
      } else {

        $count = "";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
            $count = $row;
          }
        } else {
          echo "0 results";
        }
        $conn->close();
        return $count;
      }
    } catch (Exception $ex) {
      error_log(date('m/d/Y H:i:s', time()) . " " . $_SESSION['username'] . " " . $ex->getMessage(), 3, FILE_LOG);
    }
  }
}
