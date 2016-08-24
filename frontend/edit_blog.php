<?php
include("../backend/db.php");
//--------checking for session---------------
session_start();
if(!isset($_SESSION['email']))
{
	header("Location:login_form.php");
}
//--------------------------------------------
// $blog_title       = $_SESSION['blog_title'];
// $blog_category    = $_SESSION['blog_cat'];
// $blog_description = $_SESSION['blog_desc'];
$blog_id = $_GET['blog_id'];
$_SESSION['blog_id'] = $blog_id;
$query  = "SELECT * FROM blog_master WHERE blog_id = '$blog_id'";
$exec   = mysqli_query($conn, $query);
$output = mysqli_fetch_array($exec, MYSQLI_ASSOC);
// print_r($output);
$blog_title = $output['blog_title'];
$blog_category = $output['blog_category'];
$blog_description = $output['blog_desc'];
// print_r($blog_title); 
// print_r($blog_category); 
// print_r($blog_description); 
?>


  <!DOCTYPE html>
  <html>
    <head>
      <link rel="stylesheet" type="text/css" href="../materialize/css/materialize.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <div class="navbar-fixed">
        <nav>
          <div class="nav-wrapper indigo">
            <a href="index.php" class="brand-logo" style="padding-left:20px;" >TPB</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
              <li><a href="index.php">Home</a></li>
              <li><a href="blogger_account.php">My Articles</a></li>
              <li><a href="blogger_account_create.php">Create</a></li>
              <li><a href="../backend/login/logout.php">LogOut</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
              <li  style="height:100px;"><a href="index.php"><img src="#" alt="TPB icon"></a></li>
              <li></li>
              <li><a href="index.php">Home</a></li>
              <li><a href="blogger_account.php">My Articles</a></li>
              <li><a href="blogger_account_create.php">Create</a></li>
              <li><a href="../backend/login/logout.php">LogOut</a></li>
                  <!--<li class="search ">
                    <div class="search-wrapper card">
                        <input id="search"><i class="material-icons">search</i>
                        <div class="search-results" style="display:none"></div>
                    </div>
                  </li>-->          
            </ul>
          </div>
        </nav>
      </div>


      <div class="container" style="margin-top:50px">
        <form class="col s12" id="blog" method="post" action="../backend/bloggers/edit_blog.php" enctype="multipart/form-data">
         <div class="row">
      	    <div class="row">
              <div class="input-field col m10 offset-m1 l10 offset-l1 s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="blog_title" type="text" class="validate" name="blog_title">
                <label for="icon_prefix">Blog title</label>
              </div>
              <!--<div class="input-field col s6">
                <i class="material-icons prefix">phone</i>
                <input id="blog_cat" type="tel" class="validate" name="blog_cat">
                <label for="icon_telephone">Blog category</label>
              </div>-->
            </div>
          </div>
          <div class="row">
           <div class="row">
              <div class="input-field col m10 offset-m1 l10 offset-l1 s12">
                <i class="material-icons prefix">account_circle</i>
                <input id="blog_cat" type="text" class="validate" name="blog_cat">
                <label for="icon_prefix">Blog Category</label>
              </div>
            </div>
          </div>

          <div class="row">
       			<div class="row">
        			<div class="input-field col m10 offset-m1 l10 offset-l1 s12 ">
          				<i class="material-icons prefix">mode_edit</i>
          				<textarea id="blog_desc" class="materialize-textarea" name="blog_desc"></textarea>
          				<label for="icon_prefix2">Blog description</label>
        			</div>
      			</div>
          </div>

          <div class="row">
              <div class="file-field input-field col m10 offset-m1 l10 offset-l1 s12 ">
                <div class="btn">
                  <span>File</span>
                  <input type="file" name="image">
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text">
                </div>
            </div>
          </div>
           
          <center><button class="btn waves-effect waves-light" type="submit" name="submit">Submit
            <i class="material-icons right">send</i></button></center>
          <!-- </button> -->

        </form>

      </div>
        

      
    </body>
    <script src="../materialize/js/materialize.min.js"></script>
    <script>
      function activate()
      {
        document.getElementById('search').style.display="none";
        document.getElementById('search_with_details').style.display="block";
      }
      $(document).ready(function(){
        $(".button-collapse").sideNav();        
      });

    </script>
  </html>
  <script type="text/javascript">
  	
     function oldData()
      {
      	document.getElementById('blog_title').value = '<?php echo $blog_title ;?>'
      	document.getElementById('blog_cat').value   = '<?php echo $blog_category; ?>' 
      	document.getElementById('blog_desc').value  = '<?php echo $blog_description; ?>'
      	 
      }
      oldData();
     //  window.onload = oldData;
  </script>
  
  