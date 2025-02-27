<?php

namespace App\Http\Controllers\Front;

use App\Ultilities\Constant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service\Order\OrderServiceInterface;
use App\Service\OrderDetail\OrderDetailServiceInterface;
use Illuminate\Support\Facades\Auth;
use App\Service\User\UserServiceInterface;
use Illuminate\Support\Facades\Cookie;

class AccountController extends Controller
{

    private $userService;
    private $orderService;
    private $orderDetailService;

    public function __construct(UserServiceInterface $userService, OrderServiceInterface $orderService, OrderDetailServiceInterface $orderDetailService)
    {
            $this->userService = $userService;
            $this->orderService = $orderService;
            $this->orderDetailService = $orderDetailService;
    }

    public function login() {
        $lang = Cookie::get('lang');
        return view('front.account.login', [
            'lang' => $lang,
        ]);
    }


    public function checkLogin(Request $request) {
            $credentials = [
                'email' => $request->email,
                'password' =>$request->password,
                'level' => Constant::user_level_client,
            ];

            $remember = $request->remember;

            if (Auth::attempt($credentials, $remember)) {
                //return redirect('');
                return redirect()->intended(''); // Mặc định là trang chủ
            } else {
                return back()->with('notification', 'Đăng nhập thất bại');
            }
    }

    public function logout() {
        Auth::logout();

        return back();
    }

    public function register () {
        $lang = Cookie::get('lang');
        return view('front.account.register', [
            'lang' => $lang,
        ]);
    }

    public function postRegister(Request $request) {


            if($request->password != $request->password_confirmation) {
                return back()
                ->with('notification', 'Có lỗi : Mật khẩu xác nhận không trùng khớp');
            }
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'password' =>bcrypt($request->password),
                'level' => Constant::user_level_client,
        
            ];

            $this->userService->create($data);

            return redirect('account/login')
            ->with('notification', 'Đăng ký thành công, trở lại trang đăng nhập');
    }  

    public function myOrderIndex() {
        $orders = $this->orderService->getOrderByUserId(Auth::id());
        $lang = Cookie::get('lang');

        return view('front.account.my-order.index', [
                'orders' => $orders,
                'lang' => $lang,
        ]);
    }

    public function myOrderShow($id) {
        $order = $this->orderService->find($id);
        $lang = Cookie::get('lang');
             
        return view('front.account.my-order.show', [
                'order' => $order,
                'lang' => $lang,
        ]);
    }
}
