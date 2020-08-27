<?php
    //Include Server file
    include('server.php');
    // Required header file
    require('./header.php');
?>
        
    <div class="container d-flex flex-column justify-content-center vertical-center">
        <h1 class="mb-4">Registration Page</h1>
        <!-- Login Form -->
        <form action="registration.php" method="POST" class="text-center w-50">
            <!-- Include errors before user can input anything -->
            <?php include('errors.php')?>
            <div class="form-group row">
                <label for="user_email" class="col-sm-4 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="user_email" name="email" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="username" class="col-sm-4 col-form-label">Username</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="user_password" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="user_password" name="password_1" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="user_password" class="col-sm-4 col-form-label">Confirm Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="user_password" name="password_2" required>
                </div>
            </div>
            <small id="password" class="form-text text-muted">We'll never share your info with anyone else.</small>
            <button type="submit" class="btn btn-primary mt-2" name="reg_user">Submit</button>
        </form>
        <!-- !Login Form -->
        <h6 class="mt-3">Already Registered ? <a href="login.php"><strong>Log In</strong></a></h6>
    </div>

<?php
    // Required footer file
    require('./footer.php');
?>