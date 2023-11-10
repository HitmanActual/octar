<?php

namespace App\Http\Controllers;

use App\ClusterImage;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ClusterImageController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
            'cluster_id'=>'required',
            'image_path'=>'required',
        ];
        $validateData = Validator::make($request->all(), $rules);

        if ($validateData->fails()) {

            return $validateData->errors();
        }

        if($request->hasFile('image_path')){

            foreach ($request->image_path as $file){

                $fileName = $file->getClientOriginalExtension();
                $newName = md5(microtime()) . time() . '.' . $fileName;
                $file->storeAs('/public/clusters', $newName);

                $clusterImage = ClusterImage::create([
                    'cluster_id'=>$request->cluster_id,
                    'image_path'=>$newName,
                ]);
            }

            return $this->successResponse($clusterImage, Response::HTTP_CREATED);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClusterImage  $clusterImage
     * @return \Illuminate\Http\Response
     */
    public function show(ClusterImage $clusterImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClusterImage  $clusterImage
     * @return \Illuminate\Http\Response
     */
    public function edit(ClusterImage $clusterImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClusterImage  $clusterImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClusterImage $clusterImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClusterImage  $clusterImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClusterImage $clusterImage)
    {
        //
    }
}
