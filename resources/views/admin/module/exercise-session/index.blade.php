<x-admin-layout>
    <x-admin-page-header :title="__('Exercise Session')" :subtitle="__('Data exercise session')">

    </x-admin-page-header>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{ str()->title('List exercise session') }}</h4>
                        <a href="{{ route('exercise-session.create') }}" class="btn btn-primary btn-gan">Buat Data Baru</a>
                    </div>
                    <div class="card-body p-3 p-md-4">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Name</td>
                                    <td>Kode Exercise Session</td>
                                    <td>Deskripsi</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exerciseSession as $i => $exers)
                                <tr>
                                    <td>{{ $i+1 }}</td>
                                    <td>{{ $exers->name }}</td>
                                    <td>{{ $exers->exercisersession_code }}</td>
                                    <td>{{ $exers->description }}</td>
                                    <td>
                                        <a href="{{ route('exercise-session.show',$exers->id) }}" class="btn btn-primary btn-gan">Lihat Detail</a>
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