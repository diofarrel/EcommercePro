<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

use App\Models\order_list;

use Carbon\Carbon;

class HomeController extends Controller
{
    function index()
    {
        $product = Product::paginate(6);
        return view('home.userpage', compact('product'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            $product = Product::all();
            return view('admin.show_product', compact('product'));
        } else {
            $product = Product::paginate(6);
            return view('home.userpage', compact('product'));
        }
    }

    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            $user = Auth::user();
            $product = Product::find($id);
            $cart = new Cart;

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            $cart->product_title = $product->title;

            if ($product->discount_price != null) {
                $cart->price = $product->discount_price  * $request->quantity;
            } else {
                $cart->price = $product->price  * $request->quantity;
            }

            $cart->product_id = $product->id;
            $cart->image = $product->image;

            $cart->quantity = $request->quantity;
            $cart->size = $request->size;
            $cart->save();

            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id;
            $cart = Cart::where('user_id', '=', $id)->get();

            return view('home.show_cart', compact('cart'));
        } else {
            return redirect('login');
        }
    }

    public function remove_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();

        return redirect()->back();
    }

    public function checkout()
    {
        $user = Auth::user();

        $userid = $user->id;

        $data = Cart::where('user_id', '=', $userid)->get();
        $total_price = $data->sum('price');


        $order_list = new order_list();
        $order_list->user_id = $userid;
        $order_list->name = $user->name;
        $order_list->email = $user->email;
        $order_list->phone = $user->phone;
        $order_list->address = $user->address;
        $order_list->payment_status = 'Confirmation to Admin';
        $order_list->delivery_status = 'Processing';
        $order_list->total_price = $total_price;
        $order_list->save();

        foreach ($data as $data) {
            $order = new Order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->id_order_list = $order_list->id;
            $order->user_id = $data->user_id;
            $order->product_title = $data->product_title;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->size = $data->size;
            $order->image = $data->image;
            $order->product_id = $data->product_id;
            $order->save();

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();
        }

        $message = "Confirmation Order";
        $message .= "\nNama Pemesan: " . $order_list->name;
        $message .= "\nTanggal Order: " . Carbon::now()->format('d F Y');

        $whatsappLink = "https://wa.me/62895803477999?text=" . urlencode($message);

        return redirect($whatsappLink);
    }

    public function productpage()
    {
        $product = Product::paginate(6);
        return view('home.productpage', compact('product'));
    }
}
