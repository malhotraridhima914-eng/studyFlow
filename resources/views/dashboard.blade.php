<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>StudyFlow Dashboard Cards</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"/>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#F5F8FC;
}

.container{
    width:90%;
    max-width:1200px;
    margin:40px auto;
}

/* Dashboard */

.dashboard{

    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:25px;

}

.card{

    background:white;
    border-radius:20px;
    padding:25px;
    box-shadow:0 12px 30px rgba(0,0,0,.08);

    transition:.35s;

    border-top:5px solid #2563EB;

}

.card:hover{

    transform:translateY(-8px);

    box-shadow:0 18px 35px rgba(0,0,0,.15);

}

.card-header{

    display:flex;
    justify-content:space-between;
    align-items:center;

}

.icon{

    width:60px;
    height:60px;

    border-radius:50%;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:24px;

}

.blue{

    background:#DBEAFE;
    color:#2563EB;

}

.orange{

    background:#FFEDD5;
    color:#EA580C;

}

.green{

    background:#DCFCE7;
    color:#16A34A;

}

.red{

    background:#FEE2E2;
    color:#DC2626;

}

.card small{

    color:#64748B;
    font-size:15px;

}

.card h1{

    font-size:42px;
    color:#1E293B;
    margin-top:12px;

}

.card p{

    margin-top:12px;
    color:#64748B;
    font-size:14px;

}

.progress{

    margin-top:15px;

    width:100%;
    height:8px;

    background:#E2E8F0;

    border-radius:30px;

    overflow:hidden;

}

.fill{

    height:100%;
    background:#2563EB;

    

}

.fill2{


    background:#EA580C;

}

.fill3{


    background:#16A34A;

}

.fill4{


    background:#DC2626;

}

@media(max-width:768px){

.dashboard{

grid-template-columns:1fr;

}

}

</style>

</head>

<body>

<div class="container">

<section class="dashboard">

<div class="card">

<div class="card-header">

<div class="icon blue">

<i class="fa-solid fa-book-open"></i>

</div>

</div>

<small>Total Subjects</small>

<h1>{{ $subjects->count() }}</h1>

@if($subjects->count()==1)
<p>{{$subjects->count()}} Subject Added</p>
@else
<p>{{$subjects->count()}} Subjects Added</p>
@endif

<div class="progress">

<div class="fill"
    style="width:{{ min(($subjects->count()*100),100) }}%;">
</div>

</div>

</div>

<div class="card">

<div class="card-header">

<div class="icon orange">

<i class="fa-solid fa-list-check"></i>

</div>

</div>

<small>Total Tasks</small>

<h1>{{$tasks->count()}}</h1>

@if ($pendingTasks)
    <p>{{$pendingTasks}}
    {{$pendingTasks==1? 'Task':'Tasks'}}
    pending</p>
    
@else
<p>There are currently no pending tasks.</p>
    
@endif

<div class="progress">

<div class="fill fill2"
style="width:{{ $tasks->count() ? (($completedTasks/$tasks->count())*100):0 }}%;">
</div>

</div>

</div>

<div class="card">

<div class="card-header">

<div class="icon green">

<i class="fa-solid fa-circle-check"></i>

</div>

</div>

<small>Completed</small>

<H1>{{$completedTasks}}<H1>

<p>{{ $tasks->count() ? ($completedTasks/$tasks->count()*100):0}}% Completed</p>

<div class="progress">

<div class="fill fill3"
    style="width:{{ $tasks->count() ? (($completedTasks/$tasks->count())*100):0 }}%;">
</div>

</div>

</div>

<div class="card">

<div class="card-header">

<div class="icon red">

<i class="fa-solid fa-calendar-days"></i>

</div>

</div>

<small>Upcoming Exams</small>

<h1>{{$exams->count()}}</h1>

@if($nextExam)
    @if(today()->diffInDays($nextExam->date)==1)
        <p>Tomorrow is your <span>{{ $nextExam->type }}</span></p>
    @elseif(today()->diffInDays($nextExam->date)==0)
        <p>Today is your <span>{{ $nextExam->type }}</span></p>
    @else
    <p>
        next
        <span>{{ $nextExam->type }}</span>
        in 
        {{today()->diffInDays($nextExam->date)}}
        days
    </p>
    @endif
@else
<p>No Upcoming Exams</p>
@endif

<div class="progress">

    <div class="fill fill4"
    style="width:{{ $totalexams > 0 ? ($completedExams / $totalexams) * 100 : 0 }}%;">
    </div>

</div>

</div>

</section>

</div>

</body>
</html>