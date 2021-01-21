<?php foreach ($rentals as $rental) { ?>
<?php $rate = $rental["rate_by_" . $rental["mode"]]; ?>
<?php
    $mode;
    if($rental['mode'] == "hour")
    {
        $mode = "giờ";
    }
    if($rental['mode'] == "day"){
        $mode = "ngày";
    }
?>
<div class="col-md-4">
    <div class="panel panel-default">
        <div class="panel-body text-center">
            <h5><strong><?=$rental['first_name'] . " " . $rental['last_name']?></strong></h5>
            đã thuê
            <div>
                <a href="/car/<?=$rental['car_id']?>"><img src="<?=$rental['pic']?>" class="img-thumbnail" style="height: 190px" /></a><br>
                <h5><?=$rental['name']?></h5>
            </div>
            cho  <h6 style="display: inline"><?=$rental['value'] . " " . $mode?></h6><br>
            lúc  <h6 style="display: inline"><?=$rental['time']?></h6><br>
            với giá  <h6 style="display: inline"><?=$rental['value']*$rate?>VNĐ</h6><br><br>
            <form method="post">
                <input name="transaction_id" value="<?=$rental["_id"]?>" style="display: none"/>
                <button type="submit" class="btn btn-danger">Hủy</button>
            </form>
        </div>
    </div>
</div>
<?php } ?>
