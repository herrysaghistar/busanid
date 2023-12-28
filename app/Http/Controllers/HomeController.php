<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Sales::all();
        $user = User::all();

        return view('index',[
            'data' => $data,
            'user' => $user
        ]);
    }

    public function store(Request $request)
    {
        $sales = new Sales;
        $sales->user_id = $request->input('user_id');
        $sales->jenis = $request->input('jenis');
        $sales->nominal = $request->input('nominal');
        $sales->tgl = $request->input('tgl');
        $sales->save();

        return redirect()->back()->with('message', 'Record ditambahkan!');
    }

    public function update(Request $request)
    {
        $sales = Sales::find($request->id);
        $sales->nominal = $request->input('nominal');
        $sales->tgl = $request->input('tgl');
        $sales->save();

        return redirect()->back()->with('message', 'Record terupdate!');
    }

    public function destroy(Request $request)
    {
        $delete = Sales::find($request->id);

        $delete->delete();

        return redirect()->back()->with('message', 'Record terhapus!');
    }
}
