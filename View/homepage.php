<section>
    <h2>Products database</h2>
    <form id="productlist" name="productlist" method="post">
        Product list:
        <select Name='productID'>
            <?php
            /** @var Product[] $products */
            foreach ($products as $product):?>
                <option value="<?php echo $product->getId(); ?>">
                    <?php echo $product->getName() . ' - ' . $product->getPrice(); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        Customer list:
        <select Name='customerID'>
            <?php
            /** @var Customer[] $customers */
            foreach ($customers as $customer):?>
                <option value="<?php echo $customer->getId(); ?>">
                    <?php echo $customer->getFirstName() . ' ' . $customer->getLastName(); ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <input id="submit" type="submit" name="calculate" value="Calculate you price"/>
    </form>
</section>
