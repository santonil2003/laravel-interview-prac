<div class="card">
    <h5 class="card-header">Products</h5>
    <div class="card-body">
        @if (!empty($products) && $products->count())
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Tags</th>
                    <th>Action</th>
                </tr>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ implode(', ', $product->tags()->pluck('name')->toArray())}}</td>
                        <td>
                            <form action="{{ route('products.delete', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

        @else
            <div class="alert alert-info"><em>No products have been created yet.</em></div>
        @endif
    </div>
</div>
