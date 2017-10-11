

<?php
require_once("Pizza.Class.php");
	require_once("Sub.Class.php");
	require_once("Salad.Class.php");
	require_once("Toppings.Class.php");  
	require_once("Config.php");
	?>
	<html>
<head>
  <meta charset="UTF-8" />
  <title>Diorios</title>
  <link rel="stylesheet" type="text/css" href="./Diorios.css" >
</head>
<style>
.formsFood{display: none;}
button{margin: 10px;}
input[type = number]{width: 35px;}
</style>
<body>

  <font face = "monaco">


  <form method="post" name="forms" action=mailto:gambleallan@aim.com>
                              <!-- action="order submit.html"> -->

    <div class="forms">
      <div class="cell1">
        <center>
        <h3>Diorios on North Ave</h3>
        1125 North Ave, Grand Junction, Colorado 81501
        <br />970-243-1700
        <hr />
        </center>
      </div>
<div id="menu" style="text-align: center;">
       <button type="button" id="showpizza" onclick="ShowPizza()">Pizza</button>
      <button type="button" id="showstromboli" onclick="ShowStromboli()">Stromboli</button>
      <button type="button" id="showsausagerolls" onclick="ShowSausageRolls()">SausageRolls</button>
      <br />
      <button type="button" id="showcalzone" onclick="ShowCalzone()">Calzone</button>
      <button type="button" id="showsalad" onclick="ShowSalad()">Salad</button>
      <button type="button" id="showsubs" onclick="ShowSubs()">Subs</button>
     
</div>
 <button type="button" id="backtomenu" onclick="ShowMenu()">Main menu</button>
      <div id ="Pizza" class="formsFood">
		 <?php
		$pizza = new Pizza();
		$allpizzas = array();
		$allpizzas = $pizza->getAllPizzas();
		$idp=1;
		while(!empty($allpizzas[$idp]))
       {
		  echo('<input type="checkbox" class="pizzanames" name="'.$allpizzas[$idp]["Name"].'" value="'.$allpizzas[$idp]["Name"].'">');
		   echo($allpizzas[$idp]["Name"]);
		   $idp++;
	   }
	echo('</br></br></br>');
       $topping = new Topping();
       $alltoppings = array();
       $alltoppings = $topping->getAllToppings();
       $id=1;
       while(!empty($alltoppings[$id]))
       {
		  echo('<input type="checkbox" class="toppings" name="'.$alltoppings[$id]["name"].'" value="'.$alltoppings[$id]["name"].'">');
		   echo($alltoppings[$id]["name"]);
		   $id++;
	   }
       ?>
       
        <br/>
        </div>
        <div id="SausageRolls" class="formsFood">
      </div>
        <br />
        <div id="Calzone" class ="formsFood">
        
          </div>

        </fieldset>
        <div id="CalzoneNum" class ="formsFood">
          <button type="button" onclick="ShowCalzone(); ShowCalzoneNum();">Hide</button>
        </div>
      </fieldset>
        <br />
        <div id ="Salad" class="formsFood">
        <?php
        echo('</br></br></br>');
       $salad = new Salad();
       $allsalads = array();
       $allsalads = $salad->getAllSalads();
       $ids=1;
       while(!empty($allsalads[$ids]))
       {
		  echo('</br><input type="checkbox" class="toppings" name="'.$allsalads[$ids]["Name"].'" value="'.$allsalads[$ids]["Name"].'">');
		   echo($allsalads[$ids]["Name"]);
		   echo('	Price: $'.$allsalads[$ids]["Price"]);
		   $ids++;
	   }
       ?>
      </div>


<!-- Subs menu starts here -->
        <br />
<div id="Subs" class ="formsFood">
	<?php 
	$sub = new Sub();
	$allsubs = array();
	$allsubs = $sub->getAllSubs();
	  $idsub=1;
	  $coldsubs = array();
	   echo("<div id='hotsubs'><h1 class='title'>Hot Subs</h1>");
       while(!empty($allsubs[$idsub]))
       {
		   if($allsubs[$idsub]["Temp"] == "Hot")
		   {
		  echo('</br><input type="checkbox" class="subs" name="'.$allsubs[$idsub]["Name"].'" value="'.$allsubs[$idsub]["Name"].'">');
		   echo($allsubs[$idsub]["Name"]);
		   echo('<input type="checkbox" class="subprice half" name="half'.$allsubs[$idsub]["Name"].'" value="'.$allsubs[$idsub]["PriceH"].'">');
		   echo($allsubs[$idsub]["PriceH"]);
		   echo('<input type="checkbox" class="subprice full" name="full'.$allsubs[$idsub]["Name"].'" value="'.$allsubs[$idsub]["PriceF"].'">');
		   echo($allsubs[$idsub]["PriceF"]);
	   }else array_push($coldsubs,$allsubs[$idsub]);
		   $idsub++;
	   }
	   echo('</div>');
	   $idsub = 1;
	   echo("<div id='coldsubs'><h1 class='title'>Cold Subs</h1>");
	   while($idsub < count($coldsubs)+1)
	   {
		   		  echo('</br><input type="checkbox" class="subs" name="'.$allsubs[$idsub]["Name"].'" value="'.$allsubs[$idsub]["Name"].'">');
		   echo($allsubs[$idsub]["Name"]);
		   echo('<input type="checkbox" class="subprice half" name="half'.$allsubs[$idsub]["Name"].'" value="'.$allsubs[$idsub]["PriceH"].'">');
		   echo($allsubs[$idsub]["PriceH"].'</input>');
		   echo('<input type="checkbox" class="subprice full" name="full'.$allsubs[$idsub]["Name"].'" value="'.$allsubs[$idsub]["PriceF"].'">');
		   echo($allsubs[$idsub]["PriceF"].'</input>');
		   $idsub++;
	   }  
	   ?>
	   </div>
          </div>

        Name <input name="name" />

        Your Price <input name="price" size="8" value=$ readonly="readonly" />

        <!-- submit button sends the form-data to a page called "/order submit.html" -->
        <input type="submit" value="PLACE YOUR ORDER" />

        <input type="reset" value="START OVER" />
      </div>

  <script>
  document.getElementById('Pizza').style.display = "none";
  //document.getElementById('Stromboli').style.display = "none";
  document.getElementById('Calzone').style.display = "none";
  document.getElementById('Salad').style.display = "none";
  document.getElementById('Subs').style.display = "none";
  document.getElementById('SausageRolls').style.display = "none";
  //document.getElementById('PizzaNum').style.display = "none";
  document.getElementById('CalzoneNum').style.display = "none";
   document.getElementById('backtomenu').style.display = "none";

  function ShowPizza() {
      var x = document.getElementById('Pizza');
      if (x.style.display == 'none') {
          x.style.display = 'block';
      } else {
          x.style.display = 'none';
      }
      document.getElementById("menu").style.display = "none";
      document.getElementById("backtomenu").style.display = "block";
      
      
  }
   function ShowMenu() {
      document.getElementById("menu").style.display = "block"
      document.getElementById("backtomenu").style.display = "none";  
      document.getElementById('Pizza').style.display = "none";
  //document.getElementById('Stromboli').style.display = "none";
  document.getElementById('Calzone').style.display = "none";
  document.getElementById('Salad').style.display = "none";
  document.getElementById('Subs').style.display = "none";
   }
  function ShowStromboli() {
      var x = document.getElementById('Stromboli');
      if (x.style.display == 'none') {
          x.style.display = 'block';
      } else {
          x.style.display = 'none';
      }
       document.getElementById("menu").style.display = "none";
      document.getElementById("backtomenu").style.display = "block";
  }
  function ShowCalzone() {
      var x = document.getElementById('Calzone');
      if (x.style.display == 'none') {
          x.style.display = 'block';
      } else {
          x.style.display = 'none';
      }
       document.getElementById("menu").style.display = "none";
      document.getElementById("backtomenu").style.display = "block";
  }
  function ShowSausageRolls() {
      var x = document.getElementById('SausageRolls');
      if (x.style.display == 'none') {
          x.style.display = 'block';
      } else {
          x.style.display = 'none';
      }
       document.getElementById("menu").style.display = "none";
      document.getElementById("backtomenu").style.display = "block";
  }
  function ShowSalad() {
      var x = document.getElementById('Salad');
      if (x.style.display == 'none') {
          x.style.display = 'block';
      } else {
          x.style.display = 'none';
      }
       document.getElementById("menu").style.display = "none";
      document.getElementById("backtomenu").style.display = "block";
  }
  function ShowSubs() {
      var x = document.getElementById('Subs');
      if (x.style.display == 'none') {
          x.style.display = 'block';
      } else {
          x.style.display = 'none';
      }
       document.getElementById("menu").style.display = "none";
      document.getElementById("backtomenu").style.display = "block";
  }
  function ShowPizzaNum() {
      var x = document.getElementById('PizzaNum');
      if (x.style.display == 'none') {
          x.style.display = 'block';
      } else {
          x.style.display = 'none';
      }
  }
  function ShowCalzoneNum() {
      var x = document.getElementById('CalzoneNum');
      if (x.style.display == 'none') {
          x.style.display = 'block';
      } else {
          x.style.display = 'none';
      }
  }

  </script>
</body>

</html>
