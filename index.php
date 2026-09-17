<?php
// 1. Initializing
session_start();
// echo "My ID is: " . session_id();
$isLoggedIn = isset($_SESSION['user_name']);
// if ($isLoggedIn) {
//     // Access the name you saved in login.php
//     echo "Logged in as: " . htmlspecialchars($_SESSION['user_name']);
// } else {
//     echo "Not logged in.";
// }

$error_message = "";
$success_message = "";
$host = "127.0.0.1";
$db_user = "root";
$db_pass = "";
$db_name = "DTDD";
$port = 3307;

$conn = new mysqli($host, $db_user, $db_pass, $db_name, $port);
// Host, Username, Password, Database Name, Port (optional), Socket(optional)
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $conn->select_db($db_name);

$products = [];

$sql = "SELECT madt, tendt, mahang, gia, thongsokythuat, hinhanh FROM Dienthoai";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/a4213e3466.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="top-marquee">
        <marquee scrollamount="10">
            📱 GIẢM GIÁ CHỚM NHOÁNG: NÂNG CẤP ĐỈNH CAO! 📱-
            ✨ Trải Nghiệm Tương Lai Ngay Trong Tầm Tay ✨-
            ⚡ Kết Nối 6G Siêu Tốc (Không còn lo giật lag!) 🌐-
            🔋 Pin Trụ Vững 3 Ngày (Năng lượng cho cả tuần dài!) 🔋-
            🌈 Màn Hình Retina Sống Động (Màu sắc chưa từng có!) 🎨-
            🎈 TẶNG KÈM Tai nghe không dây cho mỗi đơn hàng! 🎧-
            🎈 GIẢM 50% tất cả các dòng ốp lưng bảo vệ! 🛡️-
            🎈 Trả Trước 0 Đồng dành cho sinh viên đủ điều kiện! 🎓
        </marquee>
    </div>
    <div id="mainnav">
        <div class="mainnav-main-container">
            <div class="logo">
                <div><span> ZETA MOBILE </span></div>
                <div><span> ZETA MOBILE </span></div>
            </div>
            <div class="search-bar">
                <input id="search-input" type="text" name="search-input" placeholder="Điện thoại Xiaomi 17 Ultra trả góp 0% ..."></input>
                <div class="search-btn">
                    <label for="search-input">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </label>
                </div>
            </div>
            <div class="notify-btn"><i class="fa-regular fa-bell"></i></div>
            <div class="user-container" style="position: relative;">
                <div class="user">
                    <?php if ($isLoggedIn): ?>
                        <i style="color: white;
                        border: 1px solid white;
                        padding: 5px;
                        border-radius: 50%;
                        " class="fa-solid fa-user"></i>
                    <?php else: ?>
                        <i class="fa-regular fa-user"></i>
                    <?php endif; ?>
                </div>
                <div class="user-dropdown">
                    <?php if ($isLoggedIn): ?>
                        <p style="font-weight: bold;"><?php echo htmlspecialchars($_SESSION['user_name']); ?></p>
                        <button id="logoutBtn" class="logout-btn">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </button>
                    <?php else: ?>
                        <?php if (!$isLoggedIn): ?>
                            <p style=""><?php echo 'Guest'; ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="menu-container" style="position: relative;">
                <div class="menu"><i class="fa-solid fa-bars"></i></div>
                <div class="menu-dropdown">
                    <a href="Login.php">
                        <span>ĐĂNG NHẬP</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="banner">
        <div class="banner-main-container">
            <div style="flex: 1; padding-right: 10px;">

                <div class="banner-sub-02">
                    <div style="
                    overflow: hidden;
                    width: 100%;
                    height: 100%;
                    position: relative;
                    ">

                        <image style="
                        width: 100%;
                        position: relative;
                        border-radius: 15px;
                        top: 50%;
                        transform: translateY(-50%);
                        
                        " src="images/anhDT/bannerProMax.png">
                    </div>
                </div>
            </div>
            <div class="banner-sub-01">
                <div style="
                    overflow: hidden;
                    width: calc(100% - 15px * 2);
                    height: calc(100% - 15px * 2);
                    position: relative;
                    border-radius: 15px;
                    margin: 15px;
                    /* box-shadow: inset 5px 5px 10px rgba(0, 0, 0, 0.5); */
                    ">

                    <!-- <image style="
                        width: 100%;
                        position: relative;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        border-radius: 10px;
                        " src="images/anhDT/banner05.png"
                    > -->
                    <video
                        autoplay
                        muted
                        loop
                        style="
                        position: relative;
                        height: 100%;
                        top: 50%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                    "
                        src="images/anhDT/xiaomivid.mp4">
                </div>
            </div>
        </div>
        <div id="products">
            <div class="products-main-container">
                <div class="products-sub-01">
                    <div class="top-fade-bg"></div>
                    <ul>
                        <li>
                            <span
                                style="
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                ">
                                <span>
                                    <image style="
                                    height: 20px;
                                    aspect-ratio: 1/1;
                                    position: relative;
                                    /* border-radius: 15px; */
                                    /* top: 50%; */
                                    /* transform: translateY(-50%); */
                                    
                                    " src="images/anhDT/Redmi15.jpg">
                                </span>

                                <span>XIAOMI</span>
                            </span><i class="fa-solid fa-right-to-bracket"></i>
                        </li>
                        <li>
                            <span
                                style="
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                ">
                                <span>
                                    <image style="
                                    height: 20px;
                                    aspect-ratio: 1/1;
                                    position: relative;
                                    /* border-radius: 15px; */
                                    /* top: 50%; */
                                    /* transform: translateY(-50%); */
                                    
                                    " src="images/anhDT/16ProMax.jpg">
                                </span>

                                <span>SAMSUNG</span>
                            </span><i class="fa-solid fa-right-to-bracket"></i>
                        </li>
                        <li>
                            <span
                                style="
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                ">
                                <span>
                                    <image style="
                                    height: 20px;
                                    aspect-ratio: 1/1;
                                    position: relative;
                                    /* border-radius: 15px; */
                                    /* top: 50%; */
                                    /* transform: translateY(-50%); */
                                    
                                    " src="images/anhDT/I25ULTRA.jpg">
                                </span>

                                <span>APPLE</span>
                            </span><i class="fa-solid fa-right-to-bracket"></i>
                        </li>
                        <li>
                            <span
                                style="
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                ">
                                <span>
                                    <image style="
                                    height: 20px;
                                    aspect-ratio: 1/1;
                                    position: relative;
                                    /* border-radius: 15px; */
                                    /* top: 50%; */
                                    /* transform: translateY(-50%); */
                                    
                                    " src="images/anhDT/A17.jpg">
                                </span>

                                <span>MOTOROLA</span>
                            </span><i class="fa-solid fa-right-to-bracket"></i>
                        </li>
                        <li>
                            <span
                                style="
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                ">
                                <span>
                                    <image style="
                                    height: 20px;
                                    aspect-ratio: 1/1;
                                    position: relative;
                                    /* border-radius: 15px; */
                                    /* top: 50%; */
                                    /* transform: translateY(-50%); */
                                    
                                    " src="images/anhDT/A172.jpg">
                                </span>

                                <span>NOKIA</span>
                            </span><i class="fa-solid fa-right-to-bracket"></i>
                        </li>
                        <li>
                            <span
                                style="
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                ">
                                <span>
                                    <image style="
                                    height: 20px;
                                    aspect-ratio: 1/1;
                                    position: relative;
                                    /* border-radius: 15px; */
                                    /* top: 50%; */
                                    /* transform: translateY(-50%); */
                                    
                                    " src="images/anhDT/RedmiNote14.jpg">
                                </span>

                                <span>SONY</span>
                            </span><i class="fa-solid fa-right-to-bracket"></i>
                        </li>
                        <li>
                            <span
                                style="
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                ">
                                <span>
                                    <image style="
                                    height: 20px;
                                    aspect-ratio: 1/1;
                                    position: relative;
                                    /* border-radius: 15px; */
                                    /* top: 50%; */
                                    /* transform: translateY(-50%); */
                                    
                                    " src="images/anhDT/S25+.jpg">
                                </span>

                                <span>GOOGLE</span>
                            </span><i class="fa-solid fa-right-to-bracket"></i>
                        </li>
                        <li>
                            <span
                                style="
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                ">
                                <span>
                                    <image style="
                                    height: 20px;
                                    aspect-ratio: 1/1;
                                    position: relative;
                                    /* border-radius: 15px; */
                                    /* top: 50%; */
                                    /* transform: translateY(-50%); */
                                    
                                    " src="images/anhDT/S26+.jpg">
                                </span>

                                <span>TESLA</span>
                            </span><i class="fa-solid fa-right-to-bracket"></i>
                        </li>
                    </ul>
                    <div style="
                    display: flex;
                    flex-direction: column;
                    justify-content: space-between;
                    align-items: space-between;
                    overflow: hidden;
                    flex: 1;
                    /* background-color: tomato; */
                    /* aspect-ratio: 1/1; */
                    position: relative;
                    ">

                        <img style="
                        width: 100%;
                        aspect-ratio: 1/1;
                        position: relative;
                        
                        border-radius: 10px;
                       
                        " src="images/anhDT/banner06.png">
                        <img style="
                        width: 100%;
                        position: relative;
                        aspect-ratio: 1/1;
                        border-radius: 10px;
                        
                        " src="images/anhDT/banner10.png">
                        <img style="
                        width: 100%;
                        position: relative;
                        aspect-ratio: 1/1;
                        border-radius: 10px;
                        
                        " src="images/anhDT/banner08.png">
                    </div>

                </div>
                <div style="flex: 1; padding-left: 10px; height: 100%; display: flex; flex-direction: column;">
                    <div style="
                        padding: 5px;
                    ">
                        <div class="products-sub-02-title"><span> SẢN PHẨM MỚI 2026</span></div>
                    </div>
                    <div class="products-sub-02">
                        <div class="top-fade"></div>
                        <div class="bot-fade"></div>
                        <ul class="product-list">
                            <div class="top-fade-bg"></div>
                            <?php foreach ($products as $item): ?>
                                <li>
                                    <?php
                                    $randomNum = mt_rand(1, 5);
                                    ?>
                                    <div class="product-title">
                                        <!-- <marquee scrollamount="4"> -->
                                            <a>
                                                <?php echo htmlspecialchars($item['tendt']); ?>
                                            </a>
                                        <!-- </marquee> -->
                                    </div>
                                    <div class="product-img">
                                        <div>
                                            <?php
                                            $randomNumber = mt_rand(1, 2);
                                            ?>
                                            <?php if ($randomNumber === 1): ?>
                                                <span
                                                    style="
                                                    border-color: rgb(121, 48, 144);
                                                    color: rgb(121, 48, 144);
                                                    ">
                                                    <?php
                                                    $randomName = mt_rand(1, 3);
                                                    echo ($randomName === 1) ? 'New' : (($randomName === 2) ? '2026' : 'Bán chạy');
                                                    ?>

                                                </span>
                                            <?php endif ?>
                                            <span>
                                                <?php
                                                echo '-' . $randomNum * 10 . '%' ?>
                                            </span>
                                        </div>
                                        <img src="images/anhDT/<?= $item['hinhanh'] ?>" />
                                    </div>
                                    <div class="product-specs">
                                        <p>
                                            <?php echo $item['thongsokythuat']; ?>
                                        </p>
                                    </div>
                                    <div class="product-text">
                                        <p style="
                                        margin: 0;
                                        font-weight: bold;
                                        ">
                                            <?php echo number_format($item['gia'] - $item['gia'] * $randomNum * 0.1, 0, '.', ','); ?> VNĐ
                                        </p>
                                        <strike>
                                            <p style="
                                            margin: 0;
                                            font-size: 11px;
                                            color: rgb(194, 194, 194);
                                            ">
                                                <?php echo $item['gia']; ?>đ
                                            </p>
                                        </strike>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <footer>
            <div class="footer-main">
                <div class="footer-sub-01">
                    <h4>
                        Đăng ký ngay để nhận thông tin ưu đãi!
                    </h4>
                    <label>
                        Email:
                    </label>
                    <input type="Email">
                    <button>
                        OK
                    </button>
                    <p>
                        Nhận cập nhật hàng tuần và thông tin nâng cấp hệ thống vào inbox của bạn.
                    </p>
                    <div>
                        <i class="fa-brands fa-facebook" style="color: steelblue;"></i>
                        <i class="fa-brands fa-twitter" style="color: rgb(85, 190, 243);"></i>
                        <i class="fa-brands fa-youtube" style="color: red;"></i>
                        <i class="fa-brands fa-instagram" style="color: magenta;"></i>
                        <i class="fa-brands fa-bilibili" style="color: aqua;"></i>
                    </div>
                </div>
                <div class="footer-sub-02">
                    <p>
                        <b>Về chúng tôi (About Us):</b> "Thành lập từ năm 2018, chúng tôi là đội ngũ gồm các kỹ sư và nhà thiết kế tận tâm xây dựng thế hệ phần cứng di động tiếp theo. Sứ mệnh của chúng tôi là mang công nghệ hiệu suất cao đến với mọi người."
                    </p>
                    <hr style="
                    border: none;  
                    border-top: 1px solid rgb(222, 222, 222);
                    width: 50%;
                    margin-left: 0;
                    ">
                    <ul>
                        <li>
                            <b>Tuyển dụng (Careers)</b>

                        </li>

                        <li>
                            <b>Bộ nhận diện truyền thông (Press Kit)</b>

                        </li>

                        <li>
                            <b>Nhà đầu tư (Investors)</b>

                        </li>

                        <li>
                            <b>Chính sách bảo mật (Privacy Policy)</b>

                        </li>

                        <li>
                            <b>Điều khoản dịch vụ (Terms of Service)</b>

                        </li>

                        <li>
                            <b>Khả năng tiếp cận (Accessibility)</b>

                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-main">
                <p>
                    © 2026 Zeta Mobile. All rights reserved.
                </p>
            </div>
        </footer>
        <script src="script.js">
        </script>
</body>

</html>