<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function AddComment(Request $request, $id)
    {
        if (Session::has('user')) {
            $input = [
                'username' => Session::get('user')->name,
                'comment' => $request->comment,
                'id_product' => $id
            ];
            Comment::create($input);
            return redirect()->back();
        } else {
            return '<script>alert("Vui lòng đăng nhập để sử dụng chức năng này.");window.location.assign("/login");</script>';
        }
    }
}
