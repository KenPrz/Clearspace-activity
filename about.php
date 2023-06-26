<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="about.css">
    <title>About</title>
</head>

<body>
    <div class="navbar">
        <ul>
            <li><a href="" onmouseover="changeTextColor(0)" onmouseout="resetTextColor(0)">our vision</a></li>
            <li><a href="">clear space</a></li>
            <li><a href="" onmouseover="changeTextColor(1)" onmouseout="resetTextColor(1)">our mission</a></li>
            <li id="login-button"><a href="login.php">Login</a></li>
        </ul>
    </div>
    <div class="container">
        <section id="clearspace">
            <div class="clearspace-header">
                <h1>THIS IS HEADER</h1>
                <h2>THIS IS SUBHEADER</h2>
            </div>
            <div class="clearspace-content">
                <div>
                    <h4>Our Vision</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore illum dolore ab inventore, voluptatibus, veniam reprehenderit, voluptas tenetur esse magni mollitia quo sequi tempora delectus dolor dicta doloremque quaerat accusantium.</p>
                </div>
                <div>
                    <h4>Our Mission</h4>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Mollitia, ea consectetur. Accusantium deleniti repellendus, quas illum, mollitia consectetur ea velit qui laudantium rem magnam commodi consequuntur fuga molestias officiis eligendi.</p>
                </div>
            </div>
        </section>
    </div>

    <script>
        function changeTextColor(index) {
            const sections = document.querySelectorAll('.clearspace-content > div');
            sections[index].style.transition = 'color 0.5s ease'; // Smooth transition effect
            sections[index].style.color = 'blue'; // Change to desired text color
        }

        function resetTextColor(index) {
            const sections = document.querySelectorAll('.clearspace-content > div');
            sections[index].style.transition = 'color 0.5s ease'; // Smooth transition effect
            sections[index].style.color = ''; // Reset to default text color
        }
    </script>
</body>

</html>
