<?php wp_footer(); ?>
<footer class="footer">
  <?php
  $firstname = get_the_author_meta('first_name');
  $lastname = get_the_author_meta('last_name');
  ?>
  <p>&copy; 2022 <?php echo $firstname;?> <?php echo $lastname;?></p>
</footer>
</body>
</html>
