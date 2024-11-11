<?php

namespace App\Http\Controllers\Backend\Tamu;

use App\Http\Controllers\Controller;
use App\Models\Unor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TamuController extends Controller
{
    public function index()
    {
        return view($this->view.'.index');
    }

    public function create()
    {
        $sub_unor = Unor::whereNotNull('parent_id')->pluck('nama', 'id');
        return view($this->view.'.create', compact('sub_unor'));
    }

    public function data(Request $request)
    {
        $user = $request->user();
        $data = $this->model::with('unor');
        return datatables()->of($data)
            ->addColumn('action', function ($data) use ($user) {
                $button ='';
                if($user->read){
                    $button .= '<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Detail" data-action="show" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Tampilkan"><i class="fa fa-eye text-info"></i></button>';
                }
                if($user->update){
                    $button.='<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Edit" data-action="edit" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Edit"> <i class="fa fa-edit text-warning"></i> </button> ';
                }
                if($user->delete){
                    $button.='<button type="button" class="btn-action btn btn-sm btn-outline" data-title="Delete" data-action="delete" data-url="'.$this->url.'" data-id="'.$data->id.'" title="Delete"> <i class="fa fa-trash text-danger"></i> </button>';
                }
                return "<div class='btn-group'>".$button."</div>";
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
			'nik' => 'required',
			'tempat_lahir' => 'required',
			'tanggal_lahir' => 'required',
			'email' => 'required',
			'no_hp' => 'required',
			'alamat' => 'required',
			'jabatan' => 'required',
			'dari' => 'required',
			'keperluan' => 'required',
			'unor_id' => 'required|exists:unors,id',
            'capturedImage'=>'nullable|string'
        ]);


        if ($tamu = $this->model::create($request->all())) {
            if($request->has('capturedImage')) {
                if($upload = $this->convertBase64ToImage($request->capturedImage, $tamu->id, 'tamu', 'png')) {
                    $tamu->file()->create($upload);
                }
            }
            $response=[ 'status'=>TRUE, 'message'=>'Data berhasil disimpan'];
        }
        return response()->json($response ?? ['status'=>FALSE, 'message'=>'Data gagal disimpan']);
    }

    public function show($id)
    {
        $data = $this->model::find($id);
        return view($this->view.'.show', compact('data'));
    }

    public function edit($id)
    {
        $data = $this->model::find($id);
        $sub_unor = Unor::whereNotNull('parent_id')->pluck('nama', 'id');
        return view($this->view.'.edit', compact('data', 'sub_unor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
			'nik' => 'required',
			'tempat_lahir' => 'required',
			'tanggal_lahir' => 'required',
			'email' => 'required',
			'no_hp' => 'required',
			'alamat' => 'required',
			'jabatan' => 'required',
			'dari' => 'required',
			'keperluan' => 'required',
			'unor_id' => 'required|exists:unors,id',
        ]);

        $data=$this->model::find($id);
        if($data->update($request->all())){
            $response=[ 'status'=>TRUE, 'message'=>'Data berhasil disimpan'];
        }
        return response()->json($response ?? ['status'=>FALSE, 'message'=>'Data gagal disimpan']);
    }

    public function delete($id)
    {
        $data=$this->model::find($id);
        return view($this->view.'.delete', compact('data'));
    }

    public function destroy($id)
    {
        $data=$this->model::find($id);
        if($data->delete()){
            $response=[ 'status'=>TRUE, 'message'=>'Data berhasil dihapus'];
        }
        return response()->json($response ?? ['status'=>FALSE, 'message'=>'Data gagal dihapus']);
    }

    private function convertBase64ToImage(mixed $capturedImage,$name,$folder,$ext)
    {
        $image=$capturedImage;
        $image=str_replace('data:image/png;base64,', '', $image);
        $image=str_replace(' ', '+', $image);
        $imageName=$name.'.'.$ext;
        $path=$folder.'/'.$imageName;
        if(Storage::disk('local')->put($path, base64_decode($image))){
            $res=[
                'data'=>[
                    'name'=>$imageName,
                    'target'=>$path,
                ],
            ];
        }
        return $res ?? [];
    }

    public function totalTamu()
    {
        $tamu = (new $this->model);
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => 'Data berhasil diambil',
            'data' => [
                'tamu' => [
                    'hari_ini' => $tamu->hari_ini,
                    'bulan_ini' => $tamu->bulan_ini,
                    'tahun_ini' => $tamu->tahun_ini,
                    'total' => $tamu->total_tamu,
                ],
            ],
        ]);
    }
}
