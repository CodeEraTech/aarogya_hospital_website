<?php

namespace App\Http\Controllers;

use App\Models\EmpanelledSection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmpanelledController extends Controller
{
    public function show(string $slug)
    {
        $sections = collect(config('empanelled'));
        $section = $sections->firstWhere('slug', $slug);
        abort_unless($section, 404);
        $record = EmpanelledSection::where('section_key', $sections->search($section))->first();
        return view('pages.empanelled-corporate', compact('sections', 'section', 'record'));
    }

    public function edit(int $key)
    {
        $section = config("empanelled.$key");
        abort_unless($section, 404);
        $record = EmpanelledSection::firstOrCreate(['section_key' => $key], ['slug' => $section['slug']]);
        return view('admin.empanelled.form', compact('key', 'section', 'record'));
    }

    public function update(Request $request, int $key)
    {
        $section = config("empanelled.$key");
        abort_unless($section, 404);
        $data = $request->validate(['content' => 'nullable|string', 'images' => 'nullable|array', 'images.*' => 'file|mimes:jpg,jpeg,png,webp,gif,svg|max:5120']);
        $record = EmpanelledSection::firstOrCreate(['section_key' => $key], ['slug' => $section['slug']]);
        $images = $record->images ?? [];
        foreach ($request->file('images', []) as $image) {
            $name = Str::uuid().'.'.$image->extension();
            $directory = public_path('uploads/empanelled/'.$section['slug']);
            if (!is_dir($directory)) mkdir($directory, 0755, true);
            $image->move($directory, $name);
            $images[] = 'uploads/empanelled/'.$section['slug'].'/'.$name;
        }
        $record->update(['slug' => $section['slug'], 'content' => $data['content'] ?? null, 'images' => $images]);
        return back()->with('success', $section['name'].' updated successfully.');
    }

    public function removeImage(EmpanelledSection $empanelledSection, int $index)
    {
        $images = $empanelledSection->images ?? [];
        abort_unless(array_key_exists($index, $images), 404);
        $path = public_path($images[$index]);
        if (is_file($path)) unlink($path);
        array_splice($images, $index, 1);
        $empanelledSection->update(['images' => array_values($images)]);
        return back()->with('success', 'Image removed successfully.');
    }
}
