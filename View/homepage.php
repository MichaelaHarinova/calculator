<section>
    <h2>Products database</h2>
    <form id="productlist" name="productlist" method="post">
        Product list:
        <select Name='productID'>
            <option value="">--- Select ---</option>
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
            <option value="">--- Select ---</option>
            <?php
            /** @var Customer[] $customers */
            foreach ($customers as $customer):?>
                <option value="<?php echo $customer->getId(); ?>">
                    <?php echo $customer->getFirstName() . ' ' . $customer->getLastName(); ?>
                </option>
            <?php endforeach; ?>
        </select><br>
        <input id="submit" type="submit" name="calculate" value="Calculate discount"/>
    </form>
    <div class="result"><?php ?></div>
</section>
