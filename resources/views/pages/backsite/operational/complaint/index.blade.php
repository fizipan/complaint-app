@extends('layouts.backsite')

{{-- set title --}}
@section('title', 'Complaint')

@section('content')

<!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            {{-- error --}}
            @if ($errors->any())
                <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- breadcumb --}}
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Complaint</h3>
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                 <li class="breadcrumb-item"><a href="{{ route('backsite.dashboard.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Complaint</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Filter --}}
            @can('complaint_filter', 'complaint_export')
                <div class="card border-bottom-info box-shadow-0">
                    <a data-action="collapse">
                        <div class="card-header">
                            <h4 class="card-title">Filter <small> search & export</small></h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </a>
                    <div class="card-content collapse hide">
                        <div class="card-body">
                            <form class="form" action="{{ route('backsite.filter.complaint') }}" method="GET">

                                <div class="form-body">
                                    <div class="row">

                                        {{-- process --}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="process">Process <code style="color:red;">required</code></label>
                                                <select name="process"
                                                        id="process"
                                                        class="form-control select2" required>
                                                        <option value="{{ '' }}" disabled selected >Choose</option>
                                                        @can('complaint_filter')
                                                            <option value="{{ 1 }}"  {{ request('process') == 1 ? 'selected' : '' }}>Search</option>
                                                        @endcan
                                                        @can('complaint_export')
                                                            <option value="{{ 2 }}"  {{ request('process') == 2 ? 'selected' : '' }}>Export</option>
                                                        @endcan
                                                </select>
                                            </div>
                                        </div>

                                        {{-- find something --}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="find">Find Something <code style="color:green;">optional</code></label>
                                                <input type="text" id="find" name="find" class="form-control" placeholder="Search title complaint" value="{{ request('find') ? request('find') : ''}}" autocomplete="off">

                                                @if($errors->has('find'))
                                                    <p style="font-style: bold; color: red;">{{ $errors->first('find') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- status --}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="status">Status <code style="color:green;">optional</code></label>
                                                <select name="status"
                                                        id="status"
                                                        class="form-control select2">
                                                        <option value="{{ '' }}" {{ request('status') == '' ? 'selected' : '' }}>All</option>
                                                        <option value="{{ 1 }}" {{ request('status') == 1 ? 'selected' : '' }}>Waiting Review</option>
                                                        <option value="{{ 2 }}" {{ request('status') == 2 ? 'selected' : '' }}>Approved</option>
                                                        <option value="{{ 3 }}" {{ request('status') == 3 ? 'selected' : '' }}>Rejected</option>
                                                </select>

                                                @if($errors->has('status'))
                                                    <p style="font-style: bold; color: red;">{{ $errors->first('status') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- category complaint --}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="category_complaint_id">Category <code style="color:green;">optional</code></label>
                                                <select name="category_complaint_id"
                                                        id="category_complaint_id"
                                                        class="form-control select2">
                                                        <option value="{{ '' }}" >All</option>
                                                        @forelse ($category_complaint as $id => $category_complaint_item)
                                                            <option value="{{ $category_complaint_item->id }}" {{ request('category_complaint_id') == $category_complaint_item->id ? 'selected' : '' }}>{{ $category_complaint_item->name }}</option>
                                                        @empty
                                                            {{-- not found --}}
                                                        @endforelse

                                                </select>

                                                @if($errors->has('category_complaint_id'))
                                                    <p style="font-style: bold; color: red;">{{ $errors->first('category_complaint_id') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- from --}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="from">From <code style="color:green;">optional</code></label>
                                                <input type="text" id="from" name="from" class="form-control" placeholder="example for start date" value="{{ request('from') ? request('from') : ''}}" autocomplete="off" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy HH:ss:ss" data-inputmask-placeholder="dd/mm/yyyy HH:mm:ss">

                                                @if($errors->has('from'))
                                                    <p style="font-style: bold; color: red;">{{ $errors->first('from') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        {{-- to --}}
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="to">To <code style="color:green;">optional</code></label>
                                                <input type="text" id="to" name="to" class="form-control" placeholder="example for end date" value="{{ request('to') ? request('to') : ''}}" autocomplete="off" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy HH:ss:ss" data-inputmask-placeholder="dd/mm/yyyy HH:mm:ss">

                                                @if($errors->has('to'))
                                                    <p style="font-style: bold; color: red;">{{ $errors->first('to') }}</p>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-actions">
                                        <a href="{{ route('backsite.complaint.index') }}" style="width:100px;" class="btn bg-blue-grey text-white mr-1" onclick="return confirm('Are you sure filter with this data ?')"> <i class="ft-x"></i> Reset </a>

                                        <button type="submit" style="width:100px;" class="btn btn-primary">
                                            <i class="la la-check-square-o"></i> Submit
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            @endcan


            {{-- table card --}}
            @can('complaint_table')
                <div class="content-body">
                    <section id="table-home">
                        <!-- Zero configuration table -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">Complaint List</h4>
                                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                                <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard">

                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered text-inputs-searching default-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Complainant</th>
                                                            <th>Title</th>
                                                            <th>Category</th>
                                                            <th>Incident Date</th>
                                                            <th>Status</th>
                                                            <th style="text-align:center; width:150px;">Action</th>
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
                                                                <td class="text-center">

                                                                    <div class="btn-group mr-1 mb-1">
                                                                        <button type="button"
                                                                            class="btn btn-info btn-sm dropdown-toggle"
                                                                            data-toggle="dropdown" aria-haspopup="true"
                                                                            aria-expanded="false">Action</button>
                                                                        <div class="dropdown-menu">

                                                                            @can('complaint_response_access')
                                                                                @if ($complaint_item->status == 1)
                                                                                    <a class="dropdown-item"
                                                                                        href="{{ route('backsite.complaint_response', $complaint_item->id) }}">
                                                                                        Response
                                                                                    </a>
                                                                                @endif
                                                                            @endcan

                                                                            @can('complaint_show')
                                                                                <a href="{{ route('backsite.complaint.show', $complaint_item->id) }}" class="dropdown-item">
                                                                                    Detail
                                                                                </a>
                                                                            @endcan

                                                                            @can('complaint_delete')
                                                                                <form
                                                                                    action="{{ route('backsite.complaint.destroy', $complaint_item->id) }}"
                                                                                    method="POST"
                                                                                    onsubmit="return confirm('Are you sure want to delete this data ?');">
                                                                                    <input type="hidden" name="_method"
                                                                                        value="DELETE">
                                                                                    <input type="hidden" name="_token"
                                                                                        value="{{ csrf_token() }}">
                                                                                    <input type="submit" class="dropdown-item"
                                                                                        value="Delete">
                                                                                </form>
                                                                            @endcan

                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            {{-- not found --}}
                                                        @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Complainant</th>
                                                            <th>Title</th>
                                                            <th>Category</th>
                                                            <th>Incident Date</th>
                                                            <th>Status</th>
                                                            <th style="text-align:center; width:150px;">Action</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                            <hr>

                                            <div class="table-responsive">
                                                <div class="text-center mb-3">
                                                    @if ($complaint->hasPages())
                                                        <h4 class="card-title">Pagination Page</h4>
                                                        <p class="mt-1"><code class="text-dark">Page {{ $complaint->currentPage() }}</code> & <code>All data {{ $complaint->total() }}</code></p>
                                                    @endif
                                                    <nav aria-label="Page navigation">
                                                        @if ($complaint->hasPages())
                                                            <ul class="pagination justify-content-center pagination-round">

                                                                {{-- Previous Page Link --}}
                                                                @if ($complaint->onFirstPage())
                                                                    <li class="page-item disabled">
                                                                        <a class="page-link" href="#" aria-label="Previous">
                                                                            <span aria-hidden="true"><i class="ft-chevron-left"></i></span>
                                                                            <span class="sr-only"><i class="ft-chevron-left"></i></span>
                                                                        </a>
                                                                    </li>
                                                                @else
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="{{ $complaint->previousPageUrl() }}" aria-label="Previous">
                                                                            <span aria-hidden="true"><i class="ft-chevron-left"></i></span>
                                                                            <span class="sr-only"><i class="ft-chevron-left"></i></span>
                                                                        </a>
                                                                    </li>
                                                                @endif

                                                                @if($complaint->currentPage() > 2)
                                                                    <li class="page-item"><a class="page-link" href="{{ $complaint->url(1) }}">1</a></li>
                                                                @endif

                                                                @if($complaint->currentPage() > 3)
                                                                    <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                                                                @endif

                                                                @foreach(range(1, $complaint->lastPage()) as $i)
                                                                    @if($i >= $complaint->currentPage() - 1 && $i <= $complaint->currentPage() + 1)
                                                                        @if ($i == $complaint->currentPage())
                                                                            <li class="page-item active"><span class="page-link">{{ $i }}</span></li>
                                                                        @else
                                                                            <li class="page-item"><a class="page-link" href="{{ $complaint->url($i) }}">{{ $i }}</a></li>
                                                                        @endif
                                                                    @endif
                                                                @endforeach

                                                                @if($complaint->currentPage() < $complaint->lastPage() - 3)
                                                                    <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                                                                @endif

                                                                @if($complaint->currentPage() < $complaint->lastPage() - 2)
                                                                    <li class="page-item"><a class="page-link" href="{{ $complaint->url($complaint->lastPage()) }}">{{ $complaint->lastPage() }}</a></li>
                                                                @endif

                                                                {{-- Next Page Link --}}
                                                                @if ($complaint->hasMorePages())
                                                                    <li class="page-item">
                                                                        <a class="page-link" href="{{ $complaint->nextPageUrl() }}" aria-label="Next">
                                                                            <span aria-hidden="true"><i class="ft-chevron-right"></i></span>
                                                                            <span class="sr-only"><i class="ft-chevron-right"></i></span>
                                                                        </a>
                                                                    </li>
                                                                @else
                                                                    <li class="page-item disabled">
                                                                        <a class="page-link" href="#" aria-label="Next">
                                                                            <span aria-hidden="true"><i class="ft-chevron-right"></i></span>
                                                                            <span class="sr-only"><i class="ft-chevron-right"></i></span>
                                                                        </a>
                                                                    </li>
                                                                @endif

                                                            </ul>
                                                        @endif
                                                    </nav>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            @endcan

        </div>
    </div>
<!-- END: Content-->

@endsection

@push('after-style')
    <link rel="stylesheet" href="{{ asset('/back-design/third-party/datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
@endpush

@push('after-script')

    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js') }}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <script src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js') }}" type="text/javascript"></script>

    <script src="{{ asset('/back-design/third-party/datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>

    <script>;
        $('.default-table').DataTable( {
            "order": [],
            "paging": true,
            "lengthMenu": [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"] ],
            "pageLength": 10
        });

        $(function () {
            $('#from').datetimepicker({
                format: 'DD/MM/YYYY HH:mm:ss'
            });

            $('#to').datetimepicker({
                format: 'DD/MM/YYYY HH:mm:ss'
            });
        });

    </script>

@endpush
