<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Banner;
use App\Models\Product;
use App\Mail\ContactEmail;
use Mail;
class HomeController extends Controller
{
    //
    public function index() {
        $banners = Banner::orderBy('name', 'ASC')->get();
        $cat_prd = Category::orderBy('name', 'ASC')->limit(4)->get();
        $products = Product::orderBy('id', 'DESC')->limit(8)->get();
        $new_products = Product::orderBy('created_at', 'DESC')->limit(3)->get();
        $top_rate_products = Product::orderBy('name', 'DESC')->limit(3)->get();
        $review_products = Product::orderBy('id', 'DESC')->limit(3)->get();
        return view('home', compact('banners', 'products', 'cat_prd', 'new_products', 'top_rate_products', 'review_products'));
    }
    public function shop() {
        $sale_off_products = Product::where('sale_price', '>' , 0)->get();
        $product_page = Product::orderBy('id', 'DESC')->paginate(12);
        return view('shop', compact('sale_off_products', 'product_page'));
    }
    public function product(Product $product) {
        $related_products = Product::orderBy('id', 'DESC')->limit(4)->get();
        return view('product', compact('product', 'related_products'));
    }
    public function category(Category $category) {
        $product_cat = Product::where('category_id', $category->id)->paginate(12);
        return view('category', compact('category', 'product_cat'));
    }
    public function contact() {
        return view('contact');
    }
    public function post_contact() {
        $email = request('email');
        $name = request('name');
        $content = request('content');
        Mail::to($email)->send(new ContactEmail($name, $email, $content));
        return redirect()->route('contact')->with('success', 'Đã gửi liên hệ email thành công');
    }
}
