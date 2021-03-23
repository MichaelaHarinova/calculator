<?php require 'includes/header.php'?>
<!-- this is the view, try to put only simple if's and loops here.
Anything complex should be calculated in the model -->
<section>

    <h2>Products database</h2>

    <form id="productlist" name="productlist" method="post" action="<?php echo $PHP_SELF; ?>">
        Product list:
        <select Product Name='NEW'>
            <option value="">--- Select ---</option>
            <?php

            foreach($products AS $product):?>
                <option value="<?php echo $product->getName() . '-' . $product->getPrice(); ?>">
                    <?php echo $product->getName() . '-' . $product->getPrice(); ?>
                </option>
            <?php endforeach;?>
        </select>
    </form>

    <form id="customername" name="customername" method="post" action="<?php echo $PHP_SELF; ?>">
        Customer list:
        <select Product Name='NEW'>
            <option value="">--- Select ---</option>
            <?php
            foreach($customers AS $customer):?>
                <option value="<?php echo $customer->getFullName() ?>">
                </option>
            <?php endforeach;?>
        </select>
    </form>

    <form id="productlist" name="productlist" method="post" action="<?php echo $PHP_SELF; ?>">
        Customer group list:
        <select Product Name='NEW'>
            <option value="">--- Select ---</option>
            <?php
            foreach($groups AS $group):?>
                <option value="<?php echo $product->getGroupName() ?>">
                </option>
            <?php endforeach;?>
        </select>
        <input type="submit" name="Submit" value="Calculate discount" />
    </form>

</section>
<?php require 'includes/footer.php'?>