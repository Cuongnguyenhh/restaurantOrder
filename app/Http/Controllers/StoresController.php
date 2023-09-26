<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StoresModel as Stores;
class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

     try{
        $stores = Stores::paginate('5');
        return response()->json([
            'status' => 'success',
            'data' => $stores,
        ]);

     }catch(\Exception $e){
        return response()->json([
          'status' => 'error',
          'message' => $e->getMessage()
        ]);
     }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
