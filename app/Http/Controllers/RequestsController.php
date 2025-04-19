<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Http\Requests\StoreRequestRequest;
use App\Http\Requests\UpdateRequestRequest;
use Inertia\Inertia;
use App\Models\Employee;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;

class RequestsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = Request::all()->map(function ($data) {
            $data->action = $data->action;
            $data->name = $data->employee->name;
            return $data;
        });
        return Inertia::render('Request/Index', ['requests' => $requests]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $items = Item::all()->keyBy('id')->map(function ($data) {
            $data->loc_code = $data->warehouse->location_code;
            $data->select = $data->select;

            return $data;
        });
        $employees = Employee::all()->keyBy('id')->map(function ($data) {
            $data->dept_name = $data->department->name;

            return $data;
        });
        return Inertia::render('Request/Create', ['items' => $items, 'employees' => $employees]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequestRequest $request)
    {
        $param = $request->all();
        $details = [];
        foreach ($param['details'] as $key => $item) {
            $itemData = Item::find($item['item']);
            $itemData->stock -= $item['qty'];
            $itemData->save();
            $details[] = [
                'item_id' => $item['item'],
                'qty' => $item['qty'],
                'notes' => $item['notes']?? "",
            ];
        }
        $param['request_number'] = "RO" . date("Y") . Auth::id() . str_pad(date("d"), 3, "0") . str_pad(date("hms"), 5, "0");
        unset($param['details']);
        $obj = new Request($param);
        $obj->save();
        $obj->details()->createMany($details);

        return redirect()->route('requests.index')->with('message', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $returnData = (object)[
            'request_number' => $request->request_number,
            'nik' => $request->employee->nik,
            'employee' => $request->employee->name,
            'dept' => $request->employee->department->name,
            'details' => $request->details->map(function ($detail) {
                $item = $detail->item;
                return (object)[
                    'item' => "$item->item_code - $item->name",
                    'location' => $item->warehouse->location_code,
                    'stock' => $item->stock,
                    'unit_name' => $item->unit_name,
                    'qty' => $detail->qty,
                    'notes' => $detail->notes,
                ];
            }),
        ];
        return $returnData;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequestRequest $request, Request $obj)
    {
        $obj->update($request->all());
        return redirect()->route('requests.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $request->details()->delete();
        $request->delete();
        return redirect()->back()->with('message', 'Data has been deleted');
    }
}
