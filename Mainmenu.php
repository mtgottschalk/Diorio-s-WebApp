<?php
  require_once("Pizza.Class.php");
	require_once("Sub.Class.php");
	require_once("Salad.Class.php");
	require_once("Toppings.Class.php");  
	require_once("Cart.Class.php");
	require_once("Config.php");
	require_once("Other.Class.php");
	require_once("Calzones.Class.php");
  function dm($amount) 
  {
    $string = "" . $amount;
    $dec = strlen($string) - strpos($string,".");
    if (strpos($string,".") === false) return $string . ".00";
    if ($dec == 1)                  return $string . "00";
    if ($dec == 2)                  return $string . "0";
    if ($dec > 3)                   return substr($string,0,strlen($string)-$dec+3);
    return $string;
  }
?>


<script>
  function dm(amount) 
  {
    string = "" + amount;
    dec = string.length - string.indexOf('.');
    if (string.indexOf('.') == -1) return string + '.00';
    if (dec == 1)                  return string + '00';
    if (dec == 2)                  return string + '0';
    if (dec > 3)                   return string.substring(0,string.length-dec+3);
    return string;
  }
</script>



<html>
<head>
  <meta charset="UTF-8" />
  <title>Diorios</title>
  <link rel="stylesheet" type="text/css" href="./Diorios3.css" >
  <script src="jquery-3.2.1.min.js"></script>
</head>

<style> 
</style>


<body>
	
<div id="mainbody">
	<div id="fullheader">
        <span id="DHeader"><h1>Diorios </h1></span>
        <span id="address">1125 North Ave, Grand Junction, Colorado 81501
        <br />970-243-1700</span>
        </div>

<br /><br />

<hr>
    <div class="forms">
		
    <div id="menu" style="text-align: center;">
      <button type="button" id="showpizza" onclick="ShowPizza()"
              style="width:100px;height:100px;border:0px;
              background: url(pizzathumb3.png);"
              ></button>
      <button type="button" id="showstromboli" onclick="ShowStromboli()"
              style="width:100px;height:100px;border:0px;
              background: url(strombolithumb3.png);"
              ></button>
      <button type="button" id="showrolls" onclick="ShowRolls()"
              style="width:100px;height:100px;border:0px;
              background: url(sausagerollsthumb3.png);"
              ></button>

      <br />
      <button type="button" id="showcalzone" onclick="ShowCalzone()"
              style="width:100px;height:100px;border:0px;
              background: url(calzonethumb3.png);"
              ></button>
      <button type="button" id="showsalad" onclick="ShowSalad()"
              style="width:100px;height:100px;border:0px;
              background: url(saladthumb3.png);"
              ></button>
      <button type="button" id="showsubs" onclick="ShowSubs()"
              style="width:100px;height:100px;border:0px;
              background: url(subthumb3.png);"
              ></button> 
    </div>

    <p align="center">
    <button type="button" id="backtomenu" onclick="ShowMenu()">Back To Menu</button>
    </p>

    <div id="Pizza">
      <h1>Select Pizza</h1>
      <!--onsubmit="return addPizzaToCart(document.getElementById('quanity').value,
                    document.getElementById('size').value, 
                    document.getElementById('pizzaselect'));"-->

      <form id ="PizzasForm" action="addpizzastocart.php" method="POST">
            <img src="pizza.jpeg" id="pizzapicture">

            <input type="hidden" id="alltoppings" name="alltoppings"></input>
            
			   
           

	    </br>

	    <?php
	    $pizza = new Pizza();
	    $allpizzas = array();
	    $allpizzas = $pizza->getAllPizzas();
	    $idp=1;
	    echo('<span class="title">Type</span><span class="pizzanamesspan"><select class="pizzanames" name="pizzaselect" 
                     onchange="initialCheck(this,');
	    echo("'Pizza'");
	    echo(')">');
	    while(!empty($allpizzas[$idp]))
            {
		 echo('<option class="pizzanameoption" 
                       name="'.$allpizzas[$idp]["Name"].'" 
                       value="'.$allpizzas[$idp]["Toppings"].'">');
		  echo($allpizzas[$idp]["Name"]);
		  echo('</option>');
		  $idp++;
	    }
	    echo('</select></span><br />
            
            <span class="title">Quantity</span><span class="pizzaquanity"><input type="number"   name="quanity" 
                   id="quanity" min="0" max="5" value="0"></span>
            <br />
	    
           <span class="title">Size</span><span class="pizzasize"><select name="size">
              <option name="slice" value="slice"  >Slice </option>
	      <option name="small" value="small"  >Small </option>
	      <option name="medium" value="medium">Medium</option>
	      <option name="Large" value="Large"  >Large </option>
	    </select></span>');
	    echo('</br></br></br>');
            $topping = new Topping();
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
		$id++;
            }
            echo('</div>');
            ?>

            <br />
            <br />
            <div>
            <input type="submit" class="submit" value="Add Pizza To Cart">
            </div>
      </form>
      <br/>
    </div>


    <div id="Rolls">
      <h1>Select Rolls</h1>
      <form id="rollsorder" method="POST" action="addrollstocart.php">
        <img id="sausagerollspic" src="sausagerolls.png" alt="sausagerolls">
        <br />

        <?php 
          $other = new Other();
          $allother = array();
          $allrolls = array();
          $allother = $other->getAllOther();
          $idrolls = 1;
 
          while(!empty($allother[$idrolls]))
          {
	    if($allother[$idrolls]["Type"] == "Roll") 
              array_push($allrolls, $allother[$idrolls]);
	    $idrolls++;
          }
          $idrolls = 0;
          while(!empty($allrolls[$idrolls]))
          {
            echo('<br />');
            echo('<span class="rollsname">
                  <input type="checkbox" name="name'.$idrolls.'" 
                         value="'.$allrolls[$idrolls]["Name"].'">
                         '.$allrolls[$idrolls]["Name"].'</span>');
	    echo('<span class="rollsdescription">
                  <input type="hidden" name="description'.$idrolls.'" 
                         value="'.$allrolls[$idrolls]["Description"].'">
                         '.$allrolls[$idrolls]["Description"].'</span>');
            echo('$');
	    echo('<span class="rollsprice">
                  <input type="hidden" name="price'.$idrolls.'" 
                         value="'.$allrolls[$idrolls]["PriceS"].'">
                         '.$allrolls[$idrolls]["PriceS"].'</span>');
	    echo('<span class="rollquanity">Qty
                  <input type="number" name="quanity'.str_replace(' ', '', $allrolls[$idrolls]["Name"]).'" id="quanity'.$allrolls[$idrolls]["Name"].'"
                         min="0" max="5" value="0">
                  </input>
                  </span></br>');
	
	    $idrolls++;
          } 
        ?>

        <input type="text" name="allrollnames" id="allrollnames" value="">
        <br /><br /><br />
        <input type="submit" class="submit" value="Add Rolls To Cart">
      </form>
    </div>

    <br />

    <div id="Calzone">
      <h1>Select Calzones</h1>
      <form id="CalzoneOrder" method="POST" action="addcalzonetocart.php">
        <img id="calzonepic" src="calzone.jpg" alt="calzones">

        <input type = "hidden" id="allcalzonetoppings" name="allcalzonetoppings">
        <br />

        <?php 
          $allcalzones = array();
          $calzone = new Calzone();
          $allcalzones = $calzone->getAllCalzones();
          $idcalzones = 1;
          echo('<br />');
          echo('<span  class="title">Type</span><span class="calzonenamespan"><select class="calzonenames" name="calzoneselect"       
               onchange="initialCheckCalzone(this,');
          echo("'Calzone'");
	  echo(')"><option value=""></option>');
 
          while(!empty($allcalzones[$idcalzones]))
          {
	    echo('<option class="calzonenameoption" name="'.$allcalzones[$idcalzones] 
                 ["Name"].'" value="'.$allcalzones[$idcalzones]["Toppings"].'">');
            echo($allcalzones[$idcalzones]["Name"]);
            echo('</option>');
            $idcalzones++;
	  }
          echo('</select></span><br />
          <span class="title">Quantity</span><span class="calzonequanity"><input type="number" name="quanity" 
                 id="quanity" min="0" max="5" value="0"></span>
          <br />
	  <span class="title">Size</span><span class="calzonesize"><select name="size">
              <option value="Medium">Medium</option>
              <option value="Large">Large</option>
          </select></span>');
	  echo('</br></br></br>');
	  $topping = new Topping();
          $alltoppings = array();
          $alltoppings = $topping->getAllToppings();
          $idfilling=1;
          echo('<div id="toppingsdiv"><h1>Select Toppings</h1>');
          while(!empty($alltoppings[$idfilling]))
          {
	    echo('<span class="pizzatoppingspan">
                 <input type="checkbox"  class="calzonetoppings" 
                 id="'.$alltoppings[$idfilling]["name"].'2" 
                 value="'.$alltoppings[$idfilling]["name"].'">');
            //echo($alltoppings[$idfilling]["name"]);
            echo $alltoppings[$idfilling]["name"];
              echo('</span>');
            $idfilling++;
          }
          echo('</div>');
        ?>

        <input type="submit" class="submit" value="Add Calzones To Cart">

      </form>
    </div>
 

    <div id="Salad">
      <h1>Select Salads</h1>
      <form id="saladpicker" action="addsaladtocart.php" method="POST">
        <img id="saladpic" src="salad.jpg" alt="salads">
        <?php
          $salad = new Salad();
          $allsalads = array();
          $allsalads = $salad->getAllSalads();
          $ids=1;
          while(!empty($allsalads[$ids]))
          {
            echo('<br />');
            echo('<input type="checkbox" class="salad" 
                 name= "'.$allsalads[$ids]["Name"].'" 
                 value="'.$allsalads[$ids]["Name"].'">');
            echo('<span class="saladname">'.$allsalads[$ids]["Name"].'</span>');
            /*echo('<span class="saladdescription">
                 '.$allsalads[$ids]["Description"].')
                 </span>');*/
            echo('$');
            echo('<span class="saladprice">
                  <input type="hidden" name="price'.$ids.'" 
                         value="'.$allsalads[$ids]["Price"].'">');
            echo (dm($allsalads[$ids]["Price"]));
            echo('</span>');
            echo('<span class="saladquanity"><input class="quanity" type="number" 
                 id ="quanity'.$allsalads[$ids]["Name"].'" 
                 name="quanity'.str_replace(' ', '', $allsalads[$ids]["Name"]).'"
                 min="0" max="5" value="0"></span>');	
	   
	    $ids++;
          }
        ?>

        <br />
        <input type ="text" id="saladstoreturn" name="saladstoreturn">
        <br />
        <input type="submit" class="submit" value="Add Salads To Cart">
      </form>
    </div>


    <div id="Strombolli"
         style="text-align:center;  width:480px; margin:0px auto">
      <form id="strombolliorder" method="POST" action="addstrombollitocart.php">
        <img src="stromboli.png" alt="stromboli" 
             style="float:left;width:130px;height:130px;">

        <?php 
          $other = new Other();
          $allother = array();
          $allstrombolli = array();
          $allother = $other->getAllOther();
          $idstromb = 1;
 
          while(!empty($allother[$idstromb]))
          {
	    if($allother[$idstromb]["Type"] == "Strombolli") 
              array_push($allstrombolli, $allother[$idstromb]);
	    $idstromb++;
          }
          $idstromb = 0;
          while(!empty($allstrombolli[$idstromb]))
          {
            echo('<span class="strombname"><input type="hidden" 
                   name="strombname'.$idstromb.'" 
                   value="'.$allstrombolli[$idstromb]["Name"].'"></span>');
	    echo('<span class="strombdescription"><input type="hidden"
                  name="strombdescription'.$idstromb.'" 
                  value="'.$allstrombolli[$idstromb]["Description"].'">
                 '.$allstrombolli[$idstromb]["Description"].'</span>');
	    echo('<span class="strombprice">
                  <input type="hidden" name="strombprice'.$idstromb.'" 
                  value="'.$allstrombolli[$idstromb]["PriceS"].'">
                 '.$allstrombolli[$idstromb]["PriceS"].'
                 </span>');
            echo(' $');
	    echo('<input type="checkbox" class="strombolli" 
                 name="'.$allstrombolli[$idstromb]["Name"].'" 
                 value="'.$allstrombolli[$idstromb]["Name"].'">');
	    echo('<span class="strombquanity">
                 Qty
                 <input type=number class="quanity" id="quanity'.$allstrombolli[$idstromb]["Name"].'" name="quanity'.$allstrombolli[$idstromb]["Name"].'"
                        min="0" max="5" value="0">
                 </input>
	         </span></br>');
	
	    $idstromb++;
          }
 
        ?>

        <span class="strombname"><input type="text" id="strombollistoreturn"
              name="strombollistoreturn" value=""></span>
        <input type="hidden" name="numberofrolltypes" value="<?php echo $idstromb;?>">
        <br />
        <input type="submit" class="submit" value="Add Strombolis To Cart">
      </form>
    </div>

    <div id="Subs" class ="formsFood"
         style="text-align:center;  width:500px; margin:0px auto">

        <img src="sub.jpg" alt="subs" 
             style="float:left; width:150px; height:70px; margin:5px auto">


	<button id="ShowHotButton" onclick="ShowHot()" >Hot Subs</button>
	<button id="ShowColdButton" onclick="ShowCold()">Cold Subs</button>
	<button id="ShowAllSubsButton" onclick="ShowAllSubs()">All Subs</button>

	
	<?php 
	  $sub = new Sub();
	  $allsubs = array();
	  $allsubs = $sub->getAllSubs();
	  $idsub=1;
	  $coldsubs = array();
	 
	  echo("<div id='HotSubs'><p>--Hot Subs--</p>");
          //echo str_replace("*","&nbsp;",str_pad("",25,"*"));
          //echo str_replace("*","&nbsp;",str_pad("Full",7,"*"));
          //echo str_replace("*","&nbsp;",str_pad("Half",10,"*"));
          //echo ('<br />');
          while(!empty($allsubs[$idsub]))
          {
            if($allsubs[$idsub]["Temp"] == "Hot")
	    {
              echo('<span class="subdescription">
                    '.$allsubs[$idsub]["Description"].'</span>');
              //echo str_replace("*","&nbsp;", 
              //               str_pad($allsubs[$idsub]["Description"],17,"*"));
              //echo(") ");
	      echo('<span class="subpricehalf">$'.$allsubs[$idsub]["PriceH"].'</span>');
              echo('$');
              //echo str_replace("*","&nbsp;", 
              //               str_pad(dm($allsubs[$idsub]["PriceH"]),6,"*"));
              echo('<span class="subpricefull">$'.$allsubs[$idsub]["PriceF"].'</span>');
              echo('$');
              //echo str_replace("*","&nbsp;", 
              //               str_pad(dm($allsubs[$idsub]["PriceF"]),6,"*"));
	      echo('<button id="'.$allsubs[$idsub]["Name"].'"  onclick="ChooseSub(');
	      echo("'");
	      echo($allsubs[$idsub]["Name"]);
	      echo("'");
	      echo(')">');
	      //echo($allsubs[$idsub]["Name"]);
              echo('Choose');
	      echo('</button>');
              echo ('<br />');
	    }
            else 
	    {
              array_push($coldsubs,$allsubs[$idsub]);	   
	    }
	    $idsub++;
          }
	  echo('</div>');
	  $idsub = 1;
	  echo("<div id='ColdSubs'><p>--Cold Subs--<p>");
          //echo str_replace("*","&nbsp;",str_pad("",25,"*"));
          //echo str_replace("*","&nbsp;",str_pad("Full",7,"*"));
          //echo str_replace("*","&nbsp;",str_pad("Half",10,"*"));
          //echo ('<br />');
	  while($idsub < count($coldsubs)+1)
	  {
            //echo str_replace("*","&nbsp;", 
            //                 str_pad($allsubs[$idsub]["Name"],8,"*"));
            //echo("(");
	    echo('<span class="subdescription">
                 '.$allsubs[$idsub]["Description"].'</span>');
            //echo str_replace("*","&nbsp;", 
            //                 str_pad($allsubs[$idsub]["Description"],17,"*"));
            //echo(") ");
	    echo('<span class="subpricehalf">$'.$allsubs[$idsub]["PriceH"].'</span>');
            //echo('$');
            //echo str_replace("*","&nbsp;", 
            //                 str_pad(dm($allsubs[$idsub]["PriceH"]),6,"*"));
	    echo('<span class="subpricefull">$'.$allsubs[$idsub]["PriceF"].'</span>');
            echo('$');
            //echo str_replace("*","&nbsp;", 
            //                 str_pad(dm($allsubs[$idsub]["PriceH"]),6,"*"));
            echo('<button id="'.$allsubs[$idsub]["Name"].'" onclick="ChooseSub(');
            echo("'");
            echo($allsubs[$idsub]["Name"]);
            echo("'");
            echo(')">');
	    echo($allsubs[$idsub]["Name"]);
            echo('Choose');
            echo('</button>');
            echo('<br />');
            $idsub++;
	  } 
	   
	  echo('</div><div id="SubUpdate">
                <form id="SubOrder" method="POST" action="addsubtocart.php">
	   Sub Name<input type="text" id="SubChoosen" name="name">
           Size
           <select name="size">
           <option>Half</option>
           <option value="Full">Full</option>
           </select>
	   Qty<input type=number name="quanity" min="0" max="5" value="0">
           <br />
	   <input type="checkbox" name="mayo" checked="checked">Mayo
	   <input type="checkbox" name="mustard" checked="checked">Mustard
	   <input type="checkbox" name="vinagrette" checked="checked">Vinagrette
	   <input type="checkbox" name="lettuce" checked="checked">Lettuce
           <br />
	   <input type="checkbox" name="olives" checked="checked">Olives
	   <input type="checkbox" name="onions" checked="checked">Onions
	   <input type="checkbox" name="sweetpeppers" >Sweet Peppers
	   <input type="checkbox" name="hotpeppers" >Hot Peppers
           </br></br>
           <input type="submit" value="ADD SUB TO ORDER"></form> </div></div>');
	?>
    
</div>
<br />
          
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
</div>

  <script>
	  
	  var saladquanity = document.getElementsByClassName("quanity");
for(i = 0; i < saladquanity.length; i++) saladquanity[i].style.display = "none";
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
  document.getElementById('Rolls').style.display = "none";
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
function ShowStrombolli() {
      var x = document.getElementById('Strombolli');
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
  document.getElementById('Strombolli').style.display = "none";
  document.getElementById('Calzone').style.display = "none";
  document.getElementById('Salad').style.display = "none";
  document.getElementById('Subs').style.display = "none";
  document.getElementById('SubOrder').style.display = "none";
  document.getElementById('HotSubs').style.display = "none";
  document.getElementById('ColdSubs').style.display = "none";
  document.getElementById('Rolls').style.display = "none";
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
  function ShowRolls() {
      var x = document.getElementById('Rolls');
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
      {
      all.push(checkboxes[i].value);
      document.getElementById("quanity"+checkboxes[i].value).style.display = "block";
  }else document.getElementById("quanity"+checkboxes[i].value).style.display = "none";
    }
  }
  document.getElementById(inputname).value = all;
  return all;
}
$(".pizzatoppings").change(function() {
    getalltoppings('Pizza', 'alltoppings');
}); 
$(".rollsname").change(function() {
	
    getallchecked('Rolls', 'allrollnames');
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
$(".pizzanames").change(function() {
	getalltoppings('Pizza', 'alltoppings');
});
$(".calzonenames").change(function() {
    getalltoppings('Calzone', 'allcalzonetoppings');
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