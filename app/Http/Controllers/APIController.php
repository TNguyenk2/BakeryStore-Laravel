<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class APIController extends Controller
{
    public function getProducts()
    {
        $products =  Product::all();
        return response()->json($products);
    }
    public function getOneProduct($id)
    {
        $product =  Product::find($id);
        return response()->json($product);
    }
    public function addProduct(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->image = $request->input('image');
        $product->description = $request->input('description');
        $product->unit_price = intval($request->input('unit_price'));
        $product->promotion_price = intval($request->input('promotion_price'));
        $product->unit = $request->input('unit');
        $product->new = intval($request->input('new'));
        $product->id_type = intval($request->input('id_type'));
        $product->save();
        return $product;
    }
    public function deleteProduct($id)
    {
        $product =  Product::find($id);
        $fileName =  'source/image/product/' . $product->image;
        if (File::exists($fileName)) {
            File::delete($fileName);
        }
        $product->delete();
        return ['status' => 'ok', 'msg' => 'Delete successed'];
    }
    public function editProduct(Request $request, $id)
    {
        $product =  Product::find($id);

        $product->name = $request->input('name');
        $product->image = $request->input('image');
        $product->description = $request->input('description');
        $product->unit_price = intval($request->input('unit_price'));
        $product->promotion_price = intval($request->input('promotion_price'));
        $product->unit = $request->input('unit');
        $product->new = intval($request->input('new'));
        $product->id_type = intval($request->input('id_type'));

        $product->save();
        return response()->json(['status' => 'ok', 'msg' => 'Edit successed']);
    }

    public function uploadImage(Request $request)
    {
        // process image
        if ($request->hasFile('uploadImage')) {
            $file = $request->file('uploadImage');
            $fileName = $file->getClientOriginalName();

            $file->move('source/image/product', $fileName);

            return response()->json(["message" => "ok"]);
        } else return response()->json(["message" => "false"]);
    }
}
// Nagamaru12
