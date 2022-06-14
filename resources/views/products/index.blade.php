@extends('products.layout')
 
@section('content')
    <div class="row" style="margin: 5rem 0 2rem 0; border: 1px solid #000; padding:1rem; border-radius:0.4rem">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD Todo Application</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Todo</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @elseif ($message = Session::get('delete'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
   

    @foreach ($products as $product)
    <div class="card d-flex position-relative justify-content-center" style="padding:1rem; ">
        <div class="card-body">
            <h5 class="card-title"><strong> Title: </strong> {{$product->name}}</h5>
            <p class="card-text"><strong> Description: </strong> {{$product->detail}} </p>
            <p class="card-text"><strong> Created At: </strong> {{$product->created_at}} </p>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST" >

                <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

                @csrf
                @method('DELETE')
    
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
        </div>
    @endforeach

    {!! $products->links() !!}
      
@endsection