<?php

namespace App\Imports;

use App\Models\Code;
use App\Models\WeekCode;
use App\Models\WeekPlan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class WeekPlanImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {

        $weekPlan = WeekPlan::create([]);
        $days = array_filter($collection[0]->toArray());
        unset($days[0]);

        $shifts = array_filter(array_unique($collection[1]->toArray()));
        unset($collection[0]);
        unset($collection[1]);


        foreach ($collection as $row) {
            $dataMapping = $this->mapData($days, $shifts);
            $code = $row[0];
            foreach ($dataMapping as $key => $dataRow) {
                $dataMapping[$key]['quantity'] = $row[$key+1] ?? 0;
            }
            $this->saveCode($code, $dataMapping, $weekPlan);
        }

    }

    private function mapData($days, $shifts)
    {
        $data = [];
        foreach ($days as $day) {
            foreach ($shifts as $shift) {
                $data[] = [
                    'day' => $day,
                    'shift' => str_replace(' ','',$shift),
                    'quantity' => null
                ];
            }
        }
        return $data;
    }

    private function saveCode(string $codeString, array $data, WeekPlan $weekPlan)
    {
        $code = Code::firstOrCreate([
            'code'=> $codeString
        ]);
        foreach ($data as $record) {
            $record['week_plan_id'] = $weekPlan->id;
            $record['code_id'] = $code->id;
            WeekCode::create($record);
        }
    }


}
