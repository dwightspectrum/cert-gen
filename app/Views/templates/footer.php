</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; <strong><span>Hotware Cert. Generator</span></strong>. All Rights Reserved.
    </div>
  </footer><!-- End Footer -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
      const user = <?=json_encode($sessData) ?>;
  </script>
  <script type="module" src="assets/js/whole.js?v=1.0"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>