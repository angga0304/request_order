<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = Item::all()->map(function ($data) {
            $data->lokasi = $data->warehouse->name;
            return $data;
        });
        return Inertia::render('Item/Index', ['lists' => $lists]);
    }
}
