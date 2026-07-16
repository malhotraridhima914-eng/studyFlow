<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<title>Edit Subject</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial;
}

body{

background:#EEF4FF;
display:flex;
justify-content:center;
align-items:center;
height:100vh;

}

.card{

width:420px;
background:white;
padding:35px;
border-radius:15px;
box-shadow:0 5px 20px rgba(0,0,0,.15);

}

h2{

margin-bottom:25px;
color:#1E3A8A;

}

label{

display:block;
margin-bottom:8px;
font-weight:600;

}

input{

width:100%;
padding:12px;
border:1px solid #ddd;
border-radius:8px;
margin-bottom:20px;

}

button{

width:100%;
padding:12px;
background:#2563EB;
color:white;
border:none;
border-radius:8px;
cursor:pointer;
font-size:16px;

}

button:hover{

background:#1D4ED8;

}

</style>

</head>

<body>

<div class="card">

<h2>Edit Task</h2>

<form action="/Task/{{ $task->id }}/update" method="POST">

@csrf
@method('PUT')

<label>Task Name</label>

<input
type="text"
name="task_name"
value="{{ $task->task_name }}"
>

<button>

Update Task

</button>

</form>

</div>

</body>

</html>