<?php
namespace App\Http\Controllers\Master;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Pengujian;
class PengujianController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $model=Pengujian::select('*');
        if($request->has('q')){
            $model=$model->where('nama_penguji','like','%'.$request->input('q').'%');
        }
        $model=$model->paginate(25);
        
        return response()->json($model);
    }
    public function show(Request $request,$id)
    {
        $model=Pengujian::find($id);
        return $model;
    }
    public function destroy($id)
    {
        $model=Pengujian::find($id);
        $del=$model->delete();
        if($del){
            $data=array(
                'success'=>true,
                'message'=>'Data deleted'
            );
        }else{
            $data=array(
                'success'=>false,
                'message'=>'Data failed to deleted'
            );
        }
        return response()->json($data);
    }
}