<?php
$dbc = mysqli_connect('localhost', 'root', 'root', 'myrentdocument');
if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
    $userSurName = mysqli_real_escape_string($dbc, trim($_POST['userSurName']));
    $userDadName = mysqli_real_escape_string($dbc, trim($_POST['userDadName']));
    $userEmail = mysqli_real_escape_string($dbc, trim($_POST['userEmail']));
    $userPhone = mysqli_real_escape_string($dbc, trim($_POST['userPhone']));
    $userNumberCreditCard = mysqli_real_escape_string($dbc, trim($_POST['userNumberCreditCard']));
    $userNumberMoney = mysqli_real_escape_string($dbc, trim($_POST['userNumberMoney']));

    if(!empty($username) && !empty($userSurName) && !empty($userDadName) && !empty($userEmail) && !empty($userPhone) && !empty($userNumberCreditCard) && !empty($userNumberMoney)) {
        $query = "SELECT * FROM `rentorderauto` WHERE username = '$username'";
        $data = mysqli_query($dbc, $query);
        if(mysqli_num_rows($data) == 0) {
            $query = "INSERT INTO `rentorderauto` (username, userSurName, userDadName, userEmail, userPhone, userNumberCreditCard, userNumberMoney) VALUES ('$username', '$userSurName','$userDadName', '$userEmail', '$userPhone', '$userNumberCreditCard', '$userNumberMoney')";
            mysqli_query($dbc, $query);
            echo 'Усе готово ваше замовлення прийнято';
            mysqli_close($dbc);
            exit();
        } else {
            echo 'Невірно оформлене замовлення';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авто прокат</title>
    <link rel="stylesheet" href="Style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" />
</head>
<body class="bgReg">
    <header class="menu">

		<label for="checkbox-menu">
			<ul class="menu touch">
				<li><a class = "logo" href="Index.html">SPEED AUTO</a></li>
				<li><a href="Index.html">Home</a></li>
				<li><a href="Rent_page.php">Rent Contract</a></li>
				<li><a href="admin.html">Admin</a></li>
                <li><a href="history_rent.html">History rent</a></li>
                <li><a href="Signup.php">Registration</a></li>
				<li><a href="audentefication.php">Audentification</a></li>
			</ul>
		</label>
            
    </header>
    

	<div class="main-signin">
		<div class="main-signin__head">
			<p>RENT CONTRACT</p>
		</div>
		<div class="main-signin__middle">
			<div class="middle__form">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="text" name="username" placeholder="Name">
                    <input type="text" name="userSurName" placeholder="Surname">
                    <input type="text" name="userDadName" placeholder="Dadname">
                    <input type="text" name="userEmail" placeholder="Email">
                    <input type="text" name="userPhone" placeholder="Phone">
                    <input type="text" name="userNumberCreditCard" placeholder="Number creditcard">
                    <input type="text" name="userNumberMoney" placeholder="Number money">
                    <input type="submit" name="submit" value="SEND">
                </form>
			</div>
		</div>
		<div class="main-signin__foot">
			<div class="foot__left">
				<p>Send order:</p>
			</div>
			<div class="foot__right">
				<div class="twit"><a href="#"></a></div>
				<div class="face"><a href="#"></a></div>
			</div>
		</div>
	</div>
    
    <script src="Script.js"></script>
    
</body>
</html>