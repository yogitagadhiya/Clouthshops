<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ContactController;
use App\Models\Contacts;
use App\Models\Gallery;
use App\Models\Settings;
use App\Models\Services;
use App\Models\Products;
use App\Models\Icons;
use App\Models\About;
use App\Models\Categories;
use App\Models\Users;
use App\Models\Wishlists;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

use  App\Jobs\SendEmailjob;
 use DB;
 use Image;


class CmsController extends Controller
{
     public function products(Request $request){

        $params = $request->all();
        // dd($params);
        $search = '';
        if (!empty($request->input('search'))) {
            
            $products = \DB::table('products')
                            ->where('product_name',$request->input('search'))
                            ->get();
        }else{
            $products = \DB::table('products')->get();
       
        }

        // dd($products);
        $user_data = session('user_data');
        
        $categories = \DB::table('categories')->get()->all();
        // $products = Products::all();
        


    return view('user.index',compact('products','categories'));
    }

    public function category($slug){
        $data = [
            'title' => 'PRODUCTS',
            'active' =>'products'
        ];

         $categories = Categories::all();
         //dd($categories);
         $settings = Settings::all();
        $icons = Icons::all();
        return view('cms.products',compact('icons','settings','settings','blogpage','categories'),$data);
    }

    public function category_details($passed_slug=''){
        $data = [
            'title' => 'PRODUCTS',
            'active' =>'products'
        ];
        $category_data = \DB::table('categories')->where('categories_slug',$passed_slug)->first();
        // dd($category_data);
        if(!empty($category_data)){
            // category found & load all products 
            $products = \DB::table('products')->where('categories_id',$category_data->categories_id)->get()->all();
            $categories = \DB::table('categories')->get()->all();
            $parent_products = \DB::table('products')
                ->where('categories_id',$category_data->categories_id)
                ->get();
            return view('user.products',compact('parent_products','categories','products','category_data'),$data);

        }else{
            // category not found & redirect to home 
            return redirect('/');
        }

    }


}
