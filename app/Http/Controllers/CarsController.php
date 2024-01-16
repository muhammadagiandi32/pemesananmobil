<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role');
    }
    public function index()
    {
        //
        return view('cars.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('cars.create-cars');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator =  Validator::make($request->all(), [
            'merek' => 'required',
            'model' => 'required',
            'nopol' => 'required',
            'gambar'=> 'required',
            'harga' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(),400);
        }
        try {
            //code...
            $cars = new Cars([
                'model' => $request->model,
                'merek' => $request->merek,
                'nopol' => $request->nopol,
                'gambar' => $request->gambar,
                'harga' => $request->harga,
            ]);
            $cars->save();
            return response()->json($cars, 201);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cars $cars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cars $cars)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cars $cars)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cars $cars)
    {
        //
    }
}
