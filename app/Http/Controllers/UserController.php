<?php

namespace App\Http\Controllers;

use App\Mail\ThankYouForReview;
use App\Models\Comment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Services\EmailService;


class UserController extends Controller
{
    public function index(){
        return view('user.index');
    }

    public function orders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->paginate(10);
        return view('user.orders', compact('orders'));
    }

    public function order_details($order_id)
    {
       $order = Order::where('user_id', Auth::user()->id)->where('id', $order_id)->first();
       if($order)
       {
        $orderItems = OrderItem::where('order_id', $order_id)->orderBy('id')->paginate(12);
        $transaction = Transaction::where('order_id', $order_id)->first();
        return view('user.order-details', compact('order', 'orderItems', 'transaction'));
       }
       else
       {
        return redirect()->route('login');
       }
    }

    public function order_cancel(Request $request)
    {
        $order = Order::find($request->order_id);
        $order->status = "canceled";
        $order->canceled_date = Carbon::now();
        $order->save();
        return back()->with('status','Đơn hàng đã được hủy thành công!');
    }

    public function comment_store(Request $request, $productId)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'review' => 'required|string|max:500',
            'rating' => 'required|integer|between:1,5',
        ]);

        $comment = new Comment([
            'product_id' => $productId,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'review' => $validated['review'],
            'rating' => $validated['rating'],
        ]);

        $comment->save();

        $toEmail = $validated['email'];
        $subject = 'Thư cảm ơn đánh giá sản phẩm';
        $message = 'Đây là email tự động gửi từ Laravel qua Gmail.';

        EmailService::sendEmail($toEmail, $subject, $message);

        return back()->with('success', 'Bình luận đã được gửi thành công!');
    }
}
