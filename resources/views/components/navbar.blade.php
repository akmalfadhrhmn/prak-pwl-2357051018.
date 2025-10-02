<!-- resources/views/components/navbar.blade.php -->
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .navbar {
        background: linear-gradient(135deg, #4299e1 0%, #3182ce 100%);
        padding: 1.5rem 3rem;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    }

    .navbar-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
        max-width: 1200px;
        margin: 0 auto;
    }

    .navbar-logo h2 {
        font-size: 1.4rem;
        color: #ffffff;
        font-weight: 600;
    }

    .navbar-menu {
        list-style: none;
        display: flex;
        gap: 2.5rem;
    }

    .navbar-menu li a {
        text-decoration: none;
        color: #ffffff;
        font-size: 0.95rem;
        font-weight: 400;
        opacity: 0.9;
        transition: opacity 0.3s ease;
    }

    .navbar-menu li a:hover {
        opacity: 1;
    }

    @media (max-width: 768px) {
        .navbar {
            padding: 1rem;
        }

        .navbar-container {
            flex-direction: column;
            gap: 1rem;
        }

        .navbar-menu {
            gap: 1.5rem;
        }
    }
</style>

<nav class="navbar">
    <div class="navbar-container">
        <div class="navbar-logo">
            <h2>My Laravel App</h2>
        </div>
        <ul class="navbar-menu">
            <li><a href="/">Home</a></li>
        </ul>
    </div>
</nav>
