<?php
require_once './helper/model/User.php';
require_once './helper/database/koneksi.php';

class UserController extends Koneksi {
    public function login($email, $password) {
        // Sanitize input
        $email = mysqli_real_escape_string($this->getConnection(), $email);
        $password = mysqli_real_escape_string($this->getConnection(), $password);

        // Retrieve the user with the given email
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($this->getConnection(), $query);
        $row = mysqli_fetch_assoc($result);

        if ($row) {
            $user = new User($row['name'], $row['email'], $row['password']);
            $user->id = $row['id'];
            $user->name = $row['name'];
            $user->email = $row['email'];
            $user->password = $row['password'];
            $user->created_at = $row['created_at'];

            // Verify the password
            if ($user->verifyPassword($password)) {
                return $user;
            }
        }

        return null;
    }

    public function index() {
        // Retrieve all users
        $query = "SELECT * FROM users";
        $result = mysqli_query($this->getConnection(), $query);
        
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $user = new User($row['name'], $row['email'], $row['password']);
            $user->id = $row['id'];
            $user->name = $row['name'];
            $user->email = $row['email'];
            $user->password = $row['password'];
            $user->created_at = $row['created_at'];
            
            $users[] = $user;
        }
        
        return $users;
    }

    public function show($id) {
        // Retrieve a single user
        $query = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($this->getConnection(), $query);
        $row = mysqli_fetch_assoc($result);
        
        $user = new User($row['name'], $row['email'], $row['password']);
        $user->id = $row['id'];
        $user->name = $row['name'];
        $user->email = $row['email'];
        $user->password = $row['password'];
        $user->created_at = $row['created_at'];
        
        return $user;
    }
    
    public function create($name, $email, $password) {
        // Sanitize input
        $name = mysqli_real_escape_string($this->getConnection(), $name);
        $email = mysqli_real_escape_string($this->getConnection(), $email);
        $password = mysqli_real_escape_string($this->getConnection(), $password);

        // Create a new user
        $user = new User($name, $email, $password);
        $query = "INSERT INTO users (name, email, password) VALUES ('$user->name', '$user->email', '$user->password')";
        $result = mysqli_query($this->getConnection(), $query);

        return $user;
    }

    public function update($name, $email, $password, $id) {
        // Sanitize input
        $name = mysqli_real_escape_string($this->getConnection(), $name);
        $email = mysqli_real_escape_string($this->getConnection(), $email);
        $password = mysqli_real_escape_string($this->getConnection(), $password);

        $user = new User($name, $email, $password);
        $query = "UPDATE users SET name='$user->name', email='$user->email', password='$user->password' WHERE id=$id";
        $result = mysqli_query($this->getConnection(), $query);

        return $user;
    }

    public function delete($id) {
        // Delete an existing user
        $query = "DELETE FROM users WHERE id=$id";
        $result = mysqli_query($this->getConnection(), $query);
    }
}
?>
