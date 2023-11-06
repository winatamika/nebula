@extends('layouts.admin')

@section('content')

<div class="entry">
  <h3 class="judul text-uppercase">Room Manager</h3><br>   

  <a href="{{ URL::Route('rooms-create') }}" class="btn btn-default blue">Create New Room</a>
  <br>  

  @if ($roomsList->count())
    <div class="table-responsive">
        <table class="table table-bordered table-striped responsive-utilities">
          <thead>
            <tr class="thead">
              <th>Id</th>
              <th>Name</th>
              <th>Adult</th>
              <th>Child</th>
              <!--<th>Facility</th>-->
              <th>Image</th>
              <th style="width: 18%;">Action</th> 
            </tr>
          </thead>
          
          <tbody>
            <?php $i=1; ?>
         @foreach ($roomsList as $room)
          <tr>
            <td>{{ $i }}</td>
            <td>{{ $room->name_room }}</td>
            <td>{{ $room->adult_capacity }}</td>
            <td>{{ $room->child_capacity }}</td>
            <!--<td>{{ $room->facility }}</td>-->
            <td>{{ $room->image }}</td>
            <td class="actionbotton">
              {{ link_to_route('rooms-edit', 'Edit', array($room->id)) }}

              {{ Form::open(array('style'=>'display:inline;', 'method'=> 'DELETE', 'route' =>
                    array('rooms.destroy', $room->id))) }}
              {{ Form::submit('Delete') }}
              {{ Form::close() }}
            </td>
          </tr>
        <?php $i=$i+1; ?>
        @endforeach
          </tbody>
        </table>
    </div>          
</div>

@else
  There are no rooms
@endif


@stop