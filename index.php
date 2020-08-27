<?php
    // Required header file
    require('./header.php');

    //Start session
    session_start();

    //***MAKE MAIN PAGE LOG IN ONLY***//
    //If new user just registered...
    if(!isset($_SESSION['username'])){
        $_SESSION['msg'] = "You must log in first to view this page";
        header("Location: login.php");
    }
    //If user log out...
    if(isset($_GET['logout'])){
        session_destroy();
        unset($_SESSION['username']);
        header("Location: login.php");
    }
    //***!MAKE MAIN PAGE LOG IN ONLY***//
?>

<div class="container d-flex flex-column justify-content-center vertical-center">
    
    <?php   if(isset($_SESSION['success'])) : ?>
        
        <div class="alert alert-primary" role="alert">
            <?php 
                        echo $_SESSION['success'];
                        unset($_SESSION['success']);
                        ?>
                </div>
                
                <?php endif; ?>
                
    <h1>Home Page</h1>
    
    <!-- Print info about user -->
    <?php   if(isset($_SESSION['username'])) : ?>
            <h3> Welcome <strong>
                <?php 
                echo $_SESSION['username'];
                ?>
                </strong>
            </h3>
            <!-- Log Out -->
            <h6 class="mt-3">Tired of this page already ? <button type="button" class="btn"><a href="index.php?logout='1'"><strong>Log Out</strong></a></button></h6>
    <?php endif; ?>
</div>
    
<?php
    // Required footer file
    require('./footer.php');
?>
        
        