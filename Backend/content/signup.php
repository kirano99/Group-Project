<div class="container">
    <form id="signupForm" name="signupForm" action="includes/signup_validation.php" method="POST">
        <label for="email">Email:</label>
        <input type="email" id="email" placeholder="Enter email" name="email" required>

        <label for="firstname">First Name:</label>
        <input type="text" id="firstname" placeholder="Enter first name" name="firstname" required>

        <label for="lastname">Last Name:</label>
        <input type="text" id="lastname" placeholder="Enter last name" name="lastname" required>

        <label for="course">Course:</label>
        <input type="text" id="course" placeholder="Enter course" name="course" required>

        <label for="studentID">Student ID:</label>
        <input type="text" id="studentID" placeholder="Enter student ID" name="studentID" required>

        <label for="pwd">Password:</label>
        <input type="password" id="pwd" placeholder="Enter password" name="password" required>

        <label for="passwordConfirm">Confirm Password:</label>
        <input type="password" id="pwd2" placeholder="Confirm password" name="passwordConfirm" required>

        <button type="submit" class="btn btn-primary">Sign Up</button>
    </form>
</div>
