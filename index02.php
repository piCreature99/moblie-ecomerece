<?php
    $conn = mysqli_connect("127.0.0.1", "root", "", "dangky_test", "3307");
    $items = [];

    if(isset($_POST["submit01"])){
        $name = $_POST["input"];
        // mysqli_query($conn, "INSERT INTO taikhoan (name) VALUES ('$name');");
        $result = mysqli_query($conn, "SELECT * FROM taikhoan");
        while($row = mysqli_fetch_assoc($result)){
            $items[] = $row;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="input">Enter your text</label>
        <input type="text" name="input" placeholder="enter here..." />
        <button type="submit" name="submit01">Submit</button>
    </form>
    <?php if(isset($_POST["input"])): ?>
        <div style="display: flex; background-color: gray; width: 500px; height:500px; flex-wrap: wrap; justify-content: center; align-items: center; padding: 5px; gap: 5px; border-radius: 10px; overflow-y: auto;">

            <?php foreach ($items as $item): ?>
                <div
                style="background-color: darkgray; border: 1px solid white; border-radius: 10px; padding: 5px; box-sizing: border-box;;
                width: calc(100% / 3 - 10px / 3)"
                >
                
                <div
                style="
                box-sizing: border-box;
                "
                >
                <?php echo $item["name"]; ?>
            </div>

                <div style="width: 100%;
                aspect-ratio: 1/1;
                background-color: gray;;
                border-radius: 5px;
                ">
                    
                </div>
                </div>
                <?php endforeach; ?>
            </div>
    <?php endif; ?>
</body>
</html>