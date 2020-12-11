@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <p> You are logged in!<p><br><br>               
                   <br>
                 
               <div class="pull-right">
			       <a href="{{ route('table')}}" class="btn btn-small btn-info iframe"><span class="glyphicon glyphicon-plus-sign"></span> Start function</a>
	           </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
