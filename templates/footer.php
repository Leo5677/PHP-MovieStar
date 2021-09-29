<footer id="footer">
    <div id="social-container">
        <ul>
            <li>
                <a href="#"><i class="fab fa-facebook-square"></i></a>
            </li>
            <li>
                <a href="#"><i class="fab fa-instagram"></i></a>
            </li>
            <li>
                <a href="#"><i class="fab fa-youtube"></i></a>
            </li>
        </ul>
    </div>
    <div id="footer-links-container">
        <ul>
            <li><a href="#">Insert Movie</a></li>
            <li><a href="#">Insert Review</a></li>
            <li><a href="#">Login / Sign Up</a></li>
        </ul>
    </div>
    <p>&copy; <?= date('Y') ?> Valensoela</p>

    </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
<script src="https://unpkg.com/vue@next"></script>
<script>
    function loadPage() {
        var load = setTimeout(showPage, 1500);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("body-moviestar").style.display = "block";
    }
</script>

</html>