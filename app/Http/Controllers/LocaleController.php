<?php

namespace App\Http\Controllers;


use App\Models\HomeSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function setLocale($locale)
    {
        if (in_array($locale, ['EN', 'AR'])) {
            Session::put('locale', $locale);
            App::setLocale($locale);
        }

        return response()->json(['success' => true]);
    }
}
