<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaypalPaymentController extends Controller
{
    public function _construct(){
        $this->middleware("auth");
    }
    public function handlePayment(Request $request)
    {
        if($request->get("paymenttype") == "paypal"){
            $data = [];
            $data['items'] = [];
             foreach(\Cart::getContent() as $item){
                  array_push($data['items'], [
                   'name' => $item->name,
                   'price' => (int)($item->price / 10),
                    'desc' => $item->associatedModel->description,
                    'qty' => $item->quantity
                  ]);
             }
      
            $data['invoice_id'] = auth()->user()->id;
            $data['invoice_description'] = "Order #{$data['invoice_id']}";
            $data['return_url'] = route('success.payment');
            $data['cancel_url'] = route('cancel.payment');
            $total = 0;
            foreach($data['items'] as $item){
                $total += $item['price'] * $item['qty']; 
            }
      
            $data['total'] = $total;
    
            $paypalModule = new ExpressCheckout;
      
            $res = $paypalModule->setExpressCheckout($data);
            $res = $paypalModule->setExpressCheckout($data, true);
      
            return redirect($res['paypal_link']);
        }
        else if($request->get("paymenttype") == "cash"){
            foreach(\Cart::getContent() as $item){
                Order::create([
                   "user_id" => auth()->user()->id,
                   "product_name" => $item->name,
                   "qty" => $item->quantity,
                   "price" => $item->price,
                   "total" => $item->price *$item->quantity,
                   "paid" => 0
                ]);
                \Cart::clear();
               }
               return redirect()->route('cart')->with(
                [
                    'success' => 'votre commande est effectuee'
                ]
                );
        }
        
    }
    public function payementCancel(){
        return redirect()->route('cart')->with(
            [
                'info' => 'vous avez annuler le paiement'
            ]
            );
    }
    public function paymentSuccess(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            foreach(\Cart::getContent() as $item){
             Order::create([
                "user_id" => auth()->user()->id,
                "product_name" => $item->name,
                "qty" => $item->quantity,
                "price" => $item->price,
                "total" => $item->price *$item->quantity,
                "paid" => 1
             ]);
             \Cart::clear();
            }
            return redirect()->route('cart')->with(
                [
                    'success' => 'paiement effectue avec succes'
                ]
                );
      }
}
}