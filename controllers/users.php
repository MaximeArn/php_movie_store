<?php 
  function createUser($db, $username, $email, $password){
    try {
      $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

      $query = "INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password_hash)"; 
      $stmt = $db->prepare($query);

      $stmt->bindParam(':username', $username, PDO::PARAM_STR);
      $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      $stmt->bindParam(':password_hash', $hashedPassword, PDO::PARAM_STR);

      return $stmt->execute();
    } catch (PDOException $e) {
      if(str_contains($e->getMessage(), 'username')){
        return "This username is already taken.";
      }elseif(str_contains($e->getMessage(), 'email')){
        return "This email adress is already taken. Go to login page.";
      }else {
        return $e->getMessage();
      }
    }
  }

  function getUserByEmail($db, $email){
    try {
      $query = "SELECT * FROM users WHERE email = :email"; 
      $stmt = $db->prepare($query);

      $stmt->bindParam(':email', $email, PDO::PARAM_STR);

      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return $e->getMessage();    
    }
  }
?>