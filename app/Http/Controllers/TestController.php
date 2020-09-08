<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::all();
        return response()->json($tests,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test              = new Test();
        $test->name        = $request->get('name');
        $test->description = $request->get('description');
        $test->save();
        return response()->json($test,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        return response()->json($test,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Test $test)
    {
        $test->name        = $request->get('name');
        $test->description = $request->get('description');
        $test->save();
        return response()->json($test,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $test->delete();
        return response([],204);
    }
}
