<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryPriceController extends Controller
{
    public function index()
    {
        $areas = Area::join('cities', 'cities.id', '=', 'areas.city_id')
            ->select('areas.id', 'cities.city', 'areas.area', 'areas.delivery_charge')
            ->groupBy('areas.id', 'cities.city', 'areas.area', 'areas.delivery_charge')
            ->get();

        return view('admin.setting.delivery_price.delivery_price', compact('areas'));
    }

    public function deliveryCharge(Request $request)
    {
        $deliveryCharge = Area::find($request->id);
        if (is_null($deliveryCharge)) {
            return back()->with('error', 'Not Found!');
        }
        try {
            $deliveryCharge = DB::transaction(function () use ($deliveryCharge, $request) {
                $deliveryCharge->update([
                    'delivery_charge' => $request->delivery_charge,
                ]);
                return $deliveryCharge;
            });
            if ($deliveryCharge) {
                return back()->with('success', 'Delivery Charge Added!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
