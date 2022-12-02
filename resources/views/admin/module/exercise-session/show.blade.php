<x-admin-layout>
    <x-admin-page-header :title="__('Exercise Session')" :subtitle="__('Data exercise session')">
        <x-slot name="linkModule">{{ route('exercise-session.index') }}</x-slot>
        <x-slot name="module">Exercise Session</x-slot>
        <x-slot name="method">{{ $exerciseSession->exercisersession_code }}</x-slot>
    </x-admin-page-header>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">{{ str()->title('Detail exercise session ') }}{{ $exerciseSession->name }}</h4>
                        <div class="right-side">
                            <a href="{{ route('exercise-session.edit', $exerciseSession->id) }}" class="btn btn-primary btn-gan">Edit</a>
                            <form action="{{ route('exercise-session.destroy', $exerciseSession->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-primary btn-gan" onclick="confirm('apakah kamu yakin?')">Hapus</button>
                            </form>
                        </div>
                    </div>
                    <div class="card-body p-3 p-md-4">
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Nama Exercise Session</td>
                                        <td>:</td>
                                        <td>{{ $exerciseSession->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kode Exercise Session</td>
                                        <td>:</td>
                                        <td>{{ $exerciseSession->exercisersession_code }}</td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>:</td>
                                        <td>{!! $exerciseSession->description !!}</td>
                                    </tr>
                                    <tr>
                                        <td>List Group Training</td>
                                        <td>:</td>
                                        <td>
                                            @foreach ($exerciseSession->GroupTraining as $groupTraining)
                                            <div>{{ $groupTraining->name }}</div>
                                            @endforeach
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>