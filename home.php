<?php 
include 'admin/db_connect.php'; 
?>
<style>
    #cat-list li{
        cursor: pointer;
    }
      
    
    .prod-item p{
        margin: unset;
    }
    .bid-tag {
    position: absolute;
    right: .5em;
}
.small-card{
    background-color: #fff;
    margin-bottom: 20px;
border-radius: 10px;
box-shadow: 0 5px 15px rgb(0 0 0/ 88%);
transition: 0.3s ease;

}
.small-card:hover{
    transform: scale(1.05);
    
}
.big-card{
    border: none;
    background-color: rgb(51, 51, 51, 0);
    border-radius: 10px;
    margin-top: 5px;
}
.catg-head{
 background-color: rgba(0,93,102,1,0);
 color: #fff;
 font-weight: 600;
 
 


}
.catg-body{
    
    background: radial-gradient(circle, rgba(0,159,255,1) 0%, rgba(0,0,0,1) 100%);
    border-radius: 0 0 10px 10px;
border: none;
box-shadow: 0px 5px 15px rgb(0 0 0 / 88%);

    
}
.big{
 
    margin-top: 21px;
    /* background-color:  #145252; */
    background-color: rgb(51, 51, 51, 0);

    border-radius: 5px 5px 10px 10px;

}
.catg-list{
    background-color:  #fff;
    background-color: rgb(51, 51, 51, 0);
    

}
.list-1{

    background-color:  #fff;
    color: #000;
  border: none;
  border-radius: px;
  transition: 0.3s ease-out;
  font-family: Kanit;
}
.list-1:hover{
    background-color:  #1a75ff;
    color: #fff;
    transform: scale(1.05);
}
.price1{
   
    background-color: #ffcc00;
    font-size:.9rem ;
   margin-top: 10px;
}
</style>
<?php 
$cid = isset($_GET['category_id']) ? $_GET['category_id'] : 0;
?>
<div class="contain-fluid">
    <div class="col-lg-12 ">
        <div class="row">
            <div class="col-md-3">
                <div class="card big">
                    <div class="card-header catg-head">⚙️ Categories</div>
                    <div class="card-body catg-body">
                        <ul class="list-group catg-list" id="cat-list">
                           <a href="index.php" style="text-decoration: none;" > <li class='list-group-item list-1' data-id='all' data-href="index.php?page=home&category_id=all">All</li></a>
                            <?php
                                $cat = $conn->query("SELECT * FROM categories order by name asc");
                                while($row=$cat->fetch_assoc()):
                                    $cat_arr[$row['id']] = $row['name'];
                             ?>
                            <li class='list-group-item list-1' data-id='<?php echo $row['id'] ?>' data-href="index.php?page=home&category_id=<?php echo $row['id'] ?>"><?php echo ucwords($row['name']) ?></li>

                            <?php endwhile; ?>
                        </ul>

                    </div>
                </div>
            </div>
            <div class="col-md-9"  >
                <div class="card big-card">
                    <div class="card-body big-card">
                        <div class="row">
                            <?php
                                $where = "";
                                if($cid > 0){
                                    $where  = " where CONCAT('[',REPLACE(category_ids,',','],['),']') LIKE '%[".$cid."]%'  ";
                                }
                                $products = $conn->query("SELECT * from products $where order by title asc");
                                if($products->num_rows <= 0){
                                    echo "<center><h4><i>No Available Product.</i></h4></center>";
                                } 
                                while($row=$products->fetch_assoc()):
                             ?>
                             <div class="col-sm-4">
                                 <div class="card small-card">
                                    <div class="float-right align-top bid-tag ">
                                         <span class="badge badge-pill badge-primary text-dark price1">$ <?php echo number_format($row['price']) ?></span>
                                     </div>
                                     <div class="card-img-top d-flex justify-content-center" style="max-height: 30vh;overflow: hidden">
                                     <img style="width: 200px;padding-top:5px;" class="img-fluid" src="admin/assets/uploads/<?php echo $row['image_path'] ?>" alt="Card image cap">
                                       
                                     </div>
                                      <div class="float-right align-top d-flex">
                                     </div>
                                     <div class="card-body prod-item">
                                         <p style="font-family: 'Kanit';">
                                            
                                          <?php 
                                          $cats = '';
                                          $cat = explode(',', $row['category_ids']);
                                          foreach ($cat as $key => $value) {
                                            if(!empty($cats)){
                                              $cats .=", ";
                                            }
                                            if(isset($cat_arr[$value])){
                                              $cats .= $cat_arr[$value];
                                            }
                                          }
                                          echo $cats;
                                          ?>
                                            
                                         
                                          </p>
                                         <p  style="font-family: 'Kanit'; font-size:.99rem;  font-style: normal;" class="truncate"><?php echo $row['description'] ?></p>
                                        <button  style="margin-top: 10px; " class="btn btn-warning btn-sm view_prod btn1" type="button" data-id="<?php echo $row['id'] ?>"> View</button>
                                     </div>
                                 </div>
                             </div>
                            <?php endwhile; ?>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
       
<script>
    $('#cat-list li').click(function(){
        location.href = $(this).attr('data-href')
    })
     $('#cat-list li').each(function(){
        var id = '<?php echo $cid > 0 ? $cid : 'all' ?>';
        if(id == $(this).attr('data-id')){
            $(this).addClass('active')
        }
    })
     $('.view_prod').click(function(){
        uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
     })
</script>