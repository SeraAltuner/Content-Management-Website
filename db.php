<?php
$dsn = "mysql:host=localhost;port=3306;dbname=CMS;charset=utf8mb4" ;
$user = "root" ;
$pass = "root" ;

try {
  $db = new PDO($dsn, $user, $pass) ;
} catch( PDOException $ex) {
  
  echo "<p> Connection Error".$ex->getMessage()."<p>";
  exit ;
}

// User related functions

// Check if a user exists in the database by their email
function checkUserExists($email) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]);
    return $stmt->fetch() ? true : false;
}

// Get a user by their email
function getUser($email) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC); // Fetches the next row as an associative array
}

// Create a new user (admin, editor, content creator)
function createUser($email, $password, $role, $name) {
    global $db;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $db->prepare("INSERT INTO users (email, password, role, name) VALUES (?, ?, ?, ?)");
    $stmt->execute([$email, $hashedPassword, $role, $name]);
}

// Assign a role to a user
function assignRole($email, $role) {
    global $db;
    $stmt = $db->prepare("UPDATE users SET role = ? WHERE email = ?");
    return $stmt->execute([$role, $email]);
}

// Verify a user's password
function checkUserPassword($email, $pass, &$user) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    return $user ? password_verify($pass, $user["password"]) : false;
}

// Check if a user is authenticated
function isAuthenticated() {
    return isset($_SESSION["token"]);
}

// Get a user by their token
function getUserByToken($token) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE remember = ?");
    $stmt->execute([$token]);
    return $stmt->fetch();
}

// Set a user's token by their email
function setTokenByEmail($email, $token) {
    global $db;
    $stmt = $db->prepare("UPDATE auth SET remember = ? WHERE email = ?");
    $stmt->execute([$token, $email]);
}

// Content related functions

// Create new content
function createContent($user_id, $title, $content) {
    global $db;
    $stmt = $db->prepare("INSERT INTO contents (user_id, title, content) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $title, $content]);
}

// Get content by user_id
function getContentsByUser($user_id) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM contents WHERE user_id = ?");
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetches all contents created by the user
}

// Get all content
function getAllContents() {
    global $db;
    $stmt = $db->prepare("SELECT * FROM contents");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetches all contents from the database
}

// Get a specific content by content_id
function getContentById($content_id) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM contents WHERE content_id = ?");
    $stmt->execute([$content_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC); // Fetches content based on ID
}

// Update content by content_id
function updateContent($content_id, $title, $content) {
    global $db;
    $stmt = $db->prepare("UPDATE contents SET title = ?, content = ? WHERE content_id = ?");
    $stmt->execute([$title, $content, $content_id]);
}

// Delete content by content_id
function deleteContent($content_id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM contents WHERE content_id = ?");
    return $stmt->execute([$content_id]);
}

// Comment related functions

// Create a comment
function createComment($user_id, $content_id, $comment) {
    global $db;
    $stmt = $db->prepare("INSERT INTO comments (user_id, content_id, comment) VALUES (?, ?, ?)");
    $stmt->execute([$user_id, $content_id, $comment]);
}

// Get comments by content_id
function getCommentsByContent($content_id) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM comments WHERE content_id = ?");
    $stmt->execute([$content_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Get comments by user_id
function getCommentsByUser($user_id) {
    global $db;
    $stmt = $db->prepare("SELECT * FROM comments WHERE user_id = ?");
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Admin related functions

// Get all users
function getAllUsers() {
    global $db;
    $stmt = $db->prepare("SELECT * FROM users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all users from the database
}

// Delete a user by email
function deleteUser($email) {
    global $db;
    $stmt = $db->prepare("DELETE FROM users WHERE email = ?");
    return $stmt->execute([$email]);
}

// Assign rights to the content creator (can display their own and others' content)
function assignRightsToContentCreator($email) {
    global $db;
    $stmt = $db->prepare("UPDATE users SET can_create_content = 1 WHERE email = ?");
    return $stmt->execute([$email]);
}