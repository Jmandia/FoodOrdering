<!DOCTYPE html>
<html>
<body>
<form method="post" action="FoodOrderingSystem.php">
	<fieldset class="main">
		<legend>Burgers</legend>
		<table>
				<tr class="tblHeader">
					<td>Name</td>
					<td>Price</td>
				</tr>
				<tr>
					<td class="menuName">
						<input type="checkbox" id="burger1" name="order[]" value="Hamburger|30.00">
						<label for="burger1"> Hamburger </label><br>
					</td>
					<td class="tblHeader">Php 30.00</td>
				</tr>
				<tr>
					<td class="menuName">
						<input type="checkbox" id="burger2" name="order[]" value="Cheese Burger|40.00">
						<label for="burger2"> Cheese Burger </label><br>
					</td>
					<td class="tblHeader">Php 40.00</td>
				</tr>
				<tr>
					<td class="menuName">
						<input type="checkbox" id="burger3" name="order[]" value="Fries|50.00">
						<label for="burger3"> Fries </label><br>
					</td>
					<td class="tblHeader">Php 50.00</td>
				</tr>
		</table>
	</fieldset>
	
	<fieldset class="main">
		<legend>Beverages</legend>
		<table>
				<tr class="tblHeader">
					<td>Name</td>
					<td>Price</td>
				</tr>
				<tr>
					<td class="menuName">
						<input type="checkbox" id="Beverages1" name="order[]" value="Coke|60.00">
						<label for="Beverages1"> Coke </label><br>
					</td>
					<td class="tblHeader">Php 60.00</td>
				</tr>
				<tr>
					<td class="menuName">
						<input type="checkbox" id="Beverages2" name="order[]" value="Sprite|70.00">
						<label for="Beverages2"> Sprite </label><br>
					</td>
					<td class="tblHeader">Php 70.00</td>
				</tr>
				<tr>
					<td class="menuName">
						<input type="checkbox" id="Beverages3" name="order[]" value="Tea|80.00">
						<label for="Beverages3"> Tea </label><br>
					</td>
					<td class="tblHeader">Php 80.00</td>
				</tr>
		</table>
	</fieldset>
	
	<fieldset class="main">
		<legend>Combo Meals</legend>
		<table>
				<tr class="tblHeader">
					<td>Name</td>
					<td>Price</td>
				</tr>
				<tr>
					<td class="menuName">
						<input type="checkbox" id="C1" name="order[]" value=" Chicken Combo Meal|90.00">
						<label for="C1"> Chicken Combo Meal </label><br>
					</td>
					<td class="tblHeader">Php 90.00</td>
				</tr>
				<tr>
					<td class="menuName">
						<input type="checkbox" id="C2" name="order[]" value="Pork Combo Meal|100.00">
						<label for="C2"> Pork Combo Meal </label><br>
					</td>
					<td class="tblHeader">Php 100.00</td>
				</tr>
				<tr>
					<td class="menuName">
						<input type="checkbox" id="C3" name="order[]" value="Fish Combo Meal|110.00">
						<label for="C3"> Fish Combo Meal </label><br>
					</td>
					<td class="tblHeader">Php 110.00</td>
				</tr>
		</table>
	</fieldset>
Enter Coupon : <input type="text" name="Coupon"> 
<input type="submit" value="Proceed" name="Proceed" class="proceed">
</form>
<fieldset class="main">
		<legend>Order Summary</legend>
		<?php
		if(isset($_POST['Proceed'])){
			$orders = "";
			$total = 0;
			$disc = 0;
			if(!empty($_POST['order'])) {
				foreach($_POST['order'] as $value){
					$value = explode("|",$value);
					$total += $value[1];
					$orders = $orders .$value[0].'<div class="right">Php '. $value[1] .'</div><br/>';
				}
				if(!empty($_POST['Coupon'])){
					$coup = $_POST['Coupon'];
					if($coup == "GO2018"){
						$disc = $total * .10;
						$total= $total-$disc;
						$orders = $orders ." Coupon (".$coup.')<div class="right">- Php '. $disc .'.00 </div><br/>';
					}
					else{
						$orders = $orders ."Invalid Coupon (".$coup.')<div class="right">- Php '. $disc .'</div><br/>';
					}
				}
				echo $orders;
				echo "<div class='right'>__________________________</div><br/>";
				
				echo "<div class='right'> TOTAL : Php  " .$total .".00 </div><br/>";
			}
			else
				echo "No Order Selected.";
		}
		else{
			echo "Please select from the menu above.";
		}
?>
</fieldset>
</body>
</html>
<script language="JavaScript">
      
       window.onload = function () {
           document.addEventListener("contextmenu", function (e) {
               e.preventDefault();
           }, false);
           document.addEventListener("keydown", function (e) {
               // "I" key
               if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                   disabledEvent(e);
               }
               // "J" key
               if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                   disabledEvent(e);
               }
               // "S" key + macOS
               if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                   disabledEvent(e);
               }
               // "U" key
               if (e.ctrlKey && e.keyCode == 85) {
                   disabledEvent(e);
               }
               // "F12" key
               if (event.keyCode == 123) {
                   disabledEvent(e);
               }
           }, false);
           function disabledEvent(e) {
               if (e.stopPropagation) {
                   e.stopPropagation();
               } else if (window.event) {
                   window.event.cancelBubble = true;
               }
               e.preventDefault();
               return false;
           }
       }
//edit: removed ";" from last "}" because of javascript error
</script>
<style>
.right{
	float:right;
}
.tblHeader{
	text-align: center;
}
.menuName{
	padding-left:90px;
}
td{
	width:200px;
}
.proceed{
	width : 10.5%;
	margin : 5px;
}
.field_sub2{
	height : 100%;
}
.main{
	min-width:30%;
	max-width:30%;
}
</style>