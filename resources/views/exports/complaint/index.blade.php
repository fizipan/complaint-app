<br>
<br>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th style="font-weight: bold">Date</th>
            <th style="font-weight: bold">Complainant</th>
            <th style="font-weight: bold">Title</th>
            <th style="font-weight: bold">Category</th>
            <th style="font-weight: bold">Incident Date</th>
            <th style="font-weight: bold">Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse($complaint as $key => $complaint_item)
            <tr data-entry-id="{{ $complaint_item->id }}">
                <td>{{ isset($complaint_item->created_at) ? date("d/m/Y H:i:s",strtotime($complaint_item->created_at)) : '' }}</td>
                <td>{{ $complaint_item->users->name ?? '' }}</td>
                <td>{{ $complaint_item->title ?? '' }}</td>
                <td>{{ $complaint_item->category_complaint->name ?? '' }}</td>
                <td>{{ isset($complaint_item->incident_date) ?  $complaint_item->incident_date->format('d, F Y') : '' }}</td>
                <td>
                    @isset($complaint_item->status)
                        @if($complaint_item->status == 1)
                            <span class="badge badge-warning">Waiting Review</span>
                        @elseif($complaint_item->status == 2)
                            <span class="badge badge-success">Approved</span>
                        @elseif($complaint_item->status == 3)
                            <span class="badge badge-danger">Rejected</span>
                        @endif
                    @endisset
                </td>
            </tr>
        @empty
            {{-- not found --}}
        @endforelse
    </tbody>
</table>