<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>Select Group</h5>
            <span>Add class of <code>.form-control</code> with
                <code>&lt;input&gt;</code> tag</span>
        </div>
        <div class="card-block">
            <div class="row">
                <div class="col-sm-10">
                    <div class="form-group row">

                        <div class="col-sm-10">
                            <form method="POST" action="">
                                <select name="select" id="select" class="form-control">
                                    <?php
                                    $string = "SELECT * FROM tbl_groups";
                                    $mydb->setQuery($string);
                                    $cur = $mydb->loadResultList();
                                    foreach ($cur as $result) {
                                    ?>
                                        <option id="grps" value="<?php echo htmlentities($result->id) ?>"><?php echo htmlentities($result->title) ?></option>
                                    <?php } ?>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Permissions Assign</h5>
            <span>Add class of <code>.form-control</code> with
                <code>&lt;input&gt;</code> tag</span>
        </div>
        <div class="card-block">

            <form method="POST" action="<?php echo $web_root ?>views/controller.php?action=assign_perrmission">
            <input type="text" id="grp_id" name="group_id">
                <div class="row">
                    <?php
                    $string = "SELECT * FROM tbl_permissions";
                    $mydb->setQuery($string);
                    $cur = $mydb->loadResultList();
                    foreach ($cur as $result) {
                    ?>
                        <div class="col-sm-3 col-xl-3 m-b-4">
                            <!-- <h4 class="sub-title">Section</h4> -->

                            <div class="border-checkbox-section">
                                <div class="border-checkbox-group border-checkbox-group-primary">
                                    <input type="checkbox" id="checkbox<?php echo $result->id ?>" class="border-checkbox" name="checkItems[]" value="<?php echo $result->id ?>">
                                    <label class="border-checkbox-label" for="checkbox<?php echo $result->id ?>"><?php echo $result->description ?></label>
                                </div>
                            </div>

                            
                        </div>
                    <?php } ?>

                </div>
                <div class="row">
                    <label class="col-sm-10"></label>
                    <div class="col-sm-10">
                        <button type="submit" name="assign_now" class="btn btn-primary btn-sm m-b-0">Assign Role now</button>
                        <button type="button" class="btn btn-primary btn-sm m-b-0">Back</button>
                    </div>
                </div>
        </div>

        </form>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
        $(document).ready(function(){
            $('#grp_id').attr('hidden',true);
            $('#select').change(function(e){  
                event.preventDefault();                 
                var groups=$(this).val();                
                $('#grp_id').val(groups);
        //============================================
             console.log(groups);  
             $.ajax({
                type:"GET",
                url: "<?php echo $web_root ?>seek_permissions.php",
                data: { groups: groups },
                dataType: 'json',
                success: function(res){                
                   
                }
                });
        //console.log(groups); 
        //===================================================
                
            });
        });

    </script> 
