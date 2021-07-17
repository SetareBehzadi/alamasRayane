<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\OrderSubmittion;
use Illuminate\Http\Request;
use Auth;
use App\Models\Order;

class OrderController extends Controller
{
    protected $user;
    protected $order;
    public function __construct(User $user,Order $order)
    {
        $this->user = $user;
        $this->order = $order;
    }
    protected function checkUser(){
        $user_id = NULL;
        if(Auth()->check() == true) {
            $user_id = Auth::id();
        }
        return $user_id;
    }
    protected function generateOrderData($request,$user_id){
        $order = [];
        $data = $request->validate([
            'title' => 'required|max:20|min:5',
            'material' => 'required',
            'color' => 'required|max:10|min:3|string',
            'dimensions' => 'required|max:10|min:5',
            'description' => 'nullable|max:255'
        ]);

        $order['title'] = $data['title'];
        $order['material'] = $data['material'];
        $order['color'] = $data['color'];
        $order['dimensions'] = $data['dimensions'];
        $order['description'] = $data['description'];
        $order['user_id'] = $user_id;
        if($user_id != NULL) {
            $order['status'] = "awaiting";

        }else{
            $order['status'] = "suspending";

        }
        $order = $this->order->saveOrder($order);

        return $order;
    }
    public function order(Request $request)
    {
        $user_id = $this->checkUser();
        $orderData = $this->generateOrderData($request,$user_id);

        if($user_id != NULL) {
            $users = $this->user->getAdminUsers();

            foreach ($users as $user) {
                $user->notify(new OrderSubmittion());
            }
            $text = 'سفارش شما ثبت شد'. 'سفارش شما ثبت و در انتظار تایید ادمین است';
            $route = 'profile';
            //ba sweetalert mishe handel beshe
        }else{
            $text = 'سفارش شما ثبت موقت شد'. 'لطفا یک حساب کاربری بسازید';
            $route = 'auth.register.form';
        }
        alert()->success($text);
        return redirect()->route($route);


    }
}
