<x-layout>
    <x-slot:title>Product Details</x-slot:title>

    <h1>{{ $product->name }}</h1>
    <a href="{{ route('products.index') }}" class="btn btn-back">Back to List</a>
    <br><br>

    <div style="background: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 5px;">
        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Price:</strong> ${{ $product->price }}</p>
        <p><strong>Category:</strong> {{ ucfirst($product->category) }}</p>
        <p><strong>Status:</strong> <span style="padding: 2px 5px; border-radius: 3px; background: #eee;">{{ ucfirst(str_replace('_', ' ', $product->status)) }}</span></p>
        <p><strong>Created at:</strong> {{ $product->created_at }}</p>
    </div>

    <br>
    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-edit">Edit this product</a>

    <hr style="margin: 30px 0;">

    <div style="margin-bottom: 20px;">
        <strong>Change Status:</strong>
        <form action="{{ route('products.updateStatus', $product->id) }}" method="POST" style="display:inline-flex; align-items: center; gap: 10px;">
            @csrf
            @method('PATCH')
            <select name="status" style="width: auto; padding: 5px;">
                <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                <option value="out_of_stock" {{ $product->status == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
            </select>
            <button type="submit" class="btn btn-view">Update Status</button>
        </form>
    </div>
</x-layout>
