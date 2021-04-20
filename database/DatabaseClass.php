<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DatabaseClass
 *
 * @author Alba 4
 */
class DatabaseClass {

    //put your code here

    public $con;
    public $error;

    public function __construct() {
        $this->con = mysqli_connect("localhost:3308", "root", "", "menaxhim");
        if (!$this->con) {
            echo 'Database Connection Error ' . mysqli_connect_error($this->con);
        } else {
//            echo 'database connected';
        }
    }

    public function insert($table_name, $data) {
        $string = "INSERT INTO " . $table_name . " (";
        $string .= implode(",", array_keys($data)) . ') VALUES (';
        $string .= "'" . implode("','", array_values($data)) . "')";
        if (mysqli_query($this->con, $string)) {
            return true;
        } else {

            return false;
        }
    }

    public function select($table_name) {
        $array = array();
        $query = "SELECT * FROM " . $table_name . " ";
        $result = mysqli_query($this->con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $array[] = $row;
        }
        return $array;
    }

    public function update($table_name, $fields, $where_condition) {
        $query = '';
        $condition = '';
        foreach ($fields as $key => $value) {
            $query .= $key . "='" . $value . "', ";
        }
        $query = substr($query, 0, -2);

        foreach ($where_condition as $key => $value) {
            $condition .= $key . "='" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);

        $query = "UPDATE " . $table_name . " SET " . $query . " WHERE " . $condition . "";
        if (mysqli_query($this->con, $query)) {
            return true;
        } else {
            phpAlert("ERRORE!  " . mysqli_error($this->con));
        }
    }

    public function select_where($table_name, $where_condition) {
        $condition = '';
        $array = array();
        foreach ($where_condition as $key => $value) {
            $condition .= $key . " = '" . $value . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $query = "SELECT * FROM " . $table_name . " WHERE " . $condition;
        $result = mysqli_query($this->con, $query);

        while ($row = mysqli_fetch_array($result)) {
            $array[] = $row;
        }
        return $array;
    }

}
