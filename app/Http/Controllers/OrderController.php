<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{  

    public function __construct(){
        $this->middleware("auth:admin");
      }
    
    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Order $order
     * @param \Illuminate\Http\Response
     */
    

    public function update(Request $request, Order $order){

        $order->update(
            [
                "delivered" => 1
            ]
            );
            return redirect()->back()->withSuccess("Order updated");
    }
      /**
     * @param \App\Order $order
     * @param \Illuminate\Http\Response
     */
    public function destroy(Request $request, Order $order){

        $order->delete();
        return redirect()->back()->withSuccess("Order updated");
    }
}
