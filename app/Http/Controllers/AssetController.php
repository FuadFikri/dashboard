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

    public function create()
    { 
        $model = new Asset();
        return view('form', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $asset =Asset::find($id);
        return $asset;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $asset = Asset::FindOrFail($id);

        $input['file'] = $asset->file;
        if ($request->hasFile('file')) {
            if (!$asset->file == NULL) {
                unlink(public_path($asset->file));
            }
            $input['file'] = str_slug($input['name'], '-').'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('/upload'), $input['file']);
        }
        $asset->update($input);
    }

    public function destroy($id)
    {
        $asset = Asset::FindOrFail($id);
        if (!$asset->file == NULL ) {
            unlink(public_path('/upload/'.$asset->file));
        }
        Asset::destroy($id);

        return response()->json([
            'success' =>true,
            'message' => 'Asset Deleted'
        ]); 
    }

    public function dataTable(){
        $assets = Asset::query();
        return Datatables::of($assets)
            ->addColumn('show_file', function($assets){
                if ($assets->file == NULL){
                    return 'No Image';
                }
                return '<img class="rounded-square" width="50" height="50" src="'. url('/upload/'.$assets->file) .'" alt="">';
            })
            ->addColumn('action', function($assets){
            return  '<a href="#" class="btn btn-info btn-xs" style="margin:2px;"><i class="glyphicon glyphicon-eye-open"></i>Show</a>'.
                    '<a onclick="editForm('. $assets->id . ')" style="margin:2px;" class="btn btn-primary btn-xs"><i class =glyphicon glyphicon-eye-edit"></i>Edit</a>' .
                    '<a onclick="deleteData('. $assets->id . ')" style="margin:2px;" class="btn btn-danger btn-xs"><i class =glyphicon glyphicon-eye-edit"></i>Delete</a>';
        })
        ->rawColumns(['show_file', 'action'])->make(true);
    }
}
