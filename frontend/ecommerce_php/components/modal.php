<section id="modal">
<?php (!isset($_SESSION) ? session_start() : ""); 
  if (isset($_POST['formct1']) && $_POST['formct1'] == 'reg') {
    $email = $_POST['email'];
    $pw1 = md5($_POST['pw1']);
    // $insertsql = "INSERT INTO member (email,pw1,cname,tssn,birthday,imgname) VALUES('" . $email . "','" . $pw1 . "', '" . $cname . "','" . $tssn . "','" . $birthday . "','" . $imgname . "')";
    $SQLstring = sprintf("INSERT INTO member (email, pw1) VALUES ('%s', '%s')", $email, $pw1);
    $Result = $link->query($SQLstring);
    $id = $link->lastInsertId();
    if ($Result) {
      $_SESSION['login'] = true;
      $_SESSION['id'] = $id;
      $_SESSION['email'] = $email;
      echo "<script>alert('Thank You for Register!');location.href='index.php';</script>";
    }
  }
  ?>

<div id="loading" name="loading" style="display:none;position:fixed;width:100%;height:100%;top:0;left:0;background-color:rgba(255,255,255,0.5);z-index:9999;">
        <i class="fas fa-spinner fa-spin fa-5x fa-fw" style="position:absolute;top:50%;left:50%;"></i>
    </div>
    <div class="modal fade" id="login" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalToggleLabel">
              <?php if ($_SESSION['login']!=true) { ?>Log In 
              <?php } else { ?> Hi,  <?php echo $_SESSION['cname'];?>
              <?php } ?>
            </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <?php if($_SESSION['login']!=true) { ?>
            
            <div class="modal-body">
              <div>
                Account:
                <input class="form-control m-1" type="text" value="" id="inputAccount"/>
                Password:
                <input class="form-control m-1" type="password" value="" id="inputPassword"/>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-light" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal"
              data-bs-dismiss="modal">
              Sign Up
              </button>
              <button type="button" class="btn btn-dark" id="login_btn" >Log In</button>
            </div>
           <?php } else { ?>
            <div class="modal-body">
             
            </div>
            <div class="modal-footer">
            <a href="logout.php"><button type="button" class="btn btn-dark" >Log Out</button></a>
            </div>
           <?php } ?> 

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
            <form name="reg" action="modal.php" method="post">
              Email:
              <input class="form-control m-1" type="email" name="email" id="email" />
              Password:
              <input class="form-control m-1" type="password" name="pw1" id="pw1" />
              Re-enter Password:
              <input class="form-control m-1" type="password" name="pw2" id="pw2" />
              <input type="hidden" name="form_control" id="form_control" value="reg">
            </form>
          </div>
          <div class="modal-footer">
            <button class="btn btn-dark" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
              data-bs-dismiss="modal" onclick="checkpw()">
              Sign Up
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- <div class="modal fade modal-lg mt-5" id="cart" tabindex="-1" aria-labelledby="exampleModalLabel"
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
    </div> -->
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
    <script>
      function checkpw() {
        const pw1 = document.querySelector('#pw1');
        const pw2 = document.querySelector('#pw2');
        pw2.value !== pw1.value ? alert("Password Doesn't Match") : '';
      }
      
    </script>
  </section>