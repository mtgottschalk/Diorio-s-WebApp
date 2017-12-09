<?php
require_once("Config.php");
require_once("Toppings.Class.php");
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
	</br></br>

	<h1>Add new Topping</h1>
	<form id="testtoppings" method="POST" action="./Toppings.Add.php">
	Name<input type="text" name="name"></input></br>
	<input type="submit">
	</form>

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

		<form id="Other" method="POST" action="./Other.add.php">
			<h1>Add new Roll or Stromboli</h1>
	Name<input type="text" name="name"></input></br>
	Price of Full<input type="text" name="pricel"></input></br>
	Price of Half<input type="text"  name="prices"></input></br>
	Description<input type="text" name="description"></input></br>
	Type<input type="text" name="type"></input></br>
	<input type="submit">
	</form>

	</br></br>
	<form id="Calzone" method="POST" action="./Calzones.add.php">
	<h1>Add new Calzone</h1>
	Name<input type="text" name="name"></input></br>
	Price of Large<input type="text" name="prices"></input></br>
	Price of Small<input type="text"  name="pricel"></input></br>
	Description<input type="text" name="description"></input></br>
	Fillings<input type="text" id="fillings" name="fillings"></input></br>
	<?php $topping = new Topping();
            $alltoppings = array();
            $alltoppings = $topping->getAllToppings();
            $id=1;
echo('<div id="fillingsdiv"><h1>Select Fillings</h1>');
            while(!empty($alltoppings[$id]))
            {
	        echo('<span class="fillingsspan"><input type="checkbox"
                     class="fillings" id="'.$alltoppings[$id]["name"].'"
                     value="'.$alltoppings[$id]["name"].'">');
		echo($alltoppings[$id]["name"].'</span>');
                //printf ("%'x-14s",$alltoppings[$id]["name"]);
               // echo str_replace("*","&nbsp;", str_pad($alltoppings[$id]["name"],14,"*"));


		$id++;    }
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
$(".pizzatoppings").change(function() {
    getalltoppings('Pizza', 'pizzatoppings');
});
</script>
</html>
