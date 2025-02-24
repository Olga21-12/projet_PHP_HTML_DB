<footer class="footer">
        <nav class="nav-footer">

            <ul class="nav-footer-list">
                <li><a href="./index.php">HOME</a></li>
                <li><a href="./profile.php">MON PROFIL</a></li>
                <li><a href="./login.php">LOGIN</a></li>
                
            </ul>

        </nav>

        <div class="footer-date">
        <?php 
        echo date("H:i:s d - m - Y", time() + 3600);
        ?>
        </div>

        <span class="text-muted">&copy; 2024 A&O, Inc</span>
    </footer>
    </div>
</body>
</html