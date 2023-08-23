<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Categories;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;


use Image;
use DB;

class CategoriesController extends Controller
{
    public function all_categories()
    {
    	 // $data['contacts'] = $this->DB->get('contacts');
    	 $data['categories']=DB::table('categories')->get();
    	return view('admin.categories.all-categories',$data);
    }

    public function add_categories()
    {

        $data = [
            'title' => 'ADD-categories',
        ];
        
        $categories= Categories::all();
        return view('admin.categories.add-categories',compact('categories'),$data);
    }

    public function save_add_categories(Request $req)
    {  
        /*Get all req parameters*/
        $params     =   $req->all();
        //dd($params);

        /*Get file from request*/
        $file       =   $req->file('img');
        

        /*File name from file variable*/
        $fileName   = $file->getClientOriginalName();

        /*Move (Copy To Drive)*/
        $file->move(public_path('uploads/images'), $fileName);

        /*Image path to store in DB*/
        $image_path =   'uploads/images/'.$fileName;
        
        /*Store Name And ImagePath iN galleries Table*/
        $photo          =   New Categories();
        $photo->categories_name    =   $params['name'];
        $photo->categories_slug    =  Str::slug($params['name']);
        $photo->categories_img     =   $image_path;   
        $is_saved = $photo->save();
        // dd($photo);
         if($is_saved){
            return response()->json(['status'=> '200', 'message' => 'Your data has been saved successfully']);
        }else{
            return response()->json(['status'=> '500', 'message' => 'fail']);
        }
    
         //return redirect('all-services')->with('message','contact successfully saved');

    }

    public function show_categories(Request $req)
    {
        $params     =   $req->all();
        // dd($params);

        $offset = $params['start'];
        $limit = $params['length'];
        $search = $params['search']['value'];

        $query = '';

        $categories = DB::table('categories')->offset($offset)->limit($limit);

        if( !empty($search) ){ 
            $query = " categories_id LIKE '%".$search."%' OR categories_name LIKE '%".$search."%' OR categories_slug LIKE '%".$search."%' ";
            $categories = $categories->whereRaw($query);
        }
        $categories = $categories->get();         

        $send_data = [];
        foreach ($categories as $key => $value) {
            $row = [];
            // dd($value);
            $row[] = $value->categories_id;
            $row[] = $value->categories_name;
            $row[] = $value->categories_slug;
            $row[] = '<img src="'.asset($value->categories_img). '" wight="70px" height="70x" alt="image">';
            
            $action = '';
            $action .= '<a href="'.url("edit-categories/".$value->categories_id).'" class="btn btn-primary btn-sm">edit</a>';
            $action .= '<a href="#" onclick="js_delete('.$value->categories_id.')" class="btn btn-danger btn-sm ml-2">delete</a>';

            $row[] = $action;
            $send_data['data'][] = $row;
        }

        $count = DB::table('categories')->get()->count();
    
        $send_data['recordsFiltered'] = $count;
        $send_data['recordsTotal'] = $count;
     
        return response()->json($send_data);



    }

     public function delete_categories($categories_id)
    {
      $delete =  DB::table('categories')->where('categories_id', $categories_id)->delete();

       if($delete){
            return response()->json(['status'=> '200', 'message' => 'Your data has been saved successfully']);
            }else{
                return response()->json(['status'=> '500', 'message' => 'fail']);
            }
        // return redirect('all-services')->with('message','Data deleted');
    }

    public function delete_image($categories_id)
        {
          $delete =  DB::table('categories')->where('categories_id', $categories_id)->update(['image'=>'']);
          // dd($delete);
          if($delete){
            return response()->json(['status'=> '200', 'message' => 'Your data has been deleted successfully']);
            }else{
                return response()->json(['status'=> '500', 'message' => 'fail']);
            }
             //return redirect('all-images')->with('message','Data deleted');
        }

      public function edit_categories($categories_id)
    {
        $categories = Categories::find($categories_id);
        return view('admin.categories.edit-categories',compact('categories'));
    
    }

    public function update_categories(Request $req,$categories_id)
    {   

        $params     =   $req->all();
        //dd($params);

        /*Get file from request*/
        $file       =   $req->file('image');
        

        /*File name from file variable*/
        $fileName   = $file->getClientOriginalName();

        /*Move (Copy To Drive)*/
        $file->move(public_path('uploads/images'), $fileName);

        /*Image path to store in DB*/
        $image_path =   'uploads/images/'.$fileName;
        
        /*Store Name And ImagePath iN galleries Table*/
        $categories          =   Categories::find($categories_id);
        $categories->categories_name    =   $params['name'];
        $categories->categories_slug    =   Str::slug($params['slug']);
        $categories->categories_img     =   $image_path;   
        $categories->update();
        
         return redirect('all-categories')->with('message','Edit successfully..');
    
    }

}
