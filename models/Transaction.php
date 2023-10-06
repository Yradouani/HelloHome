<?php

require_once 'models/Property.php';

class Transaction extends Connection
{
    // private $attribute;


    // public function __construct()
    // {
    //     // $this->attribute = $attribute;
    //    
    // }

    public function addNewTransaction($transaction_onlineDate, $transaction_status, $id_property)
    {
        $sql = "INSERT INTO transaction_type (transaction_onlineDate, transaction_status, id_property) VALUES (?, ?, ?);";
        $this->executerRequete($sql, array($transaction_onlineDate, $transaction_status, $id_property));

        return $this->getBdd()->lastInsertId();
    }

    public function getAllTransactions()
    {
        $sql = "SELECT * FROM transaction_type ";
        $results = $this->executerRequete($sql);
        $transactions = $results->fetchAll();
        return $transactions;
    }

    public function getOneTransaction($id_property)
    {
        $sql = "SELECT id FROM transaction_type WHERE id_property=? ";
        $result = $this->executerRequete($sql, array($id_property));
        $transaction = $result->fetch();
        return $transaction;
    }


    public function deleteOneTransaction($id_property)
    {
        $sql = "DELETE FROM transaction_type WHERE id_property = ?;";
        $this->executerRequete($sql, array($id_property));
    }
    public function updateTransaction($transaction_status, $property_id)
    {
        $sql = "UPDATE  transaction_type 
        SET transaction_status=?
        WHERE id_property=?";
        $sql1 = "SELECT * FROM transaction_type WHERE id_property=?";
        try {
            $stmt = $this->executerRequete($sql1, array($property_id));
            $transaction = $stmt->fetch();
            $this->executerRequete($sql, array($transaction_status, $property_id));

            return $transaction["id"];
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
