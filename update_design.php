<?php include("connection.php"); 

$id = $_GET['id'];
$query = "SELECT * FROM form where id='$id'";
$data = mysqli_query($conn, $query);
$result = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>PHP CURD Operations</title>
</head>
<body>
    <div class="container">
        <form action="#" method="POST">
        <div class="title">
            UPDATE STUDENT DETAILS
        </div>
        <div class="form">
            <div class="input_field">
                <label>First Name</label>
                <input type="text" class="input" value="<?php echo $result['fname'];?>" name="fname" required>
            </div>

            <div class="input_field">
                <label>Last Name</label>
                <input type="text" class="input" value="<?php echo $result['lname'];?>" name="lname" required>
            </div>

            <div class="input_field">
                <label>Password</label>
                <input type="password" class="input" value="<?php echo $result['password'];?>" name="password" required>
            </div>

            <div class="input_field">
                <label>Confirm Password</label>
                <input type="password" class="input" value="<?php echo $result['cpassword'];?>" name="conpassword" required>
            </div>

            <div class="input_field">
                <label>Gender</label>
                <div class="custom_select">
                <select name="gender" required>
                    <option value="">Select</option>
                    <option value="female"
                        <?php
                            if($result['gender'] == 'female')
                            {
                                echo "selected";
                            }
                        ?>
                    >Female</option>

                    <option value="male"
                        <?php
                            if($result['gender'] == 'male')
                            {
                                echo "selected";
                            }
                        ?>
                    >Male</option>
                </select>
                </div>
            </div>

            <div class="input_field">
                <label>Email</label>
                <input type="text" class="input" value="<?php echo $result['email'];?>" name="email" required>
            </div>

            <div class="input_field">
                <label>Phone Number</label>
                <input type="text" class="input" value="<?php echo $result['phone'];?>" name="phone" required>
            </div>

            <div class="input_field">
                <label>Address</label>
                <textarea name="address" required><?php echo $result['address'];?></textarea>
            </div>

            <div class="input_field terms">
                <label class="check">
                    <input type="checkbox" required>
                    <span class="checkmark"></span>
                </label>
                <p>Agree to terms and conditions</p>
            </div>

            <div class="input_field">
                <input type="submit" value="Update Detail" class="btn" name="update">
            </div>
        </div>
        </form>
    </div>
</body>
</html>

<?php
    if($_POST['update'])
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $pwd = $_POST['password'];
        $cwd = $_POST['conpassword'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

    $query = "UPDATE form set fname='$fname', lname='$lname', password='$pwd', cpassword='$cwd', gender='$gender', email='$email', phone='$phone', address='$address' WHERE id='$id'";
    $data = mysqli_query($conn, $query);

    if($data)
    {
        echo"<script>alert('Record Updated')</script>";
        ?>
            <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/display.php" />
        <?php
    }
    else{
        echo"Failed";
    }
}
?>