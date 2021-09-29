<?php
// require_once("config/config.php");
?>
Hey, <?php echo $_SESSION['user_name']; ?>. You are logged in.
Your books: <?php
?>
<div class="container">
<div class="card-group">
    <div class='row'>
        <?php
        $liqry = $con->prepare("SELECT bibliotheekid, title, author, isbn13, format, publisher, pages, dimensions, overview FROM bibliotheek");
        if ($liqry === false) {
            echo mysqli_error($con);
        } else {
            $liqry->bind_result($id, $title, $author, $isbn13, $format, $publisher, $pages, $dimensions, $overview);
            if ($liqry->execute()) {
                $liqry->store_result();
                while ($liqry->fetch()) { 
                    if ($pages == "") {
                        $pages = "undefined";
                    }
                    ?>
                    
                    <?php
                    $locationonclick = "' onclick='location.href=\"login.php?id=" . $id . "\"'";
                    ?>
                    <div class='col-md-3 '>
                        <div class='mr-2'>
                            <div class='card' <?php echo $locationonclick  ?>>
                                <!-- <img class='card-img-top' src='assets/img/product.png' alt='Card image cap'> -->
                                <div class='card-body'>
                                    <h5 class='text-center'><?php echo $title ?></h5>
                                    <p class='card-text'>Author: <?php echo $author?></p>
                                    <p class='card-text'>Pages: <?php echo $pages?></p>
                                </div>
                                <div class='read-more-place'>
                                    <button class='btn btn-outline-success mb-2 mr-4 float-right'><b>Lenen</b></button>
                                </div>
                                <!-- <div class='card-footer'>
                                    <small class='text-muted float-right'>dit zijn producten xD</small>
                                </div> -->
                            </div>
                        </div>
                    </div>

        <?php
                }
            }

            $liqry->close();
        }

        ?>
    </div>
</div>
</div>


<a href="index.php?logout">Logout</a>