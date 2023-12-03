<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\Product;
use Illuminate\Http\Request;

class shopController extends Controller
{
    public function shop_shop_details(Request $request){
        $shop_user = $request->user();
        $shop_id = $request->user()->id;
        $shop_info = [];
        $shop_info['id'] = $shop_id;
        $shop_info['name'] = $request->user()->name;
        // echo '<pre>';
        // // var_dump($request);
        // var_dump('shop info', $shop_info);
        // var_dump('shop user', $shop_user);
        // var_dump('shop id', $shop_id);
        // echo '</pre>';
        // return view('shop', compact('shop'));
        return view('shop', compact('shop_info'));
    }
    public function shop_collection_details(){
        $hello = 'Hello world';
        return view('collections', compact('hello'));
    }
    public function shop_collection_save(Request $request){
        if ($request->isMethod('post')) {
            // echo '<pre>';
            // var_dump($request);
            // echo '</pre>';
            $collection_id = $request->collection_id;
            if ($collection_id != 0) {
                $collection = Collection::find($collection_id);
            } else {
                $collection = new Collection();
            }

            $collection->name = $request->collection_name;
            $collection->description = $request->collection_description;
            $collection->shop_id = auth()->user()->id;
            $collection->status = 1;

            $collection->save();
            $redirectUrl = getRedirectRoute('collections.index');
            return redirect($redirectUrl);
        }
        $collections = Collection::where('shop_id', auth()->user()->id)->get();
        // echo '<pre>';
        // var_dump($collections);
        // echo '</pre>';
        return view('collections', compact('collections'));
    }

    public function shop_collection_products(Request $request, $collection_id){
        //get FAQs for a group
        //check if this group id belongs to shop id
        $collection = Collection::findOrFail($collection_id);
        // $collection = $collection->id;

        $shop = $request->user();
        if ($collection->shop_id != $request->user()->id) {
            return Redirect::tokenRedirect('collections.index');
        }

        if ($request->isMethod('post')) {
            $product_id = $request->product_id;
            if ($product_id != 0) {
                $product = Product::find($product_id);
            } else {
                $product = new Product();
            }

            $product->name = $request->product_name;
            $product->description = $request->product_description;
            $product->collection_id = $collection->id;
            $product->shop_id = $shop->id;
            $product->status = 1;

            $product->save();

            $redirectUrl = getRedirectRoute('products.index', ['collection_id' => $collection->id]);
            return redirect($redirectUrl);

        }

        $products = Product::where('collection_id', $collection->id)->get();
        return view('products', compact('products', 'collection'));
        // return view('products', compact('collection'));
    }
}
