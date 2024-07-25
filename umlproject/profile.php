<?php
session_start();
$conn = new mysqli("localhost", "root", "", "umlproject");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name=$_SESSION['username'];
    $sql = "SELECT username, email,phonenumber FROM userdata WHERE username = '$name'";
    $result = $conn->query($sql);

if ($result->num_rows === 1) {
    $userDetails = $result->fetch_assoc();
}

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <nav>
            <img src="images/LOGO.svg" alt="Logo">
            <ul class="menu">
                <li><a href="#" class="links">Home</a></li>
                <li><a href="shop.html" class="links">Shop</a></li>
                <li><a href="#" class="links">Consult a Doctor</a></li>
                <li><a href="#" id="profile-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="none" d="M0 0h24v24H0z"></path><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z"></path></svg>
                    </a></li>
            </ul>
        </nav>
    </header>
    <section class="medical-records">
        <h2>User Details</h2>
        <table>
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Value</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Name</td>
                    <td><?php echo $userDetails['username']; ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?php echo $userDetails['email']; ?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td><?php echo $userDetails['phonenumber']; ?></td>
                </tr>
            </tbody>
        </table>
    </section>
    
    <section class="medical-records">
        <h2>Medical Records</h2>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Condition</th>
                    <th>Treatment</th>
                    <th>Doctor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2023-09-15</td>
                    <td>High Blood Pressure</td>
                    <td>Prescription medication</td>
                    <td>Dr. John Smithsonian</td>
                </tr>
                <tr>
                    <td>2023-08-15</td>
                    <td>High Blood Pressure</td>
                    <td>Prescription medication</td>
                    <td>Dr. John Smithsonian</td>
                </tr>
                <tr>
                    <td>2023-07-15</td>
                    <td>High Blood Pressure</td>
                    <td>Prescription medication</td>
                    <td>Dr. John Smithsonian</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>
    </section>
    <form method="post">
    <button type="submit" class="logout" name="logout">Logout</button>
    </form>
        <?php
        if (isset($_POST['logout'])) {
            session_destroy();
            header("Location: index.html");
            exit();
        }
        ?>

</body>
</html>