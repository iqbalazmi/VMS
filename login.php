<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">  
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags --><title>VMS</title>
	<link rel="icon" type="image/png" href="iconhead.png">
	
	<link rel="stylesheet" type="text/css" href="">
	


    <!-- Bootstrap -->
    <link href="bootstrap.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->  

  </head>
  <body>
    <p></p>
	 <br/> <br/> <br/>
    
      <div class="row">
	  <div align=center>
	  <img src="logo.gif" width='700' height='300'></div>
 <p><center><label><font size="7">Visitor Management System</font></label> </center> </p>
          <div class="col-md-4"></div>
            <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-body">
                <?php 
                include "config.php";
                if(isset($_POST['username']) && isset($_POST['password'])){
                        $username = $_POST['username'];
                        $password = ($_POST['password']);
                        $stmt = $db ->prepare("SELECT * FROM login WHERE username=? AND password=?");
                        $stmt->bindParam(1, $username);
                        $stmt->bindParam(2, $password);
                        $stmt->execute();
                        $row = $stmt->fetch();
                        $user = $row['username'];
                        $pass = $row['password'];
                        $id = $row['id'];
						$emp_id = $row['emp_id'];
                        $type = $row['type'];
                        $name = $row['name'];
                        if ($username==$user && $pass==$password){
                            session_start();
                            $_SESSION['username'] = $user;
                            $_SESSION['password'] = $pass;
                            $_SESSION['id'] = $id;
							$_SESSION['emp_id'] = $emp_id;
                            $_SESSION['type'] = $type;
                            $_SESSION['name'] = $name;
                            if($type=='HOS'){
                            ?>
                            <script>window.location.href='pages/HOS/index.php'</script>
                            <?php 
                        } else if($type=='Admin'){
                            ?>
                            <script>window.location.href='pages/Admin/index.php'</script>
							 <?php 
                        } else if($type=='Super Admin'){
                            ?>
                            <script>window.location.href='pages/SuperAdmin/index.php'</script>
							 <?php 
                        } else if($type=='Security'){
                            ?>
                            <script>window.location.href='pages/Security/index.php'</script>
                            <?php
                            }
                          } else{
                            ?>
                          <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <strong>Warning!</strong>&nbsp; Your Username or Password may wrong, Please try again! .
                          </div>
                          <?php
                      }
                }
                ?>
                  <form method="post">
                  <form> 
				  <div align=center>
				   <img src="icon.jpg" width='64' height='64'></div>
                    <div class="form-group">
                     <label>Username</label>
                      <input type="text" class="form-control" autocomplete="off" name="username" placeholder="Username" />
                       </div>
                       <div class="form-group">
                      <label>Password</label>
                     <input type="password" class="form-control" autocomplete="off" name="password" placeholder="Password"  />
                    </div>
                  <input type="submit" value="Login" class="btn btn-primary"/>
				  <br></br>
				  <div class="panel panel-warning">
                        <div class="panel-heading">
                            <i class="fa fa-user fa-fw"></i> <strong>If Any Problem, Please Contact System Admin</strong>
                        </div>
                      
                    </div>
                </form>
              </div>
             </div>
            </div>  
           <div class="col-md-4"></div>
          </div>
         </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap.min.js"></script>
  </body>
</html>