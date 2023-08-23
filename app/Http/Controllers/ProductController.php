<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


use Image;
use DB;



class ProductController extends Controller
{
    public function all_products()
    {
    	 // $data['products']=DB::table('products')->get();
    	return view('admin.products.all-products');
    }

      public function show_products(Request $req)
    {
        $params     =   $req->all();
        $offset     = $params['start'];
        $limit      = $params['length'];
        $search     = $params['search']['value'];

        $query      =   '';
        
        $products   =   DB::table('products as p')->offset($offset)->limit($limit);
        
        if( !empty($search) ){ 
            $query = " p.pid LIKE '%".$search."%' OR p.pname LIKE '%".$search."%' OR p.pslug LIKE '%".$search."%' OR p.pdiscription LIKE '%".$search."%' ";
            $products = $products->whereRaw($query);
        }

        $products = $products->get();

        $send_data = [];
        foreach ($products as $key => $value) {
            $row = [];
            // dd($value);
            $row[] = $value->product_id;
            $row[] = $value->categories_id;
            $row[] = $value->product_name;
            $row[] = $value->price;
            $row[] = $value->product_slug;
            $row[] = '<img src="'.asset($value->product_img). '" wight="70px" height="70x" alt="image">';
            
            $action = '';
            $action .= '<a href="'.url("edit-products/".$value->product_id).')" class="btn btn-primary btn-sm">edit</a>';
            $action .= '<a href="#" onclick="js_delete('.$value->product_id.')" class="btn btn-danger btn-sm ml-2">delete</a>';

            $row[] = $action;
            $send_data['data'][] = $row;
        }

        $count = DB::table('products')->get()->count();
    
        $send_data['recordsFiltered'] = $count;
        $send_data['recordsTotal'] = $count;
     
        return response()->json($send_data);



    }

    public function add_products()
    {

        $data = [
            'title' => 'ADD-products',
        ];
        
        $categories = Categories::all();
        // dd($categories);
        $products= Products::all();
        
        return view('admin.products.add-product',compact('products','categories'),$data);
    }

    public function save_add_products(Request $req)
    {  
        /*Get all req parameters*/
        $params     =   $req->all();
        // dd($params);

        /*Get file from request*/
        $file       =   $req->file('pimage');
        

        /*File name from file variable*/
        $fileName   = $file->getClientOriginalName();

        /*Move (Copy To Drive)*/
        $file->move(public_path('uploads/images'), $fileName);

        /*Image path to store in DB*/
        $image_path =   'uploads/images/'.$fileName;
        
        /*Store Name And ImagePath iN galleries Table*/
        // $categories = Categories::all();
        // dd($categories);

        $photo          =   New Products();
        $photo->categories_id    =   $params['c_id'];
        $photo->product_name    =   $params['pname'];
        $photo->price   =   $params['price'];
        $photo->product_slug    =   Str::slug($params['pname']);
        $photo->product_img     =   $image_path;   
        $is_saved = $photo->save();
        // dd($photo);
         if($is_saved){
            return response()->json(['status'=> '200', 'message' => 'Your data has been saved successfully']);
        }else{
            return response()->json(['status'=> '500', 'message' => 'fail']);
        }
    
         //return redirect('all-services')->with('message','contact successfully saved');

    }

     public function delete_products($product_id)
    {
      $delete =  DB::table('products')->where('product_id', $product_id)->delete();

       if($delete){
            return response()->json(['status'=> '200', 'message' => 'Your data has been saved successfully']);
            }else{
                return response()->json(['status'=> '500', 'message' => 'fail']);
            }
        // return redirect('all-services')->with('message','Data deleted');
    }

    public function edit_products($product_id)
    {
        $products = Products::find($product_id);
        // $p = $products->pid;
        // dd($p);
        $categories = Categories::all();
       
        return view('admin.products.edit-product',compact('products','categories'));
    
    }

    public function update_products(Request $req,$pid)
    {   

        $params     =   $req->all();
       // dd($params);

        /*Get file from request*/
        $file       =   $req->file('pimage');
        

        /*File name from file variable*/
        $fileName   = $file->getClientOriginalName();

        /*Move (Copy To Drive)*/
        $file->move(public_path('uploads/images'), $fileName);

        /*Image path to store in DB*/
        $image_path =   'uploads/images/'.$fileName;
        
        /*Store Name And ImagePath iN galleries Table*/
        $products          =   Products::find($pid);
        $products->product_name    =   $params['pname'];
        $products->price    =   $params['price'];
        $products->product_slug    =   Str::slug($params['pslug']);
        $products->product_img     =   $image_path;   
        $products->update();
        
         return redirect('all-products')->with('message','Edit successfully..');
    
    }




}
