<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tblproperty;

class TblpropertyController extends Controller
{
    
    
    public function index()
    {
        $tblproperty = Tblproperty::all();
		return response()->json($tblproperty);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newTblproperty = new Tblproperty([
			//'slug' => $request->get('slug'),
			'PropertyName' => $request->get('PropertyName'),
            'Theme' => $request->get('Theme'),
            'PostingDate' => $request->get('PostingDate'),
            'Aboutme' => $request->get('Aboutme'),
            'updationDate' => $request->get('updationDate'),
            'updatedby' => $request->get('updatedby'),
            'updated_at'=> $request->get('updated_at'),
            'created_at'=> $request->get('created_at')
		]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
			//'slug' => 'required',
            'PropertyName' => '',
            'Theme' => '',
            'PostingDate' => '',
            'Aboutme' => '',
            'updationDate' => '',
            'updatedby' => '',
            'updated_at' => '',
            'created_at' => ''
		]);

		$newTblproperty = new Tblproperty([
			//'slug' => $request->get('slug'),
			'PropertyName' => $request->get('PropertyName'),
            'Theme' => $request->get('Theme'),
            'PostingDate' => $request->get('PostingDate'),
            'Aboutme' => $request->get('Aboutme'),
            'updationDate' => $request->get('updationDate'),
            'updatedby' => $request->get('updatedby'),
            'updated_at'=> $request->get('updated_at'),
            'created_at'=> $request->get('created_at')
		]);

		$newTblproperty->save();

		return response()->json($newTblproperty);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ID)
    {
        $tblproperty = Tblproperty::findOrFail($ID);
		return response()->json($tblproperty);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ID)
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
    public function update(Request $request, $ID)
    {
        // $Leads = Leads::findOrFail($id);

		// $request->validate([
		// 	'slug' => 'slug',
		// 	'teamname' => 'teamname'
		// ]);

		// $Leads->slug = $request->get('slug');
		// $Leads->teamname = $request->get('teamname');

		// $Leads->save();

		// return response()->json($Leads);

        $tblproperty = Tblproperty::findOrFail($ID);
		
		$tblproperty = Tblproperty::find($ID);
        $tblproperty->update($request->all());
        return $tblproperty;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($ID)
    {
        $tblproperty = Tblproperty::findOrFail($ID);
		$tblproperty->delete();

		return response()->json($tblproperty::all());
    }
    public function propertyCount()
    {
        $tblproperty = tblproperty::count();
		return response()->json($tblproperty);
    }
}
