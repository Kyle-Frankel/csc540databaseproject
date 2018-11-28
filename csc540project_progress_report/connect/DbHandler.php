<?php
class DbHandler
{
    private $conn;
    function __construct()
    {
        $this->conn = $this->getConnection();
    }
    public function callFunction($action, $params = null)
    {
        $trying = $this->$action($params);
        return $trying;
    }

    public function getConnection()
    {
        return mysqli_connect('den1.mysql4.gear.host',
            'csc540',
            'Ab04e~sXWF!d',
            'csc540');
    }
}
?>