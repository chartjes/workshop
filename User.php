<?php

class User
{
    protected $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $stmt = $this->db->prepare('SELECT * FROM users');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllActive()
    {
        $stmt = $this->db->prepare('SELECT * FROM users');
        $stmt->execute();
        $results = $stmt->fetchAll();
        $active_users = [];

        foreach ($results as $user) {
            if ($user['is_active'] == 1) {
                $active_users[] = [
                    'id' => $user['id'],
                    'email' => $user['email']
                ];
            }
        }

        return $active_users;
    }
}
