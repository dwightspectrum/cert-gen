</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; <strong><span>Hotware Cert. Generator</span></strong>. All Rights Reserved.
    </div>
  </footer><!-- End Footer -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script>
    const user = <?=json_encode($sessData) ?>;
  </script>

  <script type="module" src="<?=base_url()?>/assets/js/whole/whole.js?v=1.0"></script>

  <script src='<?=base_url()?>/assets/plugins/nprogress/nprogress.js'></script>

  <script>
    NProgress.start();
  </script>

  <script src="<?=base_url()?>/assets/js/whole/main.js"></script>

  <script>
    window.addEventListener('load', (e) => {
      NProgress.done();
    })
  </script>

</body>

</html>