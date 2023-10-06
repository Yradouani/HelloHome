<?php

require_once 'models/Property.php';

class Apartment extends Property
{
    private $apartmentAttribute;

    // public function __construct($attribute, $apartmentAttribute)
    // {
    //     parent::__construct($attribute);
    //     $this->apartmentAttribute = $apartmentAttribute;
    // }

    public function getAllApartments()
    {
        $sql = "SELECT * FROM apartment";
        $results = $this->executerRequete($sql);
        $apartments = $results->fetchAll();
        return $apartments;
    }

    public function getOneApartment($id_property)
    {
        $sql = "SELECT id, id_property FROM apartment WHERE id_property=? ";
        $result = $this->executerRequete($sql, array($id_property));

        $apartment = $result->fetch();

        return $apartment;
    }

    public function getAllApartmentsByUser($id_property)
    {
        $sql = "SELECT * FROM apartment 
        WHERE apartment.id_property = ?;";
        $stmt = $this->executerRequete($sql, array($id_property));
        $properties = $stmt->fetchAll();
        return $properties;
    }

    public function addApartment($id_property, $parking, $floor, $elevator, $caretaking, $balcony)
    {
        try {
            $sql = "INSERT INTO apartment (id_property, parking, floor, elevator, caretaking, balcony) VALUES (?, ?, ?, ?, ?, ?);";
            $this->executerRequete($sql, array($id_property, $parking, $floor, $elevator, $caretaking, $balcony));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $sql = "INSERT INTO apartment (id_property, parking, floor, elevator, caretaking, balcony) VALUES (?, ?, ?, ?, ?, ?);";
        $this->executerRequete($sql, array($id_property, $parking, $floor, $elevator, $caretaking, $balcony));
    }

    public function deleteApartment($id_property)
    {
        $sql = "DELETE FROM apartment WHERE id_property = ?;";
        $this->executerRequete($sql, array($id_property));
    }

    public function updateApartment($parking, $floor, $elevator, $caretaking, $balcony, $id_property)
    {
        $sql = "UPDATE apartment 
        SET parking=?, floor=?, elevator=?, caretaking=?, balcony=?
        WHERE id_property=?";

        try {
            $this->executerRequete($sql, array($parking, $floor, $elevator, $caretaking, $balcony, $id_property));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
