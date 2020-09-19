<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Quote;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Collection;

class StatisticsController extends Controller
{
    //

    public $viewPath;
    public function __construct()
    {
        $this->viewPath = 'frontend';
    }

    public function index(){

        return view($this->viewPath.'/statistics/list',[]);
    }

    public function getPerYear(){

        $result = DB::select('select year(created_at) as year,
                                     sum(total) as total_amount 
                                     from quotes 
                                     where status = "paid"
                                     AND user_id = "'.Auth::id().'" 
                                     group by year(created_at)');
        //dd($result);
        return view($this->viewPath.'/statistics/income_per_year',compact('result'));
    }

    public function getPerMonth($year){

        $result = DB::select('select month(created_at) as month,
                                     sum(total) as total_amount 
                                     from quotes 
                                     where YEAR(created_at) = "'.$year.'" 
                                     AND  status = "paid"
                                     AND user_id = "'.Auth::id().'" 
                                     group by month(created_at)');

       // dd($result);
        return view($this->viewPath.'/statistics/income_per_month',compact('result','year'));
    }

    public function getCompareIncome($currentYear){

        $prevYear = $currentYear-1;

        $currentYearResult = DB::select('select month(created_at) as month,
                                     sum(total) as total_amount 
                                     from quotes 
                                     where YEAR(created_at) = "'.$currentYear.'" 
                                     AND  status = "paid"
                                      AND user_id = "'.Auth::id().'" 
                                     group by month(created_at)');

        $prevYearResult = DB::select('select month(created_at) as month,
                                     sum(total) as total_amount 
                                     from quotes 
                                     where YEAR(created_at) = "'.$prevYear.'" 
                                     AND  status = "paid"
                                      AND user_id = "'.Auth::id().'" 
                                     group by month(created_at)');

        $data ['prevYear'] = $prevYear;
        $data ['currentYear'] = $currentYear;
        $data ['currentYearResult'] = $currentYearResult;
        $data ['prevYearResult'] = $prevYearResult;

        return view($this->viewPath.'/statistics/income_compare_year',compact('data'));
    }


    public function getPerClient(){

        $result = Quote::selectRaw('MAX(total), sum(total) as total_amount, name')->groupBy('name')->orderBy('name', 'DESC')
                                     ->where('user_id', Auth::user()->id)
                                     ->where('status', 'paid')
                                      ->take(5)->get()->toArray();
       // dd($result);
        return view($this->viewPath.'/statistics/income_per_client',compact('result'));
    }

    public function totalUnconvertedQuotes(){

        $total_non_converted_quotes = Quote::where('status','unpaid')->where('type','quote')
                                        ->where('is_quote_converted', 0)
                                        ->where('user_id', Auth::user()->id)
                                         ->count();
        return view($this->viewPath.'/statistics/number_of_unconverted_quotes',compact('total_non_converted_quotes'));
    }

    public function totalUnpaidBill(){

        $total_unpaid_bills = Quote::where('status','unpaid')->where('is_send',1)->where('user_id', Auth::user()->id)->count();
        return view($this->viewPath.'/statistics/number_of_unpaid_bills',compact('total_unpaid_bills'));
    }


    public function incomeSearchClient(Request $request){

        $query = $request->q;
        $result = DB::select('SELECT name,MAX(total) as total_amount FROM `quotes` 
                                     where status = "paid" AND name LIKE  "'.$query.'%" group by (name) order by  total asc LIMIT 5');
        return [
            'status' => true,
            'view' => view($this->viewPath.'/statistics/income_per_client_list', compact('result'))->render(),
        ];
    }
}
