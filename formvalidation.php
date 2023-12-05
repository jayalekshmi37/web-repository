
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
		background-color:#eedd82 
        }

        form {
            max-width: 400px;
            margin: 20px auto;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
<h2><center>REGISTRATION FORM</center></h2>

<?php
$nameErr = $emailErr = $passwordErr =$dobErr= $addressErr="";
$name = $email = $password = $dob=$address="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $nameErr = "Only letters and white space allowed";
        }
    }
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

 if (empty($_POST["dob"])) {
        $passwordErr = "Date of birth is required";
    } else {
        $dob = test_input($_POST["dob"]);
	}
}

    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        // You can add more complex password validation if needed
    }
 if (empty($_POST["address"])) {
        $addressErr = "Address is required";
    } else {
        $address = test_input($_POST["address"]);
        // You can add more complex password validation if needed
    }


function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?php echo $name; ?>">
    <span class="error"><?php echo $nameErr; ?></span>

    <br>

    <label for="email">Email:</label>
    <input type="text" name="email" id="email" value="<?php echo $email; ?>">
    <span class="error"><?php echo $emailErr; ?></span>

    <br>
<label for="dob">Date of birth:</label>
<input type="text" name="dob" id="dob" value="<?php echo $dob; ?>">
    <span class="error"><?php echo $dobErr; ?></span>
<br>
<label for="address">Address:</label>
    <input type="address" name="address" id="address" value="<?php echo $address; ?>">
    <span class="error"><?php echo $addressErr; ?></span>
<br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password" value="<?php echo $password; ?>">
    <span class="error"><?php echo $passwordErr; ?></span>
    
    <br>
    
    <button type="submit">Register</button>
</form>

</body>
</html>