<?php
require_once './helper/model/Event.php';
require_once './helper/database/koneksi.php';

class EventController extends Koneksi {
    public function create($title, $category, $location, $description, $date, $price) {
        $title = mysqli_real_escape_string($this->getConnection(), $title);
        $category = mysqli_real_escape_string($this->getConnection(), $category);
        $location = mysqli_real_escape_string($this->getConnection(), $location);
        $description = mysqli_real_escape_string($this->getConnection(), $description);
        $date = mysqli_real_escape_string($this->getConnection(), $date);
        $price = mysqli_real_escape_string($this->getConnection(), $price);

        $event = new Event($title, $category, $location, $description, $date, $price);
        $query = "INSERT INTO events (title, category, location, description, date, price, created_at) VALUES ('$event->title', '$event->category', '$event->location', '$event->description', '$event->date', '$event->price', '$event->created_at')";
        $result = mysqli_query($this->getConnection(), $query);

        return $event;
    }

    public function index() {
        $query = "SELECT * FROM events";
        $result = mysqli_query($this->getConnection(), $query);
        $events = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $event = new Event($row['title'], $row['category'], $row['location'], $row['description'], $row['date'], $row['price']);
            $event->id = $row['id'];
            $event->title = $row['title'];
            $event->category = $row['category'];
            $event->location = $row['location'];
            $event->description = $row['description'];
            $event->date = $row['date'];
            $event->price = $row['price'];
            $event->created_at = $row['created_at'];
            $events[] = $event;
        }

        return $events;
    }

    public function findByCategory($category) {
        $category = mysqli_real_escape_string($this->getConnection(), $category);
        $query = "SELECT * FROM events WHERE category='$category'";
        $result = mysqli_query($this->getConnection(), $query);
        $events = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $event = new Event($row['title'], $row['category'], $row['location'], $row['description'], $row['date'], $row['price']);
            $event->id = $row['id'];
            $event->title = $row['title'];
            $event->category = $row['category'];
            $event->location = $row['location'];
            $event->description = $row['description'];
            $event->date = $row['date'];
            $event->price = $row['price'];
            $event->created_at = $row['created_at'];
            $events[] = $event;
        }

        return $events;
    }

    public function show($id) {
        $query = "SELECT * FROM events WHERE id=$id";
        $result = mysqli_query($this->getConnection(), $query);
        $row = mysqli_fetch_assoc($result);
        $event = new Event($row['title'], $row['category'], $row['location'], $row['description'], $row['date'], $row['price']);
        $event->id = $row['id'];
        $event->title = $row['title'];
        $event->category = $row['category'];
        $event->location = $row['location'];
        $event->description = $row['description'];
        $event->date = $row['date'];
        $event->price = $row['price'];
        $event->created_at = $row['created_at'];

        return $event;
    }

    public function update($id, $title, $category, $location, $description, $date, $price) {
        $title = mysqli_real_escape_string($this->getConnection(), $title);
        $category = mysqli_real_escape_string($this->getConnection(), $category);
        $location = mysqli_real_escape_string($this->getConnection(), $location);
        $description = mysqli_real_escape_string($this->getConnection(), $description);
        $date = mysqli_real_escape_string($this->getConnection(), $date);
        $price = mysqli_real_escape_string($this->getConnection(), $price);

        $query = "UPDATE events SET title='$title', category='$category', location='$location', description='$description', date='$date', price='$price' WHERE id=$id";
        $result = mysqli_query($this->getConnection(), $query);
    }

    public function delete($id) {
        $query = "DELETE FROM events WHERE id=$id";
        $result = mysqli_query($this->getConnection(), $query);
    }
}
?>