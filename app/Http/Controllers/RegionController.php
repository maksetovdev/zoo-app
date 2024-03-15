<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Services\RegionServices\regionStore;
use App\Services\RegionServices\updateRegion;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RegionController extends Controller
{
    public function index()
    {
        return Region::all();
    }

    public function store(Request $request)
    {
        try
        {
            return $region = app(regionStore::class)->execute($request->all());
        }
        catch(ValidationException $err)
        {
            return response([
                'errors' => $err->validator->errors()->all()
            ]);
        }
    }

    public function show($id)
    {
        return Region::where('id',$id)->first();
    }

    public function update(Request $request, $id)
    {
        try
        {
            return $region = app(updateRegion::class)->execute($request->all(),$id);
        }
        catch(ValidationException $err)
        {
            return response([
                'errors' => $err->validator->errors()->all()
            ]);
        }
    }
    
    public function destroy($id)
    {
        Region::where('id', $id)->first()->delete();
        return true;
    }
}
