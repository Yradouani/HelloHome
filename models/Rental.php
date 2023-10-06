<?php

require_once 'models/Transaction.php';

class Rental extends Transaction
{
    public function addRental($id_transaction, $rent, $charges, $furnished)
    {
        try {
            $sql = "INSERT INTO rental (id_transaction, rent, charges, furnished) VALUES (?, ?, ?, ?);";
            $this->executerRequete($sql, array($id_transaction, $rent, $charges, $furnished));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getAllPropertyToRent($id_property)
    {
        $sql = "SELECT * FROM rental 
        INNER JOIN transaction_type on transaction_type.id = rental.id_transaction
        WHERE transaction_type.id_property = ?;";
        $stmt = $this->executerRequete($sql, array($id_property));
        $properties = $stmt->fetchAll();
        return $properties;
    }

    public function getAllRentals()
    {
        $sql = "SELECT * FROM rental ";
        $results = $this->executerRequete($sql);
        $rentals = $results->fetchAll();
        return $rentals;
    }

    public function getOneRental($id_transaction)
    {
        $sql = "SELECT id_transaction, id FROM rental WHERE id_transaction = ?";
        $result = $this->executerRequete($sql, array($id_transaction));
        $rental = $result->fetch();
        return $rental;
    }


    public function deleteRental($id_transaction)
    {
        $sql = "DELETE FROM rental WHERE id_transaction = ?;";
        $this->executerRequete($sql, array($id_transaction));
    }
    public function updateRental($id_transaction, $rent, $charges, $furnished)
    {
        $sql = "UPDATE rental 
        SET rent=?, charges=?, furnished=?
        WHERE id_transaction=?";

        try {
            $this->executerRequete($sql, array($rent, $charges, $furnished, $id_transaction));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
