@extends('layout.master')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Data User</h2>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
            <a class="btn btn-success" href="{{ 'users/create' }}"> Create</a>
        </div>
    </div>
</div>

@if ($messages = Session::get('message'))
<div class="alert alert-primary" role="alert">
    <p>{{ $messages }}</p>
</div>
@endif

<table class="table table-bordered table-striped text-center table-hover">
    @php
    $number = 1;
    @endphp
    <!-- di foreach dari $users['data'] karena biasanya response dari API itu di bungkus dalam index data -->
    <tr class="table-primary">
        <th>No</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th width="200px">Action</th>
    </tr>
    @forelse($users['data'] as $user)
    <tr>
        <td>{{ $number++ }}</td>
        <td>{{ $user['firstName'] }}</td>
        <td>{{ $user['lastName'] }}</td>
        <td>
            <form method="POST" action="{{ 'users/'.$user['id'] }}">
                @method('DELETE')
                @csrf

                <a href="{{ 'users/'.$user['id'] }}" class="btn btn-primary">Edit</a>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this user?');">Delete</button>
            </form>
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="6" style="text-align: center;">No Record(s) Found!</td>
    </tr>
    @endforelse
</table>

@if($users['total'] > $users['limit'])
<div class="card-body">
    @php $pages = $users['total'] / $users['limit'] @endphp
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item {{ request('page') == 1 || is_null(request('page')) ? 'disabled' : '' }}">
                <a href="?page={{ request('page') ? request('page') - 1 : '1' }}" class="page-link" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            @for ($i = 1; $i <= $pages; $i++) <li class="page-item {{ request('page') == $i || (is_null(request('page')) && $i == 1) ? 'active' : '' }}">
                <a class="page-link" href="?page={{ $i }}{{request('search') ? '&search=' . request('search') : ''}}">{{ $i }}</a>
                </li>
                @endfor
                <li class="page-item {{ request('page') == $pages ? 'disabled' : '' }}">
                    <a class="page-link" href="?page={{ request('page') ? request('page') + 1 : $pages - 1 }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
        </ul>
    </nav>
</div>
@endif

@endsection