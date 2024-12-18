<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page - Jobly</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            /* Minimum tinggi body mencakup seluruh viewport */
        }

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 0 auto;
        }

        .container2 {
            align-items: center;
            height: auto;
            width: 90%;
            max-width: 1200px;
            margin: auto;
        }

        header {
            padding: 1rem 0;
            background-color: #F8F9FA;
            border-bottom: 1px solid #ddd;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007BFF;
        }

        .logo span {
            color: #ff5722;
        }

        nav ul {
            display: flex;
            list-style: none;
        }

        nav ul li {
            margin-left: 1.5rem;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #007BFF;
        }

        main {
            flex: 1;
        }

        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 2rem 0;
        }

        .hero-content {
            flex: 1;
            text-align: justify;
            margin-top: 2rem;
            max-width: 75%;
            padding-right: 1rem;
        }

        .hero-content h1 {
            font-size: 2.5rem;
            color: #333;
        }

        .hero-content p {
            margin: 1rem 0;
            color: #666;
        }

        .btn-primary {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #007BFF;
            color: #fff;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 1rem;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #007bffa7;
        }

        .hero-image {
            flex: 1;
            /* Memungkinkan elemen ini mengambil ruang */
            max-width: 50%;
            /* Batasi lebar agar proporsional */
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
            /* Pastikan gambar tetap proporsional */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .stats {
            margin-top: 1.5rem;
        }

        .stats .stat {
            display: flex;
            flex-direction: column;
            margin-bottom: 0.5rem;
        }

        .stats .stat h3 {
            font-size: 1.5rem;
            color: #007BFF;
            margin-bottom: 0.2rem;
        }

        .stats .stat p {
            font-size: 1rem;
            color: #666;
        }

        footer {
            text-align: center;
            padding: 1rem 0;
            background-color: #F8F9FA;
            border-top: 1px solid #ddd;
        }

        footer p {
            font-size: 0.9rem;
            color: #666;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <h1 class="logo">Jobly<span>.</span></h1>
                <ul>
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container2">
                <div class="hero-content">
                    <h1>The home of your dream job</h1>
                    <p>We offer a seamless and engaging platform for job seekers and employers to connect.</p>
                    <p>Whether you're looking to find the perfect role or the ideal candidate, Jobly makes it easier
                        than ever to explore a wide range of career opportunities and recruitment solutions. Our
                        platform is designed to support both professionals and businesses in their journey to success.
                    </p>
                    <a href="{{ route('login') }}" class="btn-primary">Explore Jobs</a>
                    <div class="stats">
                        <div class="stat">
                            <h3>300k+</h3>
                            <p>Active Users</p>
                        </div>
                        <div class="stat">
                            <h3>100k+</h3>
                            <p>Jobs Posted</p>
                        </div>
                        <p>Join the platform trusted by millions of job seekers worldwide. Sign up today and take the
                            next step in your career!</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Jobly. All rights reserved.</p>
    </footer>
</body>

</html>
