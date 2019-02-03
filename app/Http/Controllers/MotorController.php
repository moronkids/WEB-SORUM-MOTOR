<?php
namespace App\Http\Controllers;
use App\Motor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Carbon\Carbon;

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
      $gmabarmotor = $request->file('gambarmotor');
      $extension = $gmabarmotor->getClientOriginalExtension();
      Storage::disk('public')->put($gmabarmotor->getFilename().'.'.$extension,  File::get($gmabarmotor));

      $motors = new Motor([

        'nama_motor' => $request->get('nama_motor'),
        'brand_motor'=> $request->get('brand_motor'),
        'tipe_motor'=> $request->get('tipe_motor')
      ]);
      $motors->mime = $gmabarmotor->getClientMimeType();
    $motors->original_filename = $gmabarmotor->getClientOriginalName();
    $motors->filename = $gmabarmotor->getFilename().'.'.$extension;
      $motors->save();
      return redirect('/Motors')->with('success', 'Stock has been added');
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
      $gmabarmotor = $request->file('gambarmotor');
      $extension = $gmabarmotor->getClientOriginalExtension();
      Storage::disk('public')->put($gmabarmotor->getFilename().'.'.$extension,  File::get($gmabarmotor));

          $motors = Motor::find($id);
          $motors->nama_motor = $request->get('nama_motor');
          $motors->brand_motor = $request->get('brand_motor');
          $motors->tipe_motor = $request->get('tipe_motor');
          $motors->mime = $gmabarmotor->getClientMimeType();
          $motors->original_filename = $gmabarmotor->getClientOriginalName();
          $motors->filename = $gmabarmotor->getFilename().'.'.$extension;
          $motors->save();

          return redirect('/Motors')->with('success', 'Stock has been updated');
    }
    public function destroy($id)
    {
       $motors = Motor::find($id);
       $motors->delete();

       return redirect('/Motors')->with('success', 'Stock has been deleted Successfully');
    }


}
