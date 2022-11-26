<?php if(isset($_SESSION['status'])) {?>
<div class="toast align-items-center show toastMessage bg-success" role="alert" aria-live="assertive" aria-atomic="true" id="toastMessage">
  <div class="d-flex">
    <div class="toast-body">
    <?php
      echo $_SESSION['status'];
      unset($_SESSION['status']);
     ?>
   </div>
    <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close" onClick='toggleToastMessage()'></button>
  </div>
</div>
<?php } ?>
<script>
  function toggleToastMessage()
  {
    const toastMessage = document.getElementById('toastMessage')
    toastMessage.classList.toggle('show')
  }
</script>