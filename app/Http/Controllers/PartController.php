<?php

namespace App\Http\Controllers;

use App\Imports\PartsImport;
use App\Imports\WeekPlanImport;
use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PartController extends Controller
{
    public function import()
    {
        try {
            DB::beginTransaction();
            Excel::import(new PartsImport(), 'parts.xlsx');
            DB::commit();
            return redirect('/')->with('success', 'All good!');
        } catch (\Exception $e) {
            DB::rollBack();
        }

    }

    public function importWeek()
    {
        try {
            DB::beginTransaction();
            Excel::import(new WeekPlanImport(), 'week-plan.xlsx');
            DB::commit();
            return redirect('/')->with('success', 'All good!');
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function show(Part $part)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function edit(Part $part)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Part $part)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function destroy(Part $part)
    {
        //
    }
}
