@extends('layouts.app')

@section('content')
    

    <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
       

        <!-- @include('common.errors') -->

        <!-- New Task Form -->
        <form action="/task" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">TASK LIST</label>


                <div class="input">
                    <input type="text" name="name" id="task-name" class="form-control" placeholder="Your Task...">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- TODO: Current Tasks -->

    <!-- Current Tasks -->
    @if (count($tasks) > 0)
        <div class="panel panel-default">
            

            <div class="panel-body">
                <table class="table table-striped task-table">
                
                  

                    <!-- Table Headings -->
                    <thead class="panel-heading"> 
                        <th>Current Tasks</th>
                        
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                

                                <td>


                                    <!-- TODO: Delete Button -->

                                    <tr>
                                        <!-- Task Name -->
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>

                                        <!-- Delete Button -->
                                        <td class="del-td">
                                            <form action="/task/{{ $task->id }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button class="del-btn">Delete Task</button>
                                            </form>
                                        </td>
                                    </tr>

                                </td>
                            </tr>
                            @include('sweetalert::alert')
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
      
    @endif

@endsection