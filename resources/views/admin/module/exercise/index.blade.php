<x-admin-layout>
    <x-admin-page-header :title="__('Exercise')" :subtitle="__('Data exercise')">

    </x-admin-page-header>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ str()->title('List exercise') }}</h4>
                        <a href="{{ route('exercise.create') }}" class="btn btn-primary btn-gan">Buat Data Baru</a>
                    </div>
                    <div class="card-body p-3 p-md-4">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Exercise</td>
                                    <td>Kode Exercise</td>
                                    <td>Deskripsi</td>
                                    <td>Measurement</td>
                                    <!-- <td>Video</td> -->
                                    <!-- <td>Icon</td> -->
                                    <!-- <td>Cover</td> -->
                                    <!-- <td>Animation</td> -->
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exercise as $i => $exe)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $exe->name }}</td>
                                    <td>{{ $exe->exercise_code }}</td>
                                    <td>{{ $exe->description }}</td>
                                    <td>{{ $exe->measurement }}</td>
                                    <!-- <td>{{ $exe->video }}</td> -->
                                    <!-- <td>{{ $exe->icon }}</td> -->
                                    <!-- <td>{{ $exe->cover }}</td> -->
                                    <!-- <td>{{ $exe->animation }}</td> -->
                                    <td>
                                        <a href="{{ route('exercise.show',$exe->id) }}" class="btn btn-primary btn-gan">Lihat Detail</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>