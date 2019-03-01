@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">INFO</div>

                <div class="card-body">
                    <h1>{{$data->name}} {{$data->last_name}}</h1>
                    <p>
                        {{$data->address}}<br>
                        {{$data->city}}, {{$data->state}}<br>

                            @if(Auth::id()==$data->author)
                             <form action="{{url('/main/'.$data->id)}}" method="POST">
                                {{csrf_field()}}
                                {{method_field('DELETE')}}
                                <input type="Submit" value="DELETE"/>
                             </form>
                             @endif        
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection