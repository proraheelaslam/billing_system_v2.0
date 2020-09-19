<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Facades\ApiResponse;
use File;
use Image;
use Illuminate\Support\Facades\File as LaraFile;
use Redirect,Response,DB,Config;
use App\Category;
use App\Product;
use App\ProductsImage;
//use App\User;

class ProductController extends Controller
{
   
    public function viewProducts()
    {
        $products = Product::with('category')->get();
        
        $allProducts = $products->map(function($q){

            $dataArr['product_name']   = $q->name;
            //$dataArr['allproduct']    = $q;
            $dataArr['category_name']  = $q->category->name;
            $dataArr['price']          = $q->price;
            return $dataArr;
        });
                      
        $msg = __('Products retrieved successfully.');
        return ApiResponse::successResponse('SUCCESS', $msg, $allProducts);
    
    }

   
    public function addProduct(Request $request){

        $catid_notexist          = Category::find($request->cat_id);    
        if(!$catid_notexist) {
            $msg = 'Category not found';
            return ApiResponse::errorResponse('BAD_REQUEST', $msg, []);
        }

       //print_r($request->all());exit;
        $validator = Validator($request->all(),[
              'name'       => 'required',
              'cat_id'     => 'required',
              'price'      => 'required',
              'quantity'   => 'required',
              'description'=> 'required',
              'image'      => 'required'
        ]);
        
        if($validator->fails()){
             //dd($validator);
            $msg = $validator->errors()->first();
            return ApiResponse::errorResponse('VALIDATION_ERROR', $msg, []);
        }

           $product = new Product([
               'name'        => $request->get('name'),
               'cat_id'      => $request->get('cat_id'),
               'price'       => $request->get('price'),
               'quantity'    => $request->get('quantity'),
               'description' => $request->get('description'),
               'image'       => $request->get('image')
           ]);
           
           // Upload Image
            if($request->hasFile('image')){
               $image_tmp = $request->file('image');
               if ($image_tmp->isValid()) {
                // Upload Images after Resize
                $extension = $image_tmp->getClientOriginalExtension();
                $fileName = rand(111,99999).'.'.$extension;
                $image_tmp->move(public_path('images/backend_images/product'), $fileName);
                $product->image = $fileName; 
                }
            }

           $product->save();
           $msg = __('Product save successfully');
           return ApiResponse::successResponse('SUCCESS', $msg, $product);
          
  
        $msg = __('Product save successfully');
        return ApiResponse::successResponse('SUCCESS', $msg, $product);

    }


    public function editProduct(Request $request,$id=null){
        
        $product          = Product::find($id);
        if(is_null($product)) {
            $msg = 'Product not found';
            return ApiResponse::errorResponse('BAD_REQUEST', $msg, []);
        }

        $catid_notexist   = $product->cat_id <> $request->cat_id;
        if($catid_notexist) {
            $msg = 'Category not found';
            return ApiResponse::errorResponse('BAD_REQUEST', $msg, []);
        }

        $current_image    = $product->image;
        //$image    = $request->file('image');
        $validator = Validator($request->all(),[
                'name'       => 'required',
                'cat_id'     => 'required',
                'price'      => 'required',
                'quantity'   => 'required',
                'description'=> 'required',
                'image'      => 'required'
          ]);
          if($validator->fails()){
              $msg = $validator->errors()->first();
              return ApiResponse::errorResponse('VALIDATION_ERROR', $msg, []);
          }

            $data = $request->all();

           // Upload Image
            if($request->hasFile('image')){
               $image_tmp = $request->file('image');
               if ($image_tmp->isValid()) {
                  // Upload Images after Resize
                  $extension = $image_tmp->getClientOriginalExtension();
                  $fileName = rand(111,99999).'.'.$extension;
                  $image_tmp->move(public_path('images/backend_images/product'), $fileName);
                }
            }else if(!empty($current_image)){
                $fileName = $current_image;
            }else{
                $fileName = '';
            }

            $product = Product::where(['id'=>$id])->update(['name'=>$data['name'],'cat_id'=>$data['cat_id'],'price'=>$data['price'],'quantity'=>$data['quantity'],'description'=>$data['description'],'image'=>$fileName]);
            
            //delete image file from upload folder which is send from edit view throught hidden field with the name current_image.
            $file       = $current_image;

            $filename   = public_path('images/backend_images/product').'/'.$file;
            File::delete($filename);

            $msg = __('Product has been updated successfully');
            return ApiResponse::successResponse('SUCCESS', $msg, $product);

            //return redirect('admin/view-product')->with('flash_message_success', 'Product has been updated successfully');
       
        
        $productDetails = Product::where(['id'=>$id])->first();
        $msg = __('Product has been updated successfully');
        return ApiResponse::successResponse('SUCCESS', $msg, $productDetails);
        //$productstitle = 'Edit Products';
        //return view('admin.products.edit')->with(compact('productDetails', 'productstitle'));
    }


    public function deleteProduct($id = null){

        $checkProduct = Product::find($id);
        
         if(is_null($checkProduct)) {
             $msg = 'Product not found';
             return ApiResponse::errorResponse('BAD_REQUEST', $msg, []);
         }

        //delete product:
        Product::find($id)->delete();
        $msg = __('Product has been deleted successfully');
        return ApiResponse::successResponse('SUCCESS', $msg, []);
		
    }


    public function addImages(Request $request, $id=null){
        
        //$productDetails = Product::where(['id' => $id])->first();
        //$categoryDetails = Category::where(['id'=>$productDetails->cat_id])->first();
        //$category_name = $categoryDetails->name;
           
        //     $this->validate($request, [
        //         'image'      => 'required'
        //        ]);
              
        //      $product = new ProductsImage([
        //          'image'       => $request->get('image')
        //      ]);

        $Products    = Product::find($id); //Product::where(['id' => $id])->first();
        if(is_null($Products)) {
            $msg = 'Product not found';
            return ApiResponse::errorResponse('BAD_REQUEST', $msg, []);
        }
        
        $validator = Validator($request->all(),[
            
                'image'      => 'required'
          ]);
          if($validator->fails()){
              $msg = $validator->errors()->first();
              return ApiResponse::errorResponse('VALIDATION_ERROR', $msg, []);
          }


          //print_r($ProductsImage);exit;
           // dd($ProductsImage);


            //$data = $request->all();
            
            
            
            if ($request->hasFile('image')) {
                $files = $request->file('image');
                $image = new ProductsImage;

                foreach($files as $file){
                    //print_r($files); exit;
                
                    // Upload Images after Resize
                    $image = new ProductsImage;
                    
                    $extension = $file->getClientOriginalExtension();
                    $fileName = rand(111,99999).'.'.$extension;
                    $large_image_path = 'images/backend_images/product/large'.'/'.$fileName;
                    $medium_image_path = 'images/backend_images/product/medium'.'/'.$fileName;  
                    $small_image_path = 'images/backend_images/product/small'.'/'.$fileName;  
                    Image::make($file)->save($large_image_path);
                    Image::make($file)->resize(600, 600)->save($medium_image_path);
                    Image::make($file)->resize(300, 300)->save($small_image_path);
                    $image->image = $fileName;  
                    $image->pro_id = $id;//$data['hidden_proid'];
                    $image->save();
                }   
            }

            $msg = __('Product multi-images added successfully');
            return ApiResponse::successResponse('SUCCESS', $msg, []);

            //return redirect('admin/add_images/'.$id)->with('flash_message_success', 'Product Images has been added successfully');
       
        //$productImages = ProductsImage::where(['pro_id' => $id])->orderBy('id','DESC')->get();
        //$msg = __('Product has been updated successfully');
        //return ApiResponse::successResponse('SUCCESS', $msg, $productImages);
        //$title = "Add Images";
        //return view('admin.products.add_images')->with(compact('title','productDetails','category_name','productImages'));
    }

    public function deleteProductAltImage($id=null){

        $checkProduct = ProductsImage::find($id);
        if(is_null($checkProduct)) {
            $msg = 'Image not found';
            return ApiResponse::errorResponse('BAD_REQUEST', $msg, []);
        }

        ProductsImage::find($id)->delete();
        $msg = __('Product multiple image deleted successfully');
        return ApiResponse::successResponse('SUCCESS', $msg, []);
    }


    public function categoryProductList($id = null){
        // $product = Product::find($id);
        // if(is_null($product)) {
        //     $msg = 'Product not found';
        //     return ApiResponse::errorResponse('BAD_REQUEST', $msg, []);
        // }

        $catid_notexist          = Category::find($id);    
        if(!$catid_notexist) {
            $msg = 'Category not found';
            return ApiResponse::errorResponse('BAD_REQUEST', $msg, []);
        }

        //$cat_id  = $product->cat_id;
        $productrelatedtocatid = DB::table('products')->where('cat_id', $id)->get();
        $msg = __('Category id '.$id.' related product list successfully');
        return ApiResponse::successResponse('SUCCESS', $msg, $productrelatedtocatid);

    }



}
