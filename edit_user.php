<?php
include('koneksi.php');

$id = $_GET['id'];
$user = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM user WHERE user_id=$id"));

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', role='$role' WHERE user_id=$id");
    header('Location: superadmin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e7f3ff; /* Light blue background */
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        form {
            background: #ffffff; /* White background for the form */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #007bff; /* Blue border */
            border-radius: 5px;
        }
        input[type="submit"] {
            background: #007bff; /* Blue background */
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #0056b3; /* Darker blue on hover */
        }
    </style>
</head>
<body>
    <h2>Edit User</h2>
    <form method="post">
        <input type="text" name="username" value="<?= $user['username'] ?>" required>
        <input type="text" name="password" value="<?= $user['password'] ?>" required>
 
        <select name="role">
            <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>user</option>
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>admin</option>
            <option value="superadmin" <?= $user['role'] == 'superadmin' ? 'selected' : '' ?>>superadmin</option>
        </select>
        <input type="submit" name="update" value="UPDATE">
    </form>
</body>
</html>
