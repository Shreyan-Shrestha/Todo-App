@extends ('partials.layout')

@section('title', 'Todo App | Login' )

<style>
    *{
        list-style: none;
    }
    .container{
                margin-top: 50px;
                padding: 5px;
                height: 300px;
                width: 100vw;
                display : flex;
                justify-content: center;
        }
        .content{
            height: auto;
            width:500px;
            max-width: 850px;
            line-height: 10px;
            margin: 8px 20px;
            padding: 10px; 
        }

         h2{
            text-align: center;
        }

        .footer{
            width: 100%;
            display: flex;
            justify-content: flex-end;
            margin-top: 5px;        
        }

         input{
            width: 100%;
            height: 30px;
            margin: 8px 0;
        }

        label{
            margin-left: 5px;
        }

         a{
                text-decoration: none;
                color: white;
                background:rgb(158, 46, 38);
            }

        .btn_login{
            background:rgb(56, 115, 182);
            color: white;
            width: 100%;
            height: 30px;
            font-size: 18px;
            font-family: 'Times New Roman', Times, serif;
        }
        .btn_cancel{
            background:rgb(158, 46, 38);
            color: white;
            width: 100%;
            height: 30px;
            font-size: 18px;
            font-family: 'Times New Roman', Times, serif;
            margin-right: 8px;
        }

        .error{
            width: auto;
            padding: 8px;
            border: 2px solid red;
            margin-bottom: 10px;
        }

        #error_txt{
            color: red;
        }
        .loginbox{
            border: 1px solid gray;
            border-radius: 8px;
            padding: 5x;
        }
    </style>
@section('content')
    <div class="content">
        <h2>Welcome Back!</h2>

         @if ($errors->any())
            <div class="error">
                <h2><strong>Whoops!</strong></h2>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li><p id="error_txt">{{ $error }}</p></li>
                    @endforeach
                    <li></li>
                </ul>
            </div>
            @endif
        <div class ="loginbox">
            <form class="login" method="POST" action="/login">
            @csrf
            <label for="email" id="email">Email:</label>
            <input type="text" name="email" placeholder="Enter Email">
            <label for="password" id ="password">Password:</label>
            <input type="password" name="password" placeholder="Enter Password">
            <div class="footer">
            <button class="btn_cancel"><a href="/">Cancel</a></button>
            <button class="btn_login" type="submit">Login</button>
            </div>
        </form>
        </div>    
        
    </div>
@endsection