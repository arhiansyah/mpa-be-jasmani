<x-admin-layout>
    <x-admin-page-header :title="__('Exercise Session')" :subtitle="__('Data exercise session')">
        <x-slot name="linkModule">{{ route('exercise-session.index') }}</x-slot>
        <x-slot name="module">Exercise Session</x-slot>
        <x-slot name="method">Create</x-slot>
    </x-admin-page-header>
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Buat Exercise Session Baru</h4>
                    </div>
                    <div class="card-body p-3 p-md-4">
                        <form action="{{ route('exercise-session.update', $exerciseSession->id) }}" method="post" enctype='multipart/form-data'>
                            @csrf
                            @method('put')
                            <table class="table table-responsive table-borderless">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $exerciseSession->name) }}">
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
                                        <td><textarea name="description" id="description">{{ $exerciseSession->description }}</textarea>
                                            @error('description')
                                            <div id="iconFeedback" class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Select Group Training</strong></td>
                                        <td>:</td>
                                        <td>
                                            <select class="form-control groupTrainingAll" name="groupTraining[]" multiple="multiple" style="width: 100%; height: 100%;">
                                                @foreach ($groupTraining as $key => $gt)
                                                @if(isset($exerciseSession->GroupTraining[$key]))
                                                <option value="{{ $gt->id }}" {{ $exerciseSession->GroupTraining[$key]->id == $gt->id ? 'selected' : '' }}>{{ $gt->name }}</option>
                                                @else
                                                <!-- break; -->
                                                <option value="{{ $gt->id }}">{{ $gt->name }}</option>
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
                $('.groupTrainingAll').select2({
                    width: 'resolve', // need to override the changed default
                    height: 'resolve',
                    placeholder: 'Select an option'
                });
            })
        </script>
    </x-slot>
</x-admin-layout>