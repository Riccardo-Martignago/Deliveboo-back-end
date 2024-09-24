@extends('layouts.app')
@section('main-section')
<div class="row justify-content-center">
    <h1 class=" text-center mb-3">Create a New Dish</h1>
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
        <form  action="{{ route('admin.dishes.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                <div id="nameError" class="text-danger"></div>
            </div>

            <div class="form-group">

                <label for="Photo">Photo</label>
                <input class="form-control form-control-sm mb-2" type="file" accept="image/*" placeholder="Photo" aria-label="Photo" id="photo" name="photo" value="{{ old('photo') }}" required>
                <div id="photoError" class="text-danger"></div>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
                <div id="descriptionError" class="text-danger"></div>
            </div>

            <div class="form-group">
                <label for="price">Price (€)</label>
                <input type="number" name="price" id="price" class="form-control" step="0.01" min="0" value="{{ old('price') }}" required>
                <div id="priceError" class="text-danger"></div>
            </div>

            <div class="form-group">
                <label for="visible">Visible</label>
                <select name="visible" id="visible" class="form-control" required>
                    <option value="1" {{ old('visible') == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('visible') == 0 ? 'selected' : '' }}>No</option>
                </select>
                <div id="visibleError" class="text-danger"></div>
            </div>


            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <button type="submit" class="btn btn-success mt-3">Create Dish</button>
        </form>
    </div>
</div>
@endsection
@section('scripts')
<script>
document.getElementById('name').addEventListener('input', validateName);
document.getElementById('photo').addEventListener('input', validatePhoto);
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

function validatePhoto() {
    const photo = document.getElementById('photo').files[0];
    const photoError = document.getElementById('photoError');
    if (!photo) {
        photoError.textContent = 'Photo is required.';
    } else {
        photoError.textContent = '';
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
