<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Products</title>

        <style>
            .alert-success {
                color: green;
            }

            .alert-danger{
                color: red;
            }

        </style>
    </head>
    <body>

        <h1>Current Products</h1>

        @if ($products->count())
        <ul>
            @foreach ($products as $product)
            <li>
                <span>
                    {{ $product->name }}
                </span>

                <span style="margin-left: 10px">
                     {{ $product->description }}
                </span>

                <span style="margin-left: 10px">
                    {{ implode(', ', $product->tags()->pluck('name')->toArray())}}
                </span>

                <form action="{{ route('products.delete', $product->id) }}" method="POST" style="margin-left: 10px;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">delete</button>
                </form>
            </li>
            @endforeach
        </ul>
        @else
            <p><em>No products have been created yet.</em></p>
        @endif



        @if (session('error'))
            <div class="alert-danger">
                {{ session('error') }}
            </div>
            <hr />
        @endif

        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        <hr />
        @endif

        <!-- display errors-->
        @if($errors->any())
            {!! implode('', $errors->all('<div class="alert-danger">:message</div>')) !!}
            <hr/>
        @endif


        <h2>New product</h2>
        <form action="{{ route('products.new') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="name" /><br />
            <textarea name="description" placeholder="description"></textarea><br />
            <input type="text" name="tags" placeholder="tags" /><br />
            <button type="submit">Submit</button>
        </form>

    </body>
</html>
