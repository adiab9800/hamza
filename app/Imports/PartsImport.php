<?php

namespace App\Imports;

use App\Models\Code;
use App\Models\Part;
use App\Models\Plan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PartsImport implements ToCollection
{
    protected $headers = [
        'Part No',
        'Description',
        'Length (mm)',
        'Part Type'
    ];

    public function collection(Collection $collection)
    {
        $headerLine = $collection->first();
        $header = [];
        $codes = [];
        foreach ($headerLine as $index => $field) {
            if (in_array($field, $this->headers)) {
                $header[$index] = $field;
            } else {
                $codes[$index] = $this->saveCode($field);
            }
        }


        $plan = Plan::create([]);
        foreach ($collection as $key =>$row) {
            //skip header
            if ($key === 0) {
                continue;
            }
            $this->savePart($row, $header, $codes, $plan);
        }
    }
    protected function saveCode(string $code) {
        return Code::firstOrCreate([
            'code' => $code
        ])->id;
    }

    protected function savePart(Collection $row, array $header, array $codes, Plan $plan)
    {
        $part = Part::create([
            'plan_id' => $plan->id,
            'number' => $row[array_search('Part No', $header)] ?? null,
            'description' => $row[array_search('Description', $header)] ?? null,
            'length' => $row[array_search('Length (mm)', $header)] ?? null,
            'type' => $row[array_search('Part Type', $header)] ?? null,
        ]);
        $partCodes = [];
        foreach ($codes as $key => $code) {
            $partCodes[$code]= ['quantity' => $row[$key] ?? 0];
        }

        $part->codes()->sync($partCodes);
    }
}
