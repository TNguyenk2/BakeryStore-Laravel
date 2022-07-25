<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    public function AddWishlist($id)
    {
        if (Session::has('user')) {
            if (Product::find($id)) {
                if (Wishlist::where('id', $id)->where('id_user', Session::get('user')->id)->exists()) {
                    $item = Wishlist::where('id', $id)->where('id_user', Session::get('user')->id)->first();
                    $item->quantity += 1;
                    $item->save();
                } else {
                    $add = [
                        'id_user' => Session::get('user')->id,
                        'id_product' => $id
                    ];
                    Wishlist::create($add);
                }

                echo '<script>alert("Thêm vào wishlist thành công.");window.location.assign("/");</script>';
            } else {
                return '<script>alert("Không tìm thấy sản phẩm này.");window.location.assign("/");</script>';
            }
        } else {
            return '<script>alert("Vui lòng đăng nhập để sử dụng chức năng này.");window.location.assign("/login");</script>';
        }
    }

    public function DeleteWishlist($id)
    {
        $item = Wishlist::find($id);
        $item->delete();
        return '<script>alert("Đã xóa sản phẩm khỏi wishlist.");window.location.assign("/");</script>';
    }
    public function OrderWishlist()
    {

        $oldCart = Session('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $user = Session::get('user');
        $wishlists = Wishlist::where('id_user', $user->id)->get();
        $sumWishlist = 0;
        if (isset($wishlists)) {
            foreach ($wishlists as $item) {
                $sumWishlist += $item->quantity;
                $product = Product::find($item->id_product);
                $cart->add($product, $product->id);
            }
        }
        session()->put('cart', $cart);
        return redirect()->route('dathang');
    }
}
