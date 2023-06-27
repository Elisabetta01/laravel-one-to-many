@extends('layouts.app')

@section('title')

    Laravel-auth | Projects Index

@endsection

@section('content')
    <div class="container text-center">
        <h1>Progetti</h1>

        <a class="btn btn-primary my-4 " href="{{ route('admin.projects.create') }}">Crea Progetto</a>
            
        <div class="d-flex flex-wrap p-4 justify-content-center">

    
                @forelse( $projects as $element )
                    

                    <div class="card m-4" style="width: 18rem;">
                        <img src="{{ asset('storage/' . $element->img ) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$element->title}}</h5>
                            <div class="text-center">
                                <a href="{{ route('admin.projects.show', $element ) }}">Visualizza</a>
                                <br>
                                <a href="{{ route('admin.projects.edit', $element ) }}">Modifica</a>
                                <form action="{{ route('admin.projects.destroy', $element ) }}" method="POST">
                                    @csrf 
                                    @method('DELETE')
    
                                    <button onclick="return confirm('Sei sicuro di eliminare il progetto?')" type="submit" class="btn btn-danger">Elimina</button>
                                </form>

                            </div>
                        </div>
                    </div>
    
                    @empty
                    @endforelse
                    
                </tbody>
            
        </div>
        



    </div>
@endsection

