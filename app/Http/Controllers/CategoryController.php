<?php

namespace App\Http\Controllers;

use App\Category;
use App\Traits\ResponseTrait;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
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

        $categories = Category::with(['item'])->get();

        return $this->successResponse($categories, Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'thumbnail_path' => 'required',
            'category_type' => 'required',
            'title' => 'required',
        ];

        $validateData = Validator::make($request->all(), $rules);

        if ($validateData->fails()) {

            return $validateData->errors();
        }


        try {


            if ($request->hasFile('thumbnail_path')) {

                $file = $request->file('thumbnail_path');
                $extension = $file->getClientOriginalExtension();

                $newName = md5(microtime()) . time() . '.' . $extension;
                $file->storeAs('/public/categories', $newName);
            }

            $category = Category::create([

                'title' => $request->title,
                'category_type'=>$request->category_type,
                'thumbnail_path' => $newName ?? null,

            ]);


            return $this->successResponse($category, Response::HTTP_CREATED);


        } catch (QueryException $exception) {
            return $exception;
        }


    }


    /**
     * Display the specified resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public
    function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public
    function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Category $category)
    {
        //
    }
}
