@foreach ($job_lists as $category_name => $jobs)
    <h3 class="service-details__title" style="font-size:20px;color:#0b2f81">{{ $category_name }}</h3>
    @foreach ($jobs as $job)
        <div class="accrodion" style="margin-left:40px;">
            <div class="accrodion-title">
                <h4>
                    {{ $job['job_title'] }}
                    <span class="accrodion-title__icon"></span><!-- /.accrodion-title__icon -->
                </h4>
            </div><!-- /.accordian-title -->
            <div class="accrodion-content">
                <div class="inner">
                    <p><i class="fas fa-briefcase" style="padding-right:5px;"></i> {{ $job['job_type'] }}</p>
                    <p><i class="fas fa-map-marker" style="padding-right:5px;"></i> {{ $job['location'] }}</p>
                    <p><i class="fas fa-calendar" style="padding-right:5px;"></i> {{ $job['schedule'] }}</p>
                    <p style="padding-top: 15px; font-size: 20px;">Job Requirements</p>
                    <!-- Render job_requirements with HTML -->
                    <div style="margin-left:5px">
                        {!! $job['job_requirements'] !!}
                    </div>

                    <p style="padding-top: 15px; font-size: 20px;">Job Description</p>
                    <!-- Render job_description with HTML -->
                    <div style="margin-left:5px">
                        {!! $job['job_description'] !!}
                    </div>
                    <p style="text-align:center">
                        <a href="https://btsmcph.com/recruitment/pre-emp-app.php?job_id={{ urlencode($job['id']) }}"
                            class="hiredots-btn hiredots-btn--base" target="_blank">
                            <span>Click here to Apply</span>
                        </a>
                    </p>
                </div><!-- /.accordian-content -->
            </div>
        </div><!-- /.accordian-item -->
    @endforeach
    <div class="pagination-wrapper">
        {{ $jobs->appends(request()->except($jobs->getPageName()))->links('pagination::default') }}
    </div>
@endforeach
