@foreach ($software as $softwares)
    


{!! Form::open(['action' => ['App\Http\Controllers\RequestsController@destroy',$software->id],'method'=>'DELETE','class'=>'float-end']) !!}

{{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
{!! Form::close() !!}
@endforeach