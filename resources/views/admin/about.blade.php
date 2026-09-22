@extends('layouts.admin')

@section('title', 'About Us')
@section('heading', 'About Us Content')

@section('content')
<div class="page-toolbar">
    <div>
        <p class="muted">Manage About Us page content including company info, chairman message, why choose us, and core values.</p>
    </div>
</div>

<form method="post" enctype="multipart/form-data" action="{{ route('admin.about.save') }}">
    @csrf
    @method('PUT')

    <section class="panel settings-panel">
        <div class="panel-head">
            <div><p class="eyebrow">COMPANY</p><h3>About Us Section</h3></div>
        </div>
        <div class="settings-grid">
            <label>
                <span>About Image</span>
                <input type="file" name="about_image" accept="image/*">
                @if(isset($about['about_image']) && $about['about_image'] && is_file(public_path($about['about_image'])))
                    <img class="setting-preview" src="{{ asset($about['about_image']) }}" alt="About" style="max-width: 300px; margin-top: 10px; border-radius: 8px;">
                @endif
            </label>
            <label class="full">
                <span>About Content</span>
                <div class="editor-container">
                    <div id="about_content_editor" style="height: 250px;">{!! $about['about_content'] ?? '<p>Aarogya Hospital brings advanced orthopaedic, robotic joint replacement, obstetrics-gynaecology and infertility care to Hisar.</p>' !!}</div>
                    <input type="hidden" name="about_content" id="about_content">
                </div>
            </label>
        </div>
    </section>

    <section class="panel settings-panel">
        <div class="panel-head">
            <div><p class="eyebrow">LEADERSHIP</p><h3>Chairman Message</h3></div>
        </div>
        <div class="settings-grid">
            <label>
                <span>Chairman Image</span>
                <input type="file" name="chairman_image" accept="image/*">
                @if(isset($about['chairman_image']) && $about['chairman_image'] && is_file(public_path($about['chairman_image'])))
                    <img class="setting-preview" src="{{ asset($about['chairman_image']) }}" alt="Chairman" style="max-width: 300px; margin-top: 10px; border-radius: 8px;">
                @endif
            </label>
            <label class="full">
                <span>Chairman Message</span>
                <div class="editor-container">
                    <div id="chairman_message_editor" style="height: 250px;">{!! $about['chairman_message'] ?? '<p>Welcome to Aarogya Hospital...</p>' !!}</div>
                    <input type="hidden" name="chairman_message" id="chairman_message">
                </div>
            </label>
        </div>
    </section>

    <section class="panel settings-panel">
        <div class="panel-head">
            <div><p class="eyebrow">FEATURES</p><h3>Why Choose Us (6 Boxes)</h3></div>
        </div>
        <div class="settings-grid">
            @for($i = 1; $i <= 6; $i++)
            <label>
                <span>Box {{ $i }} - Title</span>
                <input type="text" name="why_choose_{{ $i }}_title" value="{{ $about['why_choose_' . $i . '_title'] ?? '' }}" placeholder="e.g., Expert Doctors">
            </label>
            <label>
                <span>Box {{ $i }} - Content</span>
                <textarea name="why_choose_{{ $i }}_content" rows="3" placeholder="Enter description">{{ $about['why_choose_' . $i . '_content'] ?? '' }}</textarea>
            </label>
            @endfor
        </div>
    </section>

    <section class="panel settings-panel">
        <div class="panel-head">
            <div><p class="eyebrow">CORE VALUES</p><h3>Mission, Vision & Quality Policy</h3></div>
        </div>
        <div class="settings-grid">
            <label class="full">
                <span>Our Mission</span>
                <div class="editor-container">
                    <div id="our_mission_editor" style="height: 150px;">{!! $about['our_mission'] ?? '<p>Our mission statement...</p>' !!}</div>
                    <input type="hidden" name="our_mission" id="our_mission">
                </div>
            </label>
            <label class="full">
                <span>Our Vision</span>
                <div class="editor-container">
                    <div id="our_vision_editor" style="height: 150px;">{!! $about['our_vision'] ?? '<p>Our vision statement...</p>' !!}</div>
                    <input type="hidden" name="our_vision" id="our_vision">
                </div>
            </label>
            <label class="full">
                <span>Quality Policy</span>
                <div class="editor-container">
                    <div id="quality_policy_editor" style="height: 150px;">{!! $about['quality_policy'] ?? '<p>Our quality policy...</p>' !!}</div>
                    <input type="hidden" name="quality_policy" id="quality_policy">
                </div>
            </label>
        </div>
    </section>

    <section class="panel settings-panel">
        <div class="panel-head">
            <div><p class="eyebrow">ACCREDITATIONS</p><h3>Certificates & Awards</h3></div>
        </div>
        <div class="settings-grid">
            <label class="full">
                <span>Upload Certificate Images (multiple)</span>
                <input type="file" name="certificates[]" accept="image/*" multiple>
                <small style="color: var(--muted); font-size: 11px; display: block; margin-top: 8px;">You can select multiple images at once</small>
            </label>
            @if(isset($about['certificates']) && $about['certificates'])
                @php($certificates = json_decode($about['certificates'], true))
                @if(is_array($certificates) && count($certificates) > 0)
                <div class="full" style="margin-top: 20px;">
                    <span style="font-weight: 700; font-size: 12px; display: block; margin-bottom: 12px;">Current Certificates:</span>
                    <div class="certificates-grid">
                        @foreach($certificates as $index => $cert)
                        @if(is_file(public_path($cert)))
                        <div class="certificate-item">
                            <img src="{{ asset($cert) }}" alt="Certificate {{ $index + 1 }}">
                            <label class="delete-certificate">
                                <input type="checkbox" name="delete_certificates[]" value="{{ $cert }}">
                                <span>Delete</span>
                            </label>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @endif
            @endif
        </div>
    </section>

    <div class="form-actions"><button class="button button-primary">Save About Us Content</button></div>
</form>

<style>
.certificates-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
.certificate-item { position: relative; border: 1px solid var(--line); border-radius: 8px; padding: 10px; background: white; }
.certificate-item img { width: 100%; height: 140px; object-fit: contain; border-radius: 4px; }
.delete-certificate { display: flex; align-items: center; gap: 6px; margin-top: 8px; font-size: 11px; cursor: pointer; }
.delete-certificate input[type="checkbox"] { width: 14px; height: 14px; cursor: pointer; }
@media (max-width: 900px) { .certificates-grid { grid-template-columns: repeat(3, 1fr); } }
@media (max-width: 600px) { .certificates-grid { grid-template-columns: repeat(2, 1fr); } }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const quillInstances = {};
    
    const editors = [
        { id: 'about_content', field: 'about_content' },
        { id: 'chairman_message', field: 'chairman_message' },
        { id: 'our_mission', field: 'our_mission' },
        { id: 'our_vision', field: 'our_vision' },
        { id: 'quality_policy', field: 'quality_policy' }
    ];

    editors.forEach(function(editor) {
        const quill = new Quill('#' + editor.id + '_editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    ['bold', 'italic', 'underline'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    ['link'],
                    ['clean']
                ]
            }
        });
        
        // Store quill instance for later use
        quillInstances[editor.field] = quill;
    });

    // Update hidden fields before form submission
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        editors.forEach(function(editor) {
            const quill = quillInstances[editor.field];
            const hiddenInput = document.getElementById(editor.field);
            if (quill && hiddenInput) {
                hiddenInput.value = quill.root.innerHTML;
            }
        });
    });
});
</script>
@endsection
