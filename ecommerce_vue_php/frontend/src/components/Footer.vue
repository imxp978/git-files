<template>
  <section id="footer">
    <div class="container mx-auto pb-3" style="width: 100%">
      <div class="row">
        <div class="col-12">
          <i class="fa-brands fa-cc-visa fa-2x fa-fw"></i>
          <i class="fa-brands fa-cc-mastercard fa-2x fa-fw"></i>
          <i class="fa-brands fa-cc-paypal fa-2x fa-fw"></i>
        </div>
        <div class="col col-sm-6 col-12 text-end text-sm-start">
          <h5>About Us</h5>
          Company <br />
          email: thisisanemail@email.com <br />
          tel: +886 987654321 <br />
        </div>
        <div class="col col-12 col-sm-2 text-end">
          <h5>Member</h5>
          <a href="#" data-bs-toggle="modal" data-bs-target="#login"
            >My Account</a
          ><br />
          <a href="#" data-bs-toggle="modal" data-bs-target="#cart">My Cart</a
          ><br />
        </div>
        <div class="col col-12 col-sm-2 text-end">
          <h5>Terms & Conditions</h5>
          <a href="#">Return & Policy</a> <br />
          <a href="#">Privacy</a><br />
          <a href="#">FAQ</a><br />
        </div>
        <div class="col col-12 col-sm-2 text-end">
          <h5>Follow Us</h5>
          <a href="#"><i class="fa-brands fa-facebook fs-3 fa-fw"> </i></a>
          <a href="#"><i class="fa-brands fa-instagram fs-3 fa-fw"> </i></a>
          <a href="#"><i class="fa-brands fa-twitter fs-3 fa-fw"> </i></a>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {};
</script>

<style>
.col.col-12.col-sm-2 a {
  color: black;
}
</style>
