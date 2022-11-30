@extends('layout')

@section('title', 'Llistat de llibres')

@section('stylesheets')
    @parent
@endsection

@section('content')
    <h1>Llibre {{$llibre->titol}}</h1>
   <a href="{{ route('llibre_list') }}"> + Veure llibres</a>
   <form method="POST" action="{{ route('llibre_edit',['id'=> $llibre->id]) }}">
   @csrf
    @if (session('status'))
        <div>
            <strong>Success!</strong> {{ session('status') }}  
        </div>
    @endif
    <label for="">Títol</label>
    <input type="text" name="titol" value="{{$llibre->titol}}">
    <br>
    <label for="">Data publicació</label>
    <input type="date" name="dataP" value="{{$llibre->dataP}}">
    <br>
    <label for="">Vendes</label>
    <input type="text" name="vendes" value="{{$llibre->vendes}}">
    <br>
    <div>
                <label for="autor_id">Autor</label>
                <select name="autor_id">
                <option value="">-- selecciona un autor --</option>
                    @foreach ($autors as $autor)
                        <option value="{{ $autor->id }}">{{ $autor->nom }} {{ $autor->cognoms }}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Enviar">
    </form>
@endsection