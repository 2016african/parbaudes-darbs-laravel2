<x-layout>
    <x-slot:title>Products List</x-slot:title>

    <h1>Products</h1>
    <a href="{{ route('products.create') }}" class="btn btn-add">Add New Product</a>
    <br><br>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $product->status)) }}</td>
                <td>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-view">View</a>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-edit">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-delete" onclick="return confirm('Delete this product?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
