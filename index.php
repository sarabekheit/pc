<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
   
     
    ob_end_flush();
    include('header.php');

	
    ?>
      <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Kufam:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Lemonada:wght@300;400;500;600;700&family=Mochiy+Pop+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Quintessential&family=Share+Tech+Mono&family=Sriracha&display=swap');
      #main-field{
        margin-top: 5rem!important;
      }
      *{
        scroll-behavior: smooth;
      }
      .cart-img {
          width: calc(35%);
          height: 13vh;
          padding: 3px
      }
      .cart-img img{
        width: 100%;
        height: 100%;
      }
      .cart-qty {
        font-size: 14px
      }
    
      .web-name{
        margin-bottom: -20px;
      display: flex;
      
}
.logo1 img {
 width: 330px; 
 margin-top: -10px;
 margin-left: -10px;

}

.p1{
  font-size: 1.05rem;
  color: #fff;
  font-weight: 600;
  font-family: 'Kanit';
  transition: 0.3s ease;
  cursor: pointer;
}
.p1:hover{
  color: rgb(0, 255, 110);

}
.icony{
  color: #fff;
  cursor: pointer;
  transition: 0.3s ease;

}
.icony:hover{
  color: rgb(0, 255, 110);
  transform: scale(1.3);

}
#manNav{
  background-color: rgb(51, 51, 51, 0);
  
  height: 100px;
  margin-bottom: -60px;
  
}
#back-img{
  background-image: url("assets/lm.jpg");
}
.name-nav{
  padding-top: 8px;
}
.anger{
  background-image: url("assets/call.jpg");
  /* background-position: -180px -180px; */

}
.body1{
  background-color:  #4d4d4d;
  background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 0%, rgba(0,162,175,1) 100%);
  background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(4,0,255,1) 0%, rgba(0,0,0,1) 0%, rgba(0,0,0,1) 0%, rgba(0,17,41,1) 35%, rgba(0,164,255,1) 100%);


}

#blogs{
  background-color:#e6e6fe;
  
  padding-bottom: 50px;
  
  
}
.container1{
  margin-top: 30px;
  margin-left: 200px;
  margin-right: 100px;
} 
.container2{
  display: flex;
}
.bl-f{
  font-weight: 600;
}
.nav2{
  margin-top: 15px;
}
.contact1{
  margin-right: 10px;
}
.admin-icon{
  color: #fff;
}
.acc-img{
  width: 28px;
  transition: 0.3s ease;
}
.acc-img:hover{
  transform: scale(1.1);
}
    </style>
  
    <body id="page-top" class="body1">
        <!-- Navigation-->
      
  
  
      
        <nav class="navbar navbar-expand-lg navbar-light  py-3" id="manNav">
        <div class="web-name">
          <div class="logo1">
              <a href="index.php"><img src="assets/logo9.png" alt=""></a>
          </div>
        
      </div>
  
            <div class="container nav2">
                <a class="navbar-brand js-scroll-trigger" href="./"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item" ><a class="nav-link js-scroll-trigger" href="index.php?page=home"><p class="p1">Home</p></a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="about.php?page=about"><span class="p1">About</span> </a></li>
                        <li class="nav-item"><a class="nav-link contact1" href="#contact"><span class="p1">Contact</span> </a></li>
                        <?php if(isset($_SESSION['login_id'])): ?>

                          

                        <li class="nav-item dropdown" >
                          <a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="true" >
                            <div class="badge badge-danger cart-count">0</div>
                            <!-- <i class="fa fa-shopping-cart icony"></i> -->
                            <span class="p1" > Cart</span>
                          </a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 250px;">
                            <div class="cart-list w-100" id="cart_product">
                            
                              
                            </div>
                            
                            <div  class="d-flex bg-light justify-content-center w-100 p-2">
                                <a style="width: 250px;" href="index.php?page=cart" class="btn btn-sm btn-primary btn-block col-sm-4 text-white"><i class="fa fa-edit"></i>  View Cart</a>
                            </div>
                          </div>
                          </li>
                      <?php endif; ?>
                          
                       

                        <?php if(isset($_SESSION['login_id'])): ?>
                       <div class=" dropdown mr-4 name-nav">
                            <a  style="text-decoration: none;" href="#" class="text-white dropdown-toggle"  id="account_settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <b> <?php echo $_SESSION['login_name'] ?>  </b></a>
                              <div class="dropdown-menu" aria-labelledby="account_settings" style="left: 0.1em;">
                                <a class="dropdown-item" href="javascript:void(0)" id="manage_my_account"><i class="fa fa-cog"></i> Manage Account</a>
                                <a class="dropdown-item" href="admin/ajax.php?action=logout2"><i class="fa fa-power-off"></i> Logout</a>
                              </div>
                        </div>
                      <?php else: ?>
                        <li  style="margin-right: 10px;" class="nav-item"><a class="nav-link js-scroll-trigger" href="javascript:void(0)" id="login_now"><span class="p1" >Login</span></a></li>
                      <?php endif; ?>
                       
                      <li class="nav-item"><a class="nav-link js-scroll-trigger" href="http://localhost/pc/admin"> <img class="acc-img" src="assets/pro.jpg" alt="acc"> </a></li>
                        
                     
                    </ul>
                </div>
            </div>
        </nav>

  <main id="main-field">
        <?php 
        $page = isset($_GET['page']) ? $_GET['page'] : 'home';
        include $page.'.php';
        ?>
       
</main>
<div class="modal fade" id="confirm_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Confirmation</h5>
      </div>
      <div class="modal-body">
        <div id="delete_content"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
      </div>
      <div class="modal-body">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="uni_modal_right" role='dialog'>
    <div class="modal-dialog modal-full-height  modal-md" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="fa fa-arrow-right"></span>
        </button>
      </div>
      <div class="modal-body">
      </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="viewer_modal" role='dialog'>
    <div class="modal-dialog modal-md" role="document">
      <div class="modal-content">
              <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
              <img src="" alt="">
      </div>
    </div>
  </div>
 
<!-- Blogs -->
<section id="blogs">
    <div class="container1 py-4">
        <h4 class="font-rubik font-size-20">Latest Blogs</h4>
        <hr>

        <div class="container2" >
            <div>
                <div class="card1 border-0 font-rale mr-5" style="width: 18rem;">
                    <h5 class="card-title font-size-16">Upcoming Laptops</h5>
                    <img src="assets/blog1.jpg" alt="cart image" class="card-img-top">
                    <p class="card-text font-size-14 text-black-50 py-1 bl-f">These are the new laptops, from MacBooks to gaming systems, I'm most interested in seeing this year.</p>
                    <a href="https://www.cnet.com/tech/computing/the-most-anticipated-laptops-of-2022-so-far/" target="_blank" class="color-second text-left bl-f">Go to the blog</a>
                </div>
            </div>
            <div >
                <div class="card1 border-0 font-rale mr-5" style="width: 18rem;">
                    <h5 class="card-title font-size-16">Upcoming Computers</h5>
                    <img src="assets/blog2.jpg" alt="cart image" class="card-img-top">
                    <p class="card-text font-size-14 text-black-50 py-1 bl-f">When money isn't a barrier, an extreme PC build is the path toward gaming greatness. A build like this will run  ...</p>
                    <a href="https://www.pcgamer.com/build-guide-the-extreme-gaming-pc/" target="_blank" class="color-second text-left bl-f">Go to the blog</a>
                </div>
            </div>
            <div >
                <div class="card1 border-0 font-rale mr-5" style="width: 18rem;">
                    <h5 class="card-title font-size-16">Upcoming Accessories</h5>
                    <img src="assets/blog3.jpg" alt="cart image" class="card-img-top">
                    <p class="card-text font-size-14 text-black-50 py-1 bl-f">PC gaming is a really fun way to de-stress after a long day, connect with friends online, and appreciate a ...</p>
                    <a href="https://www.rollingstone.com/product-recommendations/electronics/best-gaming-accessories-981557/" target="_blank" class="color-second text-left bl-f">Go to the blog</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- !Blogs -->
        <footer class=" py-5 anger">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="mt-0 text-white" id="contact" >Contact us</h2>
                        <hr class="divider my-4" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
                        <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
                        <div style=" font-weight:600;" class="text-white">+201006340213</div>
                    </div>
                    <div class="col-lg-4 mr-auto text-center">
                        <i class="fas fa-envelope fa-3x mb-3 text-muted"></i>
                        <!-- Make sure to change the email address in BOTH the anchor text and the link target below!-->
                        <a style="text-decoration: none; color:white; font-weight:600;" class="d-block number" href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#sent?compose=new" target="_blank" >techip.egy@gmail.com</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="container"><div  class="small text-center text-muted"><span style="color:white; font-weight:600;"> Techip	&copy; 2022 - All Rights Reserved </span>  | <a style="text-decoration: none; color:#1ac6ff; font-weight:600;" href="https://web.facebook.com/sharly.fayez/" target="_blank">Techip🖥️</a></div></div>
        </footer>
        
       <?php include('footer.php') ?>
    </body>
    <script type="text/javascript">
      $('#login').click(function(){
        uni_modal("Login",'login.php')
      })
      $('.datetimepicker').datetimepicker({
          format:'Y-m-d H:i',
      })
      $('#manage_my_account').click(function(){
          uni_modal("Manage Account",'signup.php');
      })
    </script>
    <?php $conn->close() ?>

</html>
