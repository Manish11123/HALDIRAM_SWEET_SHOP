<?php
function total_price($cart)
{
	$price = 0.0;
	if (is_array($cart)) {
		foreach ($cart as $id => $qty) {
			$gameprice = total_price($id);
			if ($gameprice) {
				if ((isset($_POST[$id])) && $_POST[$id] == 1) {
					$price += $gameprice + ($qty-1);
				}else{
					$price += $gameprice + ($qty);
				}
			}
		}
	}
	return $price;
}

function total_items($cart)
{
	$items = 0;
	if (is_array($cart)) {
		foreach ($cart as $id => $qty) {
			$items += $qty;
		}
	}
	return $items;
}
?>