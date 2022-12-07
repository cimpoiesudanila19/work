<?php
namespace App\Model;

class Person{
    public $firstname;
    public $lastname;

    public function __construct($firstname, $lastname){
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public static function CreateTestList(): array
    {
        return [
            new Person('Max', 'Bezh'),
            new Person('Vasea', 'Ypik'),
            new Person('Petea', 'Persikov')
        ];
    }
}