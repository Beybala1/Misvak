<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class HomeController extends Controller
{
    public function index()
    {
        $counts = [

            'slider' => convert_number(Slider::count()),
            'products' => convert_number(Product::all()->count()),
            'messages' => convert_number(Message::all()->count()),
        ];
        return view('backend.dashboard', get_defined_vars());
    }
}
