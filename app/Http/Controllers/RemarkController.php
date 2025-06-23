<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Remark;

class RemarkController extends Controller
{
    public function index()
    {
        $remarks = Remark::latest()->get();
        return view('remarks', compact('remarks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:500',
        ]);

        $remark = Remark::create([
            'text' => $request->text,
        ]);

        return response()->json($remark);
    }
}
