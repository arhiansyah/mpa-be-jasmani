<x-admin-layout>
    <x-admin-page-header :title="__('Dashboard')" :subtitle="__('Kelola semua data disini')"></x-admin-page-header>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-xl-4 col-md-4 col-sm-6 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div>
                                        <h3 class="text-dark-red">{{count($exercise)}}</h3>
                                        <p class="mb-0">Exercise</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-book-open text-dark-red fa-3x"></i>
                                    </div>
                                </div>
                                <div class="px-md-1">
                                    <div class="progress mt-3 mb-1 rounded" style="height: 7px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-6 col-12    ">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div>
                                        <h3 class="text-dark-red">{{count($training)}}</h3>
                                        <p class="mb-0">Training</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-pencil-alt text-dark-red fa-3x"></i>
                                    </div>
                                </div>
                                <div class="px-md-1">
                                    <div class="progress mt-3 mb-1 rounded" style="height: 7px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 50%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between px-md-1">
                                    <div>
                                        <h3 class="text-dark-red">{{count($grouptraining)}}</h3>
                                        <p class="mb-0">Group Training</p>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="fas fa-rocket text-dark-red fa-3x"></i>
                                    </div>
                                </div>
                                <div class="px-md-1">
                                    <div class="progress mt-3 mb-1 rounded" style="height: 7px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>