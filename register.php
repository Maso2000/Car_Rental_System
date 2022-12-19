<?php
include 'resources/partials/header.php';
?>

    <div>
        <form id="register_form" class="form_register" method="POST" action="includes/register.inc.php"
              onsubmit="return validateRegister()">
            <h2>REGISTER</h2>
            <div class="error" id="error"><?php include 'resources/partials/register.validate.php' ?></div>
            <div>
                <label for="name">Name</label>
                <input type="name" id="register_name" name="name" placeholder="Name">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" id="register_email" name="email" placeholder="Email">
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" id="register_password" name="password" placeholder="Password">

            </div>
            <div>
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password">

            </div>

            <div>
                <label for="ssn">SSN</label>
                <input type="text" id="ssn" name="ssn" placeholder="SSN">
            </div>

            <div>
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="address">
            </div>
            <div>
                <label for="phone">Phone</label>
                <input type="phone" id="phone" name="phone" placeholder="phone">
            </div>

            <div>
                <label for="profile_image">Profile Image Link</label>
                <input type="text" id="profile_image" name="profile_image" placeholder="profile image link">
            </div>

            <div>
                <button type="submit" name="submit">Register</button>
            </div>

            <br/>
            <div>
                <p>Already have an account ? <a href="index.php">LOGIN</a></p>
            </div>
        </form>

    </div>

<?php
include 'resources/partials/footer.php';
?>