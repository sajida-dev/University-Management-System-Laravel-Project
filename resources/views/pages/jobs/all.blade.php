 @extends('layouts.app')
 @section('page-name', 'All Jobs')
 @section('admin-main')


     <div class="row">
         <div class="col-xl-12">
             <div id="panel-12" class="card">
                 <div class="card-header">
                     <h2 class="card-title">
                         All Jobs
                     </h2>
                 </div>
                 <div class="card-body show">
                     <div class="panel-content">
                         <!-- Jobs Start -->
                         <div class="container-xxl py-5">
                             <div class="container">
                                 <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                                     <div class="tab-content">
                                         <div id="tab-1" class="tab-pane fade show p-0 active">
                                             <div class="job-item p-4 mb-2">
                                                 @foreach ($jobs as $j)
                                                     <div class="row g-4 mb-5">
                                                         <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                                             {{-- <img class="flex-shrink-0 img-fluid border rounded"
                                                             src="img/com-logo-1.jpg" alt=""
                                                             style="width: 80px; height: 80px;"> --}}
                                                             <div class="text-start">
                                                                 <h5 class="mb-3"><strong>{{ $j->title }}</strong>
                                                                 </h5>
                                                                 <span class="text-truncate me-3"><i
                                                                         class="fa fa-users-cog text-primary me-2"></i>{{ $j->department->name }}</span>
                                                                 <span class="text-truncate me-3"><i
                                                                         class="far fa-clock text-primary me-2"></i>Full
                                                                     Time</span>
                                                                 <span class="text-truncate me-0"><i
                                                                         class="far fa-money-bill-alt text-primary me-2"></i>{{ $j->salaryFrom . ' - ' . $j->salaryTo }}</span>
                                                             </div>
                                                         </div>
                                                         <div
                                                             class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                                             <div class="d-flex mb-3">
                                                                 {{-- <a class="btn btn-light btn-square me-3" href=""><i aria-disabled="true"
                                                                     class="far fa-heart text-primary"></i></a> --}}
                                                                 @if (in_array($j->id, $jobApplications))
                                                                     <a class="btn btn-primary"
                                                                         href="{{ route('jobs.apply.create', $j->id) }}">Applied</a>
                                                                 @else
                                                                     <a class="btn btn-primary"
                                                                         href="{{ route('jobs.apply.create', $j->id) }}">Apply
                                                                         Now</a>
                                                                 @endif
                                                             </div>
                                                             <small class="text-truncate"><i
                                                                     class="far fa-calendar-alt text-primary me-2"></i>Date
                                                                 Line: {{ $j->to }}</small>
                                                         </div>
                                                     </div>
                                                 @endforeach

                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <!-- Jobs End -->

                     </div>
                 </div>
             </div>
         </div>
     </div>


 @endsection
