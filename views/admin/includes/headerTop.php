      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><strong class="text-primary"> Esprit</strong><span>thèque </span></div></a></div>
              
                
                <!-- Messages dropdown-->
                 <?php
                 $sql_get = mysqli_query($connection,"SELECT * FROM reclamations WHERE status=0");
                 $count= mysqli_num_rows($sql_get);
                 ?>


                <li class="nav-item dropdown"> <a id="messages" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="fa fa-bell"></i><span class="badge badge-danger" id="count" ><?php echo $count; ?></span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <?php 
                    $sql_get1 = mysqli_query($connection,"SELECT * FROM reclamations WHERE status=0");
                    if (mysqli_num_rows($sql_get1)>0)
                  {
                    while($result=mysqli_fetch_assoc($sql_get1))
                    { 
                      echo '<a class="dropdown-item text-dark font-weight-bold href="#">'.$result['Sujet'].'</a>';
                      echo '<a class="dropdown-item text-danger href="#">'.$result['comment'].'</a>';
                      echo '<div class="dropdown-divider"></div>';
                      
                    }
                  }
                  else 
                  {
                    echo "Pas de notifications";
                  } ?>

                          
                    <li><a rel="nofollow" href="#rec" class="dropdown-item all-notifications text-center"> <strong> <i class="fa fa-list"></i> Voir tous les détails</strong></a></li>
                  </ul>
                </li>
               
                <!-- Log out-->
                <li class="nav-item"><a href="login.html" class="nav-link logout"> <span class="d-none d-sm-inline-block">Se déconnecter</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>