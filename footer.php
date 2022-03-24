<?php wp_footer(); ?>
<footer class="footer">
  <?php
  $firstname = get_the_author_meta('first_name');
  $lastname = get_the_author_meta('last_name');
  ?>
  <div class="footer-content">
  <p><?php echo $firstname;?> <?php echo $lastname;?> &copy; 2022</p>
  <div>
    <a href="https://facebook.com/">
      <img src="https://cdn-icons.flaticon.com/png/512/2168/premium/2168281.png?token=exp=1648136519~hmac=0107b182695d27934aefb51e94ebf341" alt="Facebook icon" target="_blank" rel="noopener noreferrer">
    </a>
    <a href="https://instagram.com/">
      <img src="https://cdn-icons-png.flaticon.com/512/1384/1384015.png" alt="Instagram icon" target="_blank" rel="noopener noreferrer">
    </a>
    <a href="https://twitter.com/">
      <img src="https://cdn-icons.flaticon.com/png/512/4494/premium/4494465.png?token=exp=1648136736~hmac=73e39ebb93b75cea9b2b216e11b16087" alt="Twitter icon" target="_blank" rel="noopener noreferrer">
    </a>
    <a href="https://linkedin.com/">
      <img src="https://cdn-icons-png.flaticon.com/512/1384/1384014.png" alt="Linkedin icon" target="_blank" rel="noopener noreferrer">
    </a>
  </div>
  </div>

</footer>
</body>
</html>
