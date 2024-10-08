@extends('components.main')
@section('content')
    <div class="container d-flex align-items-center justify-content-center">
        <form action="{{ route('post.update', $post->id) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Enter name"
                    value="{{ $post->name }}">

                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="content">Description</label>
                <textarea name="content" class="form-control" id="content" placeholder="Enter Description">{{ $post->content }}</textarea>

                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input name="price" type="number" class="form-control" id="price" placeholder="Enter price"
                    value="{{ $post->price }}">

                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mt-3">
                <label for="category">Категория товара</label>
                <select class="form-select" id="category", name="category_id">
                    @foreach ($categories as $category)
                        <option {{ $category->id == $post->category_id ? 'selected' : '' }} value="{{ $category->id }}">
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="m-4 btn btn-primary">Edit</button>
            <a class="btn btn-primary" href="{{ route('post.show', $post->id) }}">Back</a>

        </form>
    </div>
@endsection
