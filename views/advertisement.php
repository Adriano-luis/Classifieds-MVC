<div class="container-fluid">
    <div class="row">
        <div class="col-sm-4">
            <div class="carousel slide" data-ride="carousel" id="myCarousel">
                <div class="carousel-inner" role="listbox">
                    <?php if(isset($info['photos'])): ?>
                        <?php foreach($info['photos'] as $key => $photo): ?>
                            <div class="item <?= ($key == 0) ? 'active' : '' ?>">
                                <?php isset($photo['url']) ? $img = $photo['url'] : $img = 'default.png';?>
                                <img src="<?= BASE_URL;?>assets/images/advertisements/<?= $img ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="item active">
                            <?php  $img = 'default.png';?>
                            <img src="<?= BASE_URL;?>assets/images/advertisements/<?= $img ?>" alt="">
                        </div>
                    <?php endif; ?>
                </div>
                <a href="#myCarousel" class="left carousel-control" role="button" data-slide="prev"><span><</span></a>
                <a href="#myCarousel" class="right carousel-control" role="button" data-slide="next"><span>></span></a>
            </div>
        </div>
        <div class="col-sm-8">
            <h1><?= $info['title']; ?></h1>
            <h2 class="h4"><?= $info['category']; ?></h2>
            <p><?= $info['description']; ?></p><br>
            <h3>U$<?= number_format($info['price'], 2); ?></h3>
            <h4>Phone: <?= $info['phone']; ?></h4>
        </div>
    </div>
</div>