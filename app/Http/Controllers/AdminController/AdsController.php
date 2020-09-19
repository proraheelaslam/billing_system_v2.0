<?php

namespace App\Http\Controllers\AdminController;

use App\Ads;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;

class AdsController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //return Ads::all();
        return view('admin.ads.view_ads');
    }

    public function getAjaxAds(Request $request){

        $data = Ads::get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addColumn('ads', function ($row) {
                    $ad = '<img src=' . $row->fullImage . ' border="0" width="40" class="img-rounded" align="center" />';;
                    return $ad;
                })
                ->addColumn('description', function ($row) {
                    $description = $row->description;
                    return $description;
                })

                ->addColumn('name', function ($row) {
                    return $row->name;
                })
                ->addColumn('action', function ($row) {

                    $btn = '<a href="' . url("admin/ads") . '/' . $row->id . '/edit' . '" class="edit btn btn-primary btn-sm">Edit</a>&nbsp<button id="deleteRecord" class="edit btn btn-danger btn-sm btn-delete" data-url="' . url("admin/categories") . '/' . $row->id . '">Delete</button>';

                    return $btn;
                })
                ->rawColumns(['ads', 'action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.ads.add_ads');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $locale = app()->getLocale();
            $this->validate($request, [
                'name'        => 'required',
                'description'       => 'required',
                'duration'  => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            if ($request->hasFile('image')) {

                $image = $request->file('image');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/ads/');
                $image->move($destinationPath, $imageName);

                $ads = new Ads([
                    'name'        => [
                        $locale => $request->name,
                    ],
                    'description'        => $request->description,
                    'duration' => $request->duration,
                    'type' => 'image',
                    'image' => $imageName


                ]);
                $ads->save();

            }

            return redirect('admin/ads')->with('flash_message_success', 'Ads has been added successfully!');

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
    public function edit($id){


        $ads     = Ads::where(['id'=>$id])->first();

        return view('admin.ads.edit_ads', compact('ads'));
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
        $locale = app()->getLocale();

        $request->validate([
            'name'        => 'required',
            'description'  => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/ads/');
            $image->move($destinationPath, $imageName);


            $ads = Ads::find($id);
            $ads->setTranslation('name', $locale, $request->name);
            $ads->description = $data['description'];
            $ads->image = $imageName;
            $ads->save();

        }


        return redirect('admin/ads')->with('flash_message_success', 'Ads has been updated successfully');
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
        Ads::find($id)->delete();
        $msg = __('Ads has been deleted successfully');
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
