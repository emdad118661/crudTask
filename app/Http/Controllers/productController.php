<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\productModel;

class productController extends Controller
{
    
    public function addProductGET(){
        return view('product.addProduct');
    }

    public function addProductPOST(Request $req){
        $validated = $this->validate($req,
        [
            'prodName' => 'required|max:20|min:2',
            'prodPrice' => 'required',
            'prodQty' => 'required',
            'prodDesc' => 'required'
        ],
        [
            'prodName.required'=>'Product name is required',
            'prodName.max' => 'Product name must be below 21 characters long',
            'prodName.min' => 'Product name must be above 1 character long',
            'prodPrice.required' => 'Product price is required',
            'prodQty.required' => 'Product quantity is required',
            'prodDesc.required' => 'Product description is required',
        ]);

        $prod = new productModel();
        $prod->product_name = $req->prodName;
        $prod->product_price = $req->prodPrice;
        $prod->product_quantity = $req->prodQty;
        $prod->product_description = $req->prodDesc;
        $prod->save();

        return redirect('/product/all');
    }

    public function viewAll(){
        $products = productModel::all();
        return view('product.viewAllProducts')->with('allProducts', $products);
    }

    public function viewOne(Request $req, $id){
        if($req->session()->has('customer_id')){
            return redirect("/customer/productDetail/$id");
        }

        $prod = productModel::where('product_id', '=', decrypt($id))->first();
        return view('product.viewOneProduct')->with('prod', $prod);
    }

    private function delete($id){
        $product = productModel::find(decrypt($id))->delete();
        return redirect("/");
    }

    private function update($req, $id){

        $pid = decrypt($id);
        $product = productModel::find($pid);
        $product->product_name = $req->prodName;
        $product->product_price = $req->prodPrice;
        $product->product_quantity = $req->prodQty;
        $product->product_description = $req->prodDesc;
        $product->save();
        return redirect("/product/$id");
        
    }

    public function submit(Request $req, $id){
        if($req->submit == "Delete"){
            return $this->delete($id);
        }else if($req->submit == "Update"){
            return $this->update($req , $id);
        }
    }
}
