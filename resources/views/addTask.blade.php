@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card-body">
                <section class="vh-100 gradient-custom">
                    <div class="container py-5 h-100">
                      <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col col-xl-10">
                  
                            <div class="card">
                                <div class="card-body p-5">
                                    <form action="{{route('storeTask')}}" method="post">
                                        @csrf
                                        <label for="taskName ">task name</label>
                                        <input type="text" name="taskName" class="form-control mb-3" value="{{$taskName}}">
                                        <label for="taskDetail">task details</label>
                                        <input type="text" name="taskDetails" class="form-control mb-3">
                                        <input type="submit" value="submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                </section>    
            </div>
        </div>
    </div>    
@endsection