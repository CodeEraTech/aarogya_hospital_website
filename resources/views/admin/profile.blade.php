@extends('layouts.admin')
@section('title','Profile')
@section('heading','My profile')
@section('content')
<div class="form-page"><p class="muted profile-intro">Update the details used for your administrator account.</p><section class="panel form-panel"><form method="post" action="{{ route('admin.profile.update') }}">@csrf @method('PUT')<div class="form-grid"><label><span>Full name <b class="required">*</b></span><input name="name" value="{{ old('name',$user->name) }}" required></label><label><span>Email address <b class="required">*</b></span><input type="email" name="email" value="{{ old('email',$user->email) }}" required></label><label><span>New password</span><input type="password" name="password" minlength="8" placeholder="Leave blank to keep current password"></label><label><span>Confirm new password</span><input type="password" name="password_confirmation" minlength="8"></label></div><div class="form-actions"><button class="button button-primary">Save profile</button></div></form></section></div>
@endsection
