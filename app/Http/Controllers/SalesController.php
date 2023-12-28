<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;

class SalesController extends Controller
{
    
    public function store(Request $request)
    {
        //
    }

    public function update(Request $request)
    {
        //
    }

    public function destroy(Requests $request)
    {
        $delete = Sales::find($request->id);

        $delete->delete();

        return redirect('home')->with('message', 'Record terhapus!');
    }
}
