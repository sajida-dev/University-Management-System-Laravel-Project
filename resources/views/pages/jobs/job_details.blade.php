 @extends('layouts.app')
 @section('page-name', 'Job Detail')
 @section('admin-main')


     <div class="row">
         <div class="col-xl-12">
             <div id="panel-12" class="card">
                 <div class="card-header">
                     <h2 class="card-title">
                         Job Detail
                     </h2>

                 </div>
                 <div class="card-body show">
                     <div class="panel-content">
                         <!-- Job Detail Start -->
                         <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
                             <div class="container">
                                 <div class="row gy-5 gx-4">
                                     <div class="col-lg-8">
                                         <div class="d-flex align-items-center mb-5">

                                             <div class="text-start">
                                                 <h1 class="display-6 mb-3"><strong>{{ $job->title }}</strong></h1>
                                                 {{-- <span class="text-truncate me-3">
                                                     <i class="fa fa-map-marker-alt text-primary me-2"></i>New
                                                     York, USA</span> --}}
                                                 <span class="text-truncate me-3">
                                                     <i class="far fa-clock text-primary me-2"></i>Full Time</span>
                                                 <span class="text-truncate me-0">
                                                     <i class="far fa-money-bill-alt text-primary me-2"></i>
                                                     {{ $job->salaryFrom . ' - ' . $job->salaryTo }}</span>
                                             </div>
                                         </div>

                                         <div class="mb-5">
                                             <h4 class="mb-3 mt-3"><strong>Job description</strong></h4>
                                             <p>
                                                 {{ $job->description }}
                                             </p>
                                         </div>

                                         <div class="">
                                             <h4 class="mb-4">Apply For The Job</h4>
                                             <form action="{{ route('jobs.apply.store') }}" method="POST">@csrf
                                                 <input type="hidden" name="job_id" value="{{ $job->id }}">
                                                 <div class="row g-3">
                                                     <div class="col-12">
                                                         @if (in_array($job->id, $jobApplications))
                                                             {{-- <a class="btn btn-primary disabled" href="javascript:void(0);"
                                                                 aria-disabled="true">Applied</a> --}}
                                                             <button class="btn btn-primary disabled w-100" disabled
                                                                 type="submit">
                                                                 Applied</button>
                                                         @else
                                                             <button class="btn btn-primary w-100" type="submit">Apply
                                                                 Now</button>
                                                         @endif

                                                     </div>
                                                 </div>
                                             </form>
                                         </div>
                                     </div>
                                     <div class="col-lg-4">
                                         <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                                             <h4 class="mb-4">Job Summery</h4>
                                             <p><i class="fa fa-angle-right text-primary me-2"></i>Published On:
                                                 {{ $job->from }}</p>
                                             <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy:
                                                 {{ $job->vacancies }}</p>
                                             <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: Full Time</p>
                                             <p><i class="fa fa-angle-right text-primary me-2"></i>Salary:
                                                 {{ $job->salaryFrom . ' - ' . $job->salaryTo }}</p>

                                             <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line:
                                                 {{ $job->to }}</p>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <!-- Job Detail End -->
                     </div>
                 </div>
             </div>
         </div>
     </div>


 @endsection
