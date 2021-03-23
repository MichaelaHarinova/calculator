<?php //require 'View/includes/header.php'?>

    <h2>Products database</h2>

    <table>
        <thead>
        <tr>
            <th>Product ID</th>
            <th>Product name</th>
            <th>Product price</th>
        </tr>
        </thead>
        <tbody>
        <?php
        /** @var Product $product */
        foreach($products AS $product):?>
            <tr>
                <td><?php echo $product->getName() ?></td>
                <td><?php echo $product->getPrice() ?></td>
            </tr>
        <?php endforeach;?>
        </tbody>
    </table>

<?php //require 'View/includes/footer.php'?>