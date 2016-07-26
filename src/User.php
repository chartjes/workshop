<?php
namespace Workshop;

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
        $active = array_filter($results, function($result) {
            return ($result['is_active'] == 1);
        });
        $response = [];

        foreach ($active as $row) {
            $response[] = ['id' => $row['id'], 'email' => $row['email']];
        }

        return $response;
    }
}
