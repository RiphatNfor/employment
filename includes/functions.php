<?php
function emptyInputlogin($username, $password){
    if(empty($username)  || empty($password)) {
        $result = True;
    } else {
        return False;
    }

    return $result;
}


function checkPasswordMatch($password, $password_repeat){
    if ($password === $password_repeat) {
     
        return True;
    }else {
        return False;
    }
}

function emptyInputRegister($first_name, $last_name, $password, $password_repeat, $address, $username, $email, $role, $pob, $dob, $department_id){
    if(empty($username) || empty($first_name) || empty($last_name) || empty($email) || empty($address) || empty($role)|| empty($pob)|| empty($dob)|| empty($password_repeat) || empty($password)) {
        $result = True;
    } else {
        return False;
    }

    return $result;
}


function loginUser($conn, $username, $password) {
    // Prepare a SQL statement to fetch user details based on username
    $sql = "SELECT * FROM users WHERE username = ?";
    
    // Prepare the statement
    $stmt = $conn->prepare($sql);
    
    // Bind the parameters
    $stmt->bind_param("s", $username);
    
    // Execute the statement
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();
    
    // Check if the user exists
    if ($result->num_rows === 1) {
        // Fetch user data
        $user = $result->fetch_assoc();
        
        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Password is correct
            return $user; // Return user data
        } else {
            // Password is incorrect
            return false;
        }
    } else {
        // User does not exist
        return false;
    }
}


function createUser($conn, $first_name, $last_name, $username, $phone, $email, $role, $address, $pob, $dob, $password, $is_admin, $department_id) {
    // Check if the email is already registered
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Email is already registered
        return "Email is already registered";
    } else {
        // Email is not registered, proceed with user creation
        
        // Validate password criteria (e.g., minimum length)
        if (strlen($password) < 4) {
            return "Password should be at least 4 characters long";
        }
        
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // Prepare the INSERT statement
        $sql = "INSERT INTO users (first_name, last_name, username, phone, email, role, address, pob, dob, password, is_admin, department_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        
        // Bind parameters and execute the statement
        $stmt->bind_param("sssssssssssi", $first_name, $last_name, $username, $phone, $email, $role, $address, $pob, $dob, $hashedPassword, $is_admin, $department_id);
        
        // Default value for is_admin (False)
        $is_admin = false;
        
        // Execute the statement
        if ($stmt->execute()) {
            // User created successfully
            session_start();
            $_SESSION["email"] = "This is my session";
            return "User created successfully";
        } else {
            // Error occurred while creating user
            return "Error creating user: " . $stmt->error;
        }
    }
}
?>;




