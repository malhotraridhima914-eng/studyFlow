<style>

a{
    text-decoration: none;
    color: inherit;
}

.main-grid{

    display:grid;
    grid-template-columns:1fr 1fr;
    gap:25px;
    margin-top:35px;

}

/* Left Side */

.actions{

    background:white;
    padding:25px;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    max-height: 500px;
    overflow-y: auto;

}

.actions h2{

    margin-bottom:20px;
    color:#1E293B;

}

.action-btn{

    width:100%;
    padding:18px;

    margin-bottom:15px;

    border:none;

    border-radius:12px;

    background:#2563EB;

    color:white;

    font-size:16px;

    cursor:pointer;

    transition:.3s;

}

.action-btn:hover{

    background:#1D4ED8;

    transform:translateY(-3px);

}

/* Right Side */

.right-panel{

    display:flex;

    flex-direction:column;

    gap:20px;

}

.box{

    background:white;

    border-radius:20px;

    padding:22px;

    box-shadow:0 10px 25px rgba(0,0,0,.08);

}

.box h2{

    margin-bottom:18px;

    color:#1E293B;

}

.item{

    display:flex;

    justify-content:space-between;

    align-items:center;

    padding:12px 0;

    border-bottom:1px solid #eee;

}

.item:last-child{

    border:none;

}

.badge{

    background:#DBEAFE;

    color:#2563EB;

    padding:6px 12px;

    border-radius:30px;

    font-size:13px;

    font-weight:600;

}

.task{

    display:flex;

    align-items:center;

    gap:10px;

    padding:12px 0;

    border-bottom:1px solid #eee;

}

.task:last-child{

    border:none;

}

.task input{

    width:18px;

    height:18px;

}
.right-panel{
    max-height: 500px;
    overflow-y: auto;
}

@media(max-width:900px){

.main-grid{

grid-template-columns:1fr;

}

}

</style>

<section class="main-grid">

<div class="actions">

<h2>Quick Actions</h2>

<a href='Sub'>
<button class="action-btn">
<i class="fa-solid fa-book"></i>
&nbsp;
Add Subject
</button>
</a>


<a href="/ManageSubjects">
    <button class="action-btn">
    📚 Manage Subjects
    </button>
    </a>

<a href="Task">
<button class="action-btn">
<i class="fa-solid fa-list-check"></i>
&nbsp;
Add Task
</button>
</a>

<a href="/ManageTasks">
<button class="action-btn">
    <i class="fa-solid fa-clipboard-check"></i>
    &nbsp;
    Manage Tasks
</button>
</a>

<a href="Exam">
<button class="action-btn">
<i class="fa-solid fa-calendar-plus"></i>
&nbsp;
Add Exam
</button>
</a>

<a href="/ManageExams">
    <button class="action-btn">
        <i class="fa-solid fa-book-open"></i>
        &nbsp;
        Manage Exams
    </button>
    </a>

</div>

<div class="right-panel">

<div class="box">

<h2>Upcoming Exams</h2>
@if($exams->count())

@foreach($exams as $exam)

<div class="task-item">
    <span>
        {{ $exam->exam_name }} -
        @if(today()->isSameDay($exam->date))
            Today
        @elseif(today()->diffInDays($exam->date) == 1)
            Tomorrow
        @else
            In {{ today()->diffInDays($exam->date) }} days
        @endif
    </span>
</div>

@endforeach
@else
    <p>No Exams added yet.</p>
@endif


<div class="box">

<h2>Today's Tasks</h2>

@if($tasks->count())
@foreach($tasks as $task)

<div class="task-item">
    <form action="/task/{{ $task->id }}/complete" method="POST">
        @csrf
    <input type="checkbox"
    onchange="this.form.submit()"
    @if($task->completed)
    checked
    @endif>
</form>
    <span>{{ $task->task_name}} ({{$task->subject}})
    </span>
</div>

@endforeach
@else
<p>No tasks added yet.</p>
@endif
</div>

</div>

</div>

</section>