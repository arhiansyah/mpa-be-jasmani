<x-admin-layout>
    <x-admin-page-header :title="__('Exercise')" :subtitle="__('Data exercise')">
        <x-slot name="linkModule">{{ route('exercise.index') }}</x-slot>
        <x-slot name="module">Exercise</x-slot>
        <x-slot name="method">Create</x-slot>
    </x-admin-page-header>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Buat Exercise Baru</h4>
                    </div>
                    <div class="card-body p-3 p-md-4">
                        <form action="{{ route('exercise.store') }}" method="post" enctype='multipart/form-data'>
                            @csrf
                            <table class="table table-responsive table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">
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
                                        <td><textarea name="description" id="description"></textarea>
                                            @error('description')
                                            <div id="iconFeedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Measurement</td>
                                        <td>:</td>
                                        <td>
                                            <select class="form-control @error('measurement') is-invalid @enderror" name="measurement" id="measurementID">
                                                <option value="repeat">
                                                    repeat
                                                </option>
                                                <option value="duration">
                                                    duration
                                                </option>
                                            </select>
                                            <!-- <input type="text" class="form-control @error('measurement') is-invalid @enderror" name="measurement" value="{{ old('measurement') }}"> -->
                                            <!-- @error('measurement') -->
                                            <!-- <div id="nameFeedback" class="invalid-feedback"> -->
                                            <!-- {{ $message }} -->
                                            <!-- </div> -->
                                            <!-- @enderror -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Video</td>
                                        <td>:</td>
                                        <td>
                                            <input type="file" class="form-control @error('video') is-invalid @enderror" name="video" value="{{ old('video') }}">
                                            @error('video')
                                            <div id="iconFeedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Icon</td>
                                        <td>:</td>
                                        <td>
                                            <input type="file" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ old('icon') }}">
                                            @error('icon')
                                            <div id="iconFeedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Cover</td>
                                        <td>:</td>
                                        <td>
                                            <input type="file" class="form-control @error('cover') is-invalid @enderror" name="cover" value="{{ old('cover') }}">
                                            @error('cover')
                                            <div id="iconFeedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Animation</td>
                                        <td>:</td>
                                        <td>
                                            <input type="file" class="form-control @error('animation') is-invalid @enderror" name="animation" value="{{ old('animation') }}">
                                            @error('animation')
                                            <div id="iconFeedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
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
            $(document).ready(function() {})
        </script>
    </x-slot>
</x-admin-layout>