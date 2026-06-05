@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning">
                    <h4 class="mb-0">Edit Priority</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('priorities.update', $priority) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Priority Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name', $priority->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="level" class="form-label">Priority Level <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('level') is-invalid @enderror" id="level"
                                name="level" value="{{ old('level', $priority->level) }}" min="1" max="5"
                                required>
                            @error('level')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                Level 1 = Lowest, Level 5 = Highest
                                <div class="progress mt-2" style="height: 25px;">
                                    <div id="levelPreview"
                                        class="progress-bar bg-{{ $priority->level >= 4 ? 'danger' : ($priority->level >= 3 ? 'warning' : 'info') }}"
                                        style="width: {{ ($priority->level / 5) * 100 }}%;">
                                        Level {{ $priority->level }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('priorities.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-warning">Update Priority</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Live preview of priority level
        document.getElementById('level').addEventListener('input', function() {
            var level = this.value;
            var percent = (level / 5) * 100;
            var preview = document.getElementById('levelPreview');
            preview.style.width = percent + '%';
            preview.textContent = 'Level ' + level;

            if (level >= 4) {
                preview.className = 'progress-bar bg-danger';
            } else if (level >= 3) {
                preview.className = 'progress-bar bg-warning';
            } else {
                preview.className = 'progress-bar bg-info';
            }
        });
    </script>
@endsection
