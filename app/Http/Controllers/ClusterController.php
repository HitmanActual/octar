<?php

namespace App\Http\Controllers;

use App\Cluster;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ClusterController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $rules = [
            'title' => 'required',
            'subtitle' => 'required',
        ];

        $validateData = Validator::make($request->all(), $rules);

        if ($validateData->fails()) {

            return $validateData->errors();
        }

        $category = Cluster::create([

            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'service_id'=>$request->service_id,
            'description'=>$request->description,


        ]);

        return $this->successResponse($category, Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function show(Cluster $cluster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function edit(Cluster $cluster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cluster $cluster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cluster  $cluster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cluster $cluster)
    {
        //
    }
}
