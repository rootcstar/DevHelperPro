<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function get_test(){
        return view('test');
    }
    public function get_index(){
        return view('index');
    }
    public function get_json_viewer(){
        return view('json-viewer');
    }

    public function json_to_xml_converter(){
        return view('json-xml');
    }

    public function json_to_csv_converter(){
        return view('json-csv');
    }
    public function csv_to_json_converter(){
        return view('csv-json');
    }

}
