@extends('admin.layouts.admin')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Complaints</h4>
            <a href="{{ route('admin.complaints.create')}}">
                <button type="button" class="btn btn-primary btn-fw">Add New</button>
            </a>
            <!-- id	title	content	image	link	created_at	updated_at	 -->

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Image
                        </th>
                        <th>
                            Link
                        </th>
                        <th>
                            Manage
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complaints as $complaint)
                    <tr>
                        <td>
                            {{ $complaint->id }}
                        </td>
                        <td>
                            <img src="{{ asset('storage/' . $complaint->image) }}" alt="{{ $complaint->title }}" width="100">
                        </td>
                        <td>
                            {{ $complaint->link }}
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning btn-sm" style="display: inline">
                                <a href="{{ route('admin.complaints.edit', $complaint->id)}}" style="color: white">Edit</a>
                            <form type="submit" method="POST" style="display: inline" action="{{ route('admin.complaints.destroy', $complaint->id)}}" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="display: inline">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


    


