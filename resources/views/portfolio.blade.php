<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>

    <style>
        body{
            margin:0;
            font-family: "Arial";
            background:#f4f4f4;
        }

        header{
            background:#222;
            color:white;
            padding:50px 0;
            text-align:center;
        }

        section{
            width:80%;
            margin:50px auto;
            background:white;
            padding:30px;
            border-radius:10px;
            box-shadow:0 0 10px #ddd;
        }

        h2{
            margin-top:0;
            color:#333;
        }

        /* About Section */
        .about-box{
            display:flex;
            gap:30px;
            align-items:center;
        }
        .about-box img{
            width:180px;
            height:180px;
            border-radius:50%;
            object-fit:cover;
        }

        /* Skills Section */
        .skills-list{
            display:flex;
            gap:20px;
            flex-wrap:wrap;
        }
        .skill{
            background:#222;
            color:white;
            padding:10px 20px;
            border-radius:20px;
        }

        /* Projects Section */
        .projects{
            display:flex;
            gap:20px;
            flex-wrap:wrap;
        }
        .project-card{
            width:250px;
            background:#fff;
            border-radius:10px;
            padding:20px;
            box-shadow:0 0 10px #ccc;
        }
        .project-card h3{
            margin:0;
        }

        /* Contact Section */
        .contact-form input,
        .contact-form textarea{
            width:100%;
            padding:10px;
            margin-top:10px;
            border:1px solid #ccc;
            border-radius:5px;
        }
        .contact-form button{
            margin-top:15px;
            padding:10px 20px;
            background:#222;
            color:white;
            border:none;
            border-radius:5px;
            cursor:pointer;
        }
        .contact-form button:hover{
            background:black;
        }

    </style>

</head>

<body>

<header>
    <h1>My Portfolio</h1>
    <p>Web Developer | Designer | Freelancer</p>
</header>

<!-- ABOUT SECTION -->
<section id="about">
    <h2>About Me</h2>

    <div class="about-box">
        <img src="https://via.placeholder.com/200" alt="profile">
        <div>
            <p>Hello! I am a passionate Web Developer with experience in HTML, CSS, JavaScript, and Laravel.  
            I love creating modern, responsive, and user-friendly web applications.</p>
        </div>
    </div>
</section>

<!-- SKILLS SECTION -->
<section id="skills">
    <h2>My Skills</h2>
    <div class="skills-list">
        <span class="skill">HTML</span>
        <span class="skill">CSS</span>
        <span class="skill">JavaScript</span>
        <span class="skill">PHP</span>
        <span class="skill">Laravel</span>
        <span class="skill">MySQL</span>
        <span class="skill">Git</span>
    </div>
</section>

<!-- PROJECTS SECTION -->
<section id="projects">
    <h2>My Projects</h2>

    <div class="projects">
        <div class="project-card">
            <h3>Portfolio Website</h3>
            <p>A personal portfolio built using Laravel & TailwindCSS.</p>
        </div>

        <div class="project-card">
            <h3>Blog System</h3>
            <p>Dynamic blog with admin panel, login, and CRUD operations.</p>
        </div>

        <div class="project-card">
            <h3>E-Commerce</h3>
            <p>Online shopping system with cart & product management.</p>
        </div>
    </div>
</section>

<!-- CONTACT SECTION -->
<section id="contact">
    <h2>Contact Me</h2>

    <form class="contact-form">
        <input type="text" placeholder="Your Name">
        <input type="email" placeholder="Your Email">
        <textarea rows="5" placeholder="Your Message"></textarea>
        <button>Send Message</button>
    </form>
</section>

</body>
</html>
