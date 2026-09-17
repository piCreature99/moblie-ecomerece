<?php
//1. Initializing
$errorMessage = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$username = $_POST["username"] ?? '';
	$password = $_POST["password"] ?? '';
	$passwordConfirm = $_POST["password-confirm"] ?? '';
	$email = $_POST["email"] ?? '';
	$gender = $_POST["gender"] ?? '';
	$birthday = $_POST["birthday"] ?? '';
	$sdt = $_POST["sdt"] ?? '';
	$textArea = $_POST["text-area"] ?? '';

	// DB connection
	$host = '127.0.0.1';
	$db_user =  "root";
	$db_pass = "";
	$db_name = "DangKy";
	$port = 3307;
	// DB conn setup

	$conn = new mysqli($host, $db_user, $db_pass, "", $port);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	$conn->select_db($db_name);

	if ($password !== $passwordConfirm && $password === "") {
		$errorMessage = "Nhập lại mật khẩu không đúng." . $password . $passwordConfirm;
	} else {
		$errorMessage = "Đăng ký thành công!";

		$stmt = $conn->prepare("INSERT INTO `taikhoan`
		(`TenDangNhap`, 
		`MatKhau`, 
		`Email`, 
		`GioiTinh`, 
		`NgaySinh`, 
		`SDT`, 
		`GhiChu` 
		) VALUES (?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssss", $username, $password, $email, $gender, $birthday, $sdt, $textArea);

		$stmt->execute();
	}
}
?>

<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Untitled Document</title>
	<link href="style-reg.css" rel="stylesheet" type="text/css">
</head>

<body>
	<h1>ĐĂNG KÝ TÀI KHOẢN</h1>
	<form class="form" name="" action="" method="POST">
		<table class="form-table">
			<tr>
				<td style="padding: 0; display: flex; justify-content: center;">
				<!-- <p>HelloASDFSAKDFJ</p> -->
				<!-- <p style="color: green; font-weight: bold; text-align: center;">SSFG</p> -->
				<?php if ($errorMessage): ?>
					<p style="color: green; font-weight: bold;"><?php echo $errorMessage; ?></p>
				<?php endif ?>
				</td>
			</tr>
			<tr>
				<td class="form-table-data">
					<label for="username">Tên đăng nhập:</label>
					<input required id="username" type="text" name="username" placeholder="username" tabindex="1">
				</td>
			</tr>
			<tr>
				<td class="form-table-data">
					<label for="password">Mật khẩu:</label>
					<input required id="password" type="password" name="password" placeholder="password" tabindex="2">
				</td>
			</tr>
			<tr>
				<td class="form-table-data">
					<label for="password-comfirm">Xác nhận mật khẩu:</label>
					<input required id="password-confirm" type="password" name="password-confirm" placeholder="password-confirm" tabindex="2">
				</td>
			</tr>
			<tr>
				<td class="form-table-data">
					<label for="email">Email:</label>
					<input required id="email" type="email" name="email" placeholder="name123@gmail.com" tabindex="5" maxlength="50">
				</td>
			</tr>
			<tr>
				<td class="form-table-data">
					<label for="sdt">Số điện thoại:</label>
					<input required type="text" name="sdt" placeholder="vd: 0802233534" tabindex="5" maxlength="50">
				</td>
			</tr>
			<tr>
				<td class="form-table-data">
					<label for="birthday">Năm sinh:</label>
					<input required type="date" name="bỉthday" tabindex="5">
				</td>
			</tr>
			<tr>
				<td class="form-table-data">
					<label for="gender">Giới tính:</label>
					<div>
						Nam<input type="radio" name="gender" value="nam" tabindex="3">
						Nữ<input type="radio" name="gender" value="nu" tabindex="4" checked>
					</div>
				</td>
			</tr>
			<tr>
				<td>
					<label for="text-area">Ghi chú:</label><br>
					<textarea name="text-area" placeholder="notes"></textarea><br>
				</td>
			</tr>
			<tr>
				<td class="submit-area">
					<button type="submit" value="submit-message" name="name">Tạo tài khoản</button>
				</td>
			</tr>
			<tr>
				<td>
					<a href="Login.php">Đã có tài khoản? Đăng nhập.</a>
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
</body>

</html>