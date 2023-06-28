@extends( 'layouts.app' )

@section('title')

    Laravel-auth | Projects Create

@endsection

@section('content')

<div class="container">

    <h1>Crea un nuovo progetto</h1>

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li> {{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route( 'admin.projects.store' ) }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <label for="projects-title" class="form-label">Title</label>
            <input type="text" id="projects-title" name="title" class="form-control">
        </div>

        <div class="form-group">
            <label for="projects-description" class="form-label">Description</label>
            <textarea class="form-control" name="description" id="projects-description" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
            <label for="projects-img" class="form-label">Immagine</label>
            <input type="file" id="projects-img" name="img" class="form-control">
        </div>

        <div class="form-group">
            <label for="category" class="form-label">Categorie</label>
            <select class="form-select @error('category_id') is-invalid @enderror" name="category_id" id="category">
                <option value="">-- Scegli una Categoria --</option>
                @foreach ($categories as $element)
                    <option value="{{ $element->id }}">{{ $element->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary my-4">Crea</button>

    </form>
</div>

@endsection