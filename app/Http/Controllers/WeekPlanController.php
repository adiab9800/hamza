<?php

namespace App\Http\Controllers;

use App\Imports\WeekPlanImport;
use App\Models\Code;
use App\Models\Part;
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

    public function showParts(WeekPlan $week_plan)
    {        
        $week_days=['Sat'
        ,'Sun','Mon','Tue','Wed','Thu'
    ];
        $queryPlansWeek='';
        $comma = '';
         foreach ($week_days as $key => $value) {
           
            for ($sh=1; $sh <= 3; $sh++) { 
                
                $queryPlansWeek .= $comma;
                $queryPlansWeek .="(SELECT SUM(week_codes.quantity * parts_codes.quantity ) from week_codes 
                                    inner Join  parts_codes ON  parts_codes.part_id = parts.id 
                                    where 
                                    week_codes.code_id = parts_codes.code_id AND
                                     week_codes.day  = '$value'
                                    AND week_codes.shift  = 'Shift-".$sh."'
                                    -- limit 1
                                    ) as ".$value."_shift_".$sh  ;
                                    $comma = ',';

                                    

            }
         }
         $weekCodesIds = WeekCode::where('week_plan_id',$week_plan->id)->groupBy('code_id')->pluck('code_id');
         $parts = Part::whereHas('codes', function($query) use ($weekCodesIds){
             $query->whereIn('parts_codes.code_id',$weekCodesIds);
         })->select('parts.id','parts.number')->selectRaw($queryPlansWeek)->get();
                   
        //  return $parts
        // $query = Part::select('parts.id','parts.number')
        //               ->wherehas('codes',function(){
        //                 $query->where()
        //               });
        // $query ='SELECT
        //             parts.id,
        //             parts.number
        //         FROM
        //             parts
        //         HAVING
        //             (
        //             SELECT
        //                 COUNT(week_codes.id)
        //             FROM
        //                 week_codes
        //             INNER JOIN parts_codes ON parts_codes.part_id = parts.id
        //             WHERE
        //                 week_codes.code_id = parts_codes.code_id and week_codes.week_plan_id ='.$week_plan->id.'
        //         ) > 0  
        //         ORDER BY `parts`.`id` DESC;';
        // $parts = DB::select($query)->selectRaw($queryPlansWeek);
        // dd($parts);
        return view('week-plans/show-numbers',compact('parts'));

    }
}
