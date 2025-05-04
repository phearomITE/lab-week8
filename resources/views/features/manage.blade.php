@extends('layouts.app')

@section('content')

<section id="features" class="features section py-5">
<a href="/" class="logo d-flex align-items-center">
          <span class="sitename">Back</span>
        </a>
  <div class="container section-title mb-4">
    <h2>Manage Features</h2>
    <p>Use the form below to add, edit, or delete features.</p>
  </div>


  {{-- Create Form --}}
  <div class="container mb-4">
    <form action="{{ route('features.store') }}" method="POST" class="row g-3">
      @csrf
      <div class="col-md-5">
        <input type="text" name="icon" class="form-control" placeholder="Icon class (e.g., bi bi-eye)" required>
      </div>
      <div class="col-md-5">
        <input type="text" name="name" class="form-control" placeholder="Feature name" required>
      </div>
      <div class="col-md-2">
        <button type="submit" class="btn btn-primary w-100">Add</button>
      </div>
    </form>
  </div>

  {{-- Features List --}}
  <div class="container">
    <div class="row gy-4">
      @foreach ($features as $feature)
        <div class="col-lg-3 col-md-4" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 100 }}">
          <div class="features-item text-center border p-3 rounded">
            <i class="{{ $feature->icon }}" style="color: #ffbb2c; font-size: 2rem;"></i>
            <h5 class="mt-2">{{ $feature->name }}</h5>

            {{-- Update Form --}}
            <form action="{{ route('features.update', $feature->id) }}" method="POST" class="mt-2">
              @csrf
              @method('PUT')
              <input type="text" name="icon" value="{{ $feature->icon }}" class="form-control mb-1" required>
              <input type="text" name="name" value="{{ $feature->name }}" class="form-control mb-2" required>
              <button type="submit" class="btn btn-sm btn-success w-100 mb-1">Update</button>
            </form>

            {{-- Delete Form --}}
            <form action="{{ route('features.destroy', $feature->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger w-100">Delete</button>
            </form>
          </div>
        </div>
      @endforeach
    </div>
  </div>

</section>

@endsection
