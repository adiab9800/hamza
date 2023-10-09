<?php

namespace App\Http\Controllers;

use App\Imports\WeekPlanImport;
use App\Models\WeekCode;
use App\Models\WeekPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class WeekPlanController extends Controller
{

    public function index()
    {
        $weekPlans = WeekPlan::orderBy('id','desc')->get();
        return view('week-plans.index',compact('weekPlans'));

    }

    public function create()
    {
        return view('week-plans.create');
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
            Excel::import(new WeekPlanImport(), $request->file('plan'));
            DB::commit();
            return redirect(route('week-plans.index'))->with('success', 'week plan saved successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'something went wrong please try again');
        }
    }

    public function show(WeekPlan $week_plan)
    {
        $weekCodes = WeekCode::where('week_plan_id',$week_plan->id)->get()->groupBy('code_id');
        return view('week-plans/show',compact('weekCodes'));
    }

    public function edit(WeekPlan $weekplan)
    {
        //
    }

    public function update(Request $request, WeekPlan $weekplan)
    {
        //
    }

    public function destroy(WeekPlan $week_plan)
    {
        $week_plan->delete();
        return back()->with('success','week plan deleted successfully');
    }
}
