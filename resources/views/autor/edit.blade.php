@extends('layout')

@section('title', 'Llistat de llibres')

@section('stylesheets')
    @parent
@endsection

@section('content')
    <h1>Autor {{$autor->nom}} {{$autor->cognoms}}</h1>
    <a href="{{ route('autor_list') }}"> + Veure autors</a>
   <form method="POST" action="{{ route('autor_edit',['id'=> $autor->id]) }}" enctype="multipart/form-data">
   @csrf
    @if (session('status'))
        <div>
            <strong>Success!</strong> {{ session('status') }}  
        </div>
    @endif
    <label for="">Nom</label>
    <input type="text" name="nom" value="{{$autor->nom}}">
    <br>
    <label for="">Cognoms</label>
    <input type="text" name="cognoms" value="{{$autor->cognoms}}">
    <br>
    @if ($autor->imatge != null)
        <div>
            <label>Imatge actual: </label>
            <a style="font-weight: bold;">{{$autor->imatge}}</a>
        </div>
        <div>
        <label for="deleteImage">Eliminar imatge? </label>
        <input type="checkbox" name="deleteImage"/>
        </div>
        @endif
        <div>
            <label for="imatge">Imatge</label>
            <input type="file" name="imatge" value=""/>
        </div>
    <input type="submit" value="Enviar">
</form>

@endsection