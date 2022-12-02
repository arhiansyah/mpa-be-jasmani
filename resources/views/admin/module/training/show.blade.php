<x-admin-layout>
    <x-admin-page-header :title="__('Training')" :subtitle="__('Data training')">
        <x-slot name="linkModule">{{ route('training.index') }}</x-slot>
        <x-slot name="module">Training</x-slot>
        <x-slot name="method">{{ $training->training_code }}</x-slot>
    </x-admin-page-header>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">{{ str()->title('Detail training ') }}{{ $training->name }}</h4>
                        <div class="right-side">
                            <a href="{{ route('training.edit', $training->id) }}" class="btn btn-primary btn-gan">Edit</a>
                            <form action="{{ route('training.destroy', $training->id) }}" method="POST" class="d-inline">
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
                                        <td>Nama Training</td>
                                        <td>:</td>
                                        <td>{{ $training->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kode Exercise</td>
                                        <td>:</td>
                                        <td>{{ $training->training_code }}</td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi Exercise</td>
                                        <td>:</td>
                                        <td>{!! $training->description !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Video</td>
                                        <td>:</td>
                                        <td>
                                            <video src="{{ route('showimage', $training->video_intro) }}" controls style="height: 200px; margin-left: 30px">
                                            </video>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>List Gerakan Dasar</td>
                                        <td>:</td>
                                        <td>
                                            @foreach ($training->exercise as $exercise)
                                            <div>{{ $exercise->name }}</div>
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