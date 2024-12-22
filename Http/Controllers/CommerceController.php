<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\OrderUser;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Undefined;

class CommerceController extends Controller
{


    public function index()
    {
        $resulte = DB::table('catigories')->get();
        return view('pages.index', ['catigories' => $resulte]);
    }

    public function shop($catid = null)
    {
        $category = DB::table('catigories')->get();
        $count = 0;
        if ($catid == null) {
            $product = DB::table('products')->get();
        } else {
            $product = DB::table('products')->where('catigory_id', $catid)->get();
            ++$count;
        }
        return view('pages.shop', ['products' => $product, 'catigory' => $category, 'count' => $count]);
    }

    public function contact(Request $request)
    {

        return view('pages.contact');
    }

    public function subcontact(Request $request)
    {

        return redirect()->back()->with('success', 'تم ارسال البيانات بنجاح! شكرا لتواصلك معنا');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function news()
    {
        return view('pages.news');
    }


    public function cart(Request $requst)
    {
        // الحصول على جميع product_id من جدول shoppingcarts
        // $productIds = DB::table('shoppingcarts')->pluck('product_id');

        // $products = product::whereIn('id', $productIds)->get();

        // return view('pages.cart', ['addproduct' => $products]);


        $productIds = DB::table('shoppingcarts')->pluck('product_id');

        // افترض أنك لديك علاقة في النموذج ShoppingCart
        $products = ShoppingCart::with('product')->whereIn('product_id', $productIds)->get();
        return view('pages.cart', ['addproduct' => $products]);
    }


    public function add_to_cart($id, Request $request)
    {
        $product = DB::table('products')->where('id', $id)->get();
        $addquantity = 1;

        $cart = ShoppingCart::where('product_id', $id)->first();
        if ($cart) {
            $cart->update([
                'quantity' => $cart->quantity + $addquantity
            ]);
        } else {
            foreach ($product as $item) {
                $idofcart = $item->id;
                // $titleofcart = $item->title;
                // $priceofcart = $item->price;
                // $imgeofcart = $item->imgepath;
            }

            ShoppingCart::create([
                'product_id' => $idofcart,
                // 'title' => $titleofcart,
                // 'price' => $priceofcart,
                // 'imgepath' => $imgeofcart,
            ]);
        }

        return response()->json(['message' => 'تم إضافة المنتج إلى السلة بنجاح!']);
    }

    // public function update(Request $request)
    // {
    //     $quantities = $request->input('quantities');
    //     $totalprice = 0;
    //     // DD($quantities);
    //     foreach ($quantities as $product_id => $quantity) {

    //         $cart = ShoppingCart::find($product_id);
    //         $product = Product::find($cart->product_id);

    //         if ($cart) {
    //             $cart->update(['quantity' => $quantity]);
    //             $totalprice += $product->price * $quantity;
    //         }
    //     }

    //     return redirect()->back()->with('success', 'Quantities updated successfully!')->with('totalprice', $totalprice);
    // }

    public function update(Request $request)
    {
        $quantities = $request->input('quantities');
        $totalprice = 0;

        if ($quantities != null) {
            foreach ($quantities as $product_id => $quantity) {
                $cart = ShoppingCart::find($product_id);

                if ($cart) {
                    $product = Product::find($cart->product_id);

                    if ($product) {
                        $cart->update(['quantity' => $quantity]);
                        $totalprice += $product->price * $quantity;
                    } else {
                        // معالجة الحالة عندما لا يوجد منتج بهذا الـ ID
                        return redirect()->back()->with('error', "المنتج غير موجود.");
                    }
                } else {
                    // معالجة الحالة عندما لا يوجد عنصر في السلة
                    return redirect()->back()->with('error', "العنصر في السلة غير موجود.");
                }
            }
        } else {
            return redirect()->back()->with('error', 'لم تقم باضافة اي عنصر الى السلة!');
        }
        return redirect()->back()->with('success', 'تم تحديث الكميات بنجاح!')->with('totalprice', $totalprice);
    }




    public function destroy($id)
    {
        DB::table('shoppingcarts')->where('id', $id)->delete();

        return response()->json(['message' => 'تم حذف العنصر بنجاح!']);
    }

    public function placeOrder(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     'address' => 'required',
        //     'phone' => 'required',
        // ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $address = $request->input('address');
        $phone = $request->input('phone');
        $description = $request->input('bill');

        
        // استرجاع cart id
        $cartid = DB::table('shoppingcarts')->pluck('product_id')->toArray();
        $user_email = OrderUser::where('email', $email);
        if (!$user_email) {
            OrderUser::create([
                'name' => $name,
                'email' => $email,
                'address' => $address,
                'phone' => $phone,
                'description' => $description,
                // تخزين المصفوفة في العمود order_id بعد تحويلها إلى JSON
                'order_id' => json_encode($cartid),

            ]);
            DB::table('shoppingcarts')->delete();
        } else {
            return redirect()->back()->with('error', 'تم ادخال هذا البريد مسبقا! حاول ادخال بريد اخر');
        }
        return redirect(route('page.home'));
    }


    public function checkOut()
    {
        $productIds = DB::table('shoppingcarts')->pluck('product_id');
        $quantity = DB::table('shoppingcarts')->pluck('quantity');

        $products = Product::whereIn('id', $productIds)->get();
        $totalprice = 0;
        foreach ($products as $product_id => $item) {
            $totalprice += $item->price * $quantity[$product_id];
        }
        return view('pages.checkout', ['products' => $products, 'totalprice' => $totalprice, 'quantity' => $quantity]);
    }

    public function erorr()
    {
        return view('pages.404');
    }

    public function single_news()
    {
        return view('pages.single-news');
    }

    public function single_product()
    {
        return view('pages.single-product');
    }

    public function login()
    {
        return view('pages.login');
    }

    public function updateLogin(Request $request)
    {
        // $email = request()->input('email');
        // $password = request()->input('password');
        // $user = User::where('email', $email)->first();

        // if (is_null($user)) {
        //     return redirect()->back()->with('error', 'الرجاء التأكد من البيانات المدخلة لأنها غير موجودة!');
        // } 
        // /*else if ($user->id >= 1 and $user->id <= 3)*/ 
        // else if ($user and Hash::check($password, $user->password)) {
        //     return to_route('page.home');
        // } 
        // else {
        //     return redirect()->back()->with('error', 'البيانات المدخلة غير صحيحة!');
        // }

        $user = new User();
        $user->email = $request->email;
        $user->password = $request->password;
        $data = $request->only('email', 'password');
        $admen = User::where('email', $request->email)->first();
        if (Auth::attempt($data)) {
            if ($admen->is_admen == 1) {
                // intended => بترجع المستخدم للصفحة اللي كان بحاول يسجل دخول عليها 
                // لو كان بده يدخل على صفحة التسوق فبعد ما يسجل دخول بتنقله لصفحة التسوق
                // return redirect()->intended('page.home');
                return redirect()->intended('index');
            } else {
                // redirect(route('')) => عندما اريد نوجيها ثابتا ومباشرا
                return redirect(route('login'))->with('error', ' اقلب وجهك يا معفن يا ابو ريحه يا ابو النسوان يا معفن يا حشرة');
            }
        } else {
            return redirect(route('login'))->with('error', 'البيانات المدخله غير صحيحة!');
        }
    }

    public function LoginNewUser()
    {
        return view('pages.LoginNewUser');
    }

    public function UpdateLoginNewUser(Request $request)
    {
        // $name = request()->input('name');
        // $email = request()->input('email');
        // $password = request()->input('password');
        // $confirm_password = request()->input('confirm_password');
        // $user = User::where('email', $email)->first();

        //     if ($password == $confirm_password) {
        //         if (!$user) {
        //             User::create([
        //                 'name' => $name,
        //                 'email' => $email,
        //                 'password' => $password,
        //             ]);
        //         } else {
        //             return redirect()->back()->with('error' , 'خطأ في البريد الالكتروني! الرجاء التأكد من البريد المدخل او ادخال بريد اخر.');
        //         }
        //     } else {
        //         return redirect()->back()->with('error' , 'تأكيد كلمة المرور غير متطابقة مع كلمة المرور!');
        //     }
        //     return to_route('page.home');
        // }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $password = $request->password;
        $confirm_password = $request->confirm_password;
        if ($password == $confirm_password) {
            if ($user->save()) {
                return redirect(route('page.home'))->with('secssful', 'تم انشاء الحساب');
            } else {
                return redirect(route('page.LoginNewUser'))->with('error', 'فشل انشاء الحساب');
            }
        } else {
            return redirect()->back()->with('error', 'تأكيد كلمة المرور غير متطابقة مع كلمة المرور!');
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $results = Product::where('title','LIKE',"%{$query}%")->get();

        return view('pages.search',['results'=>$results, 'query'=>$query]);
    }
}
