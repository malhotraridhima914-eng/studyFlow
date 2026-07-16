<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Exams</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            background:#F4F7FC;
            padding:40px;
        }

        .container{
            max-width:900px;
            margin:auto;
        }

        h1{
            margin-bottom:25px;
            color:#1E3A8A;
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
            border-radius:12px;
            overflow:hidden;
            box-shadow:0 5px 15px rgba(0,0,0,.1);
        }

        th{
            background:#2563EB;
            color:white;
            padding:18px;
        }

        td{
            padding:18px;
            text-align:center;
            border-bottom:1px solid #eee;
        }

        tr:hover{
            background:#f8f9ff;
        }

        .edit{

            background:#16A34A;
            color:white;
            text-decoration:none;
            padding:8px 18px;
            border-radius:8px;

        }

        .delete{

            background:#DC2626;
            color:white;
            text-decoration:none;
            padding:8px 18px;
            border-radius:8px;

        }

        .add{

            display:inline-block;
            margin-bottom:20px;
            background:#2563EB;
            color:white;
            text-decoration:none;
            padding:12px 20px;
            border-radius:8px;

        }

    </style>

</head>

<body>

<div class="container">

<h1>Manage Exams</h1>

<a href="/Exam" class="add">
+ Add Exams
</a>

<table>

<tr>

<th>ID</th>

<th>Exam</th>

<th>Date</th>

<th>Edit</th>

<th>Delete</th>

</tr>

@foreach($exam as $exam)

<tr>

<td>{{ $exam->id }}</td>

<td>{{ $exam->exam_name }}</td>

<td>{{$exam->date}}</td>

<td>

<a href="/Exam/{{ $exam->id }}/edit" class="edit">

✏ Edit

</a>

</td>

<td>

<form action="/Exam/{{ $exam->id }}/delete" method="POST">
    @csrf
    @method("DELETE")

<button type="submit" class="delete">

🗑 Delete

</button>

</form>

</td>

</tr>

@endforeach

</table>

</div>

</body>

</html>