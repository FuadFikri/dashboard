<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use DataTables;

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


    public function create()
    { 
        $model = new Asset();
        return view('form', compact('model'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['file'] = null;

        
          if ($request->hasFile('file')){
                 $input['file'] =str_slug($input['name'], '-').'.'.$request->file->getClientOriginalExtension();
                $request->file->move(public_path('/upload'), $input['file']);
          }
        Asset::create($input);

        return response()->json([
            'success' => true,
            'message' => 'Asset Created'
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
        }
        $asset->update($input);
    }

    public function destroy(Request $request, $id)
    {
        $permanent = $_POST['permanent'];
        $asset = Asset::withTrashed()->find($id);
        $permanent === 'true' ? $asset->forceDelete($id) : $asset->delete($id);

        return response()->json([
            'success' =>true,
            'message' => $permanent
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
            return '<center><a onclick="deleteData('. $assets->id . ',true)"  style="margin:2px;" class="btn btn-danger btn-xs hapus"><i class =glyphicon glyphicon-eye-edit"></i>Delete</a>'.
            '<a onclick="restore('. $assets->id . ')"  style="margin:2px;" class="btn btn-success btn-xs hapus"><i class =glyphicon glyphicon-eye-edit"></i>Restore</a></center>';
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
            return  '<a href="'. url('preview/'.$assets->id) .'" class="btn btn-info btn-xs" style="margin:2px;" target="_blank"><i class="glyphicon glyphicon-eye-open"></i>Show</a>'.
                    '<a onclick="editForm('. $assets->id . ')" style="margin:2px;" class="btn btn-primary btn-xs"><i class =glyphicon glyphicon-eye-edit"></i> Edit</a>' .
                    '<a onclick="deleteData('. $assets->id . ')" style="margin:2px;" class="btn btn-danger btn-xs "><i class =fa fa-trash"></i>Delete</a>';
        })
        ->rawColumns(['show_file', 'action'])->make(true);
    }
}
