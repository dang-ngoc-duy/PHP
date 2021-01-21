<?php

class Rent extends BasicPage {

    private $car_id;
    private $values = array();

    public function __construct($id) {
        parent::__construct();

        $this->car_id = $id;
    }

    private function verify() {
        $errors = array();

        $required = ['mode',  'value'];

        foreach ($required as $field) {
            if (!isset($_POST[$field]) || strlen($_POST[$field]) == 0)
                $errors[] = $field . ' là bắt buộc!';
            else
                $this->values[$field] = $_POST[$field];
        }

        return $errors;
    }

    public function render() {
        $this->setTitle('Thuê xe');

        $user = '';

        if($this->getLoginInfo() != 0 ){
            $user = User::getUserInfo($this->getLoginInfo());
        } else {
            $errors[] = 'Bạn chưa đăng ký tài khoản! Vui lòng đăng ký tài khoản trước khi thuê!';
        }

        $errors = array();
        $success = "";

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $errors = $this->verify();
            if(count($errors) == 0) {
                $result = RentalService::insertRental([
                    'car_id' => $this->car_id,
                    'user_id' => $this->getLoginInfo(),
                    'mode' => $this->values['mode'],
                    'value' => $this->values['value']
                ]);
                
                if($result != 0) {
                    RentalService::downCarStock($this->car_id);
                    $success = 'Thuê xe thành công!';
                } else {
                    $errors[] = 'Thuê xe không thành công';
                }
            }
        }

        Renderer::render("rent.php", [
            'user' => $user,
            'car' => RentalService::getCarDetails($this->car_id),
            'values' => $this->values,
            'errors' => $errors,
            'success' => $success
        ]);
    }

}
