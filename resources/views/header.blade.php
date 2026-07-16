<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>StudyFlow</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>

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
    max-width:1250px;
    margin:auto;
}

header{

    margin-top:30px;

}

/* Navigation */

nav{

    display:flex;
    justify-content:space-between;
    align-items:center;

}

.logo{

    display:flex;
    align-items:center;
    gap:15px;

}

.logo i{

    font-size:35px;
    color:#2563EB;

}

.logo h2{

    font-size:28px;
    color:#1E293B;

}

.logo span{

    color:#64748B;
    font-size:14px;

}

/* Right Side */

.right-nav{

    display:flex;
    align-items:center;
    gap:25px;

}

.date{

    display:flex;
    align-items:center;
    gap:10px;
    color:#334155;
    font-weight:500;

}

.date i{

    color:#2563EB;
    font-size:20px;

}

.profile{

    width:48px;
    height:48px;
    border-radius:50%;
    background:#2563EB;
    color:white;

    display:flex;
    justify-content:center;
    align-items:center;

    cursor:pointer;
    transition:.3s;

}

.profile:hover{

    transform:scale(1.08);

}

/* Hero */

.hero{

    margin-top:35px;

    background:linear-gradient(135deg,#2563EB,#60A5FA);

    color:white;

    border-radius:22px;

    padding:45px;

    display:flex;

    justify-content:space-between;

    align-items:center;

}

.hero-left h1{

    font-size:42px;
    margin-bottom:12px;

}

.hero-left p{

    font-size:18px;
    opacity:.95;
    max-width:550px;

}

.hero-btn{

    margin-top:30px;

    display:inline-block;

    padding:14px 28px;

    background:white;

    color:#2563EB;

    text-decoration:none;

    font-weight:600;

    border-radius:12px;

    transition:.3s;

}

.hero-btn:hover{

    transform:translateY(-4px);

}

.hero-right{

    background:rgba(255,255,255,.15);

    backdrop-filter:blur(12px);

    border-radius:20px;

    padding:30px;

    min-width:260px;

}

.hero-right h3{

    margin-bottom:20px;

}

.hero-right p{

    margin:12px 0;

    font-size:17px;

}

.hero-right span{

    font-weight:bold;

}

@media(max-width:900px){

.hero{

flex-direction:column;
align-items:flex-start;
gap:30px;

}

.hero-left h1{

font-size:32px;

}

}

</style>

</head>
<body>

<div class="container">

<header>

<nav>

<div class="logo">

<i class="fa-solid fa-book-open-reader"></i>

<div>

<h2>StudyFlow</h2>

<span>Study Planner & Exam Tracker</span>

</div>

</div>

<div class="right-nav">

<div class="date">

<i class="fa-solid fa-calendar-days"></i>

<span id="date"></span>

</div>

<div class="profile">

<i class="fa-solid fa-user"></i>

</div>

</div>

</nav>

<div class="hero">

<div class="hero-left">

<h1 id="greeting">
</h1>

<p>

Stay focused and keep moving toward your goals.
Track your subjects, assignments and exams from one place.

</p>

<a href="#" class="hero-btn">

View Today's Tasks

</a>

</div>

<div class="hero-right">

<h3>Today's Overview</h3>

<p>📚 Subjects : <span>{{$subjects->count()}}</span></p>

<p>📝 Pending Tasks : <span>{{$pendingTasks}}</span></p>

<p>📅 Upcoming Exams : <span>{{$exams->count()}}</span></p>

<p>🔥 Completion Rate : <span>{{$completedTasks/$tasks->count()*100}}%</span></p>

</div>

</div>

</header>

</div>

</body>
</html>

<script>

// Greeting

function updateGreeting(){

    const hour = new Date().getHours();

    let greeting="";

    if(hour>=5 && hour<12){

        greeting="Good Morning, Student! 👋";

    }

    else if(hour>=12 && hour<17){

        greeting="Good Afternoon, Student! 👋";

    }

    else if(hour>=17 && hour<21){

        greeting="Good Evening, Student! 👋";

    }

    else{

        greeting="Good Night, Student! 🌙";

    }

    document.getElementById("greeting").textContent=greeting;

}

// Date

function updateDate(){

    const today=new Date();

    const options={

        weekday:'long',
        day:'numeric',
        month:'long',
        year:'numeric'

    };

    document.getElementById("date").textContent=
    today.toLocaleDateString('en-IN',options);

}

// Run

updateGreeting();

updateDate();

// Update every minute

setInterval(function(){

    updateGreeting();

    updateDate();

},60000);

</script>