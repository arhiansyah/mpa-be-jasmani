<x-admin-layout>
    <x-admin-page-header :title="__('Exercise')" :subtitle="__('Data exercise')">
        <x-slot name="linkModule">{{ route('exercise.index') }}</x-slot>
        <x-slot name="module">Exercise</x-slot>
        <x-slot name="method">{{ $exercise->exercise_code }}</x-slot>
    </x-admin-page-header>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4 class="card-title">{{ str()->title('Detail exercise ') }}{{ $exercise->name }}</h4>
                        <div class="right-side">
                            <a href="{{ route('exercise.edit', $exercise->id) }}" class="btn btn-primary btn-gan">Edit</a>
                            <form action="{{ route('exercise.destroy', $exercise->id) }}" method="POST" class="d-inline">
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
                                        <td>Nama Exercise</td>
                                        <td>:</td>
                                        <td>{{ $exercise->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>Kode Exercise</td>
                                        <td>:</td>
                                        <td>{{ $exercise->exercise_code }}</td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi Exercise</td>
                                        <td>:</td>
                                        <td>{!! $exercise->description !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Measurement</td>
                                        <td>:</td>
                                        <td>{!! $exercise->measurement !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Video</td>
                                        <td>:</td>
                                        <td>
                                            {{-- {{ route('showimage', $exercise->image) }} --}}
                                            <video src="{{ route('showimage', $exercise->video) }}" controls style="height: 200px; margin-left: 70px">
                                            </video>
                                            <!-- <video src="{{ route('showimage', $exercise->video) }}" style="height: 160px" alt="{{ $exercise->slug }}"> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Icon</td>
                                        <td>:</td>
                                        <td>
                                            {{-- {{ route('showimage', $exercise->image) }} --}}
                                            <img src="{{$exercise->icon}}" style="height: 160px" alt="{{ $exercise->slug }}">
                                            <!-- <img src="{{ route('showimage', $exercise->icon) }}" style="height: 160px" alt="{{ $exercise->slug }}"> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cover</td>
                                        <td>:</td>
                                        <td>
                                            <img src="{{ route('showimage', $exercise->cover) }}" style="height: 280px" alt="{{ $exercise->slug }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Animation</td>
                                        <td>:</td>
                                        <td>
                                            <img src="{{ route('showimage', $exercise->animation) }}" style="height: 280px" alt="{{ $exercise->slug }}">
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