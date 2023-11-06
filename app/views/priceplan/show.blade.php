  <!-- CONTENT -->

  <div class="main-content">
    <h1>PRICEPLAN MANAGER</h1>
    	<a href="{{ URL::Route('priceplan.create') }}" class="btn btn-default">Add Priceplan</a>
<br>

@if ($thePriceplan != "")
<table class="table table-striped table-bordered">
    <thead>
    <tr>
    <th>Id</th>
    <th>name</th>
    <th>Room Id</th>
 		<th>Start Date</th>
 		<th>End Date</th>
    <th colspan="2"></th>
    </tr>
    </thead>

    <tbody>
    @foreach ($thePriceplan as $thePrice)
    <tr>
      <td>{{ $thePrice->id }}</td>
      <td>{{ $thePrice->name_room }}</td>
      <td>{{ $thePrice->room_id}}</td>
      <td>{{ $thePrice->start_date }}</td>
      <td>{{ $thePrice->end_date }}</td>

      <td>{{ link_to_route('priceplan.edit', 'Update', array($thePrice->id),
                array('class' => 'btn btn-warning')) }}</td>
      <td>
        {{ Form::open(array('method'=> 'DELETE', 'route' =>
              array('priceplan.destroy', $thePrice->id))) }}
        {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}
      </td>
    </tr>
    @endforeach
    </tbody>
</table>

  </div> 
  <!-- main-content -->
  @else
There are no priceplan
@endif
