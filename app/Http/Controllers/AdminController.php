<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HotelRequest;

class AdminController extends Controller
{
    public function index()
    {
        return view('adminpage');
    }
    public function addRoom(HotelRequest $Request)
    {
        // $target_dir = "images/";
        // $target_file = $target_dir . basename($_FILES["roomImage"]["name"]);
        // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // $check = getimagesize($_FILES["roomImage"]["tmp_name"]);
        // if ($check !== false) {
        //  $path = move_uploaded_file($_FILES["roomImage"]["tmp_name"], $target_file);
        // } else {
        //     echo '<script>alert("Thêm ảnh thất bại")</script>';
        //     return view('adminpage');
        // }

        $image = $Request->file('roomImage');
        $path = $image->move('images', $image->getClientOriginalName());



        $newRoom = [
            'name' => $Request->roomName,
            'description' => $Request->roomDescription,
            'price' => $Request->roomPrice,
            'image' => $image->getClientOriginalName(),
        ];

        if (isset($_SESSION['rooms'])) {
            $_SESSION['rooms'][] = $newRoom;
        } else {
            if (session_id() === '')
                session_start();
            $_SESSION['rooms'][] = $newRoom;
        }
        echo '<script>alert("Thêm phòng thành công")</script>';
        return view('adminpage');
    }
}
