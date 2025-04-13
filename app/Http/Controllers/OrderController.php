<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{


    public function index()
    {
        $orders = Order::all();
        return view('orders.index',compact('orders'));
    }

    public function store(Request $request, $cartid)
    {
        $data = $request->data;
        $user_id = auth()->id();
        //decode the data
        $data = base64_decode($data);
        $data = json_decode($data, true);
        if($data['status'] == 'COMPLETE')
        {
            $cart = Cart::find($cartid);
            $orderdata = [
                'user_id' => $user_id,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->product->price,
                'status' => 'Pending',
                'payment_method' => 'eSewa',
                'name' => $cart->user->name,
                'phone' => '9876543210',
                'address' => 'Kathmandu',
            ];

            Order::create($orderdata);
            $cart->delete();
            return redirect()->route('mycart')->with('success', 'Order placed successfully.');
        }
    }

    public function status($orderid, $status)
    {
        $order = Order::find($orderid);
        if($order)
        {
            $order->status = $status;
            $order->save();
            //send mail to user
            $data = [
                'name' => $order->name,
                'status' => $status,
            ];
            Mail::send('email.orderemail', $data, function($message) use ($order) {
                $message->to($order->user->email);
                $message->subject('Order Status');
            });
            return redirect()->back()->with('success', 'Order status updated successfully.');
        }
        return redirect()->back()->with('error', 'Order not found.');
    }
}
