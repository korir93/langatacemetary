<?php



class DBConn
{
    private static $connection;
    public static function getConnection()
    {
        if (!isset(self::$conn)) {
            self::$connection = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
			return self::$connection;
	    }
    }
    public static function closeConnection()
    {
        mysqli_close(self::$connection);
        unset($connection);
    }
}