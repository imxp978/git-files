<section id="modal">
    <div class="modal fade" id="login" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">Log In</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              Account:
              <input class="form-control m-1" type="text" value="test@example.com" />
              Password:
              <input class="form-control m-1" type="password" value="123456" />
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-light" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
              data-bs-dismiss="modal">
              Sign Up
            </button>
            <button type="button" class="btn btn-dark">Log In</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
      tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel2">Sign Up</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              Username:
              <input class="form-control m-1" type="text" value="user01" />
              Email:
              <input class="form-control m-1" type="email" value="test@example.com" />
              Password:
              <input class="form-control m-1" type="password" value="123456" />
              Re-enter Password:
              <input class="form-control m-1" type="password" value="123456" />
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-dark" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
              data-bs-dismiss="modal">
              Sign Up
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade modal-lg mt-5" id="cart" tabindex="-1" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cart</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row d-flex justify-content-end">
              <div class="col-6 text-center">item</div>
              <div class="col-2 text-end">price</div>
              <div class="col-2 text-end">quantity</div>
              <div class="col-2 text-end">subtotal</div>
            </div>
            <hr />
            <Transition>
              <div v-show="cartStore.checkCart()" class="text-end">
                Cart is empty
              </div>
            </Transition>
            <ul>
              <li v-for="item in cart" class="row d-flex justify-content-end align-items-baseline">
                <div class="col-6 text-start">
                  <img :src="`../images/product_images/${item.image}`" width="50px" />
                  product.title
                </div>
                <div class="col-2 text-end">$: product.price</div>
                <div class="col-2 text-end">
                  <input type="number" class="form-control" min="0" v-model="item.quantity"
                    @change="cartStore.checkQuantity(item)" />
                </div>
                <div class="col-2 text-end">
                  $: product.price * product.quantity
                </div>
              </li>
            </ul>
            <hr />
            <li class="col-12 text-end d-flex justify-content-end">
              <div>Total $: sum</div>
            </li>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">
              Close
            </button>
            <button type="button" class="btn btn-dark">Checkout</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </section>