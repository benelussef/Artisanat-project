<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware("auth:admin")->except(["adminLogin","showAdminLoginForm"]);
    }
    public function  index(){
        
        $collection = Order::groupBy('product_name')
        ->selectRaw('count(*) as total, product_name')
        ->orderBy('total', 'desc')
        ->get();
        $bestSelling = array([
            $collection[0],
            $collection[1],
            $collection[2],
            $collection[3]
        ]);
        $visitor = DB::table('orders')
        ->select(
            DB::raw("month(created_at) as month"),
            DB::raw("SUM(total) as total"))
        ->groupBy(DB::raw("month(created_at)"))
        ->get();
        $result[] = ['month','total'];
        foreach ($visitor as $key => $value) {
        $result[++$key] = [$value->month, (int)$value->total];
        }
        $month =[0,0,0,0,0,0,0,0,0,0,0,0];
        for($j = 1; $j < count($result) ; $j++){
            $month[$result[$j][0]-1] = $result[$j][1];
        }
        $total = 0;
        $orders= Order::all();
        foreach($orders as $order){
           if($order->paid){
            $total = $total + $order->total;
           }
        }
        return view("admin.index")->with([
            "products" => Product::all(),
            "orders" => Order::all(),
            "users" => User::all(),
            "totalpaid" => $total,
            "bestSelling" => $bestSelling,
            'montlyEarning' => $month,
        ]);
    }
    public function showAdminLoginForm(){
        return view("admin.connexion");
    }
    public function adminLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);
        if(auth()->guard("admin")->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->get("remember"))){
            return redirect("/admin");
        }
        else{
            return redirect()->route("admin.connexion");
        }
    }
    public function adminLogout(){
        auth()->guard("admin")->logout();
        return redirect()->route("admin.connexion");
    }
    public function getProducts(){
        return view("admin.products.index")->with([
            "products" => Product::latest()->paginate(5)
        ]);
    }
    public function getOrders(){
        return view("admin.orders.index")->with([
            "orders" => Order::latest()->paginate(5)
        ]);
    }
    public function getCategories(){
        return view("admin.products.categories")->with([
            "categories" => Category::latest()->paginate(5)
        ]);
    }
    public function getUsers(){
        return view("admin.users")->with([
            "users" => User::latest()->paginate(5)
        ]);
    }
}
