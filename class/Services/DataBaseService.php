<?php

namespace App\Services;

use DateTime;
use Exception;
use PDO;

class DataBaseService
{
    const HOST = '127.0.0.1';
    const PORT = '3306';
    const DATABASE_NAME = 'carpooling';
    const MYSQL_USER = 'root';
    const MYSQL_PASSWORD = 'password';

    private $connection;

    public function __construct()
    {
        try {
            $this->connection = new PDO(
                'mysql:host=' . self::HOST . ';port=' . self::PORT . ';dbname=' . self::DATABASE_NAME,
                self::MYSQL_USER,
                self::MYSQL_PASSWORD
            );
            $this->connection->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) {
            echo 'Erreur : ' . $e->getMessage();
        }
    }

    /**
     * Create an user.
     */
    public function createUser(string $firstname, string $lastname, string $email, DateTime $birthday): string
    {
        $userId = '';

        $data = [
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'INSERT INTO users (firstname, lastname, email, birthday) VALUES (:firstname, :lastname, :email, :birthday)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        if ($isOk) {
            $userId = $this->connection->lastInsertId();
        }

        return $userId;
    }

    /**
     * Return all users.
     */
    public function getUsers(): array
    {
        $users = [];

        $sql = 'SELECT * FROM users';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $users = $results;
        }

        return $users;
    }

    /**
     * Update an user.
     */
    public function updateUser(string $id, string $firstname, string $lastname, string $email, DateTime $birthday): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'birthday' => $birthday->format(DateTime::RFC3339),
        ];
        $sql = 'UPDATE users SET firstname = :firstname, lastname = :lastname, email = :email, birthday = :birthday WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Delete an user.
     */
    public function deleteUser(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM users WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Return all cars.
     */
    public function getCars(): array
    {
        $cars = [];

        $sql = 'SELECT * FROM cars';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $cars = $results;
        }

        return $cars;
    }

    /**
     * Create relation bewteen an user and his car.
     */
    public function setUserCar(string $userId, string $carId): bool
    {
        $isOk = false;

        $data = [
            'userId' => $userId,
            'carId' => $carId,
        ];
        $sql = 'INSERT INTO users_cars (user_id, car_id) VALUES (:userId, :carId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }

    /**
     * Get cars of given user id.
     */
    public function getUserCars(string $userId): array
    {
        $userCars = [];

        $data = [
            'userId' => $userId,
        ];
        $sql = '
            SELECT c.*
            FROM cars as c
            LEFT JOIN users_cars as uc ON uc.car_id = c.id
            WHERE uc.user_id = :userId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $userCars = $results;
        }

        return $userCars;
    }
    
    /**
     * Create an reservation.
     */
    public function createReservation(DateTime $datereservation, string $portable, string $notes, string $nbplacesdemandees): string
    {
        $reservationId = '';

        $data = [
            'datereservation' => $datereservation->format(DateTime::RFC3339),
            'portable' => $portable,
            'notes' => $notes,
            'nbplacesdemandees' => $nbplacesdemandees,
        ];
        $sql = 'INSERT INTO reservation (datereservation, portable, notes, nbplacesdemandees) VALUES (:datereservation, :portable, :notes, :nbplacesdemandees)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);
        if ($isOk) {
            $reservationId = $this->connection->lastInsertId();
        }

        return $reservationId;
    }
    
    /**
     * Return all reservation.
     */
    public function getReservation(): array
    {
        $reservation = [];

        $sql = 'SELECT * FROM reservation';
        $query = $this->connection->query($sql);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $reservation = $results;
        }

        return $reservation;
    }
    
  /**
     * Update an reservation.
     */
    public function updateReservation(string $id, DateTime $datereservation, string $portable, string $notes, string $nbplacesdemandees): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
            '$datereservation' => $datereservation->format(DateTime::RFC3339),
            '$portable' => $portable,
            '$notes' => $notes,
            '$nbplacesdemandees' => $nbplacesdemandees,
        ];
        $sql = 'UPDATE reservation SET datereservation = :datereservation, portable = :portable, notes = :notes, nbplacesdemandees = :nbplacesdemandees WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
    
    /**
     * Delete an reservation.
     */
    public function deleteReservation(string $id): bool
    {
        $isOk = false;

        $data = [
            'id' => $id,
        ];
        $sql = 'DELETE FROM reservation WHERE id = :id;';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
    
     /**
     * Create relation bewteen an user and his reservation.
     */
    public function setUserReservation(string $userId, string $reservationId): bool
    {
        $isOk = false;

        $data = [
            'userId' => $userId,
            'reservationId' => $reservationId,
        ];
        $sql = 'INSERT INTO users_reservation (user_id, reservation_id) VALUES (:userId, :reservationId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
    /**
     * Get reservation of given user id.
     */
    public function getUserreservation(string $userId): array
    {
        $userReservation = [];

        $data = [
            'userId' => $userId,
        ];
        $sql = '
            SELECT r.*
            FROM reservation as r
            LEFT JOIN users_reservation as ur ON uc.reservation_id = r.id
            WHERE ur.user_id = :userId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $userReservation = $results;
        }

        return $userReservation;
    }
    
    /**
     * Create relation bewteen an annonce and his reservation.
     */
    public function setAnnonceReservation(string $annonceId, string $reservationId): bool
    {
        $isOk = false;

        $data = [
            'userId' => $annonceId,
            'reservationId' => $reservationId,
        ];
        $sql = 'INSERT INTO annonce_reservation (annonce_id, reservation_id) VALUES (:annonceId, :reservationId)';
        $query = $this->connection->prepare($sql);
        $isOk = $query->execute($data);

        return $isOk;
    }
    
    /**
     * Get reservation of given annonce id.
     */
    public function getAnnoncereservation(string $annonceId): array
    {
        $annonceReservation = [];

        $data = [
            'annonceId' => $annonceId,
        ];
        $sql = '
            SELECT r.*
            FROM reservation as r
            LEFT JOIN annonce_reservation as ar ON ac.reservation_id = r.id
            WHERE ar.annonce_id = :annonceId';
        $query = $this->connection->prepare($sql);
        $query->execute($data);
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($results)) {
            $userReservation = $results;
        }

        return $annonceReservation;
    }
}
