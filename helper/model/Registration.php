<?php

class Registration
{
    public $id;
    public $user_id;
    public $event_id;
    public $name;
    public $payment_method;
    public $quantity;
    public $total_price;
    public $chair_number;
    public $ip_address;
    public $browser;
    public $created_at;

    public function __construct($user_id, $event_id, $name, $payment_method, $quantity, $total_price, $chair_number = null, $ip_address = null, $browser = null)
    {
        $this->user_id = $user_id;
        $this->event_id = $event_id;
        $this->name = $name;
        $this->payment_method = $payment_method;
        $this->quantity = $quantity;
        $this->total_price = $total_price;
        $this->chair_number = $chair_number;
        $this->ip_address = $ip_address;
        $this->browser = $browser;
        $this->created_at = date('Y-m-d H:i:s');
    }
}