<?php
class Person{
    private $name;
    private $email;
    public static $ageLimit = 40;
    private static $ageLimit2 = 41;

    public function __construct($name,$email){
        $this->name = $name;
        $this->email = $email;
        echo __CLASS__ . 'Person Created';
    }

    public function __destruct(){
        echo __CLASS__ . ' destroyed<br>';
    }

    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail($email){
        return $this->email;
    }

    public static function getAgeLimit2(){
        return self::$ageLimit2;
    }
}

$person1 = new Person('John Doe','jdoe@gmail.com');

echo Person::$ageLimit;
echo PErson::getAgeLimit2();

class Customers extends Person{
    private $balance;

    public function __construct($name,$email,$balance){
        parent::__construct($name,$email);
        $this->balance = $balance;
        echo 'A new ' . __CLASS__ . ' has been created.<br>';
    }




        public function setBalance($balance){
            $this->balance = $balance;
        }
        public function getBalance(){
            return $this->balance;
        }




}

$customer1 = new Customer('John Doe', 'jdoe@gmail.com', 300);

echo $customer1 ->getBalance();




?>