<?php
// Simple PHP Website - All in one file
session_start();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $_SESSION['user_name'] = htmlspecialchars($_POST['name']);
        $_SESSION['message'] = "Welcome, " . $_SESSION['user_name'] . "!";
    }
}

// Clear session data if logout is requested
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Get current time
$current_time = date("h:i:s A");
$current_date = date("F j, Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Simple PHP Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        header {
            text-align: center;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .welcome-message {
            background-color: #e8f4f8;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .time-display {
            text-align: right;
            font-size: 0.9em;
            color: #666;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            padding: 8px;
            width: 70%;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 8px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #ddd;
            font-size: 0.8em;
            color: #666;
        }
        .logout {
            text-align: right;
        }
        .logout a {
            color: #888;
            text-decoration: none;
            font-size: 0.8em;
        }
        .logout a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to My Simple PHP Website</h1>
        </header>
        
        <div class="time-display">
            <p><?php echo $current_date; ?> | <?php echo $current_time; ?></p>
        </div>
        
        <?php if (isset($_SESSION['message'])): ?>
            <div class="welcome-message">
                <p><?php echo $_SESSION['message']; ?></p>
                <div class="logout">
                    <a href="?action=logout">Logout</a>
                </div>
            </div>
        <?php else: ?>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <h3>Please enter your name:</h3>
                <input type="text" name="name" placeholder="Your name" required>
                <button type="submit">Submit</button>
            </form>
        <?php endif; ?>
        
        <div class="content">
            <h2>About This Page</h2>
            <p>This is a simple PHP website created in a single file. It demonstrates basic PHP functionality including:</p>
            <ul>
                <li>Form handling</li>
                <li>Session management</li>
                <li>Basic styling with CSS</li>
                <li>Conditional content display</li>
                <li>Date and time functions</li>
            </ul>
            
            <h2>PHP Server Information</h2>
            <p>PHP Version: <?php echo phpversion(); ?></p>
            <p>Server Software: <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Not available'; ?></p>
        </div>
        
        <footer>
            <p>&copy; <?php echo date("Y"); ?> My Simple PHP Website. All rights reserved.</p>
        </footer>
    </div>
</body>
</html>
