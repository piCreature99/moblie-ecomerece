<?php
// Hello
// 1. Initializing (Like your Go setup)
session_start(); // Always call this before touching $_SESSION
// echo "My ID is: " . session_id();
$error_message = "";
$success_message = "";

// 2. Check if the form was submitted (Like r.Method == "POST")
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$username = $_POST['username'] ?? '';
	$password = $_POST['password'] ?? '';

	// --- DATABASE CONNECTION (MySQLi) ---
	$host = "127.0.0.1"; // Use 127.0.0.1 instead of 'localhost' for custom ports
	$db_user = "root";
	$db_pass = "";
	$db_name = "DangKy";
	$port = 3307; // Your custom MySQL port
	

	// 3. DATABASE CONNECTION & SETUP
	// Connect to the server (no DB specified yet)
	$conn = new mysqli($host, $db_user, $db_pass, $db_name, $port);
	// procedural: $conn = mysqli_connect($host, $user, $pass, $db, $port), can also select database directly in here;
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// B. Select the database
	// $conn->select_db($db_name);
	// procedural: mysqli_select_db($conn, $db_name);

	// 4. LOGIN LOGIC

	$stmt = $conn->prepare("SELECT MatKhau, TenDangNhap FROM taikhoan where TenDangNhap = ?");
	// $stmt = mysqli_prepare($conn, ...);
	$stmt->bind_param("s", $username); // "s" means the parameter is a string
	// mysqli_stmt_bind_param($stmt, "s", $u);
	$stmt->execute();
	// mysqli_stmt_execute($stmt);
	// multiple param case: $stmt->bind_param("ssi", $username, $email, $age);
	$result = $stmt->get_result(); // not the data itself yet, require fetch_assoc()
	// $result = mysqli_stmt_get_result($stmt);

	if ($user_row = $result->fetch_assoc()) {

		// C. Check the password
		// For now, we compare plain text because that's how you've saved it.
		// Later, you should use password_verify() for security!
		if ($password === $user_row['MatKhau']) {
			$success_message = "Login Successful! Welcome, " . htmlspecialchars($username);
			echo $user_row['TenDangNhap'];
			//Store only what you need (ID and Name are standard)
			$_SESSION['user_name'] = $user_row['TenDangNhap'];

			// session_write_close();

			header("Location: index.php");
			exit();
		} else {
			$error_message = "Invalid password.";
		}
	} else {
		$error_message = "No user found with that username.";
	}

	// 3. Logic (In a real app, check MySQL on port 3307 here)
	// if ($username === "admin" && $password === "1234") {
	// 	$success_message = "Login Successful!"; // Set this
	// 	// $error_message = "";
	// 	// exit;
	// } else {
	// 	$error_message = "Invalid credentials.";
	// }
	$stmt->close();
	$conn->close();
}
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>U</title>
	<link href="style-log.css" rel="stylesheet" type="text/css">
</head>

<body>
	<h1>ĐĂNG NHẬP</h1>
	<form class="form" name="" action="" method="POST">
		<?php if ($success_message): ?>
			<p style="color: green; font-weight: bold;"><?php echo $success_message; ?></p>
		<?php else: ?>
			<?php if ($error_message): ?>
				<p style="color: red;"><?php echo $error_message; ?></p>
			<?php endif; ?>
		<?php endif; ?>
		<table class="form-table">
			<tr>
				<td class="form-table-data">
					<label for="username">Tên đăng nhập:</label>
					<input id="username" type="text" name="username" placeholder="username" tabindex="1">
				</td>
			</tr>
			<tr>
				<td class="form-table-data">
					<label for="username">Mật khẩu:</label>
					<input id="password" type="password" name="password" placeholder="password" tabindex="2">
				</td>
			</tr>
			<tr>
				<td>
					<label for="chuc-nang">Ghi nhớ đăng nhập</label>
					<input type="checkbox" value="CCTKW">
				</td>
			</tr>
			<tr>
				<td class="submit-area">
					<button type="submit" value="submit-message" name="name">Đăng nhập</button>
				</td>
			</tr>
			<tr>
				<td>
					<a href="register.php">Chưa có tài khoản? Đăng ký ngay.</a>
				</td>
			</tr>
			<tr>
				<td style="padding-top: 0px;">
					<a href="index.php">Trang chủ</a>
				</td>
			</tr>
		</table>
		<!--		size control visual input box length-->
		<!--		value and type are sent to the server to determine -->
	</form>
	<?php
	// $conn=mysqli_connect("localhost", "root", "", "user");
	// if(isset($_POST['login'])){
	// 	$user=$_POST['username'];
	// 	$pass=$_POST['password'];
	// 	$sql="INSERT INTO INSERT INTO `users`(`id`, `username`, `password`) VALUES ('[value-1]','[value-2]','[value-3]')";
	// 	if(mysqli_query($conn, $sql)){
	// 			echo "DKTK";
	// 	}
	// }
	?>
</body>

</html>