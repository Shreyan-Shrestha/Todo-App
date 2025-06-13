@extends('partials.layout')
        <style>
            *{
                list-style: none;
                  margin:0;
                }
            body{
                overflow-x: none;
            }    
            
        @media screen and (min-width: 600px){
            .content{
                margin: 8px 20px;
            }
        }
            .container{
                height: 100%;
                width: 100%;
                display : flex;
                justify-content: center;
            }
            .content{
                border-radius: 5px;
                height: auto;
                width:60vw;
                line-height: 10px;
                margin: 8px 300px;
                padding: 20px;
            }
            h2{
                text-align: center;
            }
            ul{
                float: left;
               
            }
            .todoitem{
                border : 2px solid burlywood;
                border-radius: 10px;
                padding: 0 10px;
                margin-right: 40px;
                display: flex;
                justify-content: space-between;
                width: 40vw;
                margin: 10px 0;
                align-items: center;
            }
    
            .todoitem-add{
                float: right;
                margin-right: 40px;
                padding: 0;
            }

            .btn-add{
                background: #4B6EAF;
                color: azure;
                margin-right: 40px;
                margin-bottom: 5px;
                height: 100%;
            }

              .btn_add_wrapper{
                height: 30px;
              }

            button{
                float: right;
                height: 30px;
                width: auto;
            }
            
            .btn_edit{
                background: green;
                margin-right: 5px;
            }

            .btn-del{
                background:rgb(170, 66, 62);
                color: white;
                margin-right: 2px;
            }

            .edit{
                justify-content: space-evenly;
                margin: 0 2px;
                width: fit-content;
            }

            form{
                width:fit-content
            }
            img{
                height: 55px;
                width: 55px;
                border-radius: 8px;
            }
            .img_wrapper{
             width: 50px;
             padding: 3px;
            }
            li{
                display: flex;
                justify-content: space-between;
                width: 100%;
                margin-left: 5px;
            }
            aside{
                display: flex;
                align-items: center;
                width: fit-content;
            }

            .todo_name{
                float: left;
                font-size: 20px;
            }

            .btn-login{
                background-color: #4B6EAF;
                color: white;
                margin-right: 8px;
            }

            a{
                text-decoration: none;
                color: white;
            }
            .user-login{
                width: auto;
                margin-bottom: 20px;
                margin-bottom: 40px;
            }
            div.header{
                position: sticky;
                top: 0;
                width: 100%;
                background: white;
                padding: 5px;
                margin-top: 10px;
            }
          
            .pages{
                border: 1px solid gray;
                background: rgb(204, 202, 202);
                height: auto;
                width: 100%;
                display: flex;
                justify-content: space-evenly;
                align-items: center;
            }
        </style>

@section('title', 'ToDo App | Home')

@section('content')
            
    <div class = "content">
        <div class="user-login">
            <button class="btn-login"><a href="/register">Signup</a></button>
            <div>
                <form method="POST" action="/logout">
                    @csrf
                    <button class ="btn-del" type="submit">Logout</button>
                </form>
            </div>
        </div>

        <div class="header">
            <h2 class = "todo">My To Do List</h2>
        </div>

        <div class="btn_add_wrapper">
            <a href="/add"><button class ="btn-add">ADD</button></a>
        </div>       

        <ul>
            @foreach ($todos as $todo)
                <div class ="todoitem">
                    <img src="{{ asset($todo['photo']) }}" alt="Task" onerror="this.src='https://placehold.co/400/transparent/4AD/?text=Task';">
                    <li>
                        <p class ="todo_name">{{ $todo['name'] }}</p>
                        <aside class="edit">
                            <div class="btn_aside">
                                <a href="/update/{{ $todo['id'] }}"><button class="btn_edit">Edit</button></a>
                            </div>
                            <div>
                                <form method="POST" action="/delete/{{ $todo['id'] }}">
                                    @csrf
                                    @method("DELETE")
                                    <button class ="btn-del" onclick="return confirm('Do you really want to delete student!')" type="submit">Delete</button>
                                </form>
                            </div>
                        </aside>
                    </li>
                </div>
            @endforeach
        </ul>
               
        <div class="pages">
            {{ $todos->links() }}
        </div>  
    </div>

    
@endsection
        



<!-- relative 
inline-flex 
items-center 
px-4 py-2 ml-3 
text-sm 
font-medium 
text-gray-700 
bg-white 
border border-gray-300 
leading-5 
rounded-md 
hover:text-gray-500 
focus:outline-none 
focus:ring 
ring-gray-300 
focus:border-blue-300 
active:bg-gray-100 
active:text-gray-700 
transition ease-in-out 
duration-150 
dark:bg-gray-800 
dark:border-gray-600 
dark:text-gray-300 
dark:focus:border-blue-700 
dark:active:bg-gray-700 
dark:active:text-gray-300 -->