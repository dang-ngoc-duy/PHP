<?php

class Logout extends BasicPage {

    public function render() {
        $this->setTitle('Đăng xuất');

        Utils::logout();
        $this->refreshStatus();

        Renderer::render("logout.php");
    }

}
