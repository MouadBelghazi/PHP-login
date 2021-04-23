<?php  
if (isset($_GET['sbtn'])){
session_start();
$_SESSION['user'] = $_GET['username'];

	$username = $_GET['username'];
	$password = $_GET['password'];

	$getuserdata = file_get_contents("data.json");
	$json = json_decode($getuserdata);

	$length = count($json);

	for ($i=0; $i < $length; $i++) { 
	
		if ($username == $json[$i]->username && $password == $json[$i]->Password) {
			header("location: welcome.php?msg=logged in!");
		break;
		}
		else{
			header("location: index1.php?msg=error!");
		}
	}
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css"></head>

<body>

<?php
$message = '';
$error = '';
if (isset($_POST["signup"])) {
  if (empty($_POST["username"] && $_POST["Email"] && $_POST["Password"])) {
        $error = "<label>Fill the Inputs</label>";
    } else {
        if (file_exists('data.json')) {
            $current_data = file_get_contents('data.json');
            $array_data = json_decode($current_data, true);
            $extra = array(
                'username'=>$_POST['username'],
                'Email'=>$_POST["Email"],
                'Password'=>$_POST["Password"],
        
            );
            $array_data[] = $extra;
            $final_data = json_encode($array_data);
            if (file_put_contents('data.json', $final_data)) {
                $message = "<label>Account created</p>";
            }
        } else {
            $error = 'JSON File not exits';
        }
    false;
  }
}

?>

<?php
            if (isset($error)) {
                echo $error;
            }
            ?>
<?php
  include "head.php";
  ?>
  <html>
<form method="post">
<div class="form-structor">
	<div class="signup">
		<h2 class="form-title"  id="signup"><span>or</span>Sign up</h2>
		<div class="form-holder">
		
			<input type="text" class="input" placeholder="Name"  name="username"/>
			<input type="email" class="input" placeholder="Email"  name="Email" />
			<input type="password" class="input" placeholder="Password" name="Password" />
		</div>
		
		<button class="submit-btn" href="logincode.php" type="submit" name="signup" value="signup" >Sign up</button>
	
	</div>
	</form>
	<form action="" method="GET">
	<div class="login slide-up">
		<div class="center">
			<h2 class="form-title" id="login"><span>or</span>Log in</h2>
			<div class="form-holder">
				<input  class="input" placeholder="Email"  type="text" name="username"  />
				<input class="input" placeholder="Password"  type="password" name="password" />
			</div>
			<button name="sbtn" class="submit-btn">Log in</button>
		</div>
	</div>
</div>
</form>
<script>
console.clear();

const loginBtn = document.getElementById('login');
const signupBtn = document.getElementById('signup');

loginBtn.addEventListener('click', (e) => {
	let parent = e.target.parentNode.parentNode;
	Array.from(e.target.parentNode.parentNode.classList).find((element) => {
		if(element !== "slide-up") {
			parent.classList.add('slide-up')
		}else{
			signupBtn.parentNode.classList.add('slide-up')
			parent.classList.remove('slide-up')
		}
	});
});

signupBtn.addEventListener('click', (e) => {
	let parent = e.target.parentNode;
	Array.from(e.target.parentNode.classList).find((element) => {
		if(element !== "slide-up") {
			parent.classList.add('slide-up')
		}else{
			loginBtn.parentNode.parentNode.classList.add('slide-up')
			parent.classList.remove('slide-up')
		}
	});
});
</script>
</body>
</html>
