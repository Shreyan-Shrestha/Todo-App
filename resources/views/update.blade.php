@extends('partials.layout')

@section('title', 'ToDo App | Add Task')

    <style>
        .container{
                margin-top: 50px;
                padding: 5px;
                height: 300px;
                width: 100%;
                display : flex;
                justify-content: center;
        }
        .content{
            border-radius: 5px;
            height: auto;
            width:500px;
            max-width: 850px;
            line-height: 10px;
            margin: 8px 20px;
            padding: 10px; 
        }
        .footer{
            width: 100%;
            display: flex;
            justify-content: flex-end;
            margin-top: 5px;        
        }

        .form{
            line-height: 10px;       
        }
        h2{
            text-align: center;
        }
        .cancel{
            margin-right: 4px;
            background: rgb(150, 41, 41);
            color: white;
        }
        .add{
            background:rgb(56, 115, 182);
            color: white;
        }
        input{
            width: 100%;
            margin: 8px 0;
        }
        label{
            margin-left: 5px;
        }
    </style>
</head>

@section('content')
             <div class="content">
            <h2>Edit Task</h2><br>
            @if ($errors->any())
            <div>
                <strong>Whoops!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    <li></li>
                </ul>
            </div>
            @endif

            <form class="form" method="POST" action="/update/{{ $todo['id'] }}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <input value="{{ $todo['id'] }}" name="id"hidden> 
                <div>
                     <label for="name">Task:</label><br>
                    <input type="text" name="name" id="todo_name" value="{{ $todo['name'] }}" required>
                </div>
                
                <div>
                    <label for="priority">Priority:</label><br>
                    <input type="number" name="priority" id="priority" value="{{ $todo['priority'] }}" required>
                </div>
                 
    
                <div>
                    <label for="photo">Image:</label><br>
                    <input type="file" id="image" name="photo">
                </div> 

                <div class="footer">
                     <a href="/" ><button class="cancel" type="button">Cancel</button></a>
                     <button class="add" type="submit">Add</button>
                </div>
            </form>
            
        </div>
@endsection
       
