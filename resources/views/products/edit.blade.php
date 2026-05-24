<x-layout>
    <x-slot:title>Edit Product</x-slot:title>

    <h1>Edit Product</h1>
    <a href="{{ route('products.index') }}" class="btn btn-back">Back to List</a>
    <br><br>

    <form action="{{ route('products.update') }}" method="POST" style="max-width: 500px;">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}">
        </div>

        <div class="form-group">
            <label>Description:</label>
            <textarea name="description" rows="4">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="form-group">
            <label>Price:</label>
            <input type="text" name="price" value="{{ old('price', $product->price) }}">
        </div>

        <div class="form-group">
            <label>Category:</label>
            <select name="category">
                @foreach(['electronics', 'clothing', 'home', 'beauty', 'other'] as $cat)
                    <option value="{{ $cat }}" {{ (old('category', $product->category) == $cat) ? 'selected' : '' }}>
                        {{ ucfirst($cat) }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-edit">Update Product</button>
    </form>
</x-layout>
