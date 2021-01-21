<?php

class RentalService {

    public static function getCars() {
        $query = "SELECT * FROM cars";

        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getCar($id) {
        $query = "SELECT *  FROM cars WHERE _id = :id ";

        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function getCarDetails($id) {
        $query = "SELECT *  FROM cars, car_rates WHERE _id = :id AND car_id = :id";

        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function removeRental($id) {
        $query = "DELETE from transaction WHERE `_id` = :id";

        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();

    }

    public static function getRentalsForUser($id) {
        $query = "SELECT transaction._id, cars.`_id` as car_id, mode, value, name, pic, rate_by_hour, rate_by_day, rate_by_km, first_name, last_name, date_format(time, '%D %b %Y, %I:%i %p') as time FROM transaction, cars, users, car_rates where transaction.car_id = cars.`_id` AND users.`_id` = transaction.user_id AND car_rates.car_id = cars.`_id` AND users.`_id` = :id";

        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getRentals() {
        $query = "SELECT transaction._id, cars.`_id` as car_id, mode, value, name, pic, rate_by_hour, rate_by_day, rate_by_km, first_name, last_name, date_format(time, '%D %b %Y, %I:%i %p') as time FROM transaction, cars, users, car_rates where transaction.car_id = cars.`_id` AND users.`_id` = transaction.user_id AND car_rates.car_id = cars.`_id`";

        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function insertRental($transactionArray) {
        $fields = ['user_id', 'car_id', 'mode', 'value'];

        $db = Database::getInstance()->getDb();

        try {
            $db->beginTransaction();

            $query = 'SELECT stock FROM cars WHERE _id = :id';
            $stmt = $db->prepare($query);
            $stmt->bindParam(":id", $transactionArray['car_id']);
            $stmt->execute();

            if($stmt->fetchColumn() > 0){
                $query = 'INSERT INTO transaction(' . implode(',', $fields) . ') VALUES(:' . implode(',:', $fields) . ')';

                $stmt = $db->prepare($query);

                $prepared_array = array();
                foreach ($fields as $field) {
                    $prepared_array[':' . $field] = @$transactionArray[$field];
                }

                $stmt->execute($prepared_array);
                $id = Database::getInstance()->getDb()->lastInsertId();
            } else {
                return 0;
            }

            $db->commit();
        } catch (PDOException $ex) {
            $db->rollBack();
            return $ex->getMessage();
        }

        return $id;
    }
    //Duy them
    public static function downCarStock($id) {
        $query = "UPDATE `cars` SET stock = stock - 1 WHERE _id = :id";

        $stmt = Database::getInstance()
            ->getDb()
            ->prepare($query);

        $stmt->bindParam(":id", $id);
        $stmt->execute();

    }
    public static function upCarStock($id) {
        
        $db = Database::getInstance()->getDb();
        
        $query = 'SELECT car_id FROM transaction WHERE _id = :id';
        
        $stmt = $db->prepare($query);
        $stmt->bindParam(":id", $id);
        //Thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        $resultSet = $stmt->fetchAll();
        /*Trong trường hợp chưa setFetchMode() bạn có thể sử dụng
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);*/
        foreach ($resultSet as $row) {

            
            $query2 = "UPDATE `cars` SET stock = stock + 1 WHERE _id = ".$row['car_id'];

            $stmt2 = $db->prepare($query2);

            $stmt2->execute();
        }

    }

}
