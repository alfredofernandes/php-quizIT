<?php
    function DBConnect() 
    {
        static $connection;

        if(!isset($connection)) 
        {
            $config = parse_ini_file('config.ini');
            $connection = mysqli_connect($config['servername'], $config['username'], $config['password'], $config['database']);
        }
        
        if($connection === false) 
        {
            // die("Connect Failed : " . $connection->connect_error);
            return mysqli_connect_error(); 
        }

        return $connection;
    }
    