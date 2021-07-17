<?php

namespace App\Http\Controllers;

use App\Notifications\OrderSubmittion;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $uid = auth()->user()->id;
        $suspendeds = Order::where('status', 'suspending')->where('user_id', $uid)->latest()->paginate(2);
        $awaitings = Order::where('status', 'awaiting')->where('user_id', $uid)->latest()->paginate(2);
        $verified = Order::where('status', 'verified')->where('user_id', $uid)->latest()->paginate(2);
        $confirmed = Order::where('status', 'confirmed')->where('user_id', $uid)->latest()->paginate(2);
        $canceled = Order::whereIn('status', ['rejected','ignored'])->where('user_id', $uid)->latest()->paginate(2);
        return view('profile.index', compact(['suspendeds','awaitings','verified','confirmed','canceled']));
    }

    public function update(Request $request, Order $order)
    {
       $data = $request->validate([
            'title' => 'required|max:20|min:5',
            'material' => 'required',
            'color' => 'required|max:10|min:3|string',
            'dimen1' => 'required|max:3|min:1',
            'dimen2' => 'required|max:3|min:1',
            'dimen3' => 'required|max:3|min:1',
            'description' => 'nullable|max:255'
        ]);

       $array = array($data['dimen1'], $data['dimen2'], $data['dimen3']);

       $dimensions = implode("x", $array);

        $order->update([
            'title' => $data['title'],
            'material' => $data['material'],
            'description' => $data['description'],
            'color' => $data['color'],
            'status' => "awaiting",
            'dimensions' => $dimensions
        ]);

        $user = User::where('adm', 1)->get();
        $user->notify(new OrderSubmittion());
        alert()->success('سفارش شما ثبت شد', 'سفارش شما ثبت و در انتظار تایید ادمین است');
        return redirect()->back();
    }

    public function confirm(Request $request, $id)
    {
        $order = Order::where('id', $id)->update(['status' => 'confirmed']);
        alert()->success('سفارش شما ثبت نهایی شد', 'سفارش نهایی شما با موفقیت ثبت شد');
        return redirect()->back();
    }

    public function reject(Request $request, $id)
    {
        $order = Order::where('id', $id)->update(['status' => 'rejected']);
        alert()->success('سفارش شما لغو شد', 'سفارش شما مورد نظر شما لغو گردید');
        return redirect()->back();
    }
}
