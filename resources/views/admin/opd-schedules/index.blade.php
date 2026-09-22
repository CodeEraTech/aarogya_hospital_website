@extends('layouts.admin')
@section('title', 'OPD schedules')
@section('heading', 'OPD schedules')
@section('content')
<div class="page-toolbar"><div><p class="muted">Manage doctor-wise OPD consultation times.</p></div><a class="button button-primary" href="{{ route('admin.opd-schedules.create') }}"><i class="fa fa-plus"></i> Add OPD schedule</a></div>
<section class="panel"><div class="table-wrap"><table><thead><tr><th>Doctor</th><th>Service</th><th>Days</th><th>Hours</th><th>Status</th><th>Actions</th></tr></thead><tbody>
@forelse($schedules as $schedule)<tr><td><strong>{{ $schedule->doctor->name }}</strong></td><td>{{ $schedule->doctor->speciality ?: '—' }}</td><td>{{ implode(', ', $schedule->days ?? []) }}</td><td>{{ Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }} – {{ Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}</td><td><span class="badge {{ $schedule->status === 'Active' ? '' : 'status-inactive' }}">{{ $schedule->status }}</span></td><td class="actions"><a class="action-icon edit-action" href="{{ route('admin.opd-schedules.edit', $schedule) }}" title="Edit schedule"><i class="fa fa-pencil"></i></a><form class="delete-form" data-delete-label="this OPD schedule" method="post" action="{{ route('admin.opd-schedules.destroy', $schedule) }}">@csrf @method('DELETE')<button class="action-icon delete-action" type="submit" title="Delete schedule"><i class="fa fa-trash"></i></button></form></td></tr>@empty<tr><td class="empty" colspan="6">No OPD schedules found.</td></tr>@endforelse
</tbody></table></div><div class="pagination">{{ $schedules->links() }}</div></section>
@endsection
