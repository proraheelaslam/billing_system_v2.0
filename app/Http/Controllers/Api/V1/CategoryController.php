<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Facades\ApiResponse;
use App\File;
use Illuminate\Support\Facades\File as LaraFile;
use App\Category;
use App\Product;
use DB;
use App\User;
use Illuminate\Support\Collection;
//use Illuminate\Support\Arr;

class CategoryController extends Controller
{
    public function viewCategories(){ 

        //$categories   = Category::with('prodects')->get();
        $categories = Category::get();
        $msg = __('Categories retrieved successfully.');
        return ApiResponse::successResponse('SUCCESS', $msg, $categories);
        //return view('admin.categories.view_categories')->with(compact('categories'));
    
    }

    public function addCategory(Request $request){

        $validator = Validator($request->all(),[
            'name'        => 'required',
            'description' => 'required'
        ]);

        if($validator->fails()){
            //dd($validator);
           $msg = $validator->errors()->first();
           return ApiResponse::errorResponse('VALIDATION_ERROR', $msg, []);
        }
            
        $category = new Category([
            'name'        => $request->get('name'),
            'description' => $request->get('description')
        ]);

        $category->save();
        $msg = __('Category save successfully');
        return ApiResponse::successResponse('SUCCESS', $msg, $category);
    }



    public function editCategory(Request $request,$id=null){

        $category  = Category::find($id);
        if(is_null($category)) {
            $msg = 'Category not found';
            return ApiResponse::errorResponse('BAD_REQUEST', $msg, []);
        }
            
        $validator = Validator($request->all(),[
            'name'        => 'required',
            'description' => 'required'
        ]);
        if($validator->fails()){
            $msg = $validator->errors()->first();
            return ApiResponse::errorResponse('VALIDATION_ERROR', $msg, []);
        }

        $data = $request->all();
        
        $category = Category::where(['id'=>$id])->update(['name'=>$data['name'],'description'=>$data['description']]);

        $msg = __('Category has been updated successfully');
        return ApiResponse::successResponse('SUCCESS', $msg, []);
    }

    public function deleteCategory($id = null){

        $checkCategory = Category::find($id);
        
        if(is_null($checkCategory)) {
            $msg = 'Category not found';
            return ApiResponse::errorResponse('BAD_REQUEST', $msg, []);
        }

        Category::find($id)->delete();
        $msg = __('Category has been deleted successfully');
        return ApiResponse::successResponse('SUCCESS', $msg, []);
    }


}
