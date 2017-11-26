<?php
require_once("Config.php");
require_once("Toppings.Class.php");
require_once("Pizza.Class.php");
require_once("Calzones.Class.php");
?>

<html>
	
	<body>
		<head><link rel="stylesheet" type="text/css" href="./Diorios.css" >
  <script src="jquery-3.2.1.min.js"></script></head>
  <div id="mainbody">
		<div id="testadmin">
			<h1>Add new Pizza</h1>
	<form id="Pizza" method="POST" action="./Pizza.Add.php">
	Name<input type="text" name="name" class=></input></br>
	Price of small<input type="text" name="prices"></input></br>
	Price of Medium<input type="text"  name="pricem"></input></br>
	Price of Large<input type="text" name="pricel"></input></br>
	Price of Slice<input type="text" name="pricesl"></input></br>
	Description<input type="text" name="description"></input></br>
	Toppings<input type="text" id="pizzatoppings" name="pizzatoppings"></input></br>
	<?php $topping = new Topping();
            $alltoppings = array();
            $alltoppings = $topping->getAllToppings();
            $id=1;
echo('<div id="toppingsdiv"><h1>Select Toppings</h1>');
            while(!empty($alltoppings[$id]))
            {
	        echo('<span class="pizzatoppingspan"><input type="checkbox"  
                     class="pizzatoppings" id="'.$alltoppings[$id]["name"].'" 
                     value="'.$alltoppings[$id]["name"].'">');
		echo($alltoppings[$id]["name"].'</span>');
                //printf ("%'x-14s",$alltoppings[$id]["name"]);
               // echo str_replace("*","&nbsp;", str_pad($alltoppings[$id]["name"],14,"*"));


		$id++;
            }
echo('</div>');
?>
<input type="submit">
	</form>
<div id="editPizza">
	
	<?php
	$pizza = new Pizza();
	    $allpizzas = array();
	    $allpizzas = $pizza->getAllPizzas();
	    $idp=1;
	echo('<span class="pizzanamesspan"><form id="pizzanamesubmit" method="GET" ><select class="editpizzanames" name="pizzaselect" 
                     onchange="this.form.submit()">');
	    while(!empty($allpizzas[$idp]))
            {
		 echo('<option class="pizzanameoption" 
                       name="'.$allpizzas[$idp]["Name"].'" 
                       value="'.$allpizzas[$idp]["Toppings"].'">');
		  echo($allpizzas[$idp]["Name"]);
		  echo('</option>');
		  $idp++;
	    }
	    echo('</select></form></span><br />');
	    ?>
	<form id="EditPizza" method="POST" action="./updatepizza.php">
	Price of small<input type="text" id ="editprices" name="prices" value="<?php 
	if (isset($_GET["pizzaselect"]))
	{ 
		echo $pizza->getPricesByName($pizza->getNameByToppings($_GET["pizzaselect"]));
	}
	
	?>">
	
	</input></br>
	Price of Medium<input type="text" id ="editpricem" name="pricem" value="<?php 
	if (isset($_GET["pizzaselect"]))
	{ 
		echo $pizza->getPriceMByName($pizza->getNameByToppings($_GET["pizzaselect"]));
	}
	
	
	?>">
	</input></br>
	Price of Large<input type="text" id ="editpricel" name="pricel" value="<?php 
	if (isset($_GET["pizzaselect"]))
	{ 
		echo ($pizza->getPriceLByName($pizza->getNameByToppings($_GET["pizzaselect"])));
	}
	?>">
	</input></br>
	Price of Slice<input type="text" id ="editpricesl" name="pricesl" value="<?php 
	if (isset($_GET["pizzaselect"]))
	{ 
		echo ($pizza->getPriceslByName($pizza->getNameByToppings($_GET["pizzaselect"])));
	}
	?>">
	</input></br>
	Description<input type="text" id="editdescription" name="description" value="<?php 
	if (isset($_GET["pizzaselect"]))
	{ 
		echo $pizza->getDescriptionByName($pizza->getNameByToppings($_GET["pizzaselect"]));
	}
	?>">
	</input></br>
	Toppings<input type="text" id="editpizzatoppings" name="pizzatoppings" value="<?php
	if (isset($_GET["pizzaselect"]))
	{ 
		$toppings = $pizza->getToppingsByName($pizza->getNameByToppings($_GET["pizzaselect"]));
		echo $pizza->getToppingsByName($pizza->getNameByToppings($_GET["pizzaselect"]));
	}
	?>">
	
	</input>
	<input type="text" id="editname" name="name" value="<?php
	if (isset($_GET["pizzaselect"]))
	{ 
		echo $pizza->getNameByToppings($_GET["pizzaselect"]);
	}
	
	?>"></input>
	<input type="text" id="editid" name="id" value="<?php
	if (isset($_GET["pizzaselect"]))
	{ 
		echo $pizza->getIdByToppings($_GET["pizzaselect"]);
	}
	
	?>"></input>
	</br><input type="submit" value="edit"></form></br>
	<?php $topping = new Topping();
            $alltoppings = array();
            $alltoppings = $topping->getAllToppings();
            $id=1;
echo('<div id="toppingsdiv"><h1>Select Toppings</h1>');
            while(!empty($alltoppings[$id]))
            {
	        echo('<span class="pizzatoppingspan"><input type="checkbox"  
                     class="editpizzatoppings" id="'.$alltoppings[$id]["name"].'edit" 
                     value="'.$alltoppings[$id]["name"].'">');
		echo($alltoppings[$id]["name"].'</span>');
                //printf ("%'x-14s",$alltoppings[$id]["name"]);
               // echo str_replace("*","&nbsp;", str_pad($alltoppings[$id]["name"],14,"*"));


		$id++;
            }
            
echo('</div>');
 
?>
	
	
	</br></br>
	<h1>Add new Sub</h1>
		<form id="testsub" method="POST" action="./Sub.Add.php">
			
	Name<input type="text" name="name"></input></br>
	Price of Full<input type="text" name="pricef"></input></br>
	Price of Half<input type="text"  name="priceh"></input></br>
	Description<input type="text" name="description"></input></br>
	Temp<input type="text" name="temp"></input></br>
	<input type="submit">
	</form>
	</br></br>
	
	
	<h1>Add new Salad</h1>
	<form id="testsalad" method="POST" action="./Salad.Add.php">
	Name<input type="text" name="name"></input></br>
	Price<input type="text" name="price"></input></br>
	Description<input type="text" name="description"></input></br>
	<input type="submit">
	</form>
	</br></br>
	<h1>Add new Topping</h1>
	<form id="testtoppings" method="POST" action="./Toppings.Add.php">
	Name<input type="text" name="name"></input></br>
	<input type="submit">
	</form>
	
	<h1>Edit Salad</h1>
	<form id="testsalad" method="POST" action="./Salad.Add.php">
	Name<input type="text" name="name"></input></br>
	Price<input type="text" name="price"></input></br>
	Description<input type="text" name="description"></input></br>
	<input type="submit">
	</form>
	</br></br>
	<h1>Add new Topping</h1>
	<form id="testtoppings" method="POST" action="./Toppings.Add.php">
	Name<input type="text" name="name"></input></br>
	<input type="submit">
	</form>
	
	</br></br>
		<form id="Other" method="POST" action="./Other.Add.php">
			<h1>Add new Roll or Stromboli</h1>
	Name<input type="text" name="name"></input></br>
	Price of Full<input type="text" name="pricem"></input></br>
	Price of Half<input type="text"  name="pricel"></input></br>
	Description<input type="text" name="description"></input></br>
	Type<input type="text" name="type"></input></br>
	<input type="submit">
	</form>
	
	</br></br>
	
	<h1>Add new Calzone</h1>
<input type="submit">
	</form>
<div id="editCalzone">
	
	<?php
	$calzone = new Calzone();
	    $allcalzones = array();
	    $allcalzones = $calzone->getAllCalzones();
	    $idc=1;
	echo('<span class="calzonenamesspan"><form id="calzonenamesubmit" method="GET" ><select class="editcalzonenames" name="calzoneselect" 
                     onchange="this.form.submit()">');
	    while(!empty($allcalzones[$idc]))
            {
		 echo('<option class="calzonenameoption" 
                       name="'.$allcalzones[$idc]["Name"].'" 
                       value="'.$allcalzones[$idc]["Toppings"].'">');
		  echo($allcalzones[$idc]["Name"]);
		  echo('</option>');
		  $idc++;
	    }
	    echo('</select></form></span><br />');
	    ?>
	<form id="EditCalzone" method="POST" action="./updatecalzone.php">
	Price of small<input type="text" id ="editprices" name="prices" value="<?php 
	if (isset($_GET["calzoneselect"]))
	{ 
		echo $calzone->getPricesByName($calzone->getNameByFillings($_GET["calzoneselect"]));
	}
	
	?>">
	
	</input></br>
	Price of Large<input type="text" id ="editpricel" name="pricel" value="<?php 
	if (isset($_GET["calzoneselect"]))
	{ 
		echo $calzone->getPricelByName($calzone->getNameByFillings($_GET["calzoneselect"]));
	}
	
	?>">
	</input></br>
	Description<input type="text" id="editdescription" name="description" value="<?php 
	if (isset($_GET["calzoneselect"]))
	{ 
		echo $calzone->getDescriptionByName($calzone->getNameByFillings($_GET["calzoneselect"]));
	}
	?>">
	</input></br>
	Toppings<input type="text" id="editcalzonetoppings" name="calzonetoppings" value="<?php
	if (isset($_GET["calzoneselect"]))
	{ 
		$toppings = $calzone->getToppingsByName($calzone->getNameByFillings($_GET["calzoneselect"]));
		echo $calzone->getToppingsByName($calzone->getNameByFillings($_GET["calzoneselect"]));
	}
	?>">
	
	</input>
	<input type="text" id="editname" name="name" value="<?php
	if (isset($_GET["calzoneselect"]))
	{ 
		echo $calzone->getNameByFillings($_GET["calzoneselect"]);
	}
	
	?>"></input>
	<input type="text" id="editid" name="id" value="<?php
	if (isset($_GET["calzoneselect"]))
	{ 
		echo $calzone->getIdByFillings($_GET["calzoneselect"]);
	}
	
	?>"></input>
	</br><input type="submit" value="edit"></form></br>
	<?php $topping = new Topping();
            $alltoppings = array();
            $alltoppings = $topping->getAllToppings();
            $id=1;
echo('<div id="calzonetoppingsdiv"><h1>Select Toppings</h1>');
            while(!empty($alltoppings[$id]))
            {
	        echo('<span class="calzonetoppingspan"><input type="checkbox"  
                     class="editcalzonetoppings" id="'.$alltoppings[$id]["name"].'editc" 
                     value="'.$alltoppings[$id]["name"].'">');
		echo($alltoppings[$id]["name"].'</span>');
                //printf ("%'x-14s",$alltoppings[$id]["name"]);
               // echo str_replace("*","&nbsp;", str_pad($alltoppings[$id]["name"],14,"*"));


		$id++;
            }
            
echo('</div>');
 
?>
	
	
	<input type="submit">
	</div>
	</div>
	</body>


<script>
function getalltoppings(formname, inputname){

//makes array of all toppings checked when submitted
	 var checkboxes = [];
	 var alltoppings = [];
  checkboxes = document.getElementById(formname).getElementsByTagName('input')
 
  for (var i=0; i<checkboxes.length; i++)  {
    if (checkboxes[i].type == 'checkbox')   {
      if(checkboxes[i].checked == true)
      alltoppings.push(checkboxes[i].value);
    }
  }
  document.getElementById(inputname).value = alltoppings+",";
  return alltoppings;
}
function initialCheck(item, name)
{
	//makes array of toppings that initially come on pizza this is important because 
	//if someone takes one of the toppings off the initial pizza but adds another topping
	//they need to be charged for the additional topping I believe\
	uncheckAll(name);
	var temp = "";
	var toppings = item.value;
	for(var i=0; i < toppings.length; i++)
	{
		if(toppings[i]!= ",")
		{
			temp+= toppings[i];
		}else 
		{
			document.getElementById(temp).checked = true;
			temp = "";
		}
}
}
function EditPizzaToppings(item, name)
{
	//makes array of toppings that initially come on pizza this is important because 
	//if someone takes one of the toppings off the initial pizza but adds another topping
	//they need to be charged for the additional topping I believe
	uncheckAll(name);
	
	var temp = "";
	var toppings = item;
	for(var i=0; i < toppings.length; i++)
	{
		if(toppings[i]!= ",")
		{
			temp+= toppings[i];
		}else 
		{
			document.getElementById(temp+"edit").checked = true;
			temp = "";
		}
}
}
function EditCalzoneToppings(item, name)
{
	//makes array of toppings that initially come on pizza this is important because 
	//if someone takes one of the toppings off the initial pizza but adds another topping
	//they need to be charged for the additional topping I believe
	uncheckAll(name);
	
	var temp = "";
	var toppings = item;
	for(var i=0; i < toppings.length; i++)
	{
		if(toppings[i]!= ",")
		{
			temp+= toppings[i];
		}else 
		{
			document.getElementById(temp+"editc").checked = true;
			temp = "";
		}
}
}
function initialCheckCalzone(item, name)
{
	//makes array of toppings that initially come on pizza this is important because 
	//if someone takes one of the toppings off the initial pizza but adds another topping
	//they need to be charged for the additional topping I believe\
	uncheckAll(name);
	var temp = "";
	var toppings = item.value;
	for(var i=0; i < toppings.length; i++)
	{
		if(toppings[i]!= ",")
		{
			temp+= toppings[i];
		}else 
		{
			document.getElementById(temp+"2").checked = true;
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
$(".pizzatoppings").change(function() {
    getalltoppings('Pizza', 'pizzatoppings');
}); 
$(".editpizzatoppings").change(function() {
    getalltoppings('editPizza', 'editpizzatoppings');
}); 
$(".editcalzonetoppings").change(function() {
    getalltoppings('editCalzone', 'editcalzonetoppings');
}); 
 
</script>
</html>
<?php
	if (isset($_GET["pizzaselect"]))
	{ 
	echo("<script type='text/javascript'> 
		EditPizzaToppings('".$_GET["pizzaselect"]."', 'EditPizza');
		 </script>");
	 }
	 
	 	if (isset($_GET["calzoneselect"]))
	{ 
	echo("<script type='text/javascript'> 
		EditCalzoneToppings('".$_GET["calzoneselect"]."', 'EditCalzone');
		 </script>");
	 }?>
