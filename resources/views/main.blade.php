@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dobrodosli {{Auth::user()->name}}</div>

                <div class="card-body">
                    <div>
                    <form action="/main" method="post">
                        {{csrf_field()}}
                        <label>Name</label><br>
                        <input type="text" name="name" value="{{old('name')}}" /><br>
                        <label>Surname</label><br>
                        <input type="text" name="last_name" value="{{old('last_name')}}"/><br>
                        <label>Address</label><br>
                        <input type="text" name="address" value="{{old('address')}}"/><br>
                        <label>City</label><br>
                        <input type="text" name="city" value="{{old('city')}}"/><br>
                        <label>State</label><br>
                        <input type="text" name="state" value="{{old('state')}}"/><br><br>
                        <input type="submit" value="Save" />
                        <input type="reset" value="Reset" />
                    </form>
                    <div style="background-color: #F8F8FF; width: 58%;height:380px;padding: 5%;display: inline;
                    margin-left:38%;margin-top:-365px;position: absolute; max-width: 80%; ">
                        @if(count($index)>0)
                            <ul>
                                @foreach($index as $person)
                                <li>{{$person->created_at}}.....<a href="{{url('main/view/'.$person->id)}}">{{$person->last_name}}</a></li>
                                @endforeach
                            </ul>
                        @endif
                        {{ $index->links() }}
                    </div>
                </div>
            </div>
        </div>
        <br>
         @foreach ($errors->all() as $error)
                <ul>
                <div class="card-header">
                     <li>{{ $error }}</li>
                </div>
                </ul>
                 @endforeach 
    </div>
</div>
@endsection