@extends('layouts.admin')

@section('title', 'Robotic Surgery')
@section('heading', 'Robotic Surgery Content')

@section('content')
<div class="page-toolbar">
    <div>
        <p class="muted">Manage Robotic Surgery page content including introduction, advantages, technology details, and comparisons.</p>
    </div>
</div>

<form method="post" enctype="multipart/form-data" action="{{ route('admin.robotic-surgery.save') }}">
    @csrf
    @method('PUT')

    <section class="panel settings-panel">
        <div class="panel-head">
            <div><p class="eyebrow">INTRODUCTION</p><h3>Main Content Section</h3></div>
        </div>
        <div class="settings-grid">
            <label class="full">
                <span>Introduction Content</span>
                <div class="editor-container">
                    <div id="robotic_intro_content_editor" style="height: 200px;">{!! $robotic['robotic_intro_content'] ?? '<p>Robotic Knee Surgery: A Revolution in Precision and Recovery</p>' !!}</div>
                    <input type="hidden" name="robotic_intro_content" id="robotic_intro_content" value="{{ $robotic['robotic_intro_content'] ?? '' }}">
                </div>
            </label>
        </div>
    </section>

    <section class="panel settings-panel">
        <div class="panel-head">
            <div><p class="eyebrow">ADVANTAGES</p><h3>Advantages Section</h3></div>
        </div>
        <div class="settings-grid">
            <label class="full">
                <span>Advantages Content (Use bullet list)</span>
                <div class="editor-container">
                    <div id="robotic_advantages_content_editor" style="height: 200px;">{!! $robotic['robotic_advantages_content'] ?? '<ul><li>Better accuracy and precision</li></ul>' !!}</div>
                    <input type="hidden" name="robotic_advantages_content" id="robotic_advantages_content" value="{{ $robotic['robotic_advantages_content'] ?? '' }}">
                </div>
            </label>
        </div>
    </section>

    <section class="panel settings-panel">
        <div class="panel-head">
            <div><p class="eyebrow">IMAGES</p><h3>Three Images Section</h3></div>
        </div>
        <div class="settings-grid">
            <label>
                <span>Image 1</span>
                <input type="file" name="robotic_image_1" accept="image/*">
                @if(isset($robotic['robotic_image_1']) && $robotic['robotic_image_1'] && is_file(public_path($robotic['robotic_image_1'])))
                    <img class="setting-preview" src="{{ asset($robotic['robotic_image_1']) }}" alt="Image 1" style="max-width: 200px; margin-top: 10px; border-radius: 8px;">
                @endif
            </label>
            <label>
                <span>Image 2</span>
                <input type="file" name="robotic_image_2" accept="image/*">
                @if(isset($robotic['robotic_image_2']) && $robotic['robotic_image_2'] && is_file(public_path($robotic['robotic_image_2'])))
                    <img class="setting-preview" src="{{ asset($robotic['robotic_image_2']) }}" alt="Image 2" style="max-width: 200px; margin-top: 10px; border-radius: 8px;">
                @endif
            </label>
            <label>
                <span>Image 3</span>
                <input type="file" name="robotic_image_3" accept="image/*">
                @if(isset($robotic['robotic_image_3']) && $robotic['robotic_image_3'] && is_file(public_path($robotic['robotic_image_3'])))
                    <img class="setting-preview" src="{{ asset($robotic['robotic_image_3']) }}" alt="Image 3" style="max-width: 200px; margin-top: 10px; border-radius: 8px;">
                @endif
            </label>
        </div>
    </section>

    <section class="panel settings-panel">
        <div class="panel-head">
            <div><p class="eyebrow">VELYS TECHNOLOGY</p><h3>VELYS Robotic System Section</h3></div>
        </div>
        <div class="settings-grid">
            <label>
                <span>VELYS Image</span>
                <input type="file" name="robotic_velys_image" accept="image/*">
                @if(isset($robotic['robotic_velys_image']) && $robotic['robotic_velys_image'] && is_file(public_path($robotic['robotic_velys_image'])))
                    <img class="setting-preview" src="{{ asset($robotic['robotic_velys_image']) }}" alt="VELYS" style="max-width: 300px; margin-top: 10px; border-radius: 8px;">
                @endif
            </label>
            <label class="full">
                <span>VELYS Content (Right side)</span>
                <div class="editor-container">
                    <div id="robotic_velys_content_editor" style="height: 200px;">{!! $robotic['robotic_velys_content'] ?? '<p>Designed for Digital Precision in Knee Replacement Surgery</p>' !!}</div>
                    <input type="hidden" name="robotic_velys_content" id="robotic_velys_content" value="{{ $robotic['robotic_velys_content'] ?? '' }}">
                </div>
            </label>
        </div>
    </section>

    <section class="panel settings-panel">
        <div class="panel-head">
            <div><p class="eyebrow">HOW IT WORKS</p><h3>How VELYS Works Section</h3></div>
        </div>
        <div class="settings-grid">
            <label>
                <span>How It Works Image (Left side)</span>
                <input type="file" name="robotic_how_it_works_image" accept="image/*">
                @if(isset($robotic['robotic_how_it_works_image']) && $robotic['robotic_how_it_works_image'] && is_file(public_path($robotic['robotic_how_it_works_image'])))
                    <img class="setting-preview" src="{{ asset($robotic['robotic_how_it_works_image']) }}" alt="How It Works" style="max-width: 300px; margin-top: 10px; border-radius: 8px;">
                @endif
            </label>
            <label class="full">
                <span>How It Works Content (Right side - Use bullet list)</span>
                <div class="editor-container">
                    <div id="robotic_how_it_works_content_editor" style="height: 200px;">{!! $robotic['robotic_how_it_works_content'] ?? '<p>How does the VELYS Robotic-Assisted Solution work?</p>' !!}</div>
                    <input type="hidden" name="robotic_how_it_works_content" id="robotic_how_it_works_content" value="{{ $robotic['robotic_how_it_works_content'] ?? '' }}">
                </div>
            </label>
        </div>
    </section>

    <section class="panel settings-panel">
        <div class="panel-head">
            <div><p class="eyebrow">BENEFITS & COMPARISON</p><h3>Two Text Boxes (Bottom Section)</h3></div>
        </div>
        <div class="settings-grid">
            <label class="full">
                <span>Benefits Content (Left Box)</span>
                <div class="editor-container">
                    <div id="robotic_benefits_content_editor" style="height: 200px;">{!! $robotic['robotic_benefits_content'] ?? '<p>What are the benefits of using the VELYS system?</p>' !!}</div>
                    <input type="hidden" name="robotic_benefits_content" id="robotic_benefits_content" value="{{ $robotic['robotic_benefits_content'] ?? '' }}">
                </div>
            </label>
            <label class="full">
                <span>Comparison Content (Right Box)</span>
                <div class="editor-container">
                    <div id="robotic_comparison_content_editor" style="height: 200px;">{!! $robotic['robotic_comparison_content'] ?? '<p>How does robotic-assisted knee replacement compare to a traditional knee replacement?</p>' !!}</div>
                    <input type="hidden" name="robotic_comparison_content" id="robotic_comparison_content" value="{{ $robotic['robotic_comparison_content'] ?? '' }}">
                </div>
            </label>
        </div>
    </section>

    <div class="form-actions"><button type="submit" class="button button-primary">Save Robotic Surgery Content</button></div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const quillInstances = {};
    
    const editors = [
        { id: 'robotic_intro_content', field: 'robotic_intro_content' },
        { id: 'robotic_advantages_content', field: 'robotic_advantages_content' },
        { id: 'robotic_velys_content', field: 'robotic_velys_content' },
        { id: 'robotic_how_it_works_content', field: 'robotic_how_it_works_content' },
        { id: 'robotic_benefits_content', field: 'robotic_benefits_content' },
        { id: 'robotic_comparison_content', field: 'robotic_comparison_content' }
    ];

    editors.forEach(function(editor) {
        const editorElement = document.getElementById(editor.id + '_editor');
        if (!editorElement) {
            console.error('Editor element not found:', editor.id + '_editor');
            return;
        }

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
        
        quillInstances[editor.field] = quill;
        
        quill.on('text-change', function() {
            const hiddenInput = document.getElementById(editor.field);
            if (hiddenInput) {
                hiddenInput.value = quill.root.innerHTML;
            }
        });
    });

    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            editors.forEach(function(editor) {
                const quill = quillInstances[editor.field];
                const hiddenInput = document.getElementById(editor.field);
                if (quill && hiddenInput) {
                    const content = quill.root.innerHTML;
                    hiddenInput.value = content;
                }
            });
            
            setTimeout(function() {
                form.submit();
            }, 100);
        });
    }
});
</script>
@endsection
