<?php

namespace App\Http\Controllers;

use App\Models\{Appointment, Blog, Doctor, Feedback, GalleryItem, Page, Service, Setting, Slide, Testimonial};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    private array $resources = [
        'doctors' => [Doctor::class, 'Doctors', ['name', 'designation', 'image', 'sort_order', 'status', 'meta_title', 'meta_description']],
        'services' => [Service::class, 'Services', ['name', 'description', 'content', 'image', 'status', 'sort_order', 'meta_title', 'meta_tags', 'meta_description']],
        'pages' => [Page::class, 'Pages', ['title', 'status', 'content']],
        'blogs' => [Blog::class, 'Blog posts', ['title', 'slug', 'content', 'image', 'published_at', 'status', 'meta_title', 'meta_description']],
        'gallery' => [GalleryItem::class, 'Gallery', ['title', 'image', 'status', 'sort_order']],
        'slides' => [Slide::class, 'Slides', ['title', 'slug', 'subtitle', 'image', 'button_text', 'button_url', 'status', 'sort_order']],
        'testimonials' => [Testimonial::class, 'Patient testimonials', ['name', 'type', 'quote', 'video_file', 'video_url', 'status', 'sort_order']],
        'appointments' => [Appointment::class, 'Appointments', ['patient_id', 'patient_name', 'mobile_number', 'email', 'preferred_doctor', 'preferred_date', 'preferred_time', 'status', 'message']],
        'feedback' => [Feedback::class, 'Feedback', ['name', 'phone', 'email', 'department', 'rating', 'message', 'status']],
    ];

    public function login()
    {
        return view('admin.auth.login');
    }

    public function authenticate(Request $request)
    {
        $data = $request->validate(['email' => 'required|email', 'password' => 'required']);
        if (Auth::attempt($data, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('admin.dashboard'));
        }
        return back()->withErrors(['email' => 'The credentials do not match our records.'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    public function profile()
    {
        return view('admin.profile', ['user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $data = $request->validate(['name' => 'required|string|max:120', 'email' => ['required', 'email', 'max:190', Rule::unique('users', 'email')->ignore($user->id)], 'password' => 'nullable|string|min:8|confirmed']);
        if (blank($data['password'] ?? null)) unset($data['password']);
        $user->update($data);
        return back()->with('success', 'Profile updated successfully.');
    }

    public function dashboard()
    {
        return view('admin.dashboard', ['counts' => ['Appointments' => Appointment::count(), 'Feedback' => Feedback::count(), 'Doctors' => Doctor::count(), 'Blog posts' => Blog::count()], 'recentAppointments' => Appointment::latest()->take(6)->get()]);
    }

    public function settings()
    {
        $groups = Setting::orderBy('group')->orderBy('key')->get()->groupBy('group');
        return view('admin.settings', compact('groups'));
    }

    public function saveSettings(Request $request)
    {
        foreach ($request->input('settings', []) as $key => $value) Setting::where('key', $key)->update(['value' => $value]);
        foreach (['website_logo' => 'site-settings', 'website_favicon' => 'site-settings'] as $key => $folder) {
            if ($request->hasFile("settings_files.$key")) {
                $path = $this->storeFile($request->file("settings_files.$key"), $folder);
                Setting::where('key', $key)->update(['value' => $path]);
                $legacyPath = $key === 'website_logo' ? public_path('assets/hospital/images/aarogya-logo.png') : public_path('favicon.ico');
                copy(public_path($path), $legacyPath);
            }
        }
        return back()->with('success', 'Website settings saved successfully.');
    }

    public function about()
    {
        $about = Setting::whereIn('key', [
            'about_image',
            'about_content',
            'chairman_image',
            'chairman_message',
            'why_choose_1_title',
            'why_choose_1_content',
            'why_choose_2_title',
            'why_choose_2_content',
            'why_choose_3_title',
            'why_choose_3_content',
            'why_choose_4_title',
            'why_choose_4_content',
            'why_choose_5_title',
            'why_choose_5_content',
            'why_choose_6_title',
            'why_choose_6_content',
            'our_mission',
            'our_vision',
            'quality_policy',
            'certificates'
        ])->pluck('value', 'key');
        return view('admin.about', compact('about'));
    }

    public function saveAbout(Request $request)
    {
        $validated = $request->validate([
            'about_content' => 'nullable|string',
            'chairman_message' => 'nullable|string',
            'why_choose_1_title' => 'nullable|string|max:255',
            'why_choose_1_content' => 'nullable|string',
            'why_choose_2_title' => 'nullable|string|max:255',
            'why_choose_2_content' => 'nullable|string',
            'why_choose_3_title' => 'nullable|string|max:255',
            'why_choose_3_content' => 'nullable|string',
            'why_choose_4_title' => 'nullable|string|max:255',
            'why_choose_4_content' => 'nullable|string',
            'why_choose_5_title' => 'nullable|string|max:255',
            'why_choose_5_content' => 'nullable|string',
            'why_choose_6_title' => 'nullable|string|max:255',
            'why_choose_6_content' => 'nullable|string',
            'our_mission' => 'nullable|string',
            'our_vision' => 'nullable|string',
            'quality_policy' => 'nullable|string',
        ]);

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value, 'group' => 'About Us']);
        }

        foreach (['about_image', 'chairman_image'] as $key) {
            if ($request->hasFile($key)) {
                $path = $this->storeFile($request->file($key), 'about');
                Setting::updateOrCreate(['key' => $key], ['value' => $path, 'group' => 'About Us']);
            }
        }

        // Handle multiple certificate uploads
        if ($request->hasFile('certificates')) {
            $certificatePaths = [];
            foreach ($request->file('certificates') as $file) {
                $certificatePaths[] = $this->storeFile($file, 'certificates');
            }
            $existing = Setting::where('key', 'certificates')->value('value');
            $existingPaths = $existing ? json_decode($existing, true) : [];
            $allPaths = array_merge($existingPaths, $certificatePaths);
            Setting::updateOrCreate(['key' => 'certificates'], ['value' => json_encode($allPaths), 'group' => 'About Us']);
        }

        // Handle certificate deletion
        if ($request->has('delete_certificates')) {
            $existing = Setting::where('key', 'certificates')->value('value');
            $existingPaths = $existing ? json_decode($existing, true) : [];
            $toDelete = $request->input('delete_certificates', []);
            $remainingPaths = array_values(array_diff($existingPaths, $toDelete));
            Setting::updateOrCreate(['key' => 'certificates'], ['value' => json_encode($remainingPaths), 'group' => 'About Us']);
        }

        return back()->with('success', 'About Us content saved successfully.');
    }

    public function index(string $resource, Request $request)
    {
        abort_unless(isset($this->resources[$resource]), 404);
        [$model, $label] = $this->resources[$resource];
        $query = $model::query();
        if ($request->filled('search')) {
            $term = $request->search;
            $query->where(function ($q) use ($term) {
                foreach (['name', 'title', 'patient_name', 'patient_id', 'key', 'email'] as $field) $q->orWhere($field, 'like', '%' . $term . '%');
            });
        }
        return view('admin.resource.index', ['resource' => $resource, 'label' => $label, 'items' => $query->latest()->paginate(10)->withQueryString(), 'fields' => array_values(array_diff($this->resources[$resource][2], ['slug']))]);
    }

    public function create(string $resource)
    {
        abort_unless(isset($this->resources[$resource]), 404);
        abort_if($resource === 'feedback', 404);
        return view('admin.resource.form', ['resource' => $resource, 'label' => $this->resources[$resource][1], 'fields' => $this->resources[$resource][2], 'item' => null, 'statusOptions' => $this->statusOptions($resource), 'activeDoctors' => Doctor::where('status', 'Active')->orderBy('name')->get()]);
    }

    public function store(string $resource, Request $request)
    {
        abort_unless(isset($this->resources[$resource]), 404);
        abort_if($resource === 'feedback', 404);
        [$model] = $this->resources[$resource];
        $data = $request->except(['_token', '_method']);
        if ($resource === 'doctors') $request->validate(['speciality' => 'required|string|max:190']);
        if ($resource === 'services') $request->validate(['description' => 'nullable|string|max:1000', 'image' => 'required|file|mimes:jpg,jpeg,png,webp,gif|max:5120']);
        if ($resource === 'gallery') $request->validate(['image'=>'required|file|mimes:jpg,jpeg,png,webp,gif|max:5120']);
        if (in_array($resource, ['doctors', 'services', 'pages', 'blogs', 'slides'])) $data['slug'] = Str::slug($data['title'] ?? $data['name']);
        $data = $this->processFiles($data, $request, $resource);
        if (in_array('status', $this->resources[$resource][2])) $data['status'] = $data['status'] ?? 'Active';
        $model::create($data);
        return redirect()->route('admin.resource.index', $resource)->with('success', 'Record created successfully.');
    }

    public function edit(string $resource, int $id)
    {
        abort_unless(isset($this->resources[$resource]), 404);
        [$model, $label, $fields] = $this->resources[$resource];
        if ($resource === 'feedback') $fields = ['status'];
        return view('admin.resource.form', compact('resource', 'label', 'fields') + ['item' => $model::findOrFail($id), 'statusOptions' => $this->statusOptions($resource), 'activeDoctors' => Doctor::where('status', 'Active')->orderBy('name')->get()]);
    }

    public function update(string $resource, Request $request, int $id)
    {
        abort_unless(isset($this->resources[$resource]), 404);
        [$model] = $this->resources[$resource];
        $data = $resource === 'feedback' ? $request->only('status') : $request->except(['_token', '_method']);
        if ($resource === 'doctors') $request->validate(['speciality' => 'required|string|max:190']);
        if ($resource === 'services') $request->validate(['description' => 'nullable|string|max:1000', 'image' => 'nullable|file|mimes:jpg,jpeg,png,webp,gif|max:5120']);
        unset($data['slug']);
        $data = $this->processFiles($data, $request, $resource);
        $model::findOrFail($id)->update($data);
        return redirect()->route('admin.resource.index', $resource)->with('success', 'Record updated successfully.');
    }

    private function statusOptions(string $resource): array
    {
        return in_array($resource, ['appointments', 'feedback']) ? ['New', 'Contacted', 'Resolved', 'Archived'] : ['Active', 'Inactive'];
    }

    private function processFiles(array $data, Request $request, string $resource): array
    {
        foreach (['image', 'video_file'] as $field) if ($request->hasFile($field)) {
            $request->validate([$field => $field === 'video_file' ? 'file|mimes:mp4,webm,ogg,mov|max:51200' : 'file|mimes:jpg,jpeg,png,webp,gif,ico|max:5120']);
            $data[$field] = $this->storeFile($request->file($field), $resource);
        }
        return $data;
    }

    private function storeFile(UploadedFile $file, string $folder): string
    {
        $name = Str::uuid() . '.' . $file->extension();
        $directory = public_path('uploads/' . $folder);
        if (! is_dir($directory)) mkdir($directory, 0755, true);
        $file->move($directory, $name);
        return 'uploads/' . $folder . '/' . $name;
    }

    public function destroy(string $resource, int $id)
    {
        abort_unless(isset($this->resources[$resource]), 404);
        [$model] = $this->resources[$resource];
        $model::findOrFail($id)->delete();
        return back()->with('success', 'Record removed successfully.');
    }
}
