<?php

namespace App\Http\Controllers\Orders\OrderData;

use App\Http\Controllers\Controller;

class OrderDataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    // }

    private function generate_reference_id(){
        $gen_id = NULL;
        
        for ($i = 0; $i < 6; $i++):
            $gen_id .= mt_rand(0,9);
        endfor;

        return sha1(md5(date('Y-m-d H:i:s') . $gen_id));
    }

    public function lists(){
        $parameters     =   [
            "reference_id"      =>  $this->generate_reference_id(),
            "currency"          =>  "PHP",
            "total"             =>  "3153.25",
            "payment_method"    =>  "cod",
            "status"            =>  "pending",
            "payment_provider"  =>  "lbcx",
            "shipment"          =>  "big-pouch",
            "buyer_name"        =>  "Cesar Sales III",
            "buyer_id"          =>  "12345",
            "metadata"          =>  ["key_1" => "value_1","key_2" => "value_2"],
            "delivery_address"  =>  [
                "name"          =>  "Cesar Sales III",
                "company"       =>  "Maxis",
                "phone_number"  =>  "6358972",
                "mobile_number" =>  "+63907117421",
                "line_1"        =>  "3F U311 Bldg. C",
                "line_2"        =>  "Jade St.",
                "district"      =>  "San Fernando",
                "city"          =>  "Mangaldan",
                "state"         =>  "Pangasinan",
                "postal_code"   =>  "4233",
                "country"       =>  "PH",
                "remarks"       =>  "Optional notes / remarks go here."
            ],
            "return_address"    =>  [
                "name"          =>  "JJ. ABC",
                "company"       =>  "Maxis",
                "phone_number"  =>  "6358972",
                "mobile_number" =>  "+63907117421",
                "line_1"        =>  "3F U311 Bldg. C",
                "line_2"        =>  "Jade St.",
                "city"          =>  "Baguio City",
                "state"         =>  "Benguet",
                "postal_code"   =>  "1226",
                "country"       =>  "PH",
                "remarks"       =>  "Optional notes / remarks go here."
            ],
            "pickup_address"    =>  [
                "name"          =>  "JJJ. Doe",
                "company"       =>  "Maxis",
                "phone_number"  =>  "6358972",
                "mobile_number" =>  "+63907117421",
                "line_1"        =>  "3F U311 Bldg. C",
                "line_2"        =>  "Jade St.",
                "city"          =>  "Baguio City",
                "state"         =>  "Benguet",
                "postal_code"   =>  "1226",
                "country"       =>  "PH",
                "remarks"       =>  "Optional notes / remarks go here."
            ],
            "preferred_pickup_time"  =>  "morning",
            "preferred_delivery_time"   =>  "3pm - 5pm",
            "email" =>  "johndoe@email.com",
            "contact_number"    =>  "+639172274819",
            "items" =>  [
                [
                "type"  =>  "product",
                "description"   =>  "Red Shirt",
                "amount"    =>  1250,
                "quantity"  =>  1,
                "metadata"  =>  ["size" => "medium","color" => "red"]
                ],
                [
                "type"  =>  "product",
                "description"   =>  "Blue Shirt",
                "amount"    =>  700,
                "quantity"  =>  2,
                "metadata"  =>  ["size" => "medium","color" => "blue"]
                ],
                [
                "type"  =>  "tax",
                "description"   =>  "Tax",
                "amount"    =>  132.50
                ],
                [
                "type"  =>  "shipping",
                "description"   =>  "Expedited Shipping",
                "amount"    =>  150
                ],
                [
                "type"  =>  "fee",
                "description"   =>  "Handling Fee",
                "amount"    =>  20
                ],
                [
                "type"  =>  "fee",
                "description"   =>  "Gift Wrapping Fee",
                "amount"    =>  50.75
                ],
                [
                "type"  =>  "insurance",
                "description"   =>  "Insurance",
                "amount"    =>  150
                ]
            ]   
        ];

        return $parameters;
    }
}
