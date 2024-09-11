@extends('layouts.app')
@section('main-section')
<div class="row justify-content-center">
    <h1 class=" text-center mb-3">Create a New Dish</h1>
    <div class="col-6">
        <form  action="{{ route('admin.dishes.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            </div>

            <div class="form-group">

                <label for="Photo">Photo</label>
                <input class="form-control form-control-sm mb-2" type="file" accept="image/*" placeholder="Photo" aria-label="Photo" id="photo" name="photo" value="{{ old('photo') }}">

            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="price">Price (€)</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ old('price') }}" required>
            </div>

            <div class="form-group">
                <label for="visible">Visible</label>
                <select name="visible" id="visible" class="form-control" required>
                    <option value="1" {{ old('visible') == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('visible') == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>


            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <button type="submit" class="btn btn-success mt-3">Create Dish</button>
        </form>
    </div>
</div>
@endsection
