<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Admin') | Aarogya Hospital</title>
    <link rel="stylesheet" href="{{ asset('assets/hospital/css/admin.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css">
</head>
<body>
<div class="admin-shell">
    <aside class="sidebar" id="sidebar">
        <button type="button" class="sidebar-close" onclick="document.getElementById('sidebar').classList.remove('open')" aria-label="Close menu">×</button>
        <div class="admin-brand"><img class="admin-logo" src="{{ asset($siteSettings['website_logo'] ?? 'assets/hospital/images/aarogya-logo.png') }}" alt="Aarogya Hospital"></div>
        <nav class="side-nav">
            <span class="nav-label">Workspace</span>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <span class="nav-label">Inbox</span>
            <a href="{{ route('admin.resource.index','appointments') }}">Appointments</a>
            <a href="{{ route('admin.opd-schedules.index') }}">OPD schedules</a>
            <a href="{{ route('admin.resource.index','feedback') }}">Feedback</a>
            <span class="nav-label">Empanelled Corporate</span>
            @foreach(config('empanelled') as $key => $empanelled)
                <a class="nav-subitem" href="{{ route('admin.empanelled.edit', $key) }}">{{ $empanelled['name'] }}</a>
            @endforeach
            <span class="nav-label">Website</span>
            <a href="{{ route('admin.resource.index','pages') }}">Pages</a>
            <a href="{{ route('admin.resource.index','doctors') }}">Doctors</a>
            <a href="{{ route('admin.resource.index','specialities') }}">Specialities</a>
            <a href="{{ route('admin.resource.index','blogs') }}">Blog posts</a>
            <a href="{{ route('admin.resource.index','slides') }}">Slides</a>
            <a href="{{ route('admin.resource.index','testimonials') }}">Testimonials</a>
            <a href="{{ route('admin.resource.index','gallery') }}">Gallery</a>
            <a href="{{ route('admin.settings') }}">Settings</a>
        </nav>
        <div class="sidebar-footer"><a href="{{ route('home') }}" target="_blank">View website</a></div>
    </aside>
    <div class="admin-main">
        <header class="admin-header">
            <button class="mobile-toggle" onclick="document.getElementById('sidebar').classList.toggle('open')" aria-label="Open menu">☰</button>
            <div><span class="eyebrow">CONTENT MANAGEMENT</span><h2>@yield('heading', 'Dashboard')</h2></div>
            <div class="admin-user">
                <a class="profile-link" href="{{ route('admin.profile') }}"><span class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</span><span>{{ auth()->user()->name }}</span></a>
                <form method="post" action="{{ route('admin.logout') }}">@csrf<button class="logout-icon" title="Sign out" aria-label="Sign out"><i class="fa fa-sign-out"></i></button></form>
            </div>
        </header>
        <main class="admin-content">@yield('content')</main>
    </div>
</div>
<div id="admin-flash" hidden data-success="{{ session('success') }}" data-error="{{ $errors->first() }}"></div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js"></script>
<script>
document.querySelectorAll('.side-nav a').forEach(function(link){if((link.pathname!=='/admin'&&location.pathname.indexOf(link.pathname+'/')===0)||link.pathname===location.pathname)link.classList.add('active')});
var flash=document.getElementById('admin-flash');
var AdminToast=Swal.mixin({toast:true,position:'top-end',showConfirmButton:false,timer:5000,timerProgressBar:true,customClass:{container:'admin-swal-container'}});
if(flash&&flash.dataset.success)AdminToast.fire({icon:'success',title:flash.dataset.success});
if(flash&&flash.dataset.error)AdminToast.fire({icon:'error',title:'Please check the form',text:flash.dataset.error});
document.querySelectorAll('.delete-form').forEach(function(form){form.addEventListener('submit',function(event){event.preventDefault();Swal.fire({title:'Are you sure you want to delete '+(form.dataset.deleteLabel||'this record')+'?',text:'This action cannot be undone.',icon:'warning',showCancelButton:true,confirmButtonColor:'#b83d49',cancelButtonColor:'#718096',confirmButtonText:'Yes, delete it',cancelButtonText:'Cancel'}).then(function(result){if(result.isConfirmed)form.submit()})})});
document.querySelectorAll('form[action*="/logout"]').forEach(function(form){form.addEventListener('submit',function(event){event.preventDefault();Swal.fire({title:'Sign out?',text:'You will need to sign in again.',icon:'question',showCancelButton:true,confirmButtonColor:'#168a86',confirmButtonText:'Sign out',cancelButtonText:'Cancel'}).then(function(result){if(result.isConfirmed)form.submit()})})});
document.querySelectorAll('textarea.rich-text-source').forEach(function(area){var box=document.createElement('div');area.after(box);area.hidden=true;var q=new Quill(box,{theme:'snow',modules:{toolbar:[[{'header':[1,2,3,false]}],['bold','italic','underline','strike'],[{'list':'ordered'},{'list':'bullet'}],['blockquote','code-block'],['link','image'],['clean']]}});q.root.innerHTML=area.value;area.form.addEventListener('submit',function(){area.value=q.root.innerHTML})});
</script>
@stack('scripts')
</body>
</html>
