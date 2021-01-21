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

<?php if(!isset($car) || $car == null) { ?>
    <div class="panel panel-default" style="background-color: #ff333b">
        <div class="panel-body text-center">
            <h3 class="lead" style="color: #ffccc6">Không tìm thấy ô tô nào có ID này!</h3>
        </div>
    </div>
<?php } else { ?>
    <div class="panel panel-default">
        <div class="panel-body text-center">
            <h5><?= $car['name'] ?></h5>
            <img src="<?= $car['pic'] ?>" class="img-responsive"/>
            <br>

            <p class="lead text-left" style="margin: 10px;"><?= str_replace('\n', '<br>', $car['info']) ?></p>


            <div class="well" style="background-color: #effeff">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#rate_by_hour" data-toggle="tab" aria-expanded="true">Theo giờ</a></li>
                    <li class=""><a href="#rate_by_day" data-toggle="tab" aria-expanded="false">Theo ngày</a></li>
                    <li class=""><a href="#rate_by_km" data-toggle="tab" aria-expanded="false">Theo KM</a></li>
                </ul>

                <div id="tab-content" class="tab-content">
                    <div class="tab-pane fade active in" id="rate_by_hour">
                        <h5>VND <?= $car['rate_by_hour'] ?></h5>
                    </div>
                    <div class="tab-pane fade" id="rate_by_day">
                        <h5>VND <?= $car['rate_by_day'] ?></h5>
                    </div>
                    <div class="tab-pane fade" id="rate_by_km">
                        <h5>VND <?= $car['rate_by_km'] ?></h5>
                    </div>
                </div>
            </div>

            <?php
            $stock = $car['stock'];
            $color = getColor($stock);
            ?>

            <?= "<h5 class=\"text-$color\" >Còn : $stock chiếc</h5>"; ?>
            <?php if ($loginInfo != 0) { ?>
                <?php if ($stock == 0) $disable = "disabled"; else $disable = ""; ?>

                <a href="/rent/<?= $car['_id'] ?>" class="btn btn-<?=$color . " " . $disable?>">Thuê</a>
            <?php } else { ?>
                <h6>Đăng nhập/Đăng ký để thuê xe!</h6>
            <?php } ?>
        </div>
    </div>
<?php } ?>
