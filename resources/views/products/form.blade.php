<div class="card">
    <h5 class="card-header">New Product</h5>
    <div class="card-body">
        <form action="{{ route('products.new') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="name"/>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" id="description" class="form-control"
                       placeholder="description..."/>
            </div>

            <div class="form-group">
                <label for="tags">Tags</label>
                <input type="text" name="tags" id="tags" class="form-control" placeholder="tag1, tag2, tag3"/>
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
        </form>
    </div>
</div>
