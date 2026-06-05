@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Add New Priority</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('priorities.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Priority Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Examples: Low, Medium, High, Urgent, Critical</div>
                        </div>

                        <div class="mb-3">
                            <label for="level" class="form-label">Priority Level <span
                                    class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('level') is-invalid @enderror" id="level"
                                name="level" value="{{ old('level', 1) }}" min="1" max="5" required>
                            @error('level')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">
                                Level 1 = Lowest, Level 5 = Highest
                                <div class="progress mt-2" style="height: 25px;">
                                    <div id="levelPreview" class="progress-bar bg-info" style="width: 20%;">Level 1</div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('priorities.index') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Priority</button>
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

            // Change color based on level
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
