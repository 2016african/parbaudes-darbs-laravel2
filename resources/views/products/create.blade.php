<x-layout>
    <x-slot:title>Create Product</x-slot:title>

    <h1>Create Product</h1>
    <a href="{{ route('products.index') }}" class="btn btn-back">Back to List</a>
    <br><br>

    <form action="{{ route('products.store') }}" method="POST" style="max-width: 500px;">
        @csrf
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label>Description:</label>
            <textarea name="description" rows="4">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label>Price:</label>
            <input type="text" name="price" value="{{ old('price') }}">
        </div>

        <div class="form-group">
            <label>Category:</label>
            <select name="category">
                <option value="electronics" {{ old('category') == 'electronics' ? 'selected' : '' }}>Electronics</option>
                <option value="clothing" {{ old('category') == 'clothing' ? 'selected' : '' }}>Clothing</option>
                <option value="home" {{ old('category') == 'home' ? 'selected' : '' }}>Home</option>
                <option value="beauty" {{ old('category') == 'beauty' ? 'selected' : '' }}>Beauty</option>
                <option value="other" {{ old('category') == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <button type="submit" class="btn btn-add">Save Product</button>
    </form>
</x-layout>
