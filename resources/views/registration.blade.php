@extends('partials.layout')

@section('title','ToDo App | Signup')

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

         input{
            width: 100%;
            margin: 8px 0;
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
         a{
                text-decoration: none;
                color: white;
                background:rgb(158, 46, 38);
            }
</style>
@section('content')
<div class="content">
        <h2>Welcome 🤗!</h2>
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
       <form class="form" method="POST" action="/register">
                @csrf
                <div>
                     <label for="name">Name:</label>
                    <input type="text" name="name" required>
                </div>
                
                <div>
                    <label for="email">Email:</label><br>
                    <input type="text" name="email" required>
                </div>
                 
    
                <div>
                    <label for="password">Password:</label><br>
                    <input type="password" id="password" name="password" required>
                </div> 

                <div class="footer">
                     <button class="cancel"><a href="/">Cancel</a></button>
                     <button class="add" type="submit">Register</button>
                </div>
    </div>
@endsection