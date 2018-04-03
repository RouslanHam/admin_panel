<?php

class Model
{

  function __construct()
  {
    //connect SQL
    $this->db = new PDO(DB_TYPE.':host='.DB_HOST.'; dbname='.DB_NAME.'; charset='.DB_CHARSET, DB_USER, DB_PASS, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,]);
  }

}
