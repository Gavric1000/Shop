<div id="jshop_module_cart">
    <div class="jshop_module_cart_inner">
    	<span id = "jshop_quantity_products"><?php print $cart->count_product?> <?php print _JSHOP_PRODUCTS_X?></span> <span id = "jshop_summ_product"><?php print formatprice($cart->getSum(0,1))?></span>
    </div>
	<p class="btn-cart"><a href = "<?php print SEFLink('index.php?option=com_jshopping&controller=cart&task=view', 1)?>"><?php print _JSHOP_GO_TO_CART?></a></p>
</div>