<?php

namespace App\Http\Controllers;

use App\Models\Late;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class LateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lates = Late::with('student')->get();
        $student = Student::all();
        return view('keterlambatan.index', compact('lates', 'student'));
    }

    public function rekap()
    {
        $rekap = Late::with('student')
            ->select('student_id', DB::raw('count(*) as total'))
            ->groupBy('student_id')
            ->get();

        return view('keterlambatan.rekap', compact('rekap'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $lates = Late::with('student')->get();
        $student = Student::all();
        return view('keterlambatan.create', compact('lates', 'student'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'information' => 'required',
            'bukti' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date_time_late' => 'required',
        ]);

        $imageName = time() . '.' . $request->bukti->getClientOriginalExtension();
        $request->bukti->move(public_path('images'), $imageName);

        $late = new Late([
            'student_id' => $request->get('student_id'),
            'information' => $request->get('information'),
            'bukti' => $imageName,
            'date_time_late' => $request->get('date_time_late'),
        ]);

        $late->save();

        return redirect()->route('late.home')->with('success', 'Berhasil menambah data Keterlambatan');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $students = Student::findOrFail($id);
        $lates = Late::with('student')->where('student_id', $id)->get();

        return view('keterlambatan.show', compact('students', 'lates'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Late $late, $id)
    {
        $lates = Late::with('student')->find($id);
        $students = Student::all();

        return view('keterlambatan.edit', compact('lates', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required',
            'information' => 'required',
            'bukti' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date_time_late' => 'required',
        ]);

        $late = Late::findOrFail($id);

        $late->student_id = $request->get('student_id');
        $late->information = $request->get('information');
        $late->date_time_late = $request->get('date_time_late');

        if ($request->hasFile('bukti')) {
            $imageName = time() . '.' . $request->bukti->getClientOriginalExtension();
            $request->bukti->move(public_path('images'), $imageName);

            if ($late->bukti) {
                $oldImagePath = public_path('images/' . $late->bukti);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $late->bukti = $imageName;
        }

        $late->save();

        return redirect()->route('late.home')->with('success', 'Berhasil memperbarui data Keterlambatan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Late $late, $id)
    {
        Late::where('id', $id)->delete();

        return redirect()->route('late.home')->with('success', 'Berhasil Menghapus Data');
    }
}
