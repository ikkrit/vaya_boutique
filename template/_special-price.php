<?php 
    $brand = array_map(function($pro){return $pro['item_brand'];}, $product_shuffle);
    $unique = array_unique($brand);
    sort($unique);
    shuffle($product_shuffle);

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['special_sale_submit'])) {
            $cart->addToCart($_POST['user_id'],$_POST['item_id']);
        }
    }
?>


<section id="special-price">
            <div class="container">
                <h4 class="font-rubik font-size-20">Special Price</h4>
                <div id="filters" class="button-group text-right font-baloo font-size-16">
                    <button class="btn is-checked" data-filter="*">All Brand</button>
                    <?php array_map(function ($brand){printf('<button class="btn" data-filter=".%s">%s</button>', $brand, $brand);}, $unique);?>
                </div>

                <div class="grid">

                    <?php array_map(function($item){?>

                    <div class="grid-item border <?=$item['item_brand'] ?? "Brand";?>">
                        <div class="item py-2" style="width:200px;">
                            <div class="product font-rale">
                                <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?=$item['item_image'] ?? "./assets/products/13.png";?>" class="img-fluid" alt="product 1"></a>
                                <div class="text-center">
                                    <h6><?=$item['item_name'] ?? "Unknowm";?></h6>
                                    <div class="rating text-warning font-size-12">
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="fas fa-star"></i></span>
                                        <span><i class="far fa-star"></i></span>
                                    </div>
                                    <div class="price py-2">
                                        <span><?=$item['item_price'] ?? 0;?>€</span>
                                    </div>
                                        <form method="post">
                                            <input type="hidden" name="item_id" value="<?=$item['item_id'] ?? '1';?>">
                                            <input type="hidden" name="user_id" value="<?=1;?>">
                                            <button type="submit" name="special_price_submit" class="btn btn-warning font-size-12">Add to Cart</button>
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php },$product_shuffle) ?>

                </div>

            </div>
</section>