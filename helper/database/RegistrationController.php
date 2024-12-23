<?php
require_once './helper/model/Registration.php';
require_once './helper/database/koneksi.php';

class RegistrationController extends Koneksi {
    public function create($user_id, $event_id, $name, $payment_method, $quantity, $total_price, $chair_number, $ip_address, $browser) {
        $name = mysqli_real_escape_string($this->getConnection(), $name);
        $payment_method = mysqli_real_escape_string($this->getConnection(), $payment_method);
        $ip_address = mysqli_real_escape_string($this->getConnection(), $ip_address);
        $browser = mysqli_real_escape_string($this->getConnection(), $browser);

        $registration = new Registration($user_id, $event_id, $name, $payment_method, $quantity, $total_price, $chair_number, $ip_address, $browser);
        $query = "INSERT INTO registrations (user_id, event_id, name, payment_method, quantity, total_price, chair_number, ip_address, browser) VALUES ('$registration->user_id', '$registration->event_id', '$registration->name', '$registration->payment_method', '$registration->quantity', '$registration->total_price', '$registration->chair_number', '$registration->ip_address', '$registration->browser')";
        $result = mysqli_query($this->getConnection(), $query);

        return $registration;
    }

    public function index() {
        $query = "SELECT * FROM registrations";
        $result = mysqli_query($this->getConnection(), $query);
        $registrations = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $registration = new Registration($row['user_id'], $row['event_id'], $row['name'], $row['payment_method'], $row['quantity'], $row['total_price'], $row['chair_number'], $row['ip_address'], $row['browser']);
            $registration->id = $row['id'];
            $registration->user_id = $row['user_id'];
            $registration->event_id = $row['event_id'];
            $registration->name = $row['name'];
            $registration->payment_method = $row['payment_method'];
            $registration->quantity = $row['quantity'];
            $registration->total_price = $row['total_price'];
            $registration->chair_number = $row['chair_number'];
            $registration->ip_address = $row['ip_address'];
            $registration->browser = $row['browser'];
            $registrations[] = $registration;
        }

        return $registrations;
    }

    public function findByEventId($event_id) {
        $event_id = mysqli_real_escape_string($this->getConnection(), $event_id);

        $query = "SELECT * FROM registrations WHERE event_id='$event_id'";
        $result = mysqli_query($this->getConnection(), $query);
        $registrations = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $registration = new Registration($row['user_id'], $row['event_id'], $row['name'], $row['payment_method'], $row['quantity'], $row['total_price'], $row['chair_number'], $row['ip_address'], $row['browser']);
            $registration->id = $row['id'];
            $registration->user_id = $row['user_id'];
            $registration->event_id = $row['event_id'];
            $registration->name = $row['name'];
            $registration->payment_method = $row['payment_method'];
            $registration->quantity = $row['quantity'];
            $registration->total_price = $row['total_price'];
            $registration->chair_number = $row['chair_number'];
            $registration->ip_address = $row['ip_address'];
            $registration->browser = $row['browser'];
            $registrations[] = $registration;
        }

        return $registrations;
    }

    public function update($id, $name, $payment_method, $quantity, $total_price, $ip_address, $browser) {
        $name = mysqli_real_escape_string($this->getConnection(), $name);
        $payment_method = mysqli_real_escape_string($this->getConnection(), $payment_method);
        $ip_address = mysqli_real_escape_string($this->getConnection(), $ip_address);
        $browser = mysqli_real_escape_string($this->getConnection(), $browser);

        $query = "UPDATE registrations SET name='$name', payment_method='$payment_method', quantity='$quantity', total_price='$total_price', ip_address='$ip_address', browser='$browser' WHERE id=$id";
        $result = mysqli_query($this->getConnection(), $query);
    }

    public function delete($id) {
        $query = "DELETE FROM registrations WHERE id=$id";
        $result = mysqli_query($this->getConnection(), $query);
    }
}
?>
