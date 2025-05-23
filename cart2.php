<?php
	// the shopping cart needs sessions, to start one
	/*
		Array of session(
			cart => array (
				book_isbn (get from $_POST['book_isbn']) => number of books
			),
			items => 0,
			total_price => '0.00'
		)
	*/
	session_start();
	require_once "./functions/db_functions.php";
	require_once "./functions/cart_functions.php";
	require "config.php";

	// book_isbn got from form post method, change this place later.
	if(isset($_POST['gameid'])){
		$book_isbn = $_POST['gameid'];
	}

	if(isset($book_isbn)){
		// new iem selected
		if(!isset($_SESSION['cart'])){
			// $_SESSION['cart'] is associative array that bookisbn => qty
			$_SESSION['cart'] = array();

			$_SESSION['total_items'] = 0;
			$_SESSION['total_price'] = '0.00';
		}

		if(!isset($_SESSION['cart'][$book_isbn])){
			$_SESSION['cart'][$book_isbn] = 1;
		} elseif(isset($_POST['cart'])){
			$_SESSION['cart'][$book_isbn]++;
			unset($_POST);
		}
	}

	// if save change button is clicked , change the qty of each bookisbn
	if(isset($_POST['save_change'])){
		foreach($_SESSION['cart'] as $isbn =>$qty){
			if($_POST[$isbn] == '0'){
				unset($_SESSION['cart']["$isbn"]);
			} else {
				$_SESSION['cart']["$isbn"] = $_POST["$isbn"];
			}
		}
	}

	// print out header here
	$title = "Your shopping cart";
	

	if(isset($_SESSION['cart'])){
		$_SESSION['total_price'] = total_price($_SESSION['cart']);
		$_SESSION['total_items'] = total_items($_SESSION['cart']);
?>
   	<form action="cart2.php" method="post">
	   	<table class="table">
	   		<tr>
	   			<th>Item</th>
	   			<th>Price</th>
	  			<th>Quantity</th>
	   			<th>Total</th>
	   		</tr>
	   		<?php
		    	foreach($_SESSION['cart'] as $isbn => $qty){
					
					$book = mysqli_fetch_assoc(getBookByIsbn($link, $isbn));
			?>
			<tr>
				<td><?php echo $book['PName'] ; ?></td>
				<td><?php echo "₹" . $book['PPrice']; ?></td>
				<td><input type="text" value="<?php echo $qty; ?>" size="2" name="<?php echo $isbn; ?>"></td>
				<td><?php echo "₹" . $qty * $book['PPrice']; ?></td>
			</tr>
			<?php } ?>
		    <tr>
		    	<th>&nbsp;</th>
		    	<th>&nbsp;</th>
		    	<th><?php echo $_SESSION['total_items']; ?></th>
		    	<th><?php echo "₹" . $_SESSION['total_price']; ?></th>
		    </tr>
	   	</table>
	   	<input type="submit" class="btn btn-primary" name="save_change" value="Save Changes">
	</form>
	<br/><br/>
	<a href="purchase.php?clear=1" class="btn btn-primary">Purchase</a> 
	<a href="books.php" class="btn btn-primary">Continue Shopping</a>
<?php
	} else {
		echo "<p class=\"text-warning\">Your cart is empty! Please make sure you add some books in it!</p>";
	}
	if(isset($link)){ mysqli_close($link); }
?>