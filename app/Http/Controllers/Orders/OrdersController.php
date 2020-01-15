<?php

namespace App\Http\Controllers\Orders;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Orders\OrderData\OrderDataController;
use App\Interfaces\OrderInterface;

class OrdersController extends Controller
{

    private $order_interface;
    private $orders;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct( OrderInterface $order )
    {
        $this->order_interface  =   $order;
        $this->orders           =   new OrderDataController();
    }

    public function create(Request $request){
        $results    =   [];

        for ($j = 0; $j <= 9 ; $j++):
            $results[$j] =   json_decode($this->order_interface->execute_api_call('POST', 'v2/orders', $this->orders->lists()));
        endfor;

        return [
            'responseCode'  =>  200,
            'description'   =>  'Orders Successfully Inserted!',
            'data'          =>  $results
        ];
    }

    public function update(){
        $results    =   [];
        $get_order_lists    =   $this->get_order_lists();

        if(!empty($get_order_lists)):
            foreach ($get_order_lists->data as $order_list_key => $order_list_value):
                if($order_list_value->status == 'pending'):
                    $results[$order_list_key]    =   $this->order_interface->execute_api_call('PUT', 'v2/orders/'. $order_list_value->tracking_number .'/for-pickup', NULL);
                    print_r($results[$order_list_key]);
                endif;
            endforeach;
        endif;

        return [
            'responseCode'  =>  200,
            'description'   =>  'Orders Status Updated!',
            'data'          =>  $results
        ];
    }

    private function get_order_lists(){
        return json_decode($this->order_interface->execute_api_call('GET', 'v2/orders', NULL));
    }
}