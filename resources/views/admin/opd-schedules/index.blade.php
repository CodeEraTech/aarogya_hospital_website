@extends('layouts.admin')
@section('title', 'OPD Schedules')
@section('heading', 'OPD Schedules')
@section('content')
<div class="page-toolbar"><p class="muted">Manage doctor-wise consultation days and hours shown on the website.</p><a class="button button-primary" href="{{ route('admin.opd-schedules.create') }}"><i class="fa fa-plus"></i> Add OPD schedule</a></div>
<section class="panel"><div class="table-wrap"><table><thead><tr><th>Doctor</th><th>Speciality</th><th>Days</th><th>Hours</th><th>Status</th><th>Actions</th></tr></thead><tbody>
@forelse($schedules as $schedule)<tr><td><strong>{{ $schedule->doctor->name }}</strong></td><td>{{ $schedule->doctor->speciality?->name ?: '—' }}</td><td>{{ implode(', ', $schedule->days ?? []) }}</td><td>{{ CarbonCarbon::parse($schedule->start_time)->format('h:i A') }} – {{ CarbonCarbon::parse($schedule->end_time)->format('h:i A') }}</td><td><span class="badge {{ $schedule->status === 'Active' ? '' : 'status-inactive' }}">{{ $schedule->status }}</span></td><td class="actions"><a class="action-icon edit-action" href="{{ route('admin.opd-schedules.edit', $schedule) }}" title="Edit schedule"><i class="fa fa-pencil"></i></a><form class="delete-form" data-delete-label="this OPD schedule" method="post" action="{{ route('admin.opd-schedules.destroy', $schedule) }}">@csrf @method('DELETE')<button class="action-icon delete-action" type="submit" title="Delete schedule"><i class="fa fa-trash"></i></button></form></td></tr>@empty<tr><td class="empty" colspan="6">No OPD schedules found.</td></tr>@endforelse
</tbody></table></div><div class="pagination">{{ $schedules->links() }}</div></section>
@endsection
