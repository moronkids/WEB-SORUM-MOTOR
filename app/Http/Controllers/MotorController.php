<?php

namespace App\Http\Controllers;
use App\Motor;
use Illuminate\Http\Request;

class MotorController extends Controller
{
    public function index(){
      $Motor = Motor::all();
      return view('web_extends.shop',['Motor' => $Motor]);
    }
    public function create()
    {
        return view('web_extends.create_shop');
    }
    public function store(Request $request)
    {
      $request->validate([
        'nama_motor'=>'required',
        'brand_motor'=> 'required',
        'tipe_motor' => 'required'
      ]);
      $motors = new Motor([
        'nama_motor' => $request->get('nama_motor'),
        'brand_motor'=> $request->get('brand_motor'),
        'tipe_motor'=> $request->get('tipe_motor')
      ]);
      $motors->save();
      return redirect('/shop')->with('success', 'Stock has been added');
    }
    public function edit($id)
    {
        $motors = Motor::find($id);

        return view('web_extends.edit_shop', compact('motors'));
    }
    public function update(Request $request, $id)
    {
      $request->validate([
        'nama_motor'=>'required',
        'brand_motor'=> 'required',
        'tipe_motor' => 'required'
      ]);

          $motors = Motor::find($id);
          $motors->nama_motor = $request->get('nama_motor');
          $motors->brand_motor = $request->get('brand_motor');
          $motors->tipe_motor = $request->get('tipe_motor');
          $motors->save();

          return redirect('/shop')->with('success', 'Stock has been updated');
    }
    public function destroy($id)
    {
       $motors = Motor::find($id);
       $motors->delete();

       return redirect('/shop')->with('success', 'Stock has been deleted Successfully');
    }


}
