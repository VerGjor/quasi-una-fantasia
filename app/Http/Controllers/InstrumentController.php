<?php

namespace App\Http\Controllers;

use App\InstrumentsFamily;
use App\InstrumentsInfo;
use Illuminate\Routing\Controller as Controller;


class InstrumentController extends Controller
{

    public function home() {
        $post = InstrumentsInfo::orderBy('created_at','desc')->take(3)->get();

        //$elements = array('data' => $data, 'title' => 'Latest Blog Posts', 'description' => '', 'page' => 'blog', 'categories' => $this->categories, 'products' => $this->products);

        return view('home', ['post' => $post]);
    }


    public function instruments($id) {

        $posts = InstrumentsInfo::where('instrument_family' ,$id)->orderBy('created_at','desc')->paginate(9);
       // $posts->setPath('catalog');

        $data = array('family' => $id, 'instruments' => $posts );

        return view('instruments.catalogue')->with($data);
    }

    public function instrument_info($id, $index) {

        $instrument = InstrumentsInfo::find($index);

        $family = InstrumentsFamily::find($id);

        $data = array('instrument' => $instrument, 'family_name' => $family);

        return view('instruments.instrument_info')->with($data);
    }

    public function instrument_info_home($id, $index) {

        $instrument = InstrumentsInfo::find($index);

        $family = InstrumentsFamily::find($id);

        $data = array('instrument' => $instrument, 'family_name' => $family);

        return view('instruments.instrument_info_home')->with($data);
    }

    public function instrument_info_preview($id, $index) {

        $instrument = InstrumentsInfo::find($index);

        $family = InstrumentsFamily::find($id);

        $data = array('instrument' => $instrument, 'family_name' => $family);

        return view('instruments.instrument_info_preview')->with($data);
    }

}
