 
@extends('layouts.admin')
@section('content')

  <!-- CONTENT -->
  <div class="main-content">
    <h1>NEBULA ROOM MANAGER</h1>
<p>{{ link_to_route('rooms.create', 'Create new room') }}</p>
@if ($roomsList->count())
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Adult</th>
        <th>Child</th>
        <th>Desc</th>
        <th>Image</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($roomsList as $room)
    <tr>
      <td>{{ $room->id }}</td>
      <td>{{ $room->name_room }}</td>
      <td>{{ $room->adult_capacity }}</td>
      <td>{{ $room->child_capacity }}</td>
      <td>{{ $room->desc }}</td>
      <td>{{ $room->image }}</td>
      <td>{{ link_to_route('rooms.edit', 'Update', array($room->id),
                array('class' => 'btn btn-warning')) }}</td>
      <td>
        {{ Form::open(array('method'=> 'DELETE', 'route' =>
              array('rooms.destroy', $room->id))) }}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
      </td>
    </tr>
    @endforeach
    </tbody>
</table>

  </div> <!-- main-content -->
@else
There are no rooms
@endif
@stop