<?php
/**
 * This file contains all the functions related to the users
 * It contains the following functions:
 * - getUser: returns the user with the nickname $nickname and the password $password if it exists otherwise false
 * - createUser: creates a new user with the nickname $nickname, the email $email and the password $password
 * - getUserById: returns the user with the id $id
 * - getUserByEmail: returns the user with the email $email
 * - updatePassword: updates the password of the user with the email $email to $newPassword
 * - deleteUser: deletes the user with the id $id and transfers all the teams and builds created by the user to the user with id 10
 */

require_once "models/database.php";

/**
 * returns the user with the nickname $nickname and the password $password if it exists otherwise false
 * @param string $nickname the nickname of the user
 * @param string $password the password of the user
 * @return array the user if it exists otherwise false 
 */
function getUser($nickname, $password){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_users WHERE nickname = ?");
        $stmt->execute([$nickname]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user && password_verify($password, $user['password']) ? $user : false;

    } catch (PDOException $e){
        $error =  "Erreur lors de la vérification de l'existence d'un utilisateur: ";
        include_once "views/error.php";
        exit;
    }
}

/**
 * Create a new user
 * @param string $nickname the nickname of the user
 * @param string $email the email address of the user
 * @param string $password the hashed password of the user
 * @return void
 */
function createUser($nickname, $email, $password){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("INSERT INTO zell_users (nickname, email, `password`, role_id) VALUES (?,?,?,?)");
        $stmt->execute([$nickname, $email, $password, 2]);
    } catch(PDOException $e){
        $error = "Echec lors la création de l'utilisateur: ";
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get the user with the given id
 * @param int $id
 * @return array the corresponding user
 */
function getUserById($id){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_users WHERE user_id =?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        $error = "Erreur lors de la récupération de l'utilisateur par id. ";
        include_once "views/error.php";
        exit;
    }
}

/**
 * Get the user with the given email
 * @param string $email
 * @return array the corresponding user
 */
function getUserByEmail($email){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_users WHERE email =?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e){
        $error = "Erreur lors de la récupération de l'utilisateur par email. ";
        include_once "views/error.php";
        exit;
    }
}

/**
 * Update the user with the given email and new password
 * @param string $email the email of the user to update
 * @param string $newPassword the new password of the user
 * @return void
 */
function updatePassword($email, $newPassword){
    $pdo = getConnexion();
    try{
        $stmt = $pdo->prepare("UPDATE zell_users SET password = ? WHERE email = ?");
        $stmt->execute([$newPassword, $email]);
    } catch(PDOException $e){
        $error = "Erreur lors de la mise à jour du mot de passe. ";
        include_once "views/error.php";
        exit;
    }
}

/**
 * Delete the user with the given id
 * @note this function will also transfer all the teams and builds created by the user to the user with id 10
 * @param int $id the id of the user to delete
 * @return void
 */
function deleteUser($id){
    $pdo = getConnexion();

    // We start by looking at whether the user has teams
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_teams WHERE user_id = ?");
        $stmt->execute([$id]);
        $teams = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // If yes, we transfer them to the user with user_id = 10 (deleted member)
        if(count($teams) > 0){
            try{
                $stmt = $pdo->prepare("UPDATE zell_teams SET user_id = ? WHERE user_id = ?");
                $stmt->execute([10, $id]);
            } catch(PDOException $e){
                $error = "Erreur lors de la mise à jour des teams de l'utilisateur: ";
                include_once "views/error.php";
                exit;
            }
        }
    } catch(PDOException $e){
        $error = "Erreur lors de la récupération des teams de l'utilisateur: ";
        include_once "views/error.php";
        exit;
    }

    // Then we do the same thing with the builds
    try{
        $stmt = $pdo->prepare("SELECT * FROM zell_builds WHERE user_id = ?");
        $stmt->execute([$id]);
        $builds = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if(count($builds) > 0){
            try{
                $stmt = $pdo->prepare("UPDATE zell_builds SET user_id = ? WHERE user_id = ?");
                $stmt->execute([10, $id]);
            } catch(PDOException $e){
                $error = "Erreur lors de la mise à jour des builds de l'utilisateur: ";
                include_once "views/error.php";
                exit;
            }
        }
    } catch(PDOException $e){
        $error = "Erreur lors de la récupération des builds de l'utilisateur: ";
        include_once "views/error.php";
        exit;
    }

    // Finally we delete the user
    try{
        $stmt = $pdo->prepare("DELETE FROM zell_users WHERE user_id = ?");
        $stmt->execute([$id]);
    } catch(PDOException $e){
        $error = "Erreur lors de la suppression de l'utilisateur: ";
        include_once "views/error.php";
        exit;
    }
}