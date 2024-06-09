<div class="popular" id="pops">
    <div class="container p-2">
        <h2 class="title4 text-center">DISCOVER YOUR ASIA</h2>
        <h3 class="title5 text-center">popular dishes</h3>
        <div class="row popular-2 gap-5">

            <?php foreach ($produk as $pro) : ?>
            <div class="card p-0 rounded-0 text-center gap-3" style="width: 25rem;">
                <img src="assets/img/<?= $pro["gambar"] ?>" class="object-fit-cover" width="400px" height="350px" alt="...">
                <div class="card-body lh-lg">
                    <h5 class="card-title"><?= $pro["nama"] ?></h5>
                    <p class="card-text"><?= $pro["desk"] ?></p>
                    <a href="#" class="btn btn-danger rounded-0">ORDER ONLINE</a>
                </div>
            </div>
            <?php endforeach; ?>        
            
        </div>


    </div>
</div>