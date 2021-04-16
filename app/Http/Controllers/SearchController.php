<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $query = $request->input('q');
        if (strlen($query) === 64) {
            if (strpos($query, '0000') === 0) {
                $url = \LaravelLocalization::getLocalizedURL(\LaravelLocalization::getCurrentLocale(), route('front.block', $query));
                return response()->redirectTo($url);
            }
            $url = \LaravelLocalization::getLocalizedURL(\LaravelLocalization::getCurrentLocale(), route('front.transaction', $query));
            return response()->redirectTo($url);
        } else if (strlen($query) >= 27 && strlen($query) <= 34) {
            $url = \LaravelLocalization::getLocalizedURL(\LaravelLocalization::getCurrentLocale(), route('front.address', $query));
            return response()->redirectTo($url);
        } else if (filter_var($query, FILTER_VALIDATE_INT)) {
            $url = \LaravelLocalization::getLocalizedURL(\LaravelLocalization::getCurrentLocale(), route('front.block', $query));
            return response()->redirectTo($url);
        }
        abort(404);
    }
}
