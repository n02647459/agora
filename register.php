<?php
require_once 'settings.php';
require_once 'data.php';
require_once 'data/user.php';
require_once 'administration.php';

// Varies depending on whether or not there is a user signed in and he/she has user create authorization
function registerFormView()
{
?>
	<form class="form-horizontal" action="register.php" method="post">
		<fieldset>
			<legend>Register</legend>
			<div class="form-group">
				<label class="col-md-2 control-label" for="username">Username</label>
				<div class="col-md-4">
					<input id="username" name="username" type="text" placeholder="Username" class="form-control input-md">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label" for="first">First Name</label>
           	   	<div class="col-md-4">
					<input id="first" name="first" type="text" placeholder="First" class="form-control input-md">
            	</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label" for="last">Last Name</label>
           	   	<div class="col-md-4">
					<input id="last" name="last" type="text" placeholder="Last" class="form-control input-md">
            	</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label" for="password1">Password</label>
				<div class="col-md-4"><input id="password1" name="password1" type="password" placeholder="Password" class="form-control input-md"></div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label" for="password2">Repeat Password</label>
				<div class="col-md-4"><input id="password2" name="password2" type="password" placeholder="Repeat Password" class="form-control input-md"></div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label" for="email">Email</label>
           	   	<div class="col-md-4">
					<input id="email" name="email" type="text" placeholder="Email" class="form-control input-md">
            	</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 control-label" for="singlebutton">Register</label>
				<div class="col-md-2">
					<button id="singlebutton" name="singlebutton" class="btn btn-primary">Submit</button>
				</div>
<?php
				if (getUserID() == -1)
				{
					echo '<div class="col-md-2">
						<a href="login.php">Already registered?</a>
					</div>';
				}
				?>
			</div>
		</fieldset>
	</form>
<?php
}

$username = $_POST['username'];

include 'include/header.php';
// Probably should reverse the order of the if statements to reduce repeating code
if ($username == '')
{
	$id = getUserID();
	if (($id == -1 && checkAllowsUserRegistration()) || userRoleIncludes(USER_PERMISSION_EDIT_USER))
	{
		if ($id != -1)
		{
			include 'menu.php';
			?>
			<div class="row">
				<?php displayAdminPanel();?>
				<div class = "col-md-10">
					<div class="panel panel-default">
						<div class="panel-heading">
							Add User
						</div>
						<div class="panel-body">
			<?php
		}
		registerFormView();
		if ($id != -1)
		{
			echo '</div></div></div></div>';
		}
	} else
	{
		header("Location: index.php");
	}
} else
{
	if (($id == -1 && checkAllowsUserRegistration()) || userRoleIncludes(USER_PERMISSION_EDIT_USER))
	{
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
		
		if (validatePassword($password1, $password2))
		{
			$user = new User($username, $password1, getDefaultUserRole(), $_POST['email'], $_POST['first'], $_POST['last'], -1);
			User::addUser($user);
			if ($getUserID() == -1)
				header('Location: login.php');
			else
				header('Location: index.php');
		}
	} else
	{
		header("Location: index.php");
		die();
	}
}
include 'include/footer.php';
?>