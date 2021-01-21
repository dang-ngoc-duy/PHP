<?php

class Register extends BasicPage {

    private $defaults = [
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'email' => 'Email',
        'username' => 'Username',
        'password' => 'Password',
        'password_two' => 'Repeat Password',
        'street' => 'Street',
        'city' => 'City',
        'state' => 'State',
        'country' => 'Country',
        'zip' => 'Zip Code',
        'ph_no' => 'Phone Number'
    ];

    private $values = array();

    private function verify() {
        $errors = array();

        $required = ['first_name', 'last_name', 'email',
            'username', 'password', 'password_two',
            'street', 'city', 'state', 'country', 'zip'];


        foreach ($required as $field) {
            if (!isset($_POST[$field]) || strlen($_POST[$field]) == 0)
                $errors[] = $this->defaults[$field] . ' là bắt buộc!';
            else
                $this->values[$field] = $_POST[$field];
        }

        if(count($errors) == 0) {
            if($_POST['password'] != $_POST['password_two'])
                $errors[] = 'Mật khẩu nhập lại chưa khớp!';
            else if(strlen($_POST['password']) < 6)
                $errors[] = 'Mật khẩu phải hơn 6 ký tự!';
            else if(strlen($_POST['username']) < 4)
                $errors[] = 'Tên đăng nhập phải hơn 3 ký tự!';

        }

        return $errors;
    }


    public function render() {
        $this->setTitle('Đăng ký');

        $errors = array();
        $success = "";
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = $this->verify();

            if(count($errors) == 0) {
                $result = User::insertUser($_POST);
                if(is_int($result) && $result != 0)
                    $success = "Đăng ký thành công!";
                else if(is_int($result) && $result == 0)
                    $errors[] = "Có lỗi đã xãy ra!";
                else {
                    if(strstr($result, '23000') && strstr($result, 'email'))
                        $errors[] = 'Email này đã có người đăng ký!';
                    else if(strstr($result, '23000') && strstr($result, 'username'))
                        $errors[] = 'Tên đăng nhập đã có người đăng ký!';
                    else {
                        $this->values = array();
                        $success = "Đăng ký thành công!";
                    }
                }
            }
        }

        Renderer::render('register.php', [
            'errors' => $errors,
            'defaults' => $this->defaults,
            'values' => $this->values,
            'success' => $success
        ]);
    }
}
