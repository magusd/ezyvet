<?php $this->layout('layout', ['title' => 'Products']) ?>

<?php //dd($products)
?>
<?php foreach ($products as $product): ?>
    <div class="card" style="width: 18rem;">
        <img src="https://picsum.photos/id/<?= intval($product['price']) ?>/200" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $product['name'] ?></h5>
            <p class="card-text">$<?= $product['price'] ?></p>
            <form method="post" action="/cart">
                <div class="form-row align-items-center">
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                    <div class="col-auto my-1">
                        <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
                        <select name="quantity" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected>Choose...</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>
                    <div class="col-auto my-1">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php endforeach ?>
