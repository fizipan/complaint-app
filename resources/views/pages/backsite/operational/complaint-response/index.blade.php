@extends('layouts.backsite')

{{-- set title --}}
@section('title', 'Complaint Response')

{{-- set content --}}
@section('content')
    <!-- BEGIN: Content-->
	<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="content-wrapper">

			{{-- breadcumb --}}
			<div class="content-header row">
				<div class="content-header-left col-md-7 col-12 mb-2 breadcrumb-new">
					<h3 class="content-header-title mb-0 d-inline-block">Complaint Response</h3>
					<div class="row breadcrumbs-top d-inline-block">
						<div class="breadcrumb-wrapper col-12">
							<ol class="breadcrumb">
								<li class="breadcrumb-item">
									<a href="{{ route('backsite.dashboard.index') }}">Dashboard</a>
                                </li>
								<li class="breadcrumb-item">
									<a href="{{ route('backsite.complaint.index') }}">Complaint</a>
                                </li>
								<li class="breadcrumb-item active">Response</li>
							</ol>
						</div>
					</div>
				</div>
			</div>

			{{-- table card --}}
            <div class="content-body">

                {{-- detail --}}
                <div class="card border-bottom-info box-shadow-0">
                    <a data-action="collapse">
                        <div class="card-header">
                            <h4 class="card-title" id="horz-layout-basic">Detail Complaint</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </a>
                    <div class="card-content collapse show">
                        <div class="card-body">

                            <div class="form-body">

                                <div class="row">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="users_id">Complainant</label>
                                            <input type="text" class="form-control" placeholder="users_id" value="{{ old('users_id', isset($complaint->users->name) ? $complaint->users->name : 'N/A') }}" autocomplete="off" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" class="form-control" placeholder="title" value="{{ old('title', isset($complaint->title) ? $complaint->title : 'N/A') }}" autocomplete="off" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="category_complaint_id">Category</label>
                                            <input type="text" class="form-control" placeholder="category_complaint_id" value="{{ old('category_complaint_id', isset($complaint->category_complaint->name) ? $complaint->category_complaint->name : 'N/A') }}" autocomplete="off" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="incident_date">Incident Date</label>
                                            <input type="text" class="form-control" placeholder="incident_date" value="{{ old('incident_date', isset($complaint->incident_date) ? $complaint->incident_date->format('d, F Y') : 'N/A') }}" autocomplete="off" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="province_id">Province</label>
                                            <input type="text" class="form-control" placeholder="province_id" value="{{ old('province_id', isset($complaint->provinces->name) ? $complaint->provinces->name : 'N/A') }}" autocomplete="off" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="regency_id">Regency</label>
                                            <input type="text" class="form-control" placeholder="regency_id" value="{{ old('regency_id', isset($complaint->regencies->name) ? $complaint->regencies->name : 'N/A') }}" autocomplete="off" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="district_id">District</label>
                                            <input type="text" class="form-control" placeholder="district_id" value="{{ old('district_id', isset($complaint->districts->name) ? $complaint->districts->name : 'N/A') }}" autocomplete="off" readonly>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            @isset($complaint->status)
                                                @if ($complaint->status == 1)
                                                    <input type="text" class="form-control" placeholder="status" value="Waiting Review" autocomplete="off" readonly>
                                                @elseif ($complaint->status == 2)
                                                    <input type="text" class="form-control" placeholder="status" value="Approved" autocomplete="off" readonly>
                                                @elseif ($complaint->status == 3)
                                                    <input type="text" class="form-control" placeholder="status" value="Rejected" autocomplete="off" readonly>
                                                @endif
                                            @else
                                                {{ 'N/A' }}
                                            @endisset
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="content">Content</label>
                                            <textarea style="resize: none;" class="form-control" rows="8" placeholder="Content" autocomplete="off" readonly>{{old('content', isset($complaint->content) ? $complaint->content : 'N/A')}}</textarea>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>


                <!-- Image grid -->
                <section id="image-gallery" class="card">
                    <div class="card-header">
                        <h4 class="card-title">Complaint Attachment</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body my-gallery">
                            <div class="row" id="gallery-card">

                                @isset($complaint->attachment_complaint)

                                    @forelse ($complaint->attachment_complaint as $attachment_complaint_item)
                                            <figure class="figure-gallery col-lg-3 col-md-6 col-12">
                                            <a data-fancybox data-src="{{ Storage::url($attachment_complaint_item->path) }}">
                                                <img class="img-thumbnail img-fluid" src="{{ Storage::url($attachment_complaint_item->path) }}" alt="{{ $attachment_complaint_item->complaint->title }}" />
                                            </a>
                                        </figure>
                                    @empty
                                        <div class="col-12 text-center">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <h4 class="card-title">No Attachment</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforelse

                                @endisset
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Image grid -->

                {{-- Form --}}
                @can('complaint_response_create')
                    <div class="card">
                        <a data-action="collapse">
                            <div class="card-header border-bottom-info">
                                <h4 class="card-title" id="horz-layout-basic">Response Complaint</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </a>
                        <div class="card-content collapse show">
                            <div class="card-body">

                                <form class="form form-horizontal" action="{{ route("backsite.complaint_response.store") }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <input type="hidden" name="complaint_id" value="{{ $complaint->id }}">

                                    <div class="form-body">
                                        <div class="form-section">
                                            <p>Please complete the input <code>required</code>, before you click the submit button.</p>
                                        </div>


                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="response">Response <code style="color:red;">required</code></label>
                                                    <textarea style="resize: none;" name="response" class="form-control" required rows="8" {{ isset($complaint->complaint_response->response) && $complaint->status == 2  ? 'disabled' : '' }} placeholder="Enter your response" autocomplete="off">{{old('response', isset($complaint->complaint_response->response) ? $complaint->complaint_response->response : '')}}</textarea>
                                                    
                                                    @error('response')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            {{-- set status input --}}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="status">Status <code style="color:red;">required</code></label>
                                                    <select name="status" id="status"class="form-control select2" {{ isset($complaint->status) && $complaint->status == 2  ? 'disabled' : '' }} required>
                                                        <option value="" disabled selected>Choose</option>
                                                        <option value="{{ 2 }}" {{ old('status', isset($complaint->status) ? $complaint->status : '') == 2 ? 'selected' : '' }}>Approved</option>
                                                        <option value="{{ 3 }}" {{ old('status', isset($complaint->status) ? $complaint->status : '') == 3 ? 'selected' : '' }}>Rejected</option>
                                                    </select>

                                                    @error('status')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    @if (!isset($complaint->complaint_response->response) && $complaint->status != 2)
                                        <div class="form-actions text-right">
                                            <a href="{{ route('backsite.complaint.index') }}" style="width:120px;" class="btn bg-blue-grey text-white mr-1" onclick="return confirm('Are you sure want to close this page? , Any changes you make will not be saved.')">
                                                <i class="ft-x"></i> Cancel
                                            </a>
                                            <button type="submit" style="width:120px;" class="btn btn-cyan" onclick="return confirm('Are you sure want to save this data ?')">
                                                <i class="la la-check-square-o"></i> Submit
                                            </button>
                                        </div>
                                    @endif

                                </form>
                            </div>
                        </div>
                    </div>
                @endcan

			</div>
		</div>
	</div>
	<!-- END: Content-->
@endsection

@push('after-style')
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css" />
@endpush

@push('after-script')
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
@endpush
