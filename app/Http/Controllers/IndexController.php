<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\People;
use App\Portfolio;
use App\Service;

class IndexController extends Controller
{
    public function execute(Request $request){

        $pages = Page::all();

        //$portfolios = Portfolio::get(['name', 'filter', 'images']);
        $portfolio = Portfolio::all();

        //$services = Portfolio::where('id','<', 30)->get();
        $service = Service::all();

        $people = People::take(3)->get();
        //$people = People::all();

        //dd($people);



        return view('site.index');

    }


}
