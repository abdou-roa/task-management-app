@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            {{-- {{ __('You are logged in!') }} --}}
            <section class="vh-100 gradient-custom">
                <div class="container py-5 h-100">
                  <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-xl-10">
              
                      <div class="card">
                        <div class="card-body p-5">
              
                            <form class="d-flex flex-column  align-items-center mb-4" action="{{route('addTask')}}" method="GET">
                                <div class="d-flex w-75">
                                <input type="text" id="form2" class="form-control" name="TaskName" style="min-width:200px;" />
                                <button type="submit" class="btn btn-info ms-2">Add</button>
                                </div>
                                <label class="form-label" for="form2">New task...</label>
                            </form>
              
                          <!-- Tabs navs -->
                          <ul class="nav nav-tabs mb-4 pb-2" id="ex1" role="tablist">
                            <li class="nav-item" role="presentation">
                              <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="tab" href="{{url('/home')}}" role="tab"
                                aria-controls="ex1-tabs-1" aria-selected="false">All</a>
                            </li>
                            <li class="nav-item" role="presentation">
                              <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="tab" href="{{url('/activeTasks')}}" role="tab"
                                aria-controls="ex1-tabs-2" aria-selected="true">Active</a>
                            </li>
                            <li class="nav-item" role="presentation">
                              <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="tab" href="{{url('/completedTasks')}}" role="tab"
                                aria-controls="ex1-tabs-3" aria-selected="true">Completed</a>
                            </li>
                          </ul>
                          <!-- Tabs navs -->
              
                          <!-- Tabs content -->
                          <div class="tab-content" id="ex1-content">
                            <div class="tab-pane fade show active" id="ex1-tabs-1" role="tabpanel"
                              aria-labelledby="ex1-tab-1">
                              <ul class="list-group mb-0">
                                @if($all && !$active && !$completed)
                                {{-- here i willl display all the tasks no matter if they are active or not --}}

                                <!-- showing all the active tasks first -->
                                    @foreach ($activeTasks as $activeTask)
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 mb-2 rounded"
                                        style="background-color: #f4f6f7;">
                                    <div>                                        
                                    <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." />
                                        {{$activeTask->task_name}}</div>
                                        <a href="{{route("taskDetail", $activeTask->id)}}" class="btn btn-secondary">details</a>
                                        </li>
                                    @endforeach

                                    <!-- showing all the complited tasks -->
                                    @foreach ($complitedTasks as $compliteTask)
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 mb-2 rounded"
                                        style="background-color: #f4f6f7;">
                                        <div>                                        
                                            <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." />
                                        {{$compliteTask->task_name}}</div>
                                        <a href=" {{route("taskDetail", $compliteTask->id)}}" class="btn btn-secondary">details</a>
                                        </li>
                                    @endforeach

                                    
                                    <!--showing all active tasks -->
                                    @elseif(!$all && $active && !$completed)
                                    @foreach ($activeTasks as $activeTask)
                                    <li class="list-group-item d-flex justify-content-between align-items-center border-0 mb-2 rounded"
                                    style="background-color: #f4f6f7;">
                                    <div>                                        
                                        <a href="{{route('completeTask', $activeTask->id)}}"><input class="form-check-input me-2" type="checkbox" value="" aria-label="..." /></a>
                                        {{$activeTask->task_name}}</div>
                                        <a href="{{route("taskDetail", $activeTask->id)}}" class="btn btn-secondary">details</a>
                                    </li>
                                    @endforeach
                                    
                                    
                                    @elseif(!$all && !$active && $completed)
                                    @foreach ($completedTasks as $completedTask)
                                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 mb-2 rounded"
                                        style="background-color: #f4f6f7;">
                                        <div>                                        
                                        <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." />
                                        {{$completedTask->task_name}} hello</div>
                                        <div>
                                            <a href="{{route("taskDetail", $completedTask->id)}}" class="btn btn-secondary">details</a>
                                            <a href="{{route("deleteTask", $completedTask->id)}}" class="btn btn-danger">Delete</a>
                                        </div>
                                        </li>
                                    @endforeach
                               

                               {{-- @else  --}}
                                @endif
                                
                              </ul>
                            </div>
                            <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                              <ul class="list-group mb-0">
                                <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                                  style="background-color: #f4f6f7;">
                                  <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." />
                                  Morbi leo risus
                                </li>
                                <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                                  style="background-color: #f4f6f7;">
                                  <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." />
                                  Porta ac consectetur ac
                                </li>
                                <li class="list-group-item d-flex align-items-center border-0 mb-0 rounded"
                                  style="background-color: #f4f6f7;">
                                  <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." />
                                  Vestibulum at eros
                                </li>
                              </ul>
                            </div>
                            <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                              <ul class="list-group mb-0">
                                <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                                  style="background-color: #f4f6f7;">
                                  <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." checked />
                                  <s>Cras justo odio</s>
                                </li>
                                <li class="list-group-item d-flex align-items-center border-0 mb-2 rounded"
                                  style="background-color: #f4f6f7;">
                                  <input class="form-check-input me-2" type="checkbox" value="" aria-label="..." checked />
                                  <s>Dapibus ac facilisis in</s>
                                </li>
                              </ul>
                            </div>
                          </div>
                          <!-- Tabs content -->
              
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
