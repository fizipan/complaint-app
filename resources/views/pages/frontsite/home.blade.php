@extends('layouts.frontsite')

{{-- Content --}}
@section('content')
    <!-- Hero Section -->
    <div class="position-relative bg-primary overflow-hidden">
      <div class="container position-relative z-index-2 space-top-3 space-top-md-4 space-bottom-3 space-bottom-md-4">
        <div class="w-md-80 w-xl-60 text-center mx-md-auto">
          <div class="mb-7">
            <h1 class="display-4 text-white mb-4">Report Online</h1>
            <p class="lead text-white mb-4">Submit Your Report To Get Better Public Service From The Government</p>
          </div>
        </div>
      </div>

      <!-- SVG Shapes -->
      <figure class="position-absolute top-0 left-0 w-60">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1246 1078">
          <g opacity=".4">
            <linearGradient id="doubleEllipseTopLeftID1" gradientUnits="userSpaceOnUse" x1="2073.5078" y1="1.7251" x2="2273.4375" y2="1135.5818" gradientTransform="matrix(-1 0 0 1 2600 0)">
              <stop offset="0.4976" style="stop-color:#559bff"/>
              <stop offset="1" style="stop-color:#377DFF"/>
            </linearGradient>
            <polygon fill="url(#doubleEllipseTopLeftID1)" points="519.8,0.6 0,0.6 0,1078 863.4,1078   "/>
            <linearGradient id="doubleEllipseTopLeftID2" gradientUnits="userSpaceOnUse" x1="1717.1648" y1="3.779560e-05" x2="1717.1648" y2="644.0417" gradientTransform="matrix(-1 0 0 1 2600 0)">
              <stop offset="1.577052e-06" style="stop-color:#559bff"/>
              <stop offset="1" style="stop-color:#377DFF"/>
            </linearGradient>
            <polygon fill="url(#doubleEllipseTopLeftID2)" points="519.7,0 1039.4,0.6 1246,639.1 725.2,644   "/>
          </g>
        </svg>
      </figure>
      <figure class="position-absolute right-0 bottom-0 left-0 mb-n1">
        <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 1920 100.1">
          <path fill="#fff" d="M0,0c0,0,934.4,93.4,1920,0v100.1H0L0,0z"/>
        </svg>
      </figure>
      <!-- End SVG Shapes -->
    </div>
    <!-- End Hero Section -->

    <!-- Form Section-->
    <div class="" style="margin-top: -150px">
      
      <div class=" position-relative container space-1 space-top-md-0" style="z-index: 100">
        <div class="w-lg-80 mx-lg-auto">

            <!-- Form -->
            <form action="{{ route('complaint_report.store') }}" method="POST" class="card shadow-lg p-4 p-lg-7 js-validate" enctype="multipart/form-data">

              @csrf

              <!-- Error -->
              @if ($errors->any())
                  <div class="alert alert-soft-danger alert-dismissible fade show" style="margin-top: -20px; margin-bottom: 20px" role="alert">
                      <div style="font-weight: 600">{{ __('Whoops! Something went wrong.') }}</div>
                      <ul class="mt-3 mb-0">
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <svg aria-hidden="true" class="mb-0" width="14" height="14" viewBox="0 0 18 18" xmlns="http://www.w3.org/2000/svg">
                          <path fill="currentColor" d="M11.5,9.5l5-5c0.2-0.2,0.2-0.6-0.1-0.9l-1-1c-0.3-0.3-0.7-0.3-0.9-0.1l-5,5l-5-5C4.3,2.3,3.9,2.4,3.6,2.6l-1,1 C2.4,3.9,2.3,4.3,2.5,4.5l5,5l-5,5c-0.2,0.2-0.2,0.6,0.1,0.9l1,1c0.3,0.3,0.7,0.3,0.9,0.1l5-5l5,5c0.2,0.2,0.6,0.2,0.9-0.1l1-1 c0.3-0.3,0.3-0.7,0.1-0.9L11.5,9.5z"/>
                          </svg>
                      </button>
                  </div>
              @endif
              <!-- End Error -->

              <div class="js-form-message form-group mb-4">
                <label for="title" class="input-label">Report Title <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Please enter your report title." required>

                @error('title')
                    <span class="fs-5 mt-4 text-danger">{{ $message }}</sp>
                @enderror

              </div>

              <div class="js-form-message form-group mb-4">
                <label for="content" class="input-label">Report Content <span class="text-danger">*</span></label>
                <textarea class="form-control" rows="6" style="resize: none" name="content" id="content" minlength="10" placeholder="Please enter your report content." required>{{ old('content') }}</textarea>

                @error('content')
                    <span class="fs-5 mt-4 text-danger">{{ $message }}</sp>
                @enderror
              </div>

              <div class="js-form-message form-group mb-4">
                <label for="incident_date" class="input-label">Incident Date <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="incident_date" id="incident_date" placeholder="Select the incident date"  value="{{ old('incident_date') }}" autocomplete="off" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-inputmask-placeholder="dd/mm/yyyy" required>

                @error('incident_date')
                    <span class="fs-5 mt-4 text-danger">{{ $message }}</sp>
                @enderror
              </div>

              <div class="js-form-message form-group mb-4">
                <!-- Select -->
                <label for="province_id" class="input-label">Incident Province <span class="text-danger">*</span></label>
                <select class="js-custom-select custom-select" id="province_id" name="province_id" size="1" style="opacity: 0;"
                        data-hs-select2-options='{
                          "placeholder": "Select Province"
                        }' required>

                  <option label="empty"></option>
                  @foreach($province as $id => $province_item_name)
                    <option value="{{ $id }}" {{ old('province_id') == $id ? 'selected' : '' }}>{{ $province_item_name }}</option>
                  @endforeach

                </select>
                <!-- End Select -->

                @error('province_id')
                    <span class="fs-5 mt-4 text-danger">{{ $message }}</sp>
                @enderror
              </div>

              <div class="js-form-message form-group mb-4">
                <!-- Select -->
                <label for="regency_id" class="input-label">Incident Regency <span class="text-danger">*</span></label>
                <select class="js-custom-select custom-select" id="regency_id" name="regency_id" size="1" style="opacity: 0;"
                        data-hs-select2-options='{
                          "placeholder": "Select Regency"
                        }' required>
                  <option label="empty"></option>
                </select>
                <!-- End Select -->

                @error('regency_id')
                    <span class="fs-5 mt-4 text-danger">{{ $message }}</sp>
                @enderror
              </div>

              <div class="js-form-message form-group mb-4">
                <!-- Select -->
                <label for="district_id" class="input-label">Incident District <span class="text-danger">*</span></label>
                <select class="js-custom-select custom-select" id="district_id" name="district_id" size="1" style="opacity: 0;"
                        data-hs-select2-options='{
                          "placeholder": "Select District"
                        }' required>
                  <option label="empty"></option>
                </select>
                <!-- End Select -->

                @error('district_id')
                    <span class="fs-5 mt-4 text-danger">{{ $message }}</sp>
                @enderror
              </div>

              <div class="js-form-message form-group mb-4">
                <!-- Select -->
                <label for="category_complaint_id" class="input-label">Report Category <span class="text-danger">*</span></label>
                <select class="js-custom-select custom-select" id="category_complaint_id" name="category_complaint_id" size="1" style="opacity: 0;"
                        data-hs-select2-options='{
                          "placeholder": "Select Report Category"
                        }' required>

                  <option label="empty"></option>
                  @foreach($category_complaint as $id => $category_complaint_item_name)
                    <option value="{{ $id }}" {{ old('category_complaint_id') == $id ? 'selected' : '' }}>{{ $category_complaint_item_name }}</option>
                  @endforeach
                  
                </select>
                <!-- End Select -->

                @error('category_complaint_id')
                    <span class="fs-5 mt-4 text-danger">{{ $message }}</sp>
                @enderror
              </div>

              <div class="js-form-message form-group mb-4">
                <div class="collapse" id="collapseExample">

                  <hr>

                  <label class="input-label">File Attachment</label>
                  <div class="custom-file">
                      <input type="file" name="files[]" accept=".jpg,.jpeg,.png,.webp,.gif,.svg,.doc,.docx,.ppt,.pptx,.pdf,.txt,.xls,.xlsx,.flv,.wmv,.mp3,.ogg,.wav,.avi,.mov,.mp4,.mpeg,.webm,.mkv,.rar,.zip" multiple class="js-file-attach custom-file-input" id="file"
                              data-hs-file-attach-options='{
                                "textTarget": "[for=\"file\"]"
                            }'>
                      <label class="custom-file-label" for="file">Choose file</label>
                  </div>
                </div>
              </div>

              <hr>

              <div class="d-block d-md-flex justify-content-md-between">
                <button class="btn btn-link pl-0" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                  <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-paperclip" viewBox="0 0 16 16">
                    <path d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z"/>
                  </svg>
                  Upload Attachments <span class="text-muted font-weight-normal ml-1">(optional)</span>
                </button>
                
                @auth
                  <button type="submit" class="btn btn-primary w-100 w-lg-auto btn-wide transition-3d-hover">Submit</button>
                @else
                  <a href="{{ route('login') }}" class="btn btn-primary w-100 w-lg-auto btn-wide transition-3d-hover">Sign In To Report</a>
                @endauth
              </div>
            </form>
            <!-- End Form -->
        </div>
      </div>
    </div>
    <!-- End Form Section-->

    <!-- Step Section -->
    <div class="container space-3">
      <!-- Title -->
      <div class="w-md-80 w-lg-50 text-center mx-md-auto mb-5 mb-md-9">
        <span class="d-block small font-weight-bold text-cap mb-2">Report Process</span>
        <h2>Steps to get a better change</h2>
      </div>
      <!-- End Title -->

      <!-- Step -->
      <ul class="step step-md step-centered">
        <li class="step-item">
          <div class="step-content-wrapper">
            <span class="step-icon step-icon-soft-primary">1</span>
            <div class="step-content">
              <h3>Community report submission</h3>
              <p>Report input data will be processed in the program</p>
            </div>
          </div>
        </li>

        <li class="step-item">
          <div class="step-content-wrapper">
            <span class="step-icon step-icon-soft-primary">2</span>
            <div class="step-content">
              <h3>Data will be received</h3>
              <p>The data will be given to the government for research</p>
            </div>
          </div>
        </li>

        <li class="step-item">
          <div class="step-content-wrapper">
            <span class="step-icon step-icon-soft-primary">3</span>
            <div class="step-content">
              <h3>Report will be executed</h3>
              <p>The government will take action according to the report received</p>
            </div>
          </div>
        </li>
      </ul>
      <!-- End Step -->
    </div>
    <!-- End Step Section -->

    <!-- CTA Section -->
    <div class="bg-primary my-5">
      <div class="container space-2">
        <div class="w-lg-80 mx-lg-auto">
          <div class="row">
            <div class="col-sm-4 mb-3 mb-sm-0">
              <div class="text-center">
                <span class="d-block font-size-5 font-size-md-down-3 text-white font-weight-bold">4M+</span>
                <p class="text-white-70">Report received</p>
              </div>
            </div>

            <div class="col-sm-4 mb-3 mb-sm-0">
              <div class="text-center">
                <span class="d-block font-size-5 font-size-md-down-3 text-white font-weight-bold">3.5M+</span>
                <p class="text-white-70">Report has been researched</p>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="text-center">
                <span class="d-block font-size-5 font-size-md-down-3 text-white font-weight-bold">2M+</span>
                <p class="text-white-70">Report has been completed</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- End CTA Section -->
@endsection

@push('after-script')
    <script>
        // auto populate dropdown - regencies
        $(document).ready(function(){
            // provinces Change
            $('#province_id').change(function(){
                // provinces id
                var id = $(this).val();

                // Empty the dropdown
                $('#regency_id').find('option').not(':first').remove();

                // AJAX request
                $.ajax({
                    url: '{{ URL::to("/select/regency/report") }}'+'/'+id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        var len = 0;

                        if(response['data'] != null)
                        {
                            len = response['data'].length;
                        }

                        if(len > 0){
                            // Read data and create <option >
                            for(var i=0; i<len; i++)
                            {
                                var id = response['data'][i].id;
                                var name = response['data'][i].name;
                                var option = "<option value='"+id+"'>"+name+"</option>";

                                $("#regency_id").append(option);
                            }
                        }
                    }
                });
            });
        });

        // auto populate dropdown - districts
        $(document).ready(function(){
            // regencies Change
            $('#regency_id').change(function(){
                // regencies id
                var id = $(this).val();

                // Empty the dropdown
                $('#district_id').find('option').not(':first').remove();

                // AJAX request
                $.ajax({
                    url: '{{ URL::to("/select/district/report") }}'+'/'+id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        var len = 0;

                        if(response['data'] != null)
                        {
                            len = response['data'].length;
                        }

                        if(len > 0){
                            // Read data and create <option >
                            for(var i=0; i<len; i++)
                            {
                                var id = response['data'][i].id;
                                var name = response['data'][i].name;
                                var option = "<option value='"+id+"'>"+name+"</option>";

                                $("#district_id").append(option);
                            }
                        }
                    }
                });
            });
        });
    </script>
@endpush
