<?php
require 'vendor/autoload.php';

class UserTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function fetchAllReturnsExpectedResults()
    {
        // Create our dependencies
        $db = Mockery::mock('PDO');
        $stmt = Mockery::mock('PDOStatement');

        // Our PDOStatement needs an execute method that returns a boolean
        $stmt->shouldReceive('execute')->andReturn(true);

        // Our PDOStatement needs a fetchAll method that returns an array
        $users = [
            ['id' => 1, 'email' => 'chartjes@grumpy-learning.com'],
            ['id' => 2, 'email' => 'info@example.com']
        ];
        $stmt->shouldReceive('fetchAll')->andReturn($users);

        // Our DB needs to return the PDOStatement
        $db->shouldReceive('prepare')->andReturn($stmt);

        /**
         * Create a new User object that takes the test double we created as
         * a constructor argument
         */
        $user = new Workshop\User($db);
        $response = $user->getAll();

        $this->assertEquals($users, $response);
    }

    /**
     * @test
     */
    public function getAllActiveWorks()
    {
        $db = Mockery::mock('PDO');
        $stmt = Mockery::mock('PDOStatement');
        $stmt->shouldReceive('execute')->andReturn(true);
        $users = [
            ['id' => 1, 'email' => 'foo@bar.com', 'is_active' => 1],
            ['id' => 2, 'email' => 'bar@bar.com', 'is_active' => 0],
            ['id' => 3, 'email' => 'baz@bar.com', 'is_active' => 1]
        ];
        $expected = [
            ['id' => 1, 'email' => 'foo@bar.com'],
            ['id' => 3, 'email' => 'baz@bar.com']
        ];
        $stmt->shouldReceive('fetchAll')->andReturn($users);
        $db->shouldReceive('prepare')->andReturn($stmt);
        $user = new Workshop\User($db);
        $response = $user->getAllActive();
        $this->assertEquals($expected, $response);
    }
}
