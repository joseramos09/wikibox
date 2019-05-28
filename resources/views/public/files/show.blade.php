@extends('layouts.app')

@section('title', 'File Info')
<!-- Mostrar información del archivo-->
@section('content')
    <div class="card" style="width: 20rem;">
        <img class="img-thumbnail" src="{{ $file->file }}" alt="">
        <div class="card-body">
            <h4 class="card-title">{{ $file->name }}</h4>
            <p class="card-text">{{ $file->description }}</p>
        </div>
    </div>

@endsection

