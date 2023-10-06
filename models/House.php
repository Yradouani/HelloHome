<?php

class House extends Property
{
    private $houseAttribute;
    private $property;

    public function addHouse($id_property, $garden, $bonus)
    {
        $sql = "INSERT INTO house (id_property, garden, bonus) VALUES (?, ?, ?);";
        $this->executerRequete($sql, array($id_property, $garden, $bonus));
    }

    public function getAllHouses()
    {
        $sql = "SELECT * FROM house";
        $stmt = $this->executerRequete($sql);
        $properties = $stmt->fetchAll();

        return $properties;
    }

    public function getOneHouse($id_property)
    {
        $sql = "SELECT id, id_property FROM house WHERE id_property=? ";
        $result = $this->executerRequete($sql, array($id_property));
        $house = $result->fetch();
        return $house;
    }

    public function getAllHousesByUser($id_property)
    {
        $sql = "SELECT * FROM house 
        WHERE house.id_property = ?;";
        $stmt = $this->executerRequete($sql, array($id_property));
        $properties = $stmt->fetchAll();
        return $properties;
    }


    public function deleteHouse($id_property)
    {
        $sql = "DELETE FROM house WHERE id_property = ?";
        $this->executerRequete($sql, array($id_property));
    }

    public function updateHouse($garden, $bonus, $id_property)
    {
        $sql = "UPDATE house 
        SET garden=?, bonus=?
        WHERE id_property=?";

        try {
            $this->executerRequete($sql, array($garden, $bonus, $id_property));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
