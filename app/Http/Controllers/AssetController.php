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
        return view('templates.form', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dataTable(){
        $model = Asset::query();
        return DataTables::of($model)
            ->addColumn('action', function($model){
                return view('templates/_action', [
                    'model' =>$model,
                    'url_show' => route('data.show', $model->id),
                    'url_edit' => route('data.edit', $model->id),
                    'url_destroy' => route('data.destroy', $model->id),
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            -> make(true);
    }
}
