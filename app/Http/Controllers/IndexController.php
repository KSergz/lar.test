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
        $portfolios = Portfolio::all();

        //$services = Portfolio::where('id','<', 30)->get();
        $services = Service::all();

        $people = People::take(3)->get();
        //$people = People::all();

        #view menu array
        $menu = [];
        foreach ($pages as $page){
            $item = ['title'=>$page->name, 'alias'=>$page->alias];
            array_push($menu, $item);
        }

        $item = ['title'=>'Services', 'alias'=>'service'];
        array_push($menu, $item);

        $item = ['title'=>'Portfolio', 'alias'=>'Portfolio'];
        array_push($menu, $item);

        $item = ['title'=>'Team', 'alias'=>'team'];
        array_push($menu, $item);

        $item = ['title'=>'Contact', 'alias'=>'contact'];
        array_push($menu, $item);

        //dd($menu);

        return view('site.index', [

                                        'menu'=>$menu,
                                        'page'=>$pages,
                                        'portfolios'=>$portfolios,
                                        'services'=>$services,
                                        'people'=>$people,

                                        ]);

    }


}
