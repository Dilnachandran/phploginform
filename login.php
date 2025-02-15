<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "test");

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Content-Type: text/plain"); // Ensures clean output
    
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepare a statement
    $stmt = $mysqli->prepare("SELECT user_id, username, password, role, last_login_time FROM users_login WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        
        // Password Verification
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username']; // Store username in session
            $_SESSION['role'] = $user['role']; 
            $_SESSION['last_login_time'] = $user['last_login_time'];

            // Update last_login_time field
            $update_stmt = $mysqli->prepare("UPDATE users_login SET last_login_time = NOW() WHERE user_id = ?");
            $update_stmt->bind_param("i", $user['user_id']);
            $update_stmt->execute();
            $update_stmt->close();
            
            echo "success"; // Must be the ONLY output
            exit; // Ensure script stops here
        } else {
            echo "Invalid password..!";
        }
    } else {
        echo "User not found..!";
    }

    $stmt->close();
    $mysqli->close();
}
?>
