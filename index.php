<?php
    namespace Fn\WebtCoreComposerForPhpProjects;
    require './src/QRCode.php';
    require './vendor/autoload.php';
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>QRCode</title>
    <style>
		body {
			background-color: #282828;
			color: white;
			font-family: 'Arial', sans-serif;
		}
		h1 {
			text-align: center;
			font-size: 48px;
			margin-top: 50px;
			margin-bottom: 50px;
			text-transform: uppercase;
			letter-spacing: 2px;
		}
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-bottom: 50px;
		}
		input {
			padding: 10px;
			border: none;
			background-color: #404040;
			color: white;
			margin-right: 10px;
			margin-bottom: 10px;
			border-radius: 5px;
			width: 300px;
		}
		button {
			padding: 10px;
			border: none;
			background-color: #0099cc;
			color: white;
			border-radius: 5px;
			cursor: pointer;
			width: 100px;
		}
		button:hover {
			background-color: #006699;
		}
		img {
			display: block;
			margin: 0 auto;
			max-width: 100%;
		}
	</style>
</head>
<body>

    <h1>GenerateQR-Code</h1>

    <form method="get">
        
            <input type="tel" name="phone" placeholder="Phonenumber">
            <button type="submit">Generate</button>
        
    </form>

    <?php
        if (isset($_GET['phone'])) {
            $QR = new QRCode($_GET['phone'], 300);
            echo '<img src="' . $QR->getURI() . '" />';
        }
    ?>
    </main>
</body>
</html>