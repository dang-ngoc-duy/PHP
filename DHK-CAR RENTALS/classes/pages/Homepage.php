<?php

class Homepage extends BasicPage {

    public function render() {
        $this->setTitle('Trang chủ');

        $user = '';

        if($this->getLoginInfo() != 0 ){
            $user = User::getUserInfo($this->getLoginInfo());
        }

        Renderer::render("home.php", [
            'user' => $user,
            'cars' => RentalService::getCars()
        ]);
    }

}
