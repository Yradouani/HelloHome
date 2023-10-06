<?php

require_once 'models/Connection.php';

class User extends Connection
{
    public function isEmailUnique($email)
    {
        $sql = "SELECT COUNT(*) FROM user WHERE email = ?";
        $this->executerRequete($sql, array([$email]));
    }

    public function logIn($email, $password)
    {
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = $this->executerRequete($sql, array($email));
        $user = $stmt->fetch();
        if ($user) {
            if (password_verify($password, $user['pwd'])) {
                return $user;
            }
        }
    }

    public function addClient($firstname, $lastname, $email, $pwd, $isAdmin)
    {
        $isValidEmail = $this->isEmailUnique($email);

        if ($isValidEmail) {
            $sql = "INSERT INTO user (firstname, lastname, email, pwd, isAdmin) VALUES (?, ?, ?, ?, ?)";
            $this->executerRequete($sql, array($firstname, $lastname, $email, $pwd, $isAdmin));
        }
    }

    public function updateClient($id, $firstname, $lastname, $email, $pwd)
    {
        $sql = "UPDATE clients 
        SET firstname=?, lastname=?, email=?, pwd=? 
        WHERE id=?";
        $this->executerRequete($sql, array($firstname, $lastname, $email, $pwd, $id));
    }

    public function getAdminInfo($id)
    {
        $sql = "SELECT * FROM user 
        WHERE id=?";

        $stmt = $this->executerRequete($sql, array($id));
        $userInfo = $stmt->fetch();
        return $userInfo;
    }

    public function updateAdminInfo($firstname, $lastname, $email, $id)
    {
        try {
            $sql = "UPDATE user SET firstname=?, lastname=?, email=? WHERE id=?";
            $this->executerRequete($sql, array($firstname, $lastname, $email, $id));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function changePassword($newpassword, $idAdmin)
    {
        try {       
            $hashed_password = password_hash($newpassword, PASSWORD_DEFAULT);
            $sql = "UPDATE user SET pwd=? WHERE id=?";
            $this->executerRequete($sql, array($hashed_password, $idAdmin));
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
