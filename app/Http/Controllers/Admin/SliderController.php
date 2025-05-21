<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TblSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = TblSlider::all();
        return view('admin.Slider', compact('sliders'));
    }

    public function create()
    {
        return view('admin.create_slider');
    }

    public function store(Request $request)
    {
        $request->validate([
            'SliderName' => 'required|string|max:255',
            'SliderUrl' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Isactive' => 'boolean'
        ]);

        $image = $request->file('SliderUrl');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/sliders'), $imageName);

        TblSlider::create([
            'SliderName' => $request->SliderName,
            'SliderUrl' => 'uploads/sliders/' . $imageName,
            'Isactive' => $request->has('Isactive')
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully');
    }

    public function edit($id)
    {
        $slider = TblSlider::findOrFail($id);
        return view('admin.edit_slider', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = TblSlider::findOrFail($id);

        $request->validate([
            'SliderName' => 'required|string|max:255',
            'SliderUrl' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'Isactive' => 'boolean'
        ]);

        if ($request->hasFile('SliderUrl')) {
            // Delete old image
            if (file_exists(public_path($slider->SliderUrl))) {
                unlink(public_path($slider->SliderUrl));
            }

            // Upload new image
            $image = $request->file('SliderUrl');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/sliders'), $imageName);
            $slider->SliderUrl = 'uploads/sliders/' . $imageName;
        }

        $slider->SliderName = $request->SliderName;
        $slider->Isactive = $request->has('Isactive');
        $slider->save();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully');
    }

    public function destroy($id)
    {
        $slider = TblSlider::findOrFail($id);
        
        // Delete image file
        if (file_exists(public_path($slider->SliderUrl))) {
            unlink(public_path($slider->SliderUrl));
        }

        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully');
    }
}
