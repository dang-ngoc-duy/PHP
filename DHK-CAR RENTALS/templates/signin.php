<div class="col-lg-2"></div>
<div class="panel panel-default col-lg-8">
    <div class="panel-body">
        <?php if($loginInfo == 0) { ?>
        <form class="form-horizontal" method="post" action="">
            <fieldset>
                <legend>Đăng nhập</legend>
                <div class="form-group">
                    <label for="inputUsername" class="col-lg-2 control-label">Tên đăng nhập</label>
                    <div class="col-lg-10">
                        <?php echo "<input type='text' class='form-control' name='username' value='" . @$values["username"] . "' placeholder='Username/Email' >" ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputFirstPassword" class="col-lg-2 control-label">Mật khẩu</label>
                    <div class="col-lg-10">
                        <?php echo "<input type='password' class='form-control' id='password' name='password' value='" . @$values["password"] . "' placeholder='Password' >" ?>
                        <div class="checkbox">
                            <label><input type="checkbox" onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'"> Hiện mật khẩu</label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2">
                        <button type="reset" class="btn btn-default" style="margin-right: 10px;">Hủy</button>
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </div>
                </div>
            </fieldset>
        </form>
        <br>
        <?php
        if(isset($errors)) {
            foreach ($errors as $error) {
                echo "<div class=\"alert alert-dismissible alert-danger fade in\">\n" .
                    "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>\n" .
                    "$error\n" .
                    "</div>\n";
            }
        }

        if(isset($success) && strlen($success) > 0) {
            echo "<div class=\"alert alert-dismissible alert-success fade in\">\n" .
                "<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>\n" .
                "$success\n" .
                "</div>\n";
        }
        ?>
        <?php } else { ?>
            <h3 class="lead">Bạn đã đăng nhập!</h3>
        <?php } ?>
    </div>
</div>
<div class="col-lg-2"></div>
