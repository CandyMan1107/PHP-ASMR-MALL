<?php
    class DBManager
    {
        private $dsn;
        private $user;
        private $pass;
        private $dbo;

        function __construct() // 생성자 : 값 초기화
        {
            $this->dsn = 'mysql:host=127.0.0.1; port=3306; dbname=asmr_db;';
            $this->user = 'jhm';
            $this->pass = 'candy';
        }

        function connect()
        {
            try {
                $this->dbo = new PDO($this->dsn, $this->user, $this->pass);
                // DB에 대한 연결을 나타내는 PDO 객체 생성

            } catch (PDOException $e) {
                exit('DB 접속 불가: {$e->getMessage()}');
            }
            return $this->dbo;
        }
    }
?>