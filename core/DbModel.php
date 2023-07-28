<?php

namespace app\core;

abstract class DbModel extends Model {

    public DbConnection $db;

    public function __construct() {
        $this->db = new DbConnection();
    }

    abstract public function tableName();

    abstract public function attributes(): array;

    public function create() {
        $tableName = $this->tableName();
        $attributes=  $this->attributes();
        $values = array_map(fn($attr) => ":$attr", $attributes);

        $sqlString = "INSERT INTO $tableName(" .implode(',', $attributes) . ") VALUES(".implode(',', $values).")";


        foreach ($attributes as $attribute) {
            $sqlString = str_replace(":$attribute", is_numeric($this->{$attribute}) ? $this->{$attribute} : '"' . $this->{$attribute} . '"', $sqlString );
        }

        $this->db->con()->query($sqlString);

    }

//    public function update($where) {
//        $tableName = $this->tableName();
//        $attributes=  $this->attributes();
//        $values = array_map(fn($attr) => ":$attr", $attributes);
//
//        $sqlString = "UPDATE $tableName SET";
//
//
//        foreach ($attributes as $attribute) {
//
//            $sqlString .= $attribute;
//            $sqlString .= " = ";
//            $sqlString .= is_numeric($this->{$attribute}) ? $this->{$attribute} : '"' . $this->{$attribute} . '"'.",";
//        }
//
//        $sqlString = substr_replace($sqlString, ";", -2);
//
//        $this->db->con()->query($sqlString .$where) or die;
//
//    }




    public function update($elements, $where) {
        $tableName = $this->tableName();

        $sql = "UPDATE $tableName SET $elements WHERE $where ";

        $this->db->con()->query($sql);

    }




    public function getHotels() {
        $tableName = $this->tableName();
        $sqlString = "SELECT accommodation_name FROM $tableName;";
        $dataResult = $this->db->con()->query($sqlString);
        $resultArray = [];
        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        $array = [];

       foreach ($resultArray as $key => $value){
           foreach ($value as $item) {
               $array[] = $item;
           }
       }

        return $array;


    }
    public function getHotelsId() {
        $sqlString = "SELECT id, accommodation_name, price_per_night FROM accommodation";
        $dataResult = $this->db->con()->query($sqlString);
        $resultArray = [];
        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        $array = [];


        for ($i = 0; $i < count($resultArray); $i++) {
            $array[] = $resultArray[$i];
        }


       return $array;

    }


    public function getCity() {
        $tableName = $this->tableName();
        $sqlString = "SELECT city_name FROM $tableName;";
        $dataResult = $this->db->con()->query($sqlString);
        $resultArray = [];
        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        $array = [];

        foreach ($resultArray as $key => $value){
            foreach ($value as $item) {
                $array[] = $item;
            }
        }

        return $array;


    }

    public function getCountry() {
        $tableName = $this->tableName();
        $sqlString = "SELECT country_name FROM $tableName;";
        $dataResult = $this->db->con()->query($sqlString);
        $resultArray = [];
        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        $array = [];

        foreach ($resultArray as $key => $value){
            foreach ($value as $item) {
                $array[] = $item;
            }
        }

        return $array;


    }

    public function getCountryByName($name) {
        $tableName = $this->tableName();
        $sqlString = "SELECT * FROM $tableName WHERE country_name = '$name'";
        $dataResult = $this->db->con()->query($sqlString);
        $resultArray = [];
        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        $array = [];

        foreach ($resultArray as $key => $value){
            foreach ($value as $item) {
                $array[] = $item;
            }
        }

        return $array;


    }

    public function getAccommodation() {
        $tableName = $this->tableName();
        $sqlString = "SELECT accommodation_name FROM $tableName;";
        $dataResult = $this->db->con()->query($sqlString);
        $resultArray = [];
        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        $array = [];

        foreach ($resultArray as $key => $value){
            foreach ($value as $item) {
                $array[] = $item;
            }
        }

        return $array;


    }


    public function getAccommodationByName($name) {
        $tableName = $this->tableName();
        $sqlString = "SELECT * FROM $tableName WHERE accommodation_name = '$name'";
        $dataResult = $this->db->con()->query($sqlString);
        $resultArray = [];
        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        $array = [];

        foreach ($resultArray as $key => $value){
            foreach ($value as $item) {
                $array[] = $item;
            }
        }

        return $array;


    }



    public function getCityByName($name) {
        $tableName = $this->tableName();
        $sqlString = "SELECT * FROM $tableName WHERE city_name = '$name'";
        $dataResult = $this->db->con()->query($sqlString);
        $resultArray = [];
        while ($result = $dataResult->fetch_assoc()) {
            array_push($resultArray, $result);
        }

        $array = [];

        foreach ($resultArray as $key => $value){
            foreach ($value as $item) {
                $array[] = $item;
            }
        }

        return $array;


    }





    public function all() {
        $tableName = $this->tableName();

        $sqlString = "SELECT * FROM $tableName";
        $dataResult = $this->db->con()->query($sqlString);
        $resultArray = [];

        while ($result = $dataResult->fetch_assoc()) {
           array_push($resultArray, $result);
        }

        return $resultArray;

    }




    public function one($where) {
        $tableName = $this->tableName();
        $sqlString = "SELECT * FROM $tableName WHERE $where limit 1";
        $dbResult = $this->db->con()->query($sqlString);
        $result = $dbResult->fetch_assoc();
        return $result;
    }



    public function delete($where) {
        $tableName = $this->tableName();
        $db = $this->db->con();
        $db->query("DELETE FROM $tableName WHERE $where") or die($db->error);
    }





    public function rules(): array
    {
       return [];
    }

}