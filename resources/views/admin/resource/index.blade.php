@extends('layouts.admin')

@section('title', $label)
@section('heading', $label)

@section('content')
<div class="page-toolbar">
    <div><p class="muted">Manage {{ strtolower($label) }} shown across the website.</p></div>
    @if($fields && $resource !== 'feedback')<a class="button button-primary" href="{{ route('admin.resource.create', $resource) }}"><i class="fa fa-plus"></i> Add {{ rtrim($label, 's') }}</a>@endif
</div>
<section class="panel">
    <form class="filter-bar">
        <input name="search" value="{{ request('search') }}" placeholder="Search {{ strtolower($label) }}..." aria-label="Search">
        <button class="button button-secondary"><i class="fa fa-search"></i> Search</button>
        @if(request('search'))<a href="{{ route('admin.resource.index', $resource) }}">Clear</a>@endif
    </form>
    <div class="table-wrap">
        <table>
            <thead><tr>@foreach(($fields ?: ['id']) as $field)<th>{{ ucwords(str_replace('_', ' ', $field)) }}</th>@endforeach<th>Actions</th></tr></thead>
            <tbody>
            @forelse($items as $item)
                <tr>
                    @foreach(($fields ?: ['id']) as $field)
                        <td>
                            @if(in_array($field, ['content', 'bio', 'description', 'message', 'quote']))
                                <span class="truncate">{{ strip_tags($item->$field) }}</span>
                            @elseif(in_array($field, ['image', 'thumbnail']))
                                @if($item->$field)<img class="file-preview" src="{{ asset($item->$field) }}" alt="Uploaded image">@else—@endif
                            @else
                                {{ $item->$field ?: '—' }}
                            @endif
                        </td>
                    @endforeach
                    <td class="actions">
                        <a class="action-icon edit-action" href="{{ route('admin.resource.edit', [$resource, $item->id]) }}" title="{{ $resource === 'feedback' ? 'Change status' : 'Edit record' }}" aria-label="{{ $resource === 'feedback' ? 'Change status' : 'Edit record' }}"><i class="fa fa-pencil"></i></a>
                        @if($resource !== 'feedback')<form class="delete-form" data-delete-label="{{ $item->title ?? $item->name ?? $item->patient_name ?? 'this record' }}" method="post" action="{{ route('admin.resource.destroy', [$resource, $item->id]) }}">@csrf @method('DELETE')<button class="action-icon delete-action" type="submit" title="Delete record" aria-label="Delete record"><i class="fa fa-trash"></i></button></form>@endif
                    </td>
                </tr>
            @empty
                <tr><td class="empty" colspan="{{ count($fields ?: ['id']) + 1 }}">No records found.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
    <div class="pagination">{{ $items->links() }}</div>
</section>
@endsection
