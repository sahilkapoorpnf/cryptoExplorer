<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Services\LanguageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index(){
        $data = [
            'langs' => LanguageService::all(),
            'colors' => ['blue','indigo','purple','pink','red','orange','yellow','green','teal','cyan','gray','gray-dark']
        ];
        return view('pages.admin', $data);
    }

    public function delLogo(Request $request){
        /**
         * @var Setting $settings
         */
        $settings = Setting::query()->first();
        Storage::delete($settings->logo);
        $settings->update([
            'logo' => null,
        ]);
        return redirect()->back()->with('success', __('admin.logo_removed'));
    }

    public function update(Request $request){
        /**
         * @var Setting $settings
         */
        $settings = Setting::query()->first();
        $data = $request->only(
            'show_transactions',
            'logo',
            'language',
            'color_scheme',
            'client_id',
            'block1_id',
            'block2_id',
            'cache_address',
            'cache_block',
            'cache_transaction'
        );
        $settings->update($data);
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $extension = $request->logo->extension();
            $fileName = config('settings.network') . '-' . time() . '.' . $extension;
            $request->logo->storeAs(NULL, $fileName);
            $settings->update([
                'logo' => $fileName,
            ]);
        }
        return redirect()->back()->with('success', __('admin.settings_saved'));
    }
}
