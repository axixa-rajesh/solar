<div class="container">
    <div class="row">
        <div class="col-12 mb-1">
        <a href="<?=ROOT.'categories/create';?>" class="btn btn-primary">Add New Categories</a>
        </div>
    </div>
    <?php if(Session::get('gmsg')){?>
    <div class="row">
        <div class="col-12 mb-1 alert alert-success">
            <?=Session::get('gmsg');?>
        </div>
    </div>
    <?php 
        Session::delete('gmsg');
    } ?>
    <div class="row">
        <div class="col-12">
    
        <table class="table">
            <thead>
                <tr>
                    <th>S.no</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $index=0;
                foreach($data as $info){
                    ?>
                    <tr>
                        <td><?=++$index;?></td>
                        <td><?=$info['name']?></td>
                        <td><?=$info['description']?></td>
                        <td><?=date('d-M-Y h:m:s D',strtotime($info['created_at']))?></td>
                        <td><?=date('d-M-Y h:m:s D',strtotime($info['update_at']))?></td>
                        <td><a href="<?=ROOT.'categories/edit/'.enc($info['id']);?>" class="btn btn-primary">Edit</a> <a href="#" class="btn btn-danger">Delete</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>