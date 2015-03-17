<?php

class sqlConnection
{
    /**
     * Serverinställningar
     */

    private $sqlServer = 'mysql:host=localhost;dbname=bilar';
    private $username = 'root';
    private $password = 'upVVjiZ42';

    public function getConnection()
    {
        $pdocon = new PDO($this->sqlServer, $this->username, $this->password);
        return $pdocon;
    }
}