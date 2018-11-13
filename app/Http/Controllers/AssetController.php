<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use DataTables;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    public function index()
    {
       return view('data');
    }
    public function trash()
    {
        return view('trash');
    }

    public function Documentation()
    {
        return view('documentation');
    }

    public function create()
    {
        $model = new Asset();
        return view('form', compact('model'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['file'] = null;
        // $input['url'] = null;

          if ($request->hasFile('file')){
                 $fileName =str_slug($input['name'], '-').'.'.$request->file->getClientOriginalExtension();
                $request->file->move(public_path('/upload'), $fileName);
                $input['url'] = url('upload/'.$fileName);
                $input['file'] = $fileName;
          }
                  
        Asset::create($input);

        return response()->json([
            'success' => true,
            'message' => 'success'
        ]);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
       $asset =Asset::find($id);
       return $asset;
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $asset = Asset::FindOrFail($id);

        $input['file'] = $asset->file;
        if ($request->hasFile('file')) {
            if (!$asset->file == NULL) {
                unlink(public_path('/upload/'.$asset->file));
            }
            $input['file'] = str_slug($input['name'], '-').'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('/upload'), $input['file']);
            $input['url'] = url('upload/'.$input['file']);
        }
        $asset->update($input);
    }

    public function destroy(Request $request, $id)
    {
        $permanent = $_POST['permanent'];
        $asset = Asset::withTrashed()->find($id);
        
        if($permanent === 'true'){
            unlink(public_path('/upload/'.$asset->file));
            $asset->forceDelete($id);
        }else{
            $asset->delete($id);
        }
        return response()->json([
            'success' =>true,
            'message' => 'deleted'
        ]);
    }

    public function restore($id)
    {
        $asset = Asset::onlyTrashed()->find($id);
        if ($asset != NULL) $asset->restore();
       return response()->json([
            'success' =>true,
            'message' => 'restored'
        ]);
    }

    public function preview($id)
    {
        $asset = Asset::find($id);
        $file = $asset->file;
        return view('preview',['file'=>$file]);
    }

    // =======API============== //

    public function trash_API(){
        $assets = Asset::query()->onlyTrashed();
        return Datatables::of($assets)
        ->addColumn('show_file', function($assets){
                if ($assets->file == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url('/upload/'.$assets->file) .'" alt="">';
            })
        ->addColumn('action', function($assets){
            return '<a href="'. url('preview/'.$assets->id) .'" class="btn btn-info btn-xs"  target="_blank"></i>Show</a>'.
            '<a onclick="deleteData('. $assets->id . ',true)"  class="btn btn-danger btn-xs hapus">Delete</a>'.
            '<a onclick="restore('. $assets->id . ')"  class="btn btn-success btn-xs hapus"><i class =glyphicon glyphicon-eye-edit"></i>Restore</a>';
        })
        ->rawColumns(['show_file', 'action'])->make(true);
    }

    public function dataTable(){
        $assets = Asset::query();
        return Datatables::of($assets)
            ->addColumn('show_file', function($assets){
                if ($assets->file == NULL){
                    return 'No Image';
                }
                    return '<a href="'.url('/upload/'.$assets->file) .'" target="_blank" >'.$assets->file.'</a>';
            })
            ->addColumn('action', function($assets){
            return  '<a href="'. url('preview/'.$assets->id) .'" class="btn btn-info btn-xs" style="margin:2px;" target="_blank">Show</a>'.
                    '<a onclick="editForm('. $assets->id . ')" style="margin:2px;" class="btn btn-primary btn-xs"> Edit</a>' .
                    '<a onclick="deleteData('. $assets->id . ')" style="margin:2px;" class="btn btn-danger btn-xs ">Delete</a>';
        })
        ->rawColumns(['show_file', 'action'])->make(true);
    }

    public function index_api()
    {
        $assets = Asset::all();
        $response = [
            'msg' => 'assets list',
            'data' => $assets,
        ];

        return response()->json($response,200);
    }
    public function show_api($id)
    {
        $asset = Asset::find($id);
        $response = [
            'msg' => 'asset with id '.$id,
            'data' => $asset,
        ];

        return response()->json($response,200);
    }
}
