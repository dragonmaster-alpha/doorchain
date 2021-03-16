<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

use App\Models\UserRole;
use App\Models\PropertyTypes;
use App\Models\Property;
use App\Models\PropertyUserMap;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else{

            return view(
                'my_property',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                    'properties' => Property::all()
                ]
            );
        }
    }

    public function add(Request $request)
    {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else {

            return view(
                'property_add',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                    'property_types' => PropertyTypes::all()
                ]
            );
        }
    }

    public function create(Request $request) {
        if(!$request->user()->hasVerifiedEmail())
            return redirect()->intended(RouteServiceProvider::VERIFY);
        else {

            $request->validate([
                'parcel_number' => 'required|unique:property|string|max:45',
                'address1' => 'required|string|max:45',
                'address2' => 'nullable|string|max:45',
                'city' => 'required|string|max:45',
                'state' => 'required|string|max:45',
                'zip' => 'required|string|max:45',
                'area_lot_sf' => 'required|numeric',
                'area_building_sf' => 'required|numeric',
                'num_beds' => 'nullable|numeric',
                'num_bath' => 'nullable|numeric',
                'tax_value' => 'required|numeric',
                'market_value' => 'required|numeric',
                'year_built' => 'required|numeric',
                'property_type_id' => 'required|numeric',
                'resources' => 'required',
            ]);

            $property = new Property;
            $property->fill($request->input());

            $path = \Carbon\Carbon::now()->format(('YmdHis'));
            if($request->hasFile('resources'))
            {
                foreach($request->file('resources') as $file)
                {
                    $file->storeAs('public/documents/', $path . '.' . $file->getClientOriginalExtension());
                    $property->filename = $path . '.' . $file->getClientOriginalExtension();
                }
            }

            $property->resource_link = $path;

            if ($property->save()) {

                $property_user = new PropertyUserMap();
                $property_user->property_id = $property->id;
                $property_user->user_id = $request->user()->id;

                if ($property_user->save()) {
                    return redirect()->route('property.index.view')->with('new', true);
                }
            }

            return view(
                'property_add',
                [
                    'role' => UserRole::GetRole($request->user()->user_role),
                    'property_types' => PropertyTypes::all()
                ]
            );
        }
    }

}
