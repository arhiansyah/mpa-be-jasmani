<x-admin-layout>
    <x-admin-page-header :title="__('Group Training')" :subtitle="__('Data group training')">
        <x-slot name="linkModule">{{ route('group-training.index') }}</x-slot>
        <x-slot name="module">Group Training</x-slot>
        <x-slot name="method">{{ $groupTraining->grouptraining_code }}</x-slot>
    </x-admin-page-header>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">{{ str()->title('Detail group training ') }}{{ $groupTraining->name }}</h4>
                        <div class="right-side">
                            <a href="{{ route('group-training.edit', $groupTraining->id) }}" class="btn btn-primary btn-gan">Edit</a>
                            <form action="{{ route('group-training.destroy', $groupTraining->id) }}" method="POST" class="d-inline">
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
                                        <td>Nama Group Training</td>
                                        <td>:</td>
                                        <td>{{ $groupTraining->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kode Group Training</td>
                                        <td>:</td>
                                        <td>{{ $groupTraining->grouptraining_code }}</td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>:</td>
                                        <td>{!! $groupTraining->description !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Icon</td>
                                        <td>:</td>
                                        <td>
                                            <img src="{{ route('showimage', $groupTraining->icon) }}" style="height: 160px" alt="{{ $groupTraining->slug }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cover</td>
                                        <td>:</td>
                                        <td>
                                            <img src="{{ route('showimage', $groupTraining->cover) }}" style="height: 280px" alt="{{ $groupTraining->slug }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>List Pengelompokan Training</td>
                                        <td>:</td>
                                        <td>
                                            @foreach ($groupTraining->training as $train)
                                            <div>{{ $train->name }}</div>
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