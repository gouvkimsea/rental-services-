<?php 
    $conn = new mysqli("localhost", "root", "", "rentalKH", 3306);
    if($conn->connect_error){
        die("can't connect to rentalKH database: " . $conn->connect_error);
    }

    $error_msg = "";
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';
        $email = trim($_POST['email'] ?? '');
        $confirmPassword = $_POST['confirmPassword'] ?? '';

        if(empty($username) || empty($password)){
            $error_msg = "Please fill in all required fields.";
        } elseif($password !== $confirmPassword){
            $error_msg = "Passwords do not match!";
        } else {
            // Check if username already exists
            $check = $conn->prepare("SELECT id FROM users WHERE name = ? LIMIT 1");
            $check->bind_param("s", $username);
            $check->execute();
            if($check->get_result()->num_rows > 0){
                $error_msg = "Username already exists. Please choose a different name.";
            } else {
                $stmt = $conn->prepare("INSERT INTO users(name, email, password) VALUES(?, ?, ?)");
                $stmt->bind_param("sss", $username, $email, $password);
                if($stmt->execute()){
                    header("Location: login.php?registered=1");
                    exit();
                } else {
                    $error_msg = "Failed to register account: " . $conn->error;
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Rental Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Chelsea+Market&family=Grenze+Gotisch:wght@100..900&family=Neucha&family=Odibee+Sans&family=Saira+Semi+Condensed:wght@100;200;300;400;500;600;700;800;900&family=ZCOOL+QingKe+HuangYou&display=swap" rel="stylesheet">
    <style>
        h2 {
            font-family: 'Odibee Sans', sans-serif;
            font-size: 50px;
            color: brown;
        }
        .card {
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-5">
                <div class="card shadow p-4 rounded-4">
                    <form method="post"> 
                        <h2 class="text-center mb-4">Sign Up</h2>

                        <?php if(!empty($error_msg)): ?>
                            <div class="alert alert-danger text-center py-2"><?php echo htmlspecialchars($error_msg); ?></div>
                        <?php endif; ?>

                        <div class="form-group mb-3">
                            <label><b>Username</b></label>
                            <input type="text" class="form-control" placeholder="Enter name" name="username" required>
                        </div>
                        <div class="form-group mb-3">
                            <label><b>Email</b></label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group mb-3">
                            <label><b>Password</b></label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                        </div>
                        <div class="form-group mb-3">
                            <label><b>Confirm Password</b></label>
                            <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm password" required>
                        </div>
                        
                        <div class="d-grid mb-3">
                            <button class="btn btn-primary" name="signin">Create Account</button>
                        </div>
                        
                        <div class="text-center">
                            <p class="mb-0">Already have an account? <a href="login.php">Log in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>