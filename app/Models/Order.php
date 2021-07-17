<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = ['title','material','color','dimensions','description','user_id','status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getAwaitingOrders()
    {
        return self::with('user')->where('status', 'awaiting')->whereHas('user')->latest()->paginate(20);
    }
    public function getVerifying()
    {
        return self::with('user')->where('status', 'verified')->whereHas('user')->latest()->paginate(20);
    }

    public function saveVerify($id,$data)
    {
        $order = self::find($id);
        $order->status = 'verified';
        $order->price = $data['price'];
        $order->save();
        return $order;
    }

    public function saveOrder($data)
    {
        $order = self::create($data);
        $order->save();
        return $order;
    }

    public function ignoreOrder($id)
    {
        $order = self::where('id', $id)->update(['status' => 'ignored']);
        return true;
    }

    public function getCancelling()
    {
        return self::with('user')->whereIn('status', ['rejected','ignored'])->whereHas('user')->latest()->paginate(20);

    }
    public function getconfirming()
    {
        return self::with('user')->where('status', 'confirmed')->whereHas('user')->latest()->paginate(20);

    }
}
