<?php 

abstract class Carrier {
    
    public function takePackage() {
        
    }
    
    public abstract function delivery();
    
}

class Postman extends Carrier {
    
    public function delivery() {
        echo 'Puts mails in mailboxes';
    }

}

class Newsman extends Carrier {
    
    public function delivery() {
        echo 'Throws the papers in the front of the doors';
    }

}

class Color {
    
    private $red;
    private $green;
    private $blue;
    
}

class Vehicle {
    
    private $numberOfWeels;
    private $c;
    private $breaksType;
    private $numberOfGears;
            
    function getNumberOfGears() {
        return $this->numberOfGears;
    }

    function setNumberOfGears($numberOfGears) {
        $this->numberOfGears = $numberOfGears;
    }
        
    function getBreaksType() {
        return $this->breaksType;
    }

    function setBreaksType($breaksType) {
        $this->breaksType = $breaksType;
    }
        
    function getColor() {
        return $this->color;
    }

    function setColor($color) {
        $colorObj = new Color($color);
        // red, black, white
        $this->c = $colorObj;
    }
        
    function getNumberOfWeels() {
        return $this->numberOfWeels;
    }

    function setNumberOfWeels($numberOfWeels) {
        $this->numberOfWeels = $numberOfWeels;
    }
    
}

class Car extends Vehicle {
    
    private $engine;
    private $carType;
    private $numberOfDoors;
    private $brand;
    private $model;
    
    function getCarType() {
        return $this->carType;
    }

    function getNumberOfDoors() {
        return $this->numberOfDoors;
    }

    function setCarType($carType) {
        $this->carType = $carType;
    }

    function setNumberOfDoors($numberOfDoors) {
        $this->numberOfDoors = $numberOfDoors;
    }
        
    function getEngine() {
        return $this->engine;
    }

    function setEngine($engine) {
        $this->engine = $engine;
    }
    
    function getModel() {
        return $this->model;
    }

    function setModel($model) {
        $this->model = $model;
    }
    
    function getBrand() {
        return $this->brand;
    }

    function setBrand($brand) {
        $this->brand = $brand;
    }
    
    
    
   public function setFirstName($firstname){
        $this->firstName = $firstname;
    }
    
    public function getFirstName(){
        return $this->firstName;
    }
}

$car = new Car();
$car->drive();
$car->firstName = 'Audi';



abstract class Model {
    
    private $id;
    
    function getId() {
        return $this->id;
    }
    function setID($id) {
        $this ->id = $id;
    }
}

// Homework: class tasks!!!

class user {
    private $id;
    private $username;
    private $password;
    
    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

}

class tasks {
    private $Id;
    private $description;
    
    function getId() {
        return $this ->id;
        
    function getDescription() {
        return $this ->description;
        
    function setDescription() {
        $this->description = $description;
        
    }
    }
    }
     
}

class ProcessRequest {
    public function init() {
        $page = $_GET['page'];
        $action = $_GET['login'];
        
        $classname = ucfirst($page); //login
        $classname = substr($classname , 0, -1); //user
        
        $user = new $classname(); // new user;
        $user ->$action(); // login();
        
        
        
    }
}

interface Person {
    
    public function eat();
    
    public function sleep();
}

class John implements Person {
    
    public function eat() {
        echo "eating";
    }
    public function sleep() {
        echo "sleeping";
    }
}

 //backend - admina vliza i modificira proekta
//common - vruzkata mejdu front end i back end
//environments- test environment ; debug environment ; production environment
 //tests - test case-Oove
 //   models- vruzka s baza danni //
// object relational mapping ORM