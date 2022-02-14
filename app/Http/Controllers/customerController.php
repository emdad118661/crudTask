<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use App\Models\productModel;
use App\Models\Order_info;

class customerController extends Controller
{
    //login get
    public function loginGet(Request $req){
        if($req->session()->has('login_error')){
            $login_error = $req->session()->get('login_error');
            $req->session()->forget('login_error');
            return view('customer.login')
            ->with('pageName', 'Login')
            ->with('loginError', $login_error);
        }else if($req->session()->has('customer_id')){
            return redirect('/customer/dashboard');
        }
        else{
            return view('customer.login')->with('pageName', 'Login');
        }
    }

    // login post
    public function loginPost(Request $req){
        $customerValidLogin = $this->validate($req,
        [
            'c_contact'=>'required'
        ],
        [
            'c_contact.required'=>'Customer contact required'
        ]);

        $customer = CustomerModel::where('customer_contact', '=', $customerValidLogin['c_contact'])->count(); 
        if($customer == 1){
            $customer = CustomerModel::where("customer_contact","=",$customerValidLogin['c_contact'])->get();
            $req->session()->put('customer_id', $customer[0]["customer_id"]);
            return redirect('/customer/dashboard');
        }else{
            $req->session()->put('login_error', 'User not found');
            return redirect('/customer/login');
        }
    }

    // customer dashboard
    public function customerDashboardGet(Request $req){
        if(! $req->session()->has('customer_id')){
            return redirect('/customer/login');
        }
        
        $user_id = $req->session()->get('customer_id');
        $customer = CustomerModel::where('customer_id', '=', $user_id * 1)->count();

        if($customer != 1){
            $req->session()->forget('customer_id');
            return redirect('/customer/login');
        }else{
            $customer = CustomerModel::where("customer_id", "=", $user_id)->get();
        }

        return view('customer.dashboard')
        ->with('customer_name', $customer[0]['customer_name']);
        
    }

    // Show one product
    public function getOneProduct(Request $req){
        $product_id = decrypt($req->pid);
        $product = productModel::where("product_id", "=", $product_id)->get();
        return view('customer.productDetail')->with('product_info',$product);
    }

    // Customer cart
    public function customerCartGet(Request $req){
        if($req->session()->has('cart')){
            $cartItems = $req->session()->get('cart');
            return view('customer.cart')
            ->with('pageName', 'Customer cart')
            ->with('cartItems', $cartItems);
        }
        return view('customer.emptyCart')->with('pageName', 'Customer cart');
    }

    // Logout
    public function customerLogout(Request $req){
        $req->session()->forget('customer_id');
        if($req->session()->has('cart')){
            $req->session()->forget('cart');
        }
        return redirect('/customer/login');
    }

    // Add to cart
    public function addToCart(Request $req){

        $product = productModel::where('product_id', '=', decrypt($req->product_id))->get();

        if(!$req->session()->has('cart')){
            $req->session()->put('cart', []); 
        }

        $cart_products = $req->session()->get('cart');
        array_push($cart_products, json_encode($product[0]));
        $req->session()->put('cart', $cart_products);
        return redirect('/customer/cart');
    }

    // ordering items from cart
    public function cartPost(Request $req){
        $order_info = new Order_info();
        $order_info->customer_id = $req->session()->get('customer_id');
        $order_info->product_id = decrypt($req->product_id);
        $order_info->save();
        return redirect('/customer/orders');
    }

    // ordered items
    public function orderGet(Request $req){
        $customer_id = $req->session()->get('customer_id');
        $orders = Order_info::where('customer_id', '=', $customer_id)->get();
        $orderedProducts = [];
        foreach($orders as $order){
            $products = productModel::where('product_id', '=', $order['product_id'] )->get();
            array_push($orderedProducts, $products);
        }
        return view('customer.orders')
        ->with('pageName', 'Ordered items')
        ->with('orderDetails', $orderedProducts);
    }
}
