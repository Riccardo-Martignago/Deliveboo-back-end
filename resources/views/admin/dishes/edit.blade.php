@extends('layouts.app')
@section('main-section')
<div class="row justify-content-center">
    <div class="text-center">
        <h1 class="text-align-center">Edit Dish</h1>
    </div>
    <div class="col-6">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form id="dishForm" action="{{ route('admin.dishes.update', $dish->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $dish->name) }}" required>
                <div id="nameError" class="text-danger"></div>
            </div>

            <div class="form-group">
                <label for="photo">Photo</label>
                <input class="form-control form-control-sm mb-2" type="file" accept="image/*" id="photo" name="photo">
                <div id="photoError" class="text-danger"></div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $dish->description) }}</textarea>
                <div id="descriptionError" class="text-danger"></div>
            </div>

            <div class="form-group">
                <label for="price">Price (€)</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" value="{{ old('price', $dish->price) }}" required>
                <div id="priceError" class="text-danger"></div>
            </div>

            <div class="form-group">
                <label for="visible">Visible</label>
                <select name="visible" id="visible" class="form-control" required>
                    <option value="1" {{ old('visible', $dish->visible) == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('visible', $dish->visible) == 0 ? 'selected' : '' }}>No</option>
                </select>
                <div id="visibleError" class="text-danger"></div>
            </div>

            <button type="submit" class="btn btn-success mt-3">Update Dish</button>

        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.getElementById('name').addEventListener('input', validateName);
document.getElementById('description').addEventListener('input', validateDescription);
document.getElementById('price').addEventListener('input', validatePrice);
document.getElementById('visible').addEventListener('change', validateVisible);

function validateName() {
    const name = document.getElementById('name').value;
    const nameError = document.getElementById('nameError');
    if (name === '') {
        nameError.textContent = 'Name is required.';
    } else {
        nameError.textContent = '';
    }
}


function validateDescription() {
    const description = document.getElementById('description').value;
    const descriptionError = document.getElementById('descriptionError');
    if (description === '') {
        descriptionError.textContent = 'Description is required.';
    } else {
        descriptionError.textContent = '';
    }
}

function validatePrice() {
    const price = document.getElementById('price').value;
    const priceError = document.getElementById('priceError');
    if (price === '' || isNaN(price) || parseFloat(price) <= 0) {
        priceError.textContent = 'Price must be a positive number.';
    } else {
        priceError.textContent = '';
    }
}

function validateVisible() {
    const visible = document.getElementById('visible').value;
    const visibleError = document.getElementById('visibleError');
    if (visible !== '0' && visible !== '1') {
        visibleError.textContent = 'Visibility must be Yes or No.';
    } else {
        visibleError.textContent = '';
    }
}

document.getElementById('dishForm').addEventListener('submit', function(event) {
    validateName();
    validatePhoto();
    validateDescription();
    validatePrice();
    validateVisible();

    const nameError = document.getElementById('nameError').textContent;
    const photoError = document.getElementById('photoError').textContent;
    const descriptionError = document.getElementById('descriptionError').textContent;
    const priceError = document.getElementById('priceError').textContent;
    const visibleError = document.getElementById('visibleError').textContent;

    if (nameError || photoError || descriptionError || priceError || visibleError) {
        event.preventDefault();
    }
});
</script>
@endsection
