<template>
  <section id="login">
    <div>THIS IS LOGIN LOADED</div>
    <div
      class="modal fade"
      id="login"
      aria-hidden="true"
      aria-labelledby="exampleModalToggleLabel"
      tabindex="-1"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">Log In</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form>
              Account:
              <input
                class="form-control m-1"
                type="text"
                value="test@example.com"
              />
              Password:
              <input class="form-control m-1" type="password" value="123456" />
            </form>
          </div>
          <div class="modal-footer">
            <button
              class="btn btn-light"
              data-bs-target="#exampleModalToggle2"
              data-bs-toggle="modal"
              data-bs-dismiss="modal"
            >
              Sign Up
            </button>
            <button type="button" class="btn btn-dark">Log In</button>
          </div>
        </div>
      </div>
    </div>
    <div
      class="modal fade"
      id="exampleModalToggle2"
      aria-hidden="true"
      aria-labelledby="exampleModalToggleLabel2"
      tabindex="-1"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel2">Sign Up</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form>
              Username:
              <input class="form-control m-1" type="text" value="user01" />
              Email:
              <input
                class="form-control m-1"
                type="email"
                value="test@example.com"
              />
              Password:
              <input class="form-control m-1" type="password" value="123456" />
              Re-enter Password:
              <input class="form-control m-1" type="password" value="123456" />
            </form>
          </div>
          <div class="modal-footer">
            <!-- <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>
            <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button> -->
            <button
              class="btn btn-dark"
              data-bs-target="#exampleModalToggle"
              data-bs-toggle="modal"
              data-bs-dismiss="modal"
            >
              Sign In
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {};
</script>

<style></style>
