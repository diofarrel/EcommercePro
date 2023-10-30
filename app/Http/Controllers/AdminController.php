<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Catagory;

use App\Models\Order;
use App\Models\order_list;
use App\Models\Product;
use App\Models\Perusahaan;

use \PDF;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $data = Catagory::all();
        return view('admin.catagory', compact('data'));
    }

    public function add_catagory(Request $request)
    {
        $data = new Catagory();
        $data->catagory_name = $request->catagory;
        $data->save();

        return redirect()->back()->with('message', 'Catagory Added Successfully');
    }

    public function delete_catagory($id)
    {
        $data = Catagory::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Catagory Deleted Successfully');
    }

    public function view_product()
    {
        $catagory = Catagory::all();
        return view('admin.product', compact('catagory'));
    }

    public function add_product(Request $request)
    {
        // Seperate Comma Size
        $size = implode(',', $request->size);

        $product = new Product();

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->size = $size;
        $product->discount_price = $request->discount_price;
        $product->catagory = $request->catagory;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;

        $product->save();

        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function show_product()
    {
        $product = Product::all();
        return view('admin.show_product', compact('product'));
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function update_product($id)
    {
        $product = Product::find($id);
        $catagory = Catagory::all();

        return view('admin.update_product', compact('product', 'catagory'));
    }

    public function update_product_confirm(Request $request, $id)
    {
        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price = $request->discount_price;
        $product->catagory = $request->catagory;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $imagename);
            $product->image = $imagename;
        }

        $product->save();

        return redirect()->back()->with('message', 'Product Updated Successfully');
    }

    public function view_perusahaan()
    {
        return view('admin.perusahaan');
    }

    public function add_perusahaan(Request $request)
    {
        $perusahaan = new perusahaan();

        $perusahaan->title_perusahaan = $request->title;

        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('perusahaan', $imagename);
        $perusahaan->image = $imagename;

        $perusahaan->save();

        return redirect()->back()->with('message', 'Testimoni Added Successfully');
    }

    public function show_perusahaan()
    {
        $perusahaan = Perusahaan::all();
        return view('admin.show_perusahaan', compact('perusahaan'));
    }

    public function delete_perusahaan($id)
    {
        $perusahaan = Perusahaan::find($id);
        $perusahaan->delete();

        return redirect()->back()->with('message', 'Testimoni Deleted Successfully');
    }

    public function orders()
    {
        $order = order_list::all();
        return view('admin.orders', compact('order'));
    }

    public function order_detail($id)
    {
        $orders = Order::where('id_order_list', $id)->get();
        return view('admin.orders_detail', compact('orders'));
    }

    public function update_status_orders(Request $request, $id)
    {
        $order = order_list::find($id);

        $order->payment_status = $request->payment_status;
        $order->delivery_status = $request->delivery_status;

        $order->save();
        return redirect()->back();
    }

    public function print_pdf($id)
    {
        $order_list = order_list::find($id);
        $order = Order::where('id_order_list', $order_list->id)->get();
        $pdf = PDF::loadview('admin.pdf', compact('order_list', 'order'));
        return $pdf->download('order_details.pdf');
    }
}
