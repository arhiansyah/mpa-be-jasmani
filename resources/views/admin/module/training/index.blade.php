<x-admin-layout>
    <x-admin-page-header :title="__('Training')" :subtitle="__('Data training')">

    </x-admin-page-header>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ str()->title('List training') }}</h4>
                        <a href="{{ route('training.create') }}" class="btn btn-primary btn-gan">Buat Data Baru</a>
                    </div>
                    <div class="card-body p-3 p-md-4">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Training</td>
                                    <td>Kode Training</td>
                                    <td>Deskripsi</td>
                                    <!-- <td>Video</td> -->
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($training as $i => $tra)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $tra->name }}</td>
                                    <td>{{ $tra->training_code }}</td>
                                    <td>{{ $tra->description }}</td>
                                    <!-- <td>{{ $tra->video_intro }}</td> -->
                                    <td>
                                        <a href="{{ route('training.show',$tra->id) }}" class="btn btn-primary btn-gan">Lihat Detail</a>
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