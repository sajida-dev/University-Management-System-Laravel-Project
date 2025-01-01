@php
    $personalInfo = \App\Models\PersonalInfo::ForUser()->first();
    $isPersonalInfoFilled = $personalInfo && !is_null($personalInfo->user_id);
    $addressDetail = \App\Models\AddressDetail::ForUser()->first();
    $isaddressDetailFilled = $addressDetail && !is_null($addressDetail->user_id);
    $disabilityDetail = \App\Models\DisabilityDetail::ForUser()->first();
    $isdisabilityDetailFilled = $disabilityDetail && !is_null($disabilityDetail->user_id);
    $otherDetail = \App\Models\OtherDetail::ForUser()->first();
    $isotherDetailFilled = $otherDetail && !is_null($otherDetail->user_id);
    $isApplications = \App\Models\Application::ForUser()->exists();
    $isJobApplications = \App\Models\JobApplication::ForUser()->exists();
    // Fetch all academic qualifications for the authenticated user
    $academicQualifications = \App\Models\AcademicQualification::ForUser()->get();
    // Assume you want to check that certain fields in each qualification are not null
    $isAcademicQualifications =
        $academicQualifications->count() == 2 &&
        $academicQualifications->every(function ($qualification) {
            return !is_null($qualification->degree_level);
        });
@endphp

<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="#" class="logo">
                <img src="{{ asset('assets/img/kaiadmin/logo-light.png') }}" alt="navbar brand" class="navbar-brand"
                    height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <x-responsive-nav-link :href="route('dashboard')" class="collapsed" aria-expanded="false" :active="request()->routeIs('dashboard')">
                        <i class="fas fa-home"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </x-responsive-nav-link>
                </li>
                {{-- Admin role --}}
                @if (auth()->user()->role_id == 1)
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Components</h4>
                    </li>

                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#department">
                            <i class="fas fa-building"></i>
                            <p>Departments</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="department">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('departments.index') }}">
                                        <span class="sub-item">All Departments</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('departments.create') }}">
                                        <span class="sub-item">Add new Departments</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('departments.allocate') }}">
                                        <span class="sub-item">Allocate Head</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#programs">
                            <i class="fas fa-list-alt"></i>
                            <p>Programs</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="programs">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('program.index') }}">
                                        <span class="sub-item">All Programs</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('program.create') }}">
                                        <span class="sub-item">Add new Programs</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#courses">
                            <i class="fas fa-book"></i>
                            <p>Courses</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="courses">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('course.index') }}">
                                        <span class="sub-item">All Courses</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('course.create') }}">
                                        <span class="sub-item">Add new Courses</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('course.allocate.create') }}">
                                        <span class="sub-item">Allocate new Course</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('course.allocate.index') }}">
                                        <span class="sub-item">Allocated Courses</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#jobs">
                            <i class="fas fa-briefcase"></i>
                            <p>Jobs</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="jobs">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('jobs.index') }}">
                                        <span class="sub-item">All Jobs</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('jobs.create') }}">
                                        <span class="sub-item">Add new Jobs</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('all-applications') }}">
                                        <span class="sub-item">All Applications</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <x-responsive-nav-link :href="route('admission.application')" class="collapsed" aria-expanded="false"
                            :active="request()->routeIs('admission.application')">
                            <i class="fas fa-paper-plane"></i>
                            <p>
                                {{ __('Admission Applications') }}
                            </p>
                        </x-responsive-nav-link>

                    </li>
                    <li class="nav-item">
                        <x-responsive-nav-link :href="route('faculty.index')" class="collapsed" aria-expanded="false"
                            :active="request()->routeIs('faculty.index')">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <p>
                                {{ __('Faculties') }}
                            </p>
                        </x-responsive-nav-link>

                    </li>
                    <li class="nav-item">
                        <x-responsive-nav-link :href="route('students.index')" class="collapsed" aria-expanded="false"
                            :active="request()->routeIs('students.index')">
                            <i class="fas fa-user-graduate"></i>
                            <p>
                                {{ __('Students') }}
                            </p>
                        </x-responsive-nav-link>

                    </li>

                    <li class="nav-item">
                        <x-responsive-nav-link :href="route('room.index')" class="collapsed" aria-expanded="false"
                            :active="request()->routeIs('room.index')">
                            <i class="fas fa-door-open"></i>
                            <p>
                                {{ __('Rooms') }}
                            </p>
                        </x-responsive-nav-link>

                    </li>
                    {{-- Application / Admission students role --}}
                @elseif (auth()->user()->role_id == 4 || auth()->user()->role_id == 5)
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        @if (auth()->user()->role_id == 4)
                            <h4 class="text-section">Admission</h4>
                        @else
                            <h4 class="text-section">Jobs Application</h4>
                        @endif

                    </li>
                    <li class="nav-item">
                        <x-responsive-nav-link :href="route('dashboard')" class="collapsed" aria-expanded="false"
                            :active="request()->routeIs('dashboard')">
                            <i class="fas fa-paper-plane"></i>
                            <p>
                                {{ __('Instruction') }}
                            </p>
                        </x-responsive-nav-link>

                    </li>
                    <li class="nav-item">
                        @if ($isPersonalInfoFilled)
                            <x-responsive-nav-link :href="route('admission.profile-detail.edit', $personalInfo->id)" class="collapsed" aria-expanded="false"
                                :active="request()->routeIs('admission.profile-detail.edit', $personalInfo->id)">
                                <i class="fas fa-user"></i>
                                <p>
                                    {{ __('Personal Details') }}
                                </p><i class="fas fa-check-circle"></i>
                            </x-responsive-nav-link>
                        @else
                            <x-responsive-nav-link :href="route('checkForJob')" class="collapsed" aria-expanded="false"
                                :active="request()->routeIs('checkForJob')">
                                <i class="fas fa-user"></i>
                                <p>
                                    {{ __('Personal Details') }}
                                </p> <i class="fas fa-exclamation-triangle"></i>
                            </x-responsive-nav-link>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if ($isaddressDetailFilled)
                            <x-responsive-nav-link :href="route('admission.address-detail.edit', $addressDetail->id)" class="collapsed" aria-expanded="false"
                                :active="request()->routeIs('admission.address-detail.edit', $addressDetail->id)">
                                <i class="fas fa-map-marker"></i>
                                <p>
                                    {{ __('Address Details') }}
                                </p><i class="fas fa-check-circle"></i>
                            </x-responsive-nav-link>
                        @else
                            <x-responsive-nav-link :href="route('checkForJob')" class="collapsed" aria-expanded="false"
                                :active="request()->routeIs('checkForJob')">
                                <i class="fas fa-map-marker"></i>
                                <p>
                                    {{ __('Address Details') }}
                                </p> <i class="fas fa-exclamation-triangle"></i>
                            </x-responsive-nav-link>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if ($isdisabilityDetailFilled)
                            <x-responsive-nav-link :href="route('admission.disability-detail.edit', $personalInfo->id)" class="collapsed" aria-expanded="false"
                                :active="request()->routeIs('admission.disability-detail.edit', $personalInfo->id)">
                                <i class="fas fa-wheelchair"></i>
                                <p>
                                    {{ __('Disability Details') }}
                                </p><i class="fas fa-check-circle"></i>
                            </x-responsive-nav-link>
                        @else
                            <x-responsive-nav-link :href="route('checkForJob')" class="collapsed" aria-expanded="false"
                                :active="request()->routeIs('checkForJob')">
                                <i class="fas fa-wheelchair"></i>
                                <p>
                                    {{ __('Disability Details') }}
                                </p> <i class="fas fa-exclamation-triangle"></i>
                            </x-responsive-nav-link>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if ($isotherDetailFilled)
                            <x-responsive-nav-link :href="route('admission.other-detail.edit', $personalInfo->id)" class="collapsed" aria-expanded="false"
                                :active="request()->routeIs('admission.other-detail.edit', $personalInfo->id)">
                                <i class="fas fa-edit"></i>
                                <p>
                                    {{ __('Others Details') }}
                                </p><i class="fas fa-check-circle"></i>
                            </x-responsive-nav-link>
                        @else
                            <x-responsive-nav-link :href="route('checkForJob')" class="collapsed" aria-expanded="false"
                                :active="request()->routeIs('checkForJob')">
                                <i class="fas fa-edit"></i>
                                <p>
                                    {{ __('Others Details') }}
                                </p> <i class="fas fa-exclamation-triangle"></i>
                            </x-responsive-nav-link>
                        @endif
                    </li>
                @endif
                @if (auth()->user()->role_id == 4)
                    <li class="nav-item">
                        <x-responsive-nav-link :href="route('checkForJob')" class="collapsed" aria-expanded="false"
                            :active="request()->routeIs('checkForJob')">
                            <i class="fas fa-hand-pointer"></i>
                            <p>
                                {{ __('Apply Here') }}
                            </p>
                        </x-responsive-nav-link>
                    </li>
                    <li class="nav-item">
                        @if ($isApplications)
                            <x-responsive-nav-link :href="route('admission.my-application.index')" class="collapsed" aria-expanded="false"
                                :active="request()->routeIs('admission.my-application.index')">
                                <i class="fas fa-clipboard-check"></i>
                                <p>
                                    {{ __('My Applications') }}
                                </p><i class="fas fa-check-circle"></i>
                            </x-responsive-nav-link>
                        @endif
                    </li>
                @elseif (auth()->user()->role_id == 5)
                    {{-- job applicants  --}}
                    <li class="nav-item">
                        <x-responsive-nav-link :href="route('checkForJob')" class="collapsed" aria-expanded="false"
                            :active="request()->routeIs('checkForJob')">
                            <i class="fas fa-graduation-cap"></i>
                            <p>
                                {{ __('Academic Details') }}
                            </p> <i
                                class="fas @if ($isAcademicQualifications) fa-check-circle @else fa-exclamation-triangle @endif"></i>
                        </x-responsive-nav-link>

                    </li>
                    <li class="nav-item">
                        <x-responsive-nav-link :href="route('checkForJob')" class="collapsed" aria-expanded="false"
                            :active="request()->routeIs('checkForJob')">
                            <i class="fas fa-hand-pointer"></i>
                            <p>
                                {{ __('Apply Here') }}
                            </p>
                        </x-responsive-nav-link>
                    </li>
                    <li class="nav-item">
                        @if ($isJobApplications)
                            <x-responsive-nav-link :href="route('jobs.my-application.index')" class="collapsed" aria-expanded="false"
                                :active="request()->routeIs('jobs.my-application.index')">
                                <i class="fas fa-clipboard-check"></i>
                                <p>
                                    {{ __('My Applications') }}
                                </p><i class="fas fa-check-circle"></i>
                            </x-responsive-nav-link>
                        @endif
                    </li>

                    {{-- Students roles --}}
                @elseif (auth()->user()->role_id == 3)
                    <li class="nav-item">
                        <x-responsive-nav-link :href="route('students.profile')" class="collapsed" aria-expanded="false"
                            :active="request()->routeIs('students.profile')">
                            <i class="fas fa-user"></i>
                            <p>
                                {{ __('Profile') }}
                            </p>
                        </x-responsive-nav-link>

                    </li>
                    <li class="nav-item">
                        <x-responsive-nav-link :href="route('students.result.index')" class="collapsed" aria-expanded="false"
                            :active="request()->routeIs('students.result.index')">
                            <i class="fas fa-star"></i>
                            <p>
                                {{ __('Grade Book') }}
                            </p>
                        </x-responsive-nav-link>

                    </li>
                    <li class="nav-item">
                        <x-responsive-nav-link :href="route('students.fee')" class="collapsed" aria-expanded="false"
                            :active="request()->routeIs('students.fee')">
                            <i class="fas fa-file-invoice-dollar"></i>
                            <p>
                                {{ __('Fee History') }}
                            </p>
                        </x-responsive-nav-link>

                    </li>
                    {{-- Faculty sidebar --}}
                @elseif (auth()->user()->role_id == 2)
                    <li class="nav-item">
                        <x-responsive-nav-link :href="route('attendance.index')" class="collapsed" aria-expanded="false"
                            :active="request()->routeIs('attendance.index')">
                            <i class="fas fa-clipboard-list"></i>
                            <p>
                                {{ __('Attendance') }}
                            </p>
                        </x-responsive-nav-link>

                    </li>
                    <li class="nav-item">
                        <a data-bs-toggle="collapse" href="#result">
                            <i class="fas fa-star"></i>
                            <p>Result</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse" id="result">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{ route('faculty.mids.index') }}">
                                        <span class="sub-item">Mids </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('faculty.final.index') }}">
                                        <span class="sub-item"> Finals</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </li>
                @endif
                {{-- @yield('sidebar') --}}
            </ul>
        </div>
    </div>
</div>
