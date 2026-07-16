<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>StudyFlow Footer</title>

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


/* Footer */

footer{

    margin-top:0;
    background:#0F172A;
    color:white;
    padding:50px 8% 20px;

}

.footer-container{

    display:flex;
    justify-content:space-between;
    flex-wrap:wrap;
    gap:40px;

}

/* Logo */

.footer-logo{

    flex:1;
    min-width:250px;

}

.footer-logo h2{

    font-size:28px;
    margin-bottom:10px;
    color:#60A5FA;

}

.footer-logo p{

    color:#CBD5E1;
    line-height:1.8;

}

/* Links */

.footer-links{

    flex:1;
    min-width:180px;

}

.footer-links h3{

    margin-bottom:18px;

}

.footer-links ul{

    list-style:none;

}

.footer-links ul li{

    margin-bottom:12px;

}

.footer-links ul li a{

    text-decoration:none;
    color:#CBD5E1;
    transition:.3s;

}

.footer-links ul li a:hover{

    color:#60A5FA;
    padding-left:5px;

}

/* Social Icons */

.footer-social{

    flex:1;
    min-width:200px;

}

.footer-social h3{

    margin-bottom:18px;

}

.icons{

    display:flex;
    gap:15px;

}

.icons a{

    width:45px;
    height:45px;

    background:#1E293B;

    border-radius:50%;

    display:flex;
    justify-content:center;
    align-items:center;

    color:white;
    text-decoration:none;

    transition:.3s;

}

.icons a:hover{

    background:#2563EB;
    transform:translateY(-5px);

}

/* Bottom */

.footer-bottom{

    margin-top:40px;
    border-top:1px solid rgba(255,255,255,.15);

    padding-top:20px;

    display:flex;
    justify-content:space-between;
    flex-wrap:wrap;

    color:#CBD5E1;
    font-size:15px;

}

.footer-bottom span{

    color:#60A5FA;

}

@media(max-width:768px){

.footer-container{

    flex-direction:column;

}

.footer-bottom{

    flex-direction:column;
    gap:10px;
    text-align:center;

}

}

</style>

</head>

<body>

<div class="content"></div>

<footer>

<div class="footer-container">

<div class="footer-logo">

<h2>StudyFlow</h2>

<p>

Organize your subjects, manage study tasks,
track upcoming exams and stay productive every day.

</p>

</div>

<div class="footer-links">

<h3>Quick Links</h3>

<ul>

<li><a href="#">Dashboard</a></li>

<li><a href="#">Subjects</a></li>

<li><a href="#">Tasks</a></li>

<li><a href="#">Upcoming Exams</a></li>

</ul>

</div>

<div class="footer-social">

<h3>Connect</h3>

<div class="icons">

<a href="#"><i class="fab fa-github"></i></a>

<a href="#"><i class="fab fa-linkedin-in"></i></a>

<a href="#"><i class="fab fa-instagram"></i></a>

<a href="#"><i class="fas fa-envelope"></i></a>

</div>

</div>

</div>

<div class="footer-bottom">

<p>© 2026 StudyFlow. All Rights Reserved.</p>

<p>Designed with ❤️ by <span>Ridhima Malhotra</span></p>

</div>

</footer>

</body>
</html>