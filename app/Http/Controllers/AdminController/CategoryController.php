<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Facades\ApiResponse;
use App;
use App\Library\Services\CustomLogs;

use DataTables;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;

use PhpParser\JsonDecoder;

class CategoryController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {    
        return view('admin.categories.view_categories');
    }

    public function getAjaxCategories(){
            $data = Category::get();
            return DataTables::of($data)
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.url("admin/categories").'/'.$row->id.'/edit'.'" class="edit btn btn-primary btn-sm">Edit</a>&nbsp<button id="deleteRecord" class="edit btn btn-danger btn-sm btn-delete" data-url="'.url("admin/categories").'/'.$row->id.'">Delete</button>';
     
                           return $btn;
                    })
                    ->escapeColumns(['action'])
                    ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $checkboxOptions = array( 'No', 'Yes' );
        $workingDays     = array( 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday' );
        $categoriestitle = trans('app.AddCategories');
        return view('admin.categories.add_category')->with(compact('checkboxOptions','workingDays','categoriestitle')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->isMethod('post')){
            $this->validate($request, [
              'name'        => 'required',
              'datepicker'  => 'required',
              'description' => 'required',
              'radio'       => 'required',
              'country_id'  => 'required',
              'workday'     => 'required',
              'multiselectcountries' => 'required',
              'searchableMultiSelectedCountries' => 'required',
             ]);
            //dd($request->country_id);
           $category = new Category([
               'name'        => $request->get('name'),
               'date'        => $request->get('datepicker'), //strtotime($request->get('datepicker')),
               'description' => $request->get('description'),
               'radio'       => $request->get('radio'),
               'country_id'  => $request->get('country_id'),
               'checkbox'    => implode(',', $request->get('workday')),
               'searchableMultiSelectedCountries' => implode(',', $request->get('searchableMultiSelectedCountries')),
               'dropdown'    => implode(',', $request->get('multiselectcountries'))

           ]);
           //dd($category);
           $category->save();
           return redirect('admin/categories')->with('flash_message_success', 'Category has been added successfully!'); 
       } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd($id);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, CustomLogs $customLogsServiceInstance)
    {
        $this->custom_log = $customLogsServiceInstance->customLogsFunction();
        $this->custom_log->info('This is a info log error!');   
        //dd($stream);
       
        $checkboxOptions     = array( 'No', 'Yes' );
        $workingDays         = array( 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday' );
        $categoryDetails     = Category::where(['id'=>$id])->first();
        $saveworkingDays     = $categoryDetails->checkbox;
        $savemulticontriesids= $categoryDetails->dropdown;
        $searchableMultiSelectedCountries = $categoryDetails->searchableMultiSelectedCountries;
        
        $categoriestitle     =  trans('app.EditCategories');
        return view('admin.categories.edit_category')->with(compact('checkboxOptions','workingDays','categoryDetails','saveworkingDays', 'savemulticontriesids', 'searchableMultiSelectedCountries', 'categoriestitle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        //if($request->isMethod('post')){
            //dd($request->all());
            $request->validate([
                'name'        => 'required',
                'datepicker'  => 'required',
                'radio'       => 'required',
                'country_id'  => 'required',
                'workday'     => 'required',
                'multiselectcountries'    => 'required',
                'searchableMultiSelectedCountries'    => 'required',
                'description' => 'required'
            ]);
           
            $data = $request->all();
            //dd($data);
            Category::where(['id'=>$id])->
            update(
                [
                'name'        => $data['name'],
                'date'        => $data['datepicker'],
                'radio'       => $data['radio'],
                'country_id'  => $data['country_id'],
                'checkbox'    => implode(',', $data['workday']),
                'dropdown'    => implode(',', $data['multiselectcountries']),
                'searchableMultiSelectedCountries' => implode(',', $data['searchableMultiSelectedCountries']),
                'description' => $data['description']
                ]
            );

            return redirect('admin/categories')->with('flash_message_success', 'Category has been updated successfully');
        //}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();
        $msg = __('Category has been deleted successfully');
        return ApiResponse::successResponse('SUCCESS', $msg, []);
        //return redirect()->back()->with('flash_message_success', 'Category has been deleted successfully');
    }

    public function switchLang($lang)
    {
        App::setLocale(session()->get('locale'));
        session()->put('locale', $lang);
        $response = ['status' => 'success', 'code' => '200', 'message' => 'Language was switched.', 'metod' => 'GET'];
        return $response;
    }



}
