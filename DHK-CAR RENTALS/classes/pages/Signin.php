<?php

class Signin extends BasicPage {

    private $values = array();

    private function verify() {
        $errors = array();

        $required = ['username',  'password'];

        foreach ($required as $field) {
            if (!isset($_POST[$field]) || strlen($_POST[$field]) == 0)
                $errors[] = $field . ' là bắt buộc!';
            else
                $this->values[$field] = $_POST[$field];
        }

        return $errors;
    }

    public function render() {
        $this->setTitle('Đăng nhập');

        $errors = array();
        $success = "";
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = $this->verify();

            if(count($errors) == 0) {
                $id = User::doesUserExist($_POST['username']);
                if ($id == 0) {
                    $errors[] = 'Người dùng không tồn tại! Vui lòng đăng ký trước!';
                } else if(!User::verifyUser($id, $_POST['password'])) {
                    $errors[] = 'Sai mật khẩu!';
                } else {
                    $this->values = [];
                    Utils::login($id);
                    $this->refreshStatus();
                    $success = "Đăng nhập thành công!";
                }
            }
        }

        Renderer::render("signin.php", [
            'errors' => $errors,
            'values' => $this->values,
            'success' => $success
        ]);
    }

}
