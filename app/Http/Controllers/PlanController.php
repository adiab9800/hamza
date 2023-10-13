<?php

namespace App\Http\Controllers;

use App\Imports\PartsImport;
use App\Models\Code;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::orderBy('id','desc')->get();
        return view('plans.index',compact('plans'));
    }

    public function create()
    {
        return view('plans.create');
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'plan' => ['required','mimes:xlsx,xls']
            ]
        );
        try {
            DB::beginTransaction();
            $plan = Plan::create([]);
            Excel::import(new PartsImport($plan), $request->file('plan'));
            DB::commit();
            return redirect(route('plans.index'))->with('success', 'plan saved successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'something went wrong please try again');
        }
    }

    public function show(Plan $plan)
    {
        $codes = Code::whereHas('parts',function($query) use ($plan) {
            $query->where('plan_id',$plan->id);
        })->get();
        return view('plans.show', compact('plan','codes'));
    }


    public function edit(Plan $plan)
    {
        //
    }

    public function update(Request $request, Plan $plan)
    {
        //
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        return back()->with('success','plan deleted successfully');
    }
}
