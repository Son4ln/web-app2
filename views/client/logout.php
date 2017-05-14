<?php
        include '../views/client/header.php';
    ?>
<section class="section white" style="text-align: left;">
    <div class="container">
    <?php
        if($action =="logout"){
            if (isset($_SESSION['check'])){
            $_SESSION = array();
            session_destroy();
                echo "<center><h3>Congratulations, you have successfully logged out!</h3>
                <p><a href='?action=home'>Back to Homepage</a></p><br /></center>";
            }
        } else{
            if(isset($messages)){
                echo $messages;
            }
            echo "<center><h3>Congratulations, you have successfully updated</h3>
                    <p><a href='?action=home'>Back to Homepage</a></p><br /></center>";

        }

        ?>
                </div>
            </div>
        </div>
</section>
<?php
    include '../views/client/footer.php';?>

