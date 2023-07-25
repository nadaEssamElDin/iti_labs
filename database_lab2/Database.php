<?php

class Database
{
    private $db;

    public function __construct($dsn, $username, $password)
    {
        try {
            $this->db = new PDO($dsn, $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function connect($dsn, $username, $password)
    {
        try {
            $this->db = new PDO($dsn, $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function insert($table, $columns, $values)
    {
        $columnsStr = implode(", ", $columns);
        $placeholders = implode(", ", array_fill(0, count($columns), "?"));

        $sql = "INSERT INTO $table ($columnsStr) VALUES ($placeholders)";
        $stm = $this->db->prepare($sql);
        $stm->execute($values);
    }

    public function select($table)
    {
        $sql2 = "SELECT * FROM $table";
        $stm2 = $this->db->prepare($sql2);
        $stm2->execute();
        return $stm2->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update($table, $email, $columns, $values)
    {
        $updates = array_map(function ($column) {
            return "$column=?";
        }, $columns);

        $updatesStr = implode(", ", $updates);

        $sql = "UPDATE $table SET $updatesStr WHERE email=?";
        $values[] = $email;

        $stm = $this->db->prepare($sql);
        $stm->execute($values);
    }

    public function delete($table, $email)
    {
        $sql = "DELETE FROM $table WHERE email=?";
        $stm = $this->db->prepare($sql);
        $stm->execute([$email]);
    }
}
