

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
  <script src="jquery-3.2.1.min.js"></script>
</head>
<style>
.formsFood{display: none;}
button{margin: 10px;}
input[type = number]{width: 35px;}
</style>
<body>

  <font face = "monaco">


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
      <div id ="Pizza" >
		 <!--onsubmit="return addPizzaToCart(document.getElementById('quanity').value,document.getElementById('size').value, document.getElementById('pizzaselect'));"-->
      <form id ="PizzasForm2" action="test.php" method="POST">
		 <input type="text" id="alltoppings" name="alltoppings"></input>
	    Quanity<input type="text" id="quanity">
	    </br>
	    Size<select name="size"><option name="slice" value="slice">Slice</option>
	    <option name="small" value="small">Small</option>
	    <option name="medium" value="medium">Medium</option>
	    <option name="Large" value="Large">Large</option>
	    </select>
	    </br>
		 <?php
		$pizza = new Pizza();
		$allpizzas = array();
		$allpizzas = $pizza->getAllPizzas();
		$idp=1;
		echo('Type<select class="pizzanames" name="pizzaselect"  onchange="initialCheck(this);"><option name="custom" value="">Custom</option>');
		while(!empty($allpizzas[$idp]))
       {
		  echo('<option name="'.$allpizzas[$idp]["Name"].'" value="'.$allpizzas[$idp]["Toppings"].'">');
		   echo($allpizzas[$idp]["Name"]);
		   echo('</option>');
		   $idp++;
	   }
	   echo('</select>');
	echo('</br></br></br>');
       $topping = new Topping();
       $alltoppings = array();
       $alltoppings = $topping->getAllToppings();
       $id=1;
       while(!empty($alltoppings[$id]))
       {
	    echo('<input type="checkbox"  class="pizzatoppings" id="'.$alltoppings[$id]["name"].'" value="'.$alltoppings[$id]["name"].'">');
		   echo($alltoppings[$id]["name"]);
		    $id++;
		}
       ?>
       <input type="submit">
       </form>
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
<div id= "cart">
       Checkout<textarea></textarea>
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
  document.addEventListener("selectionchange", function() {
   document.get
});
function initialCheck(item)
{
	//makes array of toppings that initially come on pizza this is important because 
	//if someone takes one of the toppings off the initial pizza but adds another topping
	//they need to be charged for the additional topping I believe
	uncheckAll("Pizza");
	var temp = "";
	var pizzatoppings = item.value;
	for(var i=0; i < pizzatoppings.length-1; i++)
	{
		if(pizzatoppings[i]!= " ")
		{
			temp+= pizzatoppings[i];
		}else 
		{
			document.getElementById(temp).checked = true;
			temp = "";
		}
}
}
function uncheckAll(formname){
//unchecks all the checkboxes
  var checkboxes = []; 
  checkboxes = document.getElementsByTagName('input');
 
  for (var i=0; i<checkboxes.length; i++)  {
    if (checkboxes[i].type == 'checkbox')   {
      checkboxes[i].checked = false;
    }
  }
	
}
function getalltoppings(formname){

//makes array of all toppings checked when submitted
	 var checkboxes = [];
	 var alltoppings = []; 
  checkboxes = document.getElementsByTagName('input');
 
  for (var i=0; i<checkboxes.length; i++)  {
    if (checkboxes[i].type == 'checkbox')   {
      if(checkboxes[i].checked == true)
      alltoppings.push(checkboxes[i].value);
    }
  }
  document.getElementById('alltoppings').value = alltoppings;
  return alltoppings;
}
/*function addPizzaToCart(quanity, size, name)
{  
	var alltoppings = [];
	alltoppings = getalltoppings('Pizza');
	var initialtoppings = [];
	var toppings = name.value;
	var name = name.options[name.selectedIndex].text;
	var temp = "";
	var count = 0;
	for(var i=0; i < toppings.length-1; i++)
	{
		if(toppings[i]!= " ")
		{
			temp+= toppings[i];
			
		}else 
		{
			initialtoppings.push(temp);
			temp = "";
		}
}
for(var j = 0; j < alltoppings.length; j++)
for(var k = 0; k < initialtoppings.length; k++)
if(alltoppings[j] == initialtoppings[k])count++;

	//from here need to post the name of pizza, size, alltoppings on the pizza, number of extra toppings
// then pull in the price of the pizza and turn it store info in an array
}
function test()
{
	alert("here");
}
/*alert("here");
	var count = counttoppings('pizza');
	var toppingtotal = 0;
	if(size == "slice") toppingtotal = count * .30;
	if(size == "small") toppingtotal = count * .50;
	if(size =="medium") toppingtotal = count * .80;
	if(size == "Large") toppingtotal = count * 1;
	var subtotal = (quanity * price) + toppingtotal;
	var total = subtotal + (subtotal * .08);
	*/
$(".pizzatoppings").change(function() {
    getalltoppings('pizza');
}); // When input is checked changes value of alltoppings input box to equal the toppings checked
  </script>
</body>
</html>
