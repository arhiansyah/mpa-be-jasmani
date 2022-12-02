<x-admin-layout>
    <x-admin-page-header :title="__('Group Training')" :subtitle="__('Data group training')">

    </x-admin-page-header>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ str()->title('List group training') }}</h4>
                        <a href="{{ route('group-training.create') }}" class="btn btn-primary btn-gan">Buat Data Baru</a>
                    </div>
                    <div class="card-body p-3 p-md-4">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Nama Group Training</td>
                                    <td>Kode Group Training</td>
                                    <td>Deskripsi</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groupTraining as $i => $gtra)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $gtra->name }}</td>
                                    <td>{{ $gtra->grouptraining_code }}</td>
                                    <td>{{ $gtra->description }}</td>
                                    <td>
                                        <a href="{{ route('group-training.show',$gtra->id) }}" class="btn btn-primary btn-gan">Lihat Detail</a>
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