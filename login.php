<?php
    //Include Server file
    include('server.php');
    // Required footer file
    require('./header.php');
?>
        
        <div class="container d-flex flex-column justify-content-center vertical-center">
            
            <?php if(isset($_SESSION['username'])): ?>
            <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['success']; ?>
            </div>
            <?php endif; ?>
            <h1 class="mb-4">Login Page</h1>
            <!-- Login Form -->
            <form action="login.php" method="POST" class="text-center">
                <?php include('errors.php');?>
                <div class="form-group">
                <label for="user_id">Username</label>
                <input type="text" class="form-control" id="user_id" name="username" required>
                </div>
                <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <small id="password" class="form-text text-muted">We'll never share your info with anyone else.</small>
                </div>
                <button type="submit" class="btn btn-primary" name="log_user">Login</button>
            </form>
            <!-- !Login Form -->
            <h6 class="mt-3">Not Registered Yet ? <a href="registration.php"><strong>Register Now</strong></a></h6>
        </div>

<?php
    // Required footer file
    require('./footer.php');
?>