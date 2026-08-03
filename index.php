<?php
require_once 'includes/config.php';
require_once 'includes/send_mail.php';

$success_msg = $error_msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_submit'])) {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $mail_error = null;
            $emailSent = sendContactEmail($name, $email, $subject, $message, $mail_error);

            if ($emailSent) {
                try {
                    $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
                    $stmt->execute([$name, $email, $subject, $message]);
                } catch (PDOException $e) {
                    // Message was delivered by email; keep success for the visitor.
                }
                $success_msg = "Your message has been successfully sent! Thank you.";
            } else {
                $error_msg = $mail_error ?? "Could not send your message right now. Please try again or email aadimodi21@gmail.com directly.";
            }
        } else {
            $error_msg = "Please enter a valid email address.";
        }
    } else {
        $error_msg = "Please fill in all required fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aditya Alkeshkumar Modi — Aspiring IT Professional & Creative Designer</title>
    <meta name="description" content="Portfolio of Aditya Alkeshkumar Modi - aspiring IT professional, cybersecurity student, UI/UX designer, and digital marketer.">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/animations.css">
</head>
<body>

    <div class="cursor-dot"></div>
    <div class="cursor-outline"></div>

    <div class="bg-grid"></div>
    <div class="blur-circle circle-1"></div>
    <div class="blur-circle circle-2"></div>

    <header>
        <div class="nav-container">
            <a href="#home" class="logo">
                <img src="assets/images/logo.svg" alt="Aditya logo" class="site-logo">
                <span class="logo-text">Aditya</span>
            </a>
            <ul class="nav-menu">
                <li><a href="#home" class="nav-link active">Home</a></li>
                <li><a href="#about" class="nav-link">About</a></li>
                <li><a href="#experience" class="nav-link">Experience</a></li>
                <li><a href="#skills" class="nav-link">Skills</a></li>
                <li><a href="#projects" class="nav-link">Projects</a></li>
                <li><a href="#education" class="nav-link">Education</a></li>
                <li><a href="#contact" class="nav-link">Contact</a></li>
            </ul>
            <a href="#contact" class="resume-btn-nav">Contact Me</a>
        </div>
    </header>

    <section id="home">
        <div class="hero-grid">
            <div class="hero-content reveal-fade-up">
                <div class="badge">
                    <span></span> Aspiring IT Professional & Creative Designer
                </div>
                <h1>Hi, I'm <br><span>Aditya Alkeshkumar Modi</span></h1>
                <div class="typing-container">
                    I am a <span class="typing-text"></span>
                </div>
                <p class="hero-desc">
                    Motivated and hardworking M.Sc. Cybersecurity student combining programming knowledge, IT concepts, and creative problem-solving to build practical digital experiences.
                </p>
                <div class="hero-buttons">
                    <a href="#projects" class="btn-primary-custom">View Work <i class="fa-solid fa-arrow-right"></i></a>
                    <a href="#contact" class="btn-secondary-custom">Contact Me</a>
                </div>
                <div class="hero-meta">
                    <div><i class="fa-solid fa-location-dot"></i> Mahesana, Gujarat, India</div>
                    <div><i class="fa-solid fa-envelope"></i> imadityamodi@gmail.com</div>
                    <div><i class="fa-solid fa-phone"></i> +91 8320224997</div>
                </div>
                <div class="stats-grid glass-card">
                    <div class="stat-item">
                        <h3>2+</h3>
                        <p>Internships</p>
                    </div>
                    <div class="stat-item">
                        <h3>4+</h3>
                        <p>Projects</p>
                    </div>
                    <div class="stat-item">
                        <h3>100%</h3>
                        <p>Growth Mindset</p>
                    </div>
                </div>
            </div>
            <div class="hero-image-wrapper reveal-fade-up">
                <div class="hero-image-frame">
                    <img src="assets/images/hero-profile.png" alt="Aditya Alkeshkumar Modi">
                </div>
                <div class="floating-icon icon-1"><i class="fa-solid fa-laptop-code"></i></div>
                <div class="floating-icon icon-2"><i class="fa-solid fa-code"></i></div>
                <div class="floating-icon icon-3"><i class="fa-solid fa-chart-line"></i></div>
            </div>
        </div>
    </section>

    <section id="about">
        <div class="section-subtitle">Professional Profile</div>
        <h2 class="section-title">About Me</h2>
        <div class="about-grid">
            <div class="about-text glass-card" style="padding: 40px;">
                <h3>Bridging engineering discipline and modern design</h3>
                <p>
                    I am a motivated and hardworking M.Sc. Cybersecurity student applying my programming knowledge, IT concepts, and creative problem-solving skills to build real-world digital experiences.
                </p>
                <p>
                    Dedicated to continuous learning, I am committed to contributing through technical proficiency and modern design sensibilities. I believe that the best products are born at the intersection of logical problem-solving and thoughtful user experience.
                </p>
            </div>
            <div class="timeline-box">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-date">Current Focus</div>
                        <div class="timeline-title">M.Sc. Cybersecurity</div>
                        <div class="timeline-desc">Deepening knowledge in cybersecurity, network security, ethical hacking, and digital forensics.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">Practical Experience</div>
                        <div class="timeline-title">SEO & UI/UX Internships</div>
                        <div class="timeline-desc">Building capability in digital marketing, search optimization, and user-centered design.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">Foundation</div>
                        <div class="timeline-title">B.Sc. CA & IT</div>
                        <div class="timeline-desc">Developed a strong base in programming, web development, databases, and IT fundamentals.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="skills">
        <div class="section-subtitle">Expertise.</div>
        <h2 class="section-title">Expertise.</h2>
        <div class="expertise-grid">
            <div class="expertise-column">
                <h3 class="expertise-title">SEO & Digital Marketing</h3>
                <p class="expertise-meta">Synectus Pvt Ltd</p>
                <div class="expertise-tags">
                    <span class="expertise-tag">Search Engine Optimization (SEO)</span>
                    <span class="expertise-tag">On-Page SEO</span>
                    <span class="expertise-tag">Off-Page SEO</span>
                    <span class="expertise-tag">Keyword Research</span>
                    <span class="expertise-tag">Competitive Analysis</span>
                    <span class="expertise-tag">Google Search Console</span>
                    <span class="expertise-tag">SEO Auditing</span>
                    <span class="expertise-tag">Web Content Optimization</span>
                    <span class="expertise-tag">Online Marketing</span>
                    <span class="expertise-tag">Social Media</span>
                    <span class="expertise-tag">Website Auditing</span>
                </div>
            </div>

            <div class="expertise-column">
                <h3 class="expertise-title">UI/UX & Design</h3>
                <p class="expertise-meta">Infotact Solutions</p>
                <div class="expertise-tags">
                    <span class="expertise-tag">Figma</span>
                    <span class="expertise-tag">Basic UI/UX Design</span>
                    <span class="expertise-tag">Responsive Web Design</span>
                    <span class="expertise-tag">Web Designing</span>
                    <span class="expertise-tag">Graphic Designing</span>
                    <span class="expertise-tag">Digital Marketing</span>
                    <span class="expertise-tag">Canva</span>
                </div>
            </div>

            <div class="expertise-column">
                <h3 class="expertise-title">Programming & Web Development</h3>
                <p class="expertise-meta">Ganpat University</p>
                <div class="expertise-tags">
                    <span class="expertise-tag">HTML5</span>
                    <span class="expertise-tag">CSS3</span>
                    <span class="expertise-tag">JavaScript</span>
                        <span class="expertise-tag">Python</span>
                    <span class="expertise-tag">PHP</span>
                    <span class="expertise-tag">MySQL</span>
                    <span class="expertise-tag">C</span>
                    <span class="expertise-tag">C++</span>
                    <span class="expertise-tag">.NET Framework</span>
                    <span class="expertise-tag">Web Development</span>
                    <span class="expertise-tag">Website Building</span>
                </div>
            </div>

            <div class="expertise-column">
                <h3 class="expertise-title">Tools & Software</h3>
                <p class="expertise-meta">Personal Toolkit</p>
                <div class="expertise-tags">
                    <span class="expertise-tag">VSCode</span>
                    <span class="expertise-tag">Visual Studio</span>
                    <span class="expertise-tag">XAMPP</span>
                    <span class="expertise-tag">MS Office</span>
                </div>

                <h3 class="expertise-title expertise-subsection">Interpersonal Skills</h3>
                <div class="expertise-tags">
                    <span class="expertise-tag">Quick Learner</span>
                    <span class="expertise-tag">Time Management</span>
                    <span class="expertise-tag">Teamwork</span>
                    <span class="expertise-tag">Communication</span>
                </div>
            </div>
        </div>
    </section>

    <section id="projects">
        <div class="section-subtitle">Selected Work</div>
        <h2 class="section-title">Featured Projects</h2>
        <div class="projects-grid">
            <div class="project-card glass-card">
                <div class="project-img">
                    <img src="assets/images/project-ecommerce.svg" alt="E-Commerce Mobile Accessories">
                </div>
                <div class="project-content">
                    <h3 class="project-title">E-Commerce Mobile Accessories</h3>
                    <p class="project-desc">Built a secure and user-friendly e-commerce website for mobile accessories featuring instant feedback, AI chatbot support, and faster order processing to improve the shopping experience.</p>
                    <div class="project-tags">
                        <span class="project-tag">PHP</span>
                        <span class="project-tag">MySQL</span>
                        <span class="project-tag">JavaScript</span>
                        <span class="project-tag">HTML/CSS</span>
                    </div>
                    <div class="project-links">
                        <a href="https://github.com/Aditya-modi1511" target="_blank" class="project-link"><i class="fa-brands fa-github"></i> Code</a>
                        <a href="#home" class="project-link"><i class="fa-solid fa-external-link"></i> Live Demo</a>
                    </div>
                </div>
            </div>

            <div class="project-card glass-card">
                <div class="project-img">
                    <img src="assets/images/project-portfolio.svg" alt="Portfolio Website">
                </div>
                <div class="project-content">
                    <h3 class="project-title">Portfolio Website</h3>
                    <p class="project-desc">Designed a fully responsive portfolio website with Home, About, Skills, Projects, Certificates, Hobbies, and Contact sections with a clean layout and mobile optimization.</p>
                    <div class="project-tags">
                        <span class="project-tag">React</span>
                        <span class="project-tag">Tailwind CSS</span>
                        <span class="project-tag">Framer Motion</span>
                    </div>
                    <div class="project-links">
                        <a href="https://github.com/Aditya-modi1511" target="_blank" class="project-link"><i class="fa-brands fa-github"></i> Code</a>
                        <a href="#home" class="project-link"><i class="fa-solid fa-external-link"></i> Live Demo</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="experience">
        <div class="section-subtitle">Career Path</div>
        <h2 class="section-title">Experience</h2>
        <div class="dual-grid" style="margin-top: 40px;">
            <div class="resume-section-box glass-card" style="padding: 35px;">
                <h3><i class="fa-solid fa-briefcase"></i> Professional Experience</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-date">Feb 2026 – Jul 2026 · 6 mos</div>
                        <div class="timeline-title">SEO Intern • Synectus Pvt Ltd</div>
                        <div class="timeline-desc">
                            Executed on-page, off-page, and technical SEO activities to improve organic search performance. Conducted keyword research, competitor analysis, and website SEO audits to drive targeted traffic growth.
                        </div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">Jan 2026 – Apr 2026 · 4 mos</div>
                        <div class="timeline-title">UI/UX Designer Intern • Infotact Solutions</div>
                        <div class="timeline-desc">
                            Contributed to user-centered digital experiences by creating wireframes, user flows, and high-fidelity prototypes for web and mobile interfaces while collaborating with developers on responsive implementation.
                        </div>
                    </div>
                </div>
            </div>

            <div class="resume-section-box glass-card" style="padding: 35px;">
                <h3><i class="fa-solid fa-chart-line"></i> Expertise</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-title">SEO & Digital Marketing</div>
                        <div class="timeline-desc">Search Engine Optimization, on-page/off-page SEO, keyword research, competitor analysis, content optimization, and search console reporting.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-title">UI/UX & Design</div>
                        <div class="timeline-desc">Figma, responsive web design, wireframing, prototyping, graphic designing, and digital marketing creativity.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-title">Programming & Web Development</div>
                        <div class="timeline-desc">HTML5, CSS3, JavaScript, PHP, MySQL, C, C++, .NET Framework, and modern website development practices.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="education">
        <div class="section-subtitle">Academic Journey</div>
        <h2 class="section-title">Education</h2>
        <div class="dual-grid" style="margin-top: 40px;">
            <div class="resume-section-box glass-card" style="padding: 35px;">
                <h3><i class="fa-solid fa-graduation-cap"></i> Academic Background</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-date">2026 – Present</div>
                        <div class="timeline-title">Ganpat University • M.Sc. Cybersecurity</div>
                        <div class="timeline-desc">Currently pursuing a Master's in Cybersecurity, deepening expertise in network security, ethical hacking, and digital forensics.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">Completed 2025</div>
                        <div class="timeline-title">Ganpat University • B.Sc. CA & IT</div>
                        <div class="timeline-desc">Completed undergraduate studies with strong grounding in programming, web development, and IT concepts.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">Completed 2023</div>
                        <div class="timeline-title">J.M. Chaudhery Sarvajanik School • HSC, 12th Commerce</div>
                        <div class="timeline-desc">Completed higher secondary education.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-date">Completed 2021</div>
                        <div class="timeline-title">Shree Sarvajanik School • SSC, 10th</div>
                        <div class="timeline-desc">Completed secondary education.</div>
                    </div>
                </div>
            </div>

            <div class="resume-section-box glass-card" style="padding: 35px;">
                <h3><i class="fa-solid fa-trophy"></i> Achievements</h3>
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-title">Practice Projects</div>
                        <div class="timeline-desc">Successfully created end-to-end practice websites including a personal portfolio and a fully functional e-commerce platform.</div>
                    </div>
                    <div class="timeline-item">
                        <div class="timeline-title">Academic Consistency</div>
                        <div class="timeline-desc">Maintained consistent high performance in university labs and practical technical assessments throughout my degree.</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="section-subtitle">Get In Touch</div>
        <h2 class="section-title">Get In Touch.</h2>
        <p class="contact-lead">My inbox is always open. Whether you have a question, a project idea, or just want to say hi, I'll try my best to get back to you!</p>

        <div class="contact-list">
            <div class="contact-row">
                <div class="contact-icon"><i class="fa-regular fa-envelope"></i></div>
                <div class="contact-text">imadityamodi@gmail.com</div>
            </div>
            <div class="contact-row">
                <div class="contact-icon"><i class="fa-solid fa-phone"></i></div>
                <div class="contact-text">+91 8320224997</div>
            </div>
            <div class="contact-row">
                <div class="contact-icon"><i class="fa-solid fa-location-dot"></i></div>
                <div class="contact-text">Mahesana, Gujarat</div>
            </div>
        </div>

        <div class="contact-cta">
            <a href="mailto:imadityamodi@gmail.com" class="btn-primary-custom large">Say Hello</a>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <a href="#home" class="logo">
                <img src="assets/images/logo.svg" alt="Aditya logo" class="site-logo">
                <span class="logo-text">Aditya</span>
            </a>
            <p style="color: var(--text-secondary); font-size: 14px;">© 2026 Aditya Alkeshkumar Modi. Designed & built with passion.</p>
            <div class="footer-socials">
                <a href="https://github.com/Aditya-modi1511" target="_blank" class="social-icon-btn"><i class="fa-brands fa-github"></i></a>
                <a href="https://www.linkedin.com/in/aditya-modi-803a883a0" target="_blank" class="social-icon-btn"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="mailto:imadityamodi@gmail.com" class="social-icon-btn"><i class="fa-solid fa-envelope"></i></a>
            </div>
        </div>
    </footer>

    <a href="#home" class="back-to-top"><i class="fa-solid fa-arrow-up"></i></a>

    <script src="assets/js/main.js"></script>
    <script src="assets/js/typing.js"></script>
    <script src="assets/js/cursor.js"></script>
</body>
</html>