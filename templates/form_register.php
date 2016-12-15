
<div>
    <form id="signup" class="form" action="actions/action_register.php" method="post">
        <div class="form_header">
            <h1>Register</h1>
        </div>
	
        <hr class="divider" />
	
        <div class="inputs">
	    <label>First Name</label><input type="text" placeholder="First Name" name="firstname" id="firstname" autofocus />
	    <label>Last Name</label><input type="text" placeholder="Last Name" name="lastname" id="lastname" />
        <label>Username</label><input type="text" placeholder="Username" name="username" id="username" />
	    <label>Email</label><input type="email" placeholder="Email" name="email" id="email" />
        <label>Password</label><input type="password" placeholder="Password" name="password" id="password" />
	    <label>Confirm Password</label><input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" />
	    <label>Reviewer<input type="radio" name="type" value="Reviewer" checked></label>
	    <label>Owner<input type="radio" name="type" value="Owner"></label>
        <input type="submit" id="submit" value="Register"/>
        </div>
    </form>
</div>
