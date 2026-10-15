<?php 
    session_start();
    // step 1: connect php to mysql database rentalKH
    $conn = new mysqli("localhost", "root", "", "rentalKH", 3306);
    if($conn->connect_error){
        die("can't connect to rentalKH: " . $conn->connect_error);
    }

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');

        // Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE name = ? LIMIT 1");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if($result && $result->num_rows > 0){
            $row = $result->fetch_assoc();
            
            // Support both plain text and bcrypt password hashing
            if($row['password'] === $password || password_verify($password, $row['password'])){
                $_SESSION['username'] = $row['name'];
                header("Location: Service.php");
                exit();
            } else {
                $error_msg = "Username or password incorrect!";
            }
        } else {
            $error_msg = "Username or password incorrect!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Chelsea+Market&family=Odibee+Sans&family=Saira+Semi+Condensed:wght@100;200;300;400;500;600;700;800;900&family=ZCOOL+QingKe+HuangYou&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        h2 {
            font-family: 'Odibee Sans', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-5">
                <div class="card shadow p-4 rounded-4">
                    <form method="post"> 
                        <h2 class="text-center mb-4">Welcome to <br>JOUL Rental Service</h2>
                        
                        <?php if(isset($_GET['registered'])): ?>
                            <div class="alert alert-success text-center py-2">Account created successfully! Please sign in.</div>
                        <?php endif; ?>

                        <?php if(isset($error_msg)): ?>
                            <div class="alert alert-danger text-center py-2"><?php echo $error_msg; ?></div>
                        <?php endif; ?>

                        <div class="form-group mb-3">
                            <label><b>Username</b></label>
                            <input type="text" name="username" class="form-control" placeholder="Enter name" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label><b>Password</b></label>
                            <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                        </div>
                        
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                        
                        <div class="text-center">
                            <p class="mb-0">No account? <a href="signin.php">Sign up now</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>