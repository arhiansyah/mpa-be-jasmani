<x-admin-layout>
    <x-admin-page-header :title="__('Training')" :subtitle="__('Data training')">
        <x-slot name="linkModule">{{ route('training.index') }}</x-slot>
        <x-slot name="module">Training</x-slot>
        <x-slot name="method">Create</x-slot>
    </x-admin-page-header>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Buat Training Baru</h4>
                    </div>
                    <div class="card-body p-3 p-md-4">
                        <form action="{{ route('training.update', $training->id) }}" method="post" enctype='multipart/form-data'>
                            @csrf
                            @method('put')
                            <table class="table table-responsive table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $training->name) }}">
                                            @error('name')
                                            <div id="nameFeedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>:</td>
                                        <td><textarea name="description" id="description">{{ $training->description }}</textarea>
                                            @error('description')
                                            <div id="iconFeedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Video</td>
                                        <td>:</td>
                                        <td>
                                            <video src="{{ route('showimage', $training->video_intro) }}" controls style="height: 200px; margin-left: 10px; margin-bottom: 20px" alt="{{  $training->slug }}">
                                            </video>
                                            <input type="file" class="form-control @error('video_intro') is-invalid @enderror" name="video_intro" value="{{ old('video_intro') }}" style="margin-left: 10px;">
                                            @error('video_intro')
                                            <div id="iconFeedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Select Unit motion</strong></td>
                                        <td>:</td>
                                        <td>
                                            <select class="form-control exerciseAll" name="exercise[]" multiple="multiple" style="width: 100%; height: 100%;">
                                                @foreach ($exercise as $key => $exe)
                                                @if(isset($training->exercise[$key]))
                                                <option value="{{ $exe->id }}" {{ $training->exercise[$key]->id == $exe->id ? 'selected' : '' }}>{{ $exe->name }}</option>
                                                @else
                                                <!-- break; -->
                                                <option value="{{ $exe->id }}">{{ $exe->name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <td colspan="3">
                                        <button type="submit" class="w-100 btn btn-primary btn-gan">Submit</button>
                                    </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-slot name="scriptVendor">
        <script src="https://cdn.tiny.cloud/1/2yzm6dte4n45dr6lv2g3t2ztb6yfqvo31pdgr4329i0dmuti/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    </x-slot>
    <x-slot name="script">
        <script>
            tinymce.init({
                selector: 'textarea#description',
                height: 500,
                menubar: false,
                plugins: [
                    'advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table paste code help wordcount'
                ],
                toolbar: 'undo redo | formatselect | ' +
                    'bold italic backcolor | alignleft aligncenter ' +
                    'alignright alignjustify | bullist numlist outdent indent | ' +
                    'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
            });
            $(document).ready(function() {
                $('.exerciseAll').select2({
                    width: 'resolve', // need to override the changed default
                    height: 'resolve',
                    placeholder: 'Select an option'
                });
            })
        </script>
    </x-slot>
</x-admin-layout>