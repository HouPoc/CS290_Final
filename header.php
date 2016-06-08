<html>


<body>
	
<div id="wrapper">
  <!-- BEGIN header -->
  <div id="header">
    <!-- begin pages -->
    <ul class="pages">
      <li><?php
				$cookie_name="user";
				if (isset($_COOKIE[$cookie_name])){										
					echo "<a href='main.php'> Home </a>";
				}
				else {													
					echo "<a href='index.php'> Home </a>";
				}
				
				?></li>
      <li><a href="about.php">About Us</a></li>
	  <li><a href="help.php">Help</a></li>
    </ul>
    <!-- end pages -->
   <img id="weblogo" src="images/logo.png"  alt="Logo" />

    <div class="break"></div>
    <!-- begin logo -->
    <div class="logo">
      <h1>Corvallis News Center</h1>
      <p>CS 340 Final Project</p>
    </div>
    <!-- end logo -->

    <!-- begin categories -->
    <ul class="categories">
      <li><a href="main.php">Main</a></li>
      <li><a href="category.php?c=Sport">Sport</a></li>
      <li><a href="category.php?c=Entertainment">Entertainment</a></li>
      <li><a href="category.php?c=Health">Health</a></li>
      <li><a href="category.php?c=OSU">OSU Special</a></li>
    </ul>
    <!-- end categories -->
  </div>

</body>

</html>
