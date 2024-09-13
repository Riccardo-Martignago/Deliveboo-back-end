@extends('layouts.app')
@section('main-section')
<div class="row justify-content-center">
    <div class="text-center">
        <h1 class="text-align-center">Edit Dish</h1>
    </div>
    <div class="col-6">

        <form action="{{ route('admin.dishes.update', $dish->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $dish->name) }}" required>
            </div>

            <div class="form-group">

                <label for="Photo">Photo</label>
                <input class="form-control form-control-sm mb-2" type="file" accept="image/*" placeholder="Photo" aria-label="Photo" id="photo" name="photo" value="{{ old('photo') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $dish->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price (€)</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" value="{{ old('price') }}" required>
            </div>

            <div class="form-group">
                <label for="visible">Visible</label>
                <select name="visible" id="visible" class="form-control" required>
                    <option value="1" {{ old('visible', $dish->visible) == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('visible', $dish->visible) == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">Update Dish</button>

        </form>
    </div>
</div>
@endsection
