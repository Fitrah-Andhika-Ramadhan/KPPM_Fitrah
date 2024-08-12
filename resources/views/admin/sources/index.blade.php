@extends('admin.layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Sources</h2>
                <a href="{{ route('admin.sources.create') }}" class="btn btn-primary mb-3">Create New Source</a>
                <div class="row">
                    @foreach($sources as $source)
                        <div class="col-md-4">
                            <div class="card mb-3">
                                @if($source->image)
                                    <img src="{{ asset('storage/sources/' . $source->image) }}" class="card-img-top" alt="{{ $source->title }}">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $source->title }}</h5>
                                    <p class="card-text">
                                        {{ \Illuminate\Support\Str::limit(strip_tags($source->content), 150, $end='...') }}
                                    </p>
                                    <a href="{{ $source->link }}" class="btn btn-sm btn-primary" target="_blank">Go to Source</a>
                                    <a href="{{ route('admin.sources.edit', $source->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                    <form action="{{ route('admin.sources.destroy', $source->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
