<div class="page-wrapper">
    <div class="page-body">

        <div class="row">

            <div class="col-md-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>Manage users</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                                <li><i class="feather icon-maximize full-card"></i></li>
                                <li><i class="feather icon-minus minimize-card"></i></li>
                                <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                <li><i class="feather icon-trash close-card"></i></li>
                                <li><i class="feather icon-chevron-left open-card-option"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block p-b-0">
                        <div class="table-responsive">
                            <table class="table table-hover m-b-0">
                                <thead>
                                    <tr>
<<<<<<< HEAD
                                        <th>#Number</th>
                                        <th>Group Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action(s)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count =0;
                                    $string = "SELECT * FROM tbl_groups";
                                    $mydb->setQuery($string);
                                    $cur = $mydb->loadResultList();
                                    foreach ($cur as $result) {
                                    ?>
                                    <tr>
                                        <td><?php echo $count+=1 ?></td>
                                        <td><a href="#!" class="#" data-cfemail="#"><?php echo $result->title ?></a></td>
                                        <td><a href="#!"><?php echo $result->description ?></a></td>
                                        <td><a href="#!" class="label label-info ">Test Status</a></td>
                                        <td>
                                            <a href="#!"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                 <?php } ?>                       
=======
                                        <th>#NUMBER</th>
                                        <th>GroupName</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count=0;
                                          $string = "SELECT * FROM tbl_groups";
                                          $mydb->setQuery($string);
                                          $cur = $mydb->loadResultList();
                                          foreach ($cur as $result) {                               
                                        ?>
                                    <tr>                                        
                                        <td><?php echo htmlentities($count+=1) ?></td>
                                        <td><a href="#" class="__cf_email__" ><?php echo $result->title ?></a></td>
                                        <td><label class="#"><?php echo $result->description ?></label></td>
                                        <td>
                                            <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                            <a href="#!"><i class="fa fa-star f-12 text-c-yellow"></i></a>
                                            <a href="#!"><i class="fa fa-star f-12 text-default"></i></a>
                                            <a href="#!"><i class="fa fa-star f-12 text-default"></i></a>
                                        </td>
                                        <td>
                                            <a href="#"><i class="fa fa-edit"></i></a>
                                        </td>
                                        
                                    </tr>                                 
                                 <?php } ?>
                                    
>>>>>>> 3d58541707d6e0be27be38472d3511b559286d51
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
      
        </div>

    </div>
</div>