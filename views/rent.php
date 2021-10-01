<?php
require_once("../config/config.php");
session_start();
$user_name = $_SESSION['user_name'];
$id = $_GET["id"];
$sql = "SELECT * FROM users WHERE user_name='$user_name' ";
$result = mysqli_query($con, $sql);
if(mysqli_num_rows($result) > 0)
{
	while($row = mysqli_fetch_assoc($result))
	{
         echo $id . $user_name;
	}
	
}
    $sql = "UPDATE `users` SET `bibliotheekid`= '$id' WHERE `user_name`= '$user_name'";
    echo $sql;
    echo $id;
    $result = mysqli_query($con, $sql);
    if($result){
        echo '<script type="text/javascript"> alert("Data Update")</script>';
        ?>
        <a href="return.php?id=<?php echo $id;?>">Return book</a>
        <?php
    }
    else{
        echo '<script type="text/javascript"> alert("Data NOT Update")</script>';
    }
?>