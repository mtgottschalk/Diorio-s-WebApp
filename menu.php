

<?php
require_once("Pizza.Class.php");
	require_once("Sub.Class.php");
	require_once("Salad.Class.php");
	require_once("Toppings.Class.php");  
	require_once("Cart.Class.php");
	require_once("Config.php");
	require_once("Other.Class.php");
	require_once("Calzones.Class.php");
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
      <button type="button" id="showsausagerolls" onclick="ShowSausageRolls()">Rolls</button>
      <br />
      <button type="button" id="showcalzone" onclick="ShowCalzone()">Calzone</button>
      <button type="button" id="showsalad" onclick="ShowSalad()">Salad</button>
      <button type="button" id="showsubs" onclick="ShowSubs()">Subs</button>
     
</div>
 <button type="button" id="backtomenu" onclick="ShowMenu()">Main menu</button>
      <div id ="Pizza" >
		 <!--onsubmit="return addPizzaToCart(document.getElementById('quanity').value,document.getElementById('size').value, document.getElementById('pizzaselect'));"-->
      <form id ="PizzasForm" action="addpizzastocart.php" method="POST">
		 <input type="text" id="alltoppings" name="alltoppings"></input>
	    Quanity<input type="text" name ="quanity" id="quanity">
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
		echo('Type<select class="pizzanames" name="pizzaselect"  onchange="initialCheck(this,');
		echo("'Pizza'");
		echo(')">');
		while(!empty($allpizzas[$idp]))
       {
		  echo('<option class="pizzanameoption" name="'.$allpizzas[$idp]["Name"].'" value="'.$allpizzas[$idp]["Toppings"].'">');
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
			<form id="rollsorder" method="POST" action="addrollstocart.php">
			 <?php 
 $other = new Other();
 $allother = array();
 $allrolls = array();
 $allother = $other->getAllOther();
 $idrolls = 1;
 
 while(!empty($allother[$idrolls]))
{
	if($allother[$idrolls]["Type"] == "Roll") array_push($allrolls, $allother[$idrolls]);
	$idrolls++;
}
$idrolls = 0;
while(!empty($allrolls[$idrolls]))
{
echo('<span class="rollsname"><input type="hidden" name="name'.$idrolls.'" value="'.$allrolls[$idrolls]["Name"].'">'.$allrolls[$idrolls]["Name"].'</span>');
	echo('<span class="rollsprice"><input type="hidden" name="price'.$idrolls.'" value="'.$allrolls[$idrolls]["PriceS"].'">'.$allrolls[$idrolls]["PriceS"].'</span>');
	echo('<span class="rollsdescription"><input type="hidden" name="description'.$idrolls.'" value="'.$allrolls[$idrolls]["Description"].'">'.$allrolls[$idrolls]["Description"].'</span>');
	echo('<span class="rollsquanity">quanity<input type="text" name="rollsquanity'.$idrolls.'"></input>
	</span></br>');
	
	$idrolls++;
}
 
 ?>
 <input type="hidden" name="numberofrolltypes" value="<?php echo $idrolls;?>">
 <input type="submit">
 </form>
      </div>
        <br />
        <div id="Calzone" class ="formsFood">
			<form id="CalzoneOrder" method="POST" action="addcalzonetocart.php">
				<input type = "text" id="allcalzonetoppings">
          <?php 
          $allcalzones = array();
          $calzone = new Calzone();
          $allcalzones = $calzone->getAllCalzones();
$idcalzones = 1;
echo('Type<select class="calzonenames" name="calzoneselect"  onchange="initialCheckCalzone(this,');
		echo("'Calzone'");
		echo(')"><option value=""></option>');
while(!empty($allcalzones[$idcalzones]))
{
	  echo('<option class="calzonenameoption" name="'.$allcalzones[$idcalzones]["Name"].'" value="'.$allcalzones[$idcalzones]["Toppings"].'">');
		   echo($allcalzones[$idcalzones]["Name"]);
		   echo('</option>');
		   $idcalzones++;
	   }
	   echo('</select>Size<select name="size"><option value="Medium">Medium</option><option value="Large">Large</option></select> Quanity<input type= text name="quanity">');
	echo('</br></br></br>');
	$topping = new Topping();
       $alltoppings = array();
       $alltoppings = $topping->getAllToppings();
       $idfilling=1;
       while(!empty($alltoppings[$idfilling]))
       {
	    echo('<input type="checkbox"  class="calzonetoppings" id="'.$alltoppings[$idfilling]["name"].'2" value="'.$alltoppings[$idfilling]["name"].'">');
		   echo($alltoppings[$idfilling]["name"]);
		    $idfilling++;
		}
          ?>
          <input type="submit">
          </form>
        </div>
 
        <br />
        <div id ="Salad" class="formsFood">
        <?php
        echo('</br></br></br><form id="saladpicker" action="addsaladtocart.php" method="POST">');
       $salad = new Salad();
       $allsalads = array();
       $allsalads = $salad->getAllSalads();
       $ids=1;
       while(!empty($allsalads[$ids]))
       {
		  echo('</br><input type="checkbox" class="salad" name="'.$allsalads[$ids]["Name"].'" value="'.$allsalads[$ids]["Name"].'">');
		   echo('<span class="saladname">'.$allsalads[$ids]["Name"].'</span>');
		   echo('<span class="saladprice">$'.$allsalads[$ids]["Price"].'</span>');
		   echo('<span class="saladdescription">$'.$allsalads[$ids]["Description"].'</span><input type="text" name="quanity'.$allsalads[$ids]["Name"].'">');
		   
		   $ids++;
	   }
       ?></br>
       <input type ="text" id="saladstoreturn" name="saladstoreturn">
       <input type="submit">
     </form> </div>
<div id="Strombolli">
	<form id="strombolliorder" method="POST" action="addstrombollitocart.php">
 <?php 
 $other = new Other();
 $allother = array();
 $allstrombolli = array();
 $allother = $other->getAllOther();
 $idstromb = 1;
 
 while(!empty($allother[$idstromb]))
{
	if($allother[$idstromb]["Type"] == "Strombolli") array_push($allstrombolli, $allother[$idstromb]);
	$idstromb++;
}
$idstromb = 0;
while(!empty($allstrombolli[$idstromb]))
{
	echo('</br><input type="checkbox" class="strombolli" name="'.$allstrombolli[$idstromb]["Name"].'" value="'.$allstrombolli[$idstromb]["Name"].'">');
//echo('<span class="strombname"><input type="hidden" name="strombname'.$idstromb.'" value="'.$allstrombolli[$idstromb]["Name"].'"></span>');
	echo('<span class="strombprice"><input type="hidden" name="strombprice'.$idstromb.'" value="'.$allstrombolli[$idstromb]["PriceS"].'">'.$allstrombolli[$idstromb]["PriceS"].'</span>');
	echo('<span class="strombdescription"><input type="hidden" name="strombdescription'.$idstromb.'" value="'.$allstrombolli[$idstromb]["Description"].'">'.$allstrombolli[$idstromb]["Description"].'</span>');
	echo('<span class="strombquanity">quanity<input type="text" name="quanity'.$allstrombolli[$idstromb]["Name"].'"></input>
	</span></br>');
	
	$idstromb++;
}
 
 ?>
 <span class="strombname"><input type="text" id="strombollistoreturn" name="strombollistoreturn" value=""></span>
 <input type="hidden" name="numberofrolltypes" value="<?php echo $idstromb;?>">
 <input type="submit">
 </form>
</div>

<!-- Subs menu starts here -->
        <br />
<div id="Subs" class ="formsFood">
	<button id="ShowHotButton" onclick="ShowHot()">Hot Subs</button>
	<button id="ShowColdButton" onclick="ShowCold()">Cold Subs</button>
	<button id="ShowAllSubsButton" onclick="ShowAllSubs()">All Subs</button>
	
	<?php 
	$sub = new Sub();
	$allsubs = array();
	$allsubs = $sub->getAllSubs();
	  $idsub=1;
	  $coldsubs = array();
	 
	   echo("<div id='HotSubs'><h1 class='title'>Hot Subs</h1>");
       while(!empty($allsubs[$idsub]))
       {
		   if($allsubs[$idsub]["Temp"] == "Hot")
		   {
		  	  echo('</br><button id="'.$allsubs[$idsub]["Name"].'" onclick="ChooseSub(');
		   		  echo("'");
		   		  echo($allsubs[$idsub]["Name"]);
		   		  echo("'");
		   		  echo(')">');
		   echo($allsubs[$idsub]["Name"]);
		   echo('</button>');
		   echo('<span class="subpricehalf">$'.$allsubs[$idsub]["PriceH"].'</span>');
		   echo('<span class="subpricefull">$'.$allsubs[$idsub]["PriceF"].'</span>');
		   echo('<span class="subdescription">'.$allsubs[$idsub]["Description"].'</span>');
	   }else 
	   {array_push($coldsubs,$allsubs[$idsub]);
		   
	   }
	   $idsub++;
   }
	   echo('</div>');
	   $idsub = 1;
	   echo("<div id='ColdSubs'><h1 class='title'>Cold Subs</h1>");
	   while($idsub < count($coldsubs)+1)
	   {
		   		  echo('</br><button id="'.$allsubs[$idsub]["Name"].'" onclick="ChooseSub(');
		   		  echo("'");
		   		  echo($allsubs[$idsub]["Name"]);
		   		  echo("'");
		   		  echo(')">');
		   echo($allsubs[$idsub]["Name"]);
		   echo('</button>');
		   echo('<span class="subpricehalf">$'.$allsubs[$idsub]["PriceH"].'</span>');
		   echo('<span class="subpricefull">$'.$allsubs[$idsub]["PriceF"].'</span>');
		   echo('<span class="subdescription">'.$allsubs[$idsub]["Description"].'</span>');
		   $idsub++;
	   } 
	   
	   echo('</div><div id="SubUpdate"><form id="SubOrder" method="POST" action="addsubtocart.php">
	   Sub Name<input type="text" id="SubChoosen" name="name">
	   <select name="size"><option>Half</option><option value="Full">Full</option></select>
	   <input type="checkbox" name="mayo" checked="checked">Mayo
	   <input type="checkbox" name="mustard" checked="checked">Mustard
	   <input type="checkbox" name="vinagrette" checked="checked">Vinagrette
	   <input type="checkbox" name="lettuce" checked="checked">Lettuce
	   <input type="checkbox" name="olives" checked="checked">Olives
	   <input type="checkbox" name="onions" checked="checked">Onions
	   <input type="checkbox" name="sweetpeppers" >Sweet Peppers
	   <input type="checkbox" name="hotpeppers" >Hot Peppers
	   Quanity<input type="text" name="quanity" ></br><input type="submit"></form> </div></div>');
	   ?>
	   
	   </div>
          
<div id= "cart">
      <?php if(!empty($_SESSION["cart"]["prices"]))
      {for($i =0; $i < count($_SESSION["cart"]["prices"]); $i++){
      echo("<span class='CartName'><b>Name : </b>".$_SESSION["cart"]["names"][$i]."</span>");
      echo("<span class='CartPrice'><b>Price : </b>".$_SESSION["cart"]["prices"][$i]."</span>"); 
      echo("<span class='CartDescriptions'><b>Descriptions : </b>".$_SESSION["cart"]["descriptions"][$i]."</span>"); 
       echo("<span class='CartQuanity'><b>Quanity : </b>".$_SESSION["cart"]["quanity"][$i]."</span>"); 
      echo("</br>");
  }
  }
      ?>
		  <h1>Subtotal = $ <?php if(!empty($_SESSION["cart"]["prices"]))
      echo array_sum($_SESSION["cart"]["prices"]); ?> </h1></br>
      <h1>Total = $ <?php if(!empty($_SESSION["cart"]["prices"]))echo array_sum($_SESSION["cart"]["prices"])+(.08)*(array_sum($_SESSION["cart"]["prices"])); ?> </h1>
      </div>


  <script>
	  
	document.getElementById('SubOrder').style.display = "none";
	document.getElementById('backtomenu').style.display = "none";
  document.getElementById('Pizza').style.display = "none";
  document.getElementById('HotSubs').style.display = "none";
  document.getElementById('ColdSubs').style.display = "none";
    document.getElementById('ShowHotButton').style.display = "none";
  document.getElementById('ShowColdButton').style.display = "none";
  document.getElementById('ShowAllSubsButton').style.display = "none";
  document.getElementById('Strombolli').style.display = "none";
  document.getElementById('Calzone').style.display = "none";
  document.getElementById('Salad').style.display = "none";
  document.getElementById('Subs').style.display = "none";
  document.getElementById('SausageRolls').style.display = "none";
  //document.getElementById('PizzaNum').style.display = "none";
 // document.getElementById('CalzoneNum').style.display = "none";
   document.getElementById('backtomenu').style.display = "none";
   document.getElementById('SubUpdate').style.display = "none";
function ChooseSub(name)
{
	
	document.getElementById('SubUpdate').style.display = "block";
	document.getElementById('SubChoosen').value = name;
	
}
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
  document.getElementById('Stromboli').style.display = "none";
  document.getElementById('Calzone').style.display = "none";
  document.getElementById('Salad').style.display = "none";
  document.getElementById('Subs').style.display = "none";
  document.getElementById('SubOrder').style.display = "none";
  document.getElementById('HotSubs').style.display = "none";
  document.getElementById('ColdSubs').style.display = "none";
  document.getElementById('SausageRolls').style.display = "none";
   }
  function ShowStromboli() {
      var x = document.getElementById('Strombolli');
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
             document.getElementById('ShowHotButton').style.display = "block";
  document.getElementById('ShowColdButton').style.display = "block";
  document.getElementById('ShowAllSubsButton').style.display = "block";
      } else {
          x.style.display = 'none';
             document.getElementById('ShowHotButton').style.display = "none";
  document.getElementById('ShowColdButton').style.display = "none";
  document.getElementById('ShowAllSubsButton').style.display = "none";
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
  document.addEventListener("selectionchange", function() {
   document.get
});
function ShowHot()
{
	document.getElementById('HotSubs').style.display = "block";
  document.getElementById('ColdSubs').style.display = "none";
  document.getElementById('SubOrder').style.display = "block";
}
function ShowCold()
{
	document.getElementById('HotSubs').style.display = "none";
  document.getElementById('ColdSubs').style.display = "block";
  document.getElementById('SubOrder').style.display = "block";
}
function ShowAllSubs()
{
	   document.getElementById('HotSubs').style.display = "block";
  document.getElementById('ColdSubs').style.display = "block";
  document.getElementById('SubOrder').style.display = "block";
  
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
		if(toppings[i]!= " ")
		{
			temp+= toppings[i];
		}else 
		{
			document.getElementById(temp).checked = true;
			temp = "";
		}
}
			document.getElementById(temp).checked = true;
			temp = "";
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
		if(toppings[i]!= " ")
		{
			temp+= toppings[i];
		}else 
		{
			document.getElementById(temp+"2").checked = true;
			temp = "";
		}
}
			document.getElementById(temp+"2").checked = true;
			temp = "";
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
  document.getElementById(inputname).value = alltoppings;
  return alltoppings;
}
function getallchecked(formname, inputname)
{
	var checkboxes = [];
	 var all = []; 
  checkboxes = document.getElementById(formname).getElementsByTagName('input');
 
  for (var i=0; i<checkboxes.length; i++)  {
    if (checkboxes[i].type == 'checkbox')   {
      if(checkboxes[i].checked == true)
      all.push(checkboxes[i].value);
    }
  }
  document.getElementById(inputname).value = all;
  return all;
}
$(".pizzatoppings").change(function() {
    getalltoppings('Pizza', 'alltoppings');
}); 
$(".calzonetoppings").change(function() {
    getalltoppings('Calzone', 'allcalzonetoppings');
});// When input is checked changes value of alltoppings input box to equal the toppings checked

$(".salad").change(function() {
    getallchecked('Salad','saladstoreturn');
});
$(".strombolli").change(function() {
    getallchecked('Strombolli','strombollistoreturn');
    
});
  </script>
</body>
</html>

<!--function addPizzaToCart(quanity, size, name)
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
	-->
