<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

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
        $cars=Cars::where('active',1)->get();
        return view('home',['car'=>$cars]);
    }
    public function list()
    {
        $cars=Pesanan::leftJoin('cars', 'cars.nopol', '=','pesanans.nopol')
        ->where('pesanans.user_id',auth()->user()->id)
        // ->where('pesanans.retur_date', '=',null)
        ->groupBy('pesanans.nopol')
        ->get();
        return view('pesanan-list',['car'=>$cars]);
    }
    public function pesan($id)
    {
        $cars = Cars::find(decrypt($id));
        try {
            DB::beginTransaction();
            $pesanan= new Pesanan([
                'nopol'=>$cars->nopol,
                'user_id'=>auth()->user()->id,
                'order_date'=>now(),
            ]);
            $pesanan->save();
            Cars::where('id',$cars->id)->update([
                'active'=>0
            ]);
            if($cars->active === 0){
                DB::rollBack();
                return redirect()->back()->with('errors', 'Pesanan Gagal di Buat');
            }
            DB::commit();
            return redirect()->back()->with('msg', 'Pesanan Berhasil di Buat');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

    }
    public function kembalikan($id)
    {
        $pesanan=Pesanan::where('nopol',decrypt($id))->first();
        $cars=Cars::where('nopol',decrypt($id))->first();
        // dd($cars);
        try {
            DB::beginTransaction();
            Cars::where('nopol',decrypt($id))->update([
                'active'=>1
            ]);
            Pesanan::where('nopol',decrypt($id))->update([
                'retur_date'=>now()
            ]);
            
            $new_date=Pesanan::where('nopol',decrypt($id))->first();

            $to = Carbon::createFromFormat('Y-m-d', $pesanan->order_date);
            $from = Carbon::createFromFormat('Y-m-d', $new_date->retur_date);

            $total_day = $to->diffInDays($from);
            if($total_day===0){
                $total_day += 1;
            }
            Pesanan::where('nopol',decrypt($id))->update([
                'total_amount'=>$cars->harga*$total_day
            ]);
            DB::commit();
            return redirect()->back()->with('msg','total hari yang di sewa '.$total_day.' total pembayaran Rp. '.$cars->harga*$total_day);
        } catch (\Throwable $th) {
            DB::rollBack();   
        }

    }
}
