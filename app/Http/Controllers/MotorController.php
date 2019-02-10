<?php
namespace App\Http\Controllers;
use App\Motor;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class MotorController extends Controller
{
    // index
    public function __construct()
    {
        $this->dimensions = ['300'];
    }
    public function index(){
      $Motor = Motor::all();
      return view('web_extends.shop',['Motor' => $Motor]);
    }
    // create

    public function create()
    {
        return view('web_extends.create_shop');
    }

    //store
    public function store(Request $request)
    {
      $request->validate([
        'nama_motor'=>'required',
        'brand_motor'=> 'required',
        'tipe_motor' => 'required'
      ]);
      // $gmabarmotor = $request->file('gambarmotor');
      // $extension = $gmabarmotor->getClientOriginalExtension();
      // Storage::disk('public')->put($gmabarmotor->getFilename().'.'.$extension,  File::get($gmabarmotor));
      // ---------------------------------------------------------------------------
        $originalImage= $request->file('gambarmotor');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = public_path().'/thumbnail/';
        $originalPath = public_path().'/images/';
        if (!File::isDirectory($thumbnailPath)) {
            //MAKA FOLDER TERSEBUT AKAN DIBUAT
            File::makeDirectory($thumbnailPath);
        }
        if (!File::isDirectory($originalPath)) {
            //MAKA FOLDER TERSEBUT AKAN DIBUAT
            File::makeDirectory($originalPath);
        }

        $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
        foreach ($this->dimensions as $row) {
            //MEMBUAT CANVAS IMAGE SEBESAR DIMENSI YANG ADA DI DALAM ARRAY
            $canvas = Image::canvas($row, $row);
            //RESIZE IMAGE SESUAI DIMENSI YANG ADA DIDALAM ARRAY
            //DENGAN MEMPERTAHANKAN RATIO
            $resizeImage  = Image::make($originalImage)->resize($row, $row, function($constraint) {
                $constraint->aspectRatio();
            });

            //MEMASUKAN IMAGE YANG TELAH DIRESIZE KE DALAM CANVAS
            $canvas->insert($resizeImage, 'center');
            //SIMPAN IMAGE KE DALAM MASING-MASING FOLDER (DIMENSI)
            $canvas->save($thumbnailPath.time().$originalImage->getClientOriginalName());
        }
        // ---------------------------------------------------------------------------
      $motors = new Motor([

        'nama_motor' => $request->get('nama_motor'),
        'brand_motor'=> $request->get('brand_motor'),
        'tipe_motor'=> $request->get('tipe_motor')
      ]);
      $motors->filename=time().$originalImage->getClientOriginalName();
      $motors->save();
      // $motors->mime = $gmabarmotor->getClientMimeType();
      // $motors->original_filename = $gmabarmotor->getClientOriginalName();
      // $motors->filename = $gmabarmotor->getFilename().'.'.$extension;

      return redirect('/Motors')->with('success', 'Stock has been added');
    }


    //edit
    public function edit($id)
    {
        $motors = Motor::find($id);

        return view('web_extends.edit_shop', compact('motors'));
    }

    //update
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
    //destroy
    public function destroy($id)
    {
       $motors = Motor::find($id);
       $motors->delete();

       return redirect('/Motors')->with('success', 'Stock has been deleted Successfully');
    }


}
