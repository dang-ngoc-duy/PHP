<div class="panel panel-default">
    <div class="panel-body">
        <div class="col-lg-4">
            <?php if($loginInfo == 0) { ?>
                <h4>Đăng nhập/Đăng ký để thuê xe</h4>
            <?php } else { ?>
                <h4>Hello, <?=$user['first_name']?> </h4>
            <?php } ?>
        </div>
    </div>
</div>

<?php function getColor($stock) {
    $color = 'danger';

    if($stock > 50){
        $color = 'success';
    } else if($stock > 20) {
        $color = 'warning';
    }

    return $color;
}
?>

<div class="row">
    <?php foreach ($cars as $car) { ?>
        <div class="col-md-3 text-center">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4><?= $car['name'] ?></h4>
                    <img src="<?= $car['pic'] ?>" class="img-responsive" style="height: 160px;"/>

                    <?php
                    $stock = $car['stock'];
                    $color = getColor($stock);
                    ?>

                    <?= "<h5 class=\"text-$color\" >Còn : $stock chiếc </h5>"; ?>
                    <a href="/car/<?= $car['_id'] ?>"><button class="btn btn-primary">Chi tiết</button></a>
                    <?php if ($loginInfo != 0) { ?>
                        <?php if ($stock == 0) $disable = "disabled"; else $disable = ""; ?>

                        <a href="/rent/<?= $car['_id'] ?>" class="btn btn-<?=$color . " " . $disable?>" style="margin-left: 10px;">Thuê</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
</div>
