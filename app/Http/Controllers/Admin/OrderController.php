<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Notifications\OrderVerification;
use App\Models\User;

class OrderController extends Controller
{
    protected $order;
    public function __construct(Order $order)
    {
        $this->order=$order;
    }
    public function awaiting()
    {
       $orders = $this->order->getAwaitingOrders();
        return view('admin.orders.awaiting', compact('orders'));
    }

    public function verifying()
    {
        $orders = $this->order->getVerifying();
        return view('admin.orders.verifying', compact('orders'));
    }

    public function verify(Request $request, $id)
    {
        $data = $request->validate([
            'price' => 'required'
        ]);
        $order = $this->order->saveVerify($id,$data);

        $user = $order->user;
        $user->notify(new OrderVerification());
        return redirect()->back();
    }


    public function confirming()
    {
        $orders = $this->order->getconfirming();

        return view('admin.orders.confirming', compact('orders'));
    }

    public function cancelling()
    {
        $orders = $this->order->getCancelling();

        return view('admin.orders.cancelling', compact('orders'));
    }


    public function ignore(Request $request, $id)
    {
        $orders = $this->order->ignoreOrder($id);

        return redirect()->back();
    }
}
